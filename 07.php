<!-- 
By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.
What is the 10 001st prime number?
 -->
<?php $startTime = microtime(true);
//simple prime varifier
function isPrime($input)
{
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}

$primeIndex = 0;
$i=2;
// loop until the 10001 prime found
while ($primeIndex < 10001) {
	if (isPrime($i)) {
		$primeIndex++;
		if ($primeIndex==10001) {
			$AnswerPrime = $i;
		}
	}
	$i++;
}

$answer = $AnswerPrime;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 104743
// Time: 0.242s