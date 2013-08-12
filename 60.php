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

$primesArray = array();
$primesArray[0] = 2;
$primesArrayIndex = 1;

$num = 3;
while ($num<30000) {
	if (isPrime($num)) {
		$primesArray[$primesArrayIndex] = $num;
		$primesArrayIndex++;
	}
	$num+=2;
}

// var_dump($primesArray);
$primesArrayCount = count($primesArray);
for ($a=0; $a < $primesArrayCount; $a++) {
	for ($b=0; $b < $primesArrayCount; $b++) {
		if (isPrime(intval("".$primesArray[$a].$primesArray[$b])) && isPrime(intval("".$primesArray[$b].$primesArray[$a]))
			&& $a!=$b
			) {
			for ($c=0; $c < $primesArrayCount; $c++) {
				if (isPrime(intval("".$primesArray[$a].$primesArray[$c])) && isPrime(intval("".$primesArray[$c].$primesArray[$a]))
					&& isPrime(intval("".$primesArray[$b].$primesArray[$c])) && isPrime(intval("".$primesArray[$c].$primesArray[$b]))
					&& $a!=$c && $b!=$c
					) {
					for ($d=0; $d < $primesArrayCount; $d++) {
						if (isPrime(intval("".$primesArray[$a].$primesArray[$d])) && isPrime(intval("".$primesArray[$d].$primesArray[$a]))
							&& isPrime(intval("".$primesArray[$b].$primesArray[$d])) && isPrime(intval("".$primesArray[$d].$primesArray[$b]))
							&& isPrime(intval("".$primesArray[$c].$primesArray[$d])) && isPrime(intval("".$primesArray[$d].$primesArray[$c]))
							&& $a!=$d && $b!=$d && $c!=$d
							) {
							for ($e=0; $e < $primesArrayCount; $e++) {
								if (isPrime(intval("".$primesArray[$a].$primesArray[$e])) && isPrime(intval("".$primesArray[$e].$primesArray[$a]))
									&& isPrime(intval("".$primesArray[$b].$primesArray[$e])) && isPrime(intval("".$primesArray[$e].$primesArray[$b]))
									&& isPrime(intval("".$primesArray[$c].$primesArray[$e])) && isPrime(intval("".$primesArray[$e].$primesArray[$c]))
									&& isPrime(intval("".$primesArray[$d].$primesArray[$e])) && isPrime(intval("".$primesArray[$e].$primesArray[$d]))
									&& $a!=$e && $b!=$e && $c!=$e && $d!=$e
									) {
									//echo $primesArray[$a]," ",$primesArray[$b]," ",$primesArray[$c]," ",$primesArray[$d]," ",$primesArray[$e],"\n";
									//break 5;
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
// Answer: 
// Time: 