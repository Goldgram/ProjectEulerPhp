<!-- 
The number, 197, is called a circular prime because all rotations of the digits: 197, 971, and 719, are themselves prime.
There are thirteen such primes below 100: 2, 3, 5, 7, 11, 13, 17, 31, 37, 71, 73, 79, and 97.
How many circular primes are there below one million?
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
function isCircularPrime($input) {
	$numStr = "".$input;
	$numStrLenMinusOne = strlen($numStr)-1;
	for ($i=0; $i < $numStrLenMinusOne; $i++) { 
		$numStr = substr($numStr,1,$numStrLenMinusOne).substr($numStr,0,1);
		if (!isPrime(intval($numStr))) {
			return false;
		}
	}
	return true;
}
$totalPrimes = 4;
for ($num=11; $num < 1000000; $num+=2) { 
	if (isPrime($num))
	{
		if (isCircularPrime($num)) {
			$totalPrimes++;
		}
	}
}
$answer = $totalPrimes;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 55
// Time: 4.9s
