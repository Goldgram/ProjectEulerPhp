<!-- 
The prime 41, can be written as the sum of six consecutive primes:
41 = 2 + 3 + 5 + 7 + 11 + 13
This is the longest sum of consecutive primes that adds to a prime below one-hundred.
The longest sum of consecutive primes below one-thousand that adds to a prime, contains 21 terms, and is equal to 953.
Which prime, below one-million, can be written as the sum of the most consecutive primes?
 -->
<?php $startTime = microtime(true);

function isPrime($input) {
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}
$num = 1;
$sum = 2;
$primesArray = array();
$primesArray[0] = 2;
$primesArrayIndex = 1;
//this is the value to get nearest, this is interchangable between integers
$maxSum = 1000000;
$closestDiff = $maxSum;
$closestSum = 0;
//make an array of all primes while their total sum is less than target int
while ($sum < $maxSum) {
	$num+=2;
	if (isPrime($num))
	{
		$primesArray[$primesArrayIndex] = $num;
		$primesArrayIndex++;
		$sum += $num;
	}
}
// start with matching two vals up to the full length of all the prime array
//the closest difference sum gets kept if it's prime.
for ($i=2; $i <= count($primesArray); $i++) {
	for ($j=0; $j < count($primesArray)-$i+1; $j++) { 
		$sum = 0;
		for ($k=$j; $k < ($j+$i); $k++) { 
			$sum += $primesArray[$k];
		}
		if ($sum<$maxSum && ($maxSum-$sum)<$closestDiff){
			if (isPrime($sum)) {
				$closestSum = $sum;
			}
		}
	}
}

$answer = $closestSum;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 997651
// Time: 2.69s