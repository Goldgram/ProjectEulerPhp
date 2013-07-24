<!-- 
The arithmetic sequence, 1487, 4817, 8147, in which each of the terms increases by 3330, is unusual in two ways: (i) each of the three terms are prime, and, (ii) each of the 4-digit numbers are permutations of one another.
There are no arithmetic sequences made up of three 1-, 2-, or 3-digit primes, exhibiting this property, but there is one other 4-digit increasing sequence.
What 12-digit number do you form by concatenating the three terms in this sequence?
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
function getFactorial($inputNum)
{
	$total = 1;
	for ($i=$inputNum; $i > 1; $i--) { 
		$total *= $i;
	}
	return $total;
}
//setup the index values for 4 digit permutation (4!)
for ($perNumI = 1; $perNumI <= 24; $perNumI++) { 
	$perNum = $perNumI;
	for ($numIndex=0; $numIndex < 4; $numIndex++) { 
		$currentResult = 0;
		$combsLeft = getFactorial(4 - 1 - $numIndex);
		for ($i=0; $i < (4 - $numIndex); $i++) { 
			$upToPosib = $i * $combsLeft;
			if ($upToPosib < $perNum) {
				$currentUpToPosib = $upToPosib;
				$currentResult = $i;
			}
		}
		$resultTemplate[$perNumI][$numIndex] = $currentResult;
		$perNum -= $currentUpToPosib;
	}
}
$threePrimeResults = array();
$threePrimeResultsIndex = 0;
$finalResult = "";
//check all 4 digit nums, add any 3+ number of prime comb into array
for ($mainInt=1000; $mainInt <= 9999; $mainInt++) { 
	$mainIntStr = "".$mainInt;
	$tempArray = array();
	$tempArrayIndex = 0;
	if (isPrime($mainInt)) {
		$isPrimeCount = 0;
		for ($perNumI = 1; $perNumI <= 24; $perNumI++) {
			for ($i=0; $i < 4; $i++) { 
				$nums[$i] = $mainIntStr[$i];
			}
			$printout = "";
			foreach ($resultTemplate[$perNumI] as $key => $value) {
				$printout .= $nums[$value];
				unset($nums[$value]);
				$nums = array_values($nums);
			}
			if (isPrime(intval($printout)) && !in_array($printout, $tempArray)) {
				$tempArray[$tempArrayIndex] = $printout;
				$tempArrayIndex++;
				$isPrimeCount++;
			}
		}
		if ($isPrimeCount>3) {
			$checker = 0;
			for ($searchInt=0; $searchInt < count($threePrimeResults); $searchInt++) { 
				if (in_array($tempArray[0],$threePrimeResults[$searchInt])) {
					$checker++;
					break;
				}
			}
			if ($checker == 0) {
				$threePrimeResults[$threePrimeResultsIndex] = $tempArray;
				$threePrimeResultsIndex++;
			}
		}
	}
}
//go through array and look for same difference between vars that is not a 1487 permutation
for ($i=0; $i < count($threePrimeResults); $i++) {
	$TPRLen = count($threePrimeResults[$i]);
	for ($j=0; $j < $TPRLen; $j++) { 
		for ($k=$j+1; $k < $TPRLen; $k++) {
			if ($threePrimeResults[$i][$k] > $threePrimeResults[$i][$j]) {
				$tempNum1 = $threePrimeResults[$i][$k] - $threePrimeResults[$i][$j];
			}
			else {
				$tempNum1 = $threePrimeResults[$i][$j] - $threePrimeResults[$i][$k];
			}
			for ($l=$k+1; $l < $TPRLen; $l++) {
				if ($threePrimeResults[$i][$k] > $threePrimeResults[$i][$l]) {
					$tempNum2 = $threePrimeResults[$i][$k] - $threePrimeResults[$i][$l];
				}
				else {
					$tempNum2 = $threePrimeResults[$i][$l] - $threePrimeResults[$i][$k];
				}
				$concatStr = ">".$threePrimeResults[$i][$j].$threePrimeResults[$i][$k].$threePrimeResults[$i][$l];
				if ($tempNum1==$tempNum2 && !strpos("1487", $concatStr)) {
					$finalResult = substr($concatStr,1);
				}
			}
		}
	}
}

$answer = $finalResult;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 296962999629
// Time: 0.24s