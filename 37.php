<!-- 
The number 3797 has an interesting property. Being prime itself, it is possible to continuously remove digits from left to right, and remain prime at each stage: 3797, 797, 97, and 7. Similarly we can work from right to left: 3797, 379, 37, and 3.
Find the sum of the only eleven primes that are both truncatable from left to right and right to left.
NOTE: 2, 3, 5, and 7 are not considered to be truncatable primes.
 -->
<?php $startTime = microtime(true);

function isPrime($input) {
	if ($input==1) {
		return false;
	}
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}
function isTruncatablePrime($input) {
	$numStr = "".$input;
	for ($i=0; $i <= strlen($numStr)+1; $i++) {
		$numStr = substr($numStr,0,strlen($numStr)-1);
		if (!isPrime(intval($numStr))) {
			return false;
		}
	}
	$numStr = "".$input;
	for ($i=0; $i <= strlen($numStr)+1; $i++) { 
		$numStr = substr($numStr,1,strlen($numStr)-1);
		if (!isPrime(intval($numStr))) {
			return false;
		}
	}
	return true;
}
$resultsIndex = 0;
$results = array();
$int = 11;
while ($resultsIndex < 11) {
	if (isPrime($int)) {
		if (isTruncatablePrime($int)) {
			$results[$resultsIndex] = $int;
			$resultsIndex++;
		}
	}
	$int += 2;
}
$sumTrunPrimes = array_sum($results);

$answer = $sumTrunPrimes;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 748317
// Time: 3.37s
