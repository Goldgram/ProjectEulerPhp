<!-- 
The primes 3, 7, 109, and 673, are quite remarkable. By taking any two primes and concatenating them in any order the result will always be prime. For example, taking 7 and 109, both 7109 and 1097 are prime. The sum of these four primes, 792, represents the lowest sum for a set of four primes with this property.
Find the lowest sum for a set of five primes for which any two primes concatenate to produce another prime.
-->
<?php $startTime = microtime(true);

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
function isMultiplePrimes($inputArray)
{
	$sq = sqrt(max($inputArray));
	for ($i=2; $i <= $sq; $i++) {
		foreach ($inputArray as $value) {
			if ($value%$i==0) {
				return false;
			}
		}
	}
	return true;
}

$primesArray = array();
$primesArray[0] = 2;
$primesArrayIndex = 1;

$num = 3;
while ($num<10000) {
	if (isPrime($num)) {
		$primesArray[$primesArrayIndex] = $num;
		$primesArrayIndex++;
	}
	$num+=2;
}

// echo isMultiplePrimes(array(3)),"\n";
// echo isMultiplePrimes(array(4)),"\n";
// echo isMultiplePrimes(array(2,7)),"\n";
// echo isMultiplePrimes(array(2,9,11)),"\n";
// echo isMultiplePrimes(array(2,7,11)),"\n";
// echo isMultiplePrimes(array(2,7,14)),"\n";

// if (isMultiplePrimes(array(2,7,11))) {
// // if (isPrime(2)&&isPrime(7)&&isPrime(11)) {
// 	echo "OK\n";
// }


// var_dump($primesArray);
$primesArrayCount = count($primesArray);
for ($a=0; $a < $primesArrayCount; $a++) {
	for ($b=$a+1; $b < $primesArrayCount; $b++) {
		if (isMultiplePrimes(array(intval($primesArray[$a].$primesArray[$b]),intval($primesArray[$b].$primesArray[$a])))
			) {
			// echo $primesArray[$a]," ",$primesArray[$b],"\n";
			for ($c=$b+1; $c < $primesArrayCount; $c++) {
				if (isMultiplePrimes(array(intval($primesArray[$a].$primesArray[$c]),intval($primesArray[$c].$primesArray[$a])
																	,intval($primesArray[$b].$primesArray[$c]),intval($primesArray[$c].$primesArray[$b])))
			 		) {
					for ($d=$c+1; $d < $primesArrayCount; $d++) {
						if (isMultiplePrimes(array(intval($primesArray[$a].$primesArray[$d]),intval($primesArray[$d].$primesArray[$a])
																			,intval($primesArray[$b].$primesArray[$d]),intval($primesArray[$d].$primesArray[$b])
																			,intval($primesArray[$c].$primesArray[$d]),intval($primesArray[$d].$primesArray[$c])))
							) {
							for ($e=$d+1; $e < $primesArrayCount; $e++) {
								if (isMultiplePrimes(array(intval($primesArray[$a].$primesArray[$e]),intval($primesArray[$e].$primesArray[$a])
																					,intval($primesArray[$b].$primesArray[$e]),intval($primesArray[$e].$primesArray[$b])
																					,intval($primesArray[$b].$primesArray[$e]),intval($primesArray[$e].$primesArray[$b])
																					,intval($primesArray[$c].$primesArray[$e]),intval($primesArray[$e].$primesArray[$c])
																					,intval($primesArray[$d].$primesArray[$e]),intval($primesArray[$e].$primesArray[$d])))
				 						) {
									echo $primesArray[$a]," ",$primesArray[$b]," ",$primesArray[$c]," ",$primesArray[$d]," ",$primesArray[$e]," = ";
									echo $primesArray[$a]+$primesArray[$b]+$primesArray[$c]+$primesArray[$d]+$primesArray[$e],"\n";
									break 5;
								}
							}
						}
					}
				}
			}
		}
	}
	
}



$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 26033
// Time: 29s needs refactoring