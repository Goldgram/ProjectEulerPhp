<!-- 
By replacing the 1st digit of the 2-digit number *3, it turns out that six of the nine possible values: 13, 23, 43, 53, 73, and 83, are all prime.
By replacing the 3rd and 4th digits of 56**3 with the same digit, this 5-digit number is the first example having seven primes among the ten generated numbers, yielding the family: 56003, 56113, 56333, 56443, 56663, 56773, and 56993. Consequently 56003, being the first member of this family, is the smallest prime with this property.
Find the smallest prime which, by replacing part of the number (not necessarily adjacent digits) with the same digit, is part of an eight prime value family.
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
function numRepPrimes($num,$swap)
{
	$strNum = "".$num;
	$strSwap = "".$swap;
	if (strpos((">".$strNum),$strSwap)) {
		$counter = 0;
		for ($i=0; $i <= 9; $i++) {
			$testStr = str_replace($strSwap,("".$i),$strNum);
			if (isPrime($testStr) && strlen(("".intval($testStr)))==strlen($strNum)) {
				$counter++;
			}
		}
		return $counter;
	}
	return 0;
}
$searchNum = 8;
$result = 0;
$num=11;
while ($result == 0) {
	if (isPrime($num))
	{
		for ($swap=0; $swap <= 3; $swap++) { 
			$returnCount = numRepPrimes($num,$swap);
			if ($returnCount >= $searchNum) {
				$result = $num;
				break 2;
			}
		}
	}
	$num+=2;
}

$answer = $result;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 121313
// Time: 2.65s