<!-- 
The primes 3, 7, 109, and 673, are quite remarkable. By taking any two primes and concatenating them in any order the result will always be prime. For example, taking 7 and 109, both 7109 and 1097 are prime. The sum of these four primes, 792, represents the lowest sum for a set of four primes with this property.
Find the lowest sum for a set of five primes for which any two primes concatenate to produce another prime.
-->
<?php $startTime = microtime(true);

function isPrime($input) {
	$sq = sqrt($input);
	if ($input%2==0) {
		return false;
	}
	for ($i=3; $i <= $sq; $i+=2) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}
function isMultiplePrimes($inputArray) {
	$sq = sqrt(max($inputArray));
	foreach ($inputArray as $value) {
		if ($value%2==0) {
			return false;
		}
	}
	for ($i=3; $i <= $sq; $i+=2) {
		foreach ($inputArray as $value) {
			if ($value%$i==0) {
				return false;
			}
		}
	}
	return true;
}
$primes = array();
$primesIndex = 0;
$num = 3;
while ($num<8500) {//arbitrarily incremented until produced result 
	if (isPrime($num)) {
		$primes[$primesIndex] = $num;
		$primesIndex++;
	}
	$num+=2;
}
$primesCount = count($primes);
for ($a=0; $a < $primesCount; $a++) {
	for ($b=$a+1; $b < $primesCount; $b++) {
		if (isMultiplePrimes(array(intval($primes[$a].$primes[$b]),intval($primes[$b].$primes[$a])))
			) {
			for ($c=$b+1; $c < $primesCount; $c++) {
				if (isMultiplePrimes(array(intval($primes[$a].$primes[$c]),intval($primes[$c].$primes[$a])
																	,intval($primes[$b].$primes[$c]),intval($primes[$c].$primes[$b])))
			 		) {
					for ($d=$c+1; $d < $primesCount; $d++) {
						if (isMultiplePrimes(array(intval($primes[$a].$primes[$d]),intval($primes[$d].$primes[$a])
																			,intval($primes[$b].$primes[$d]),intval($primes[$d].$primes[$b])
																			,intval($primes[$c].$primes[$d]),intval($primes[$d].$primes[$c])))
							) {
							for ($e=$d+1; $e < $primesCount; $e++) {
								if (isMultiplePrimes(array(intval($primes[$a].$primes[$e]),intval($primes[$e].$primes[$a])
																					,intval($primes[$b].$primes[$e]),intval($primes[$e].$primes[$b])
																					,intval($primes[$b].$primes[$e]),intval($primes[$e].$primes[$b])
																					,intval($primes[$c].$primes[$e]),intval($primes[$e].$primes[$c])
																					,intval($primes[$d].$primes[$e]),intval($primes[$e].$primes[$d])))
				 						) {
									$sumOfResultingPrimes = $primes[$a]+$primes[$b]+$primes[$c]+$primes[$d]+$primes[$e];
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



$answer = $sumOfResultingPrimes;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 26033
// Time: 6.09s