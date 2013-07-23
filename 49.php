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
for ($a=1; $a <= 6; $a++) { 
	for ($b=2; $b <= 7; $b++) { 
		if ($b!=$a) {
			for ($c=3; $c <= 8; $c++) {
				if ($c!=$b && $c!=$a) {
					for ($d=4; $d <= 9; $d++) {
						if ($d!=$c && $d!=$b && $d!=$a) {
							$mainIntStr = "".$a.$b.$c.$d;
							$tempArray = array();
							$tempArrayIndex = 0;
							$isPrimeCount = 0;
							if (isPrime(intval($mainIntStr))) {
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
									if (isPrime(intval($printout))) {
										$tempArray[$tempArrayIndex] = $printout;
										$tempArrayIndex++;
										$isPrimeCount++;
									}
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
				}
			}
		}
	}
}
var_dump($threePrimeResults);

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 