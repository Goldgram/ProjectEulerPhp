<!-- 
The first two consecutive numbers to have two distinct prime factors are:
14 = 2 × 7
15 = 3 × 5
The first three consecutive numbers to have three distinct prime factors are:
644 = 2² × 7 × 23
645 = 3 × 5 × 43
646 = 2 × 17 × 19.
Find the first four consecutive integers to have four distinct prime factors. What is the first of these numbers?
 -->
<?php $startTime = microtime(true);

function isPrime($input) {
	$sq = sqrt($input);
	for($i=2; $i <= $sq; $i++) {
		if($input%$i==0) {
			return false;
		}
	}
	return true;
}
function getFactors($input)
{
	global $factors,$factorsIndex;
	$sq = sqrt($input);
	for($i=2; $i <= $sq; $i++) {
		if($input%$i==0) {
			if (!isPrime($i)) {
				getFactors($i);
			}
			else if (!in_array($i,$factors)) {
				$factors[$factorsIndex] = $i;
				$factorsIndex++;
			}
			$secondI = $input/$i;
			if (!isPrime($secondI)) {
				getFactors($secondI);
			}
			else if (!in_array($secondI,$factors)) {
				$factors[$factorsIndex] = $secondI;
				$factorsIndex++;
			}
			break;
		}
	}
}
$numPrimeFactorsWanted = 4;
$factors;
$factorsIndex;
for ($i=0; $i < $numPrimeFactorsWanted; $i++) { 
	$resultsArray[$i] = 0;
}
$i=4;
$finalResult = 0;
while ($finalResult == 0) {
	$factors = array();
	$factorsIndex = 0;
	getFactors($i);
	if ($numPrimeFactorsWanted == count($factors)) {
		for ($j=0; $j < $numPrimeFactorsWanted-1; $j++) {  
			$resultsArray[$j] = $resultsArray[$j+1];
		}
		$resultsArray[$numPrimeFactorsWanted-1] = $i;
		if (($i-$resultsArray[0]) == ($numPrimeFactorsWanted-1)) {
			$finalResult = $i-($numPrimeFactorsWanted-1);
		}
	}
	$i++;
}

$answer = $finalResult;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 134043
// Time: 1.8s