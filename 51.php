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




// for ($i=0; $i <= 9; $i++) { 
// 	for ($j=0; $j <= 9; $j++) { 
// 		echo $i,$j,"\n";
// 	}
// }
// for ($i="00"; $i != "20"; $i=bcadd($i,"01")) { 
// 	echo $i,"\n";
// }







// for ($num=11; $num < 100; $num+=10) { 
// 	if (isPrime($num))
// 	{
// 		echo $num,"\n";
// 	}
// 	if (isPrime($num+2))
// 	{
// 		echo $num+2,"\n";
// 	}
// 	if (isPrime($num+6))
// 	{
// 		echo $num+6,"\n";
// 	}
// 	if (isPrime($num+8))
// 	{
// 		echo $num+8,"\n";
// 	}
// }




// $totalPrimes = 2+3+5+7;

// $rightDigit = array(1,3,7,9);
// for ($leftDigits=1; $leftDigits <= 199999; $leftDigits++) {
// 	for ($rightDigitI=0; $rightDigitI < count($rightDigit); $rightDigitI++) { 
// 		$num = intval($leftDigits.$rightDigit[$rightDigitI]);
// 		// echo "=>",intval($numStr),"\n";
// 		// numRepPrimes($i);

// 		if (isPrime($num))
// 		{
// 			$totalPrimes += $num;
// 		}



// 		// echo "----------------\n";
// 	}
// }

// var_dump($totalPrimes);


// function numRepPrimes($input)
// {
// 	$inputStr = "".$input;
// 	$inputStrLen = strlen($inputStr);

// 	for ($i=1; $i < $inputStrLen; $i++) {

// 		for ($j=0; $j < $inputStrLen-$i; $j++) {
// 			// echo $inputStr," i:",$i," j:",$j,"\n";
// 			echo substr_replace($inputStr,str_repeat ("*",$i),$j,$i),"\n";
// 		}
// 		// echo $inputStr,"\n";
// 	}
// }
function numRepPrimes($num,$swap)
{
	$strNum = "".$num;
	$strSwap = "".$swap;
	if (strpos((">".$strNum),$strSwap)) {
		// echo $num," ~ ",$swap,"\n";
		$counter = 0;
		for ($i=0; $i <= 9; $i++) {
			// echo str_replace($strSwap,("".$i),("".$num)),"\n";
			$testStr = str_replace($strSwap,("".$i),$strNum);
			if (isPrime($testStr) && strlen(("".intval($testStr)))==strlen($strNum)) {
				// echo $testStr," (",strlen($testStr),") == ",$strNum," (",strlen($strNum),")\n";
				$counter++;
			}
		}
		return $counter;
		// if ($counter>=6) {
		// 	echo $num,"\n";
		// }
	}
	return 0;
}

$searchNum = 8;
$result = 0;
// for ($swap=0; $swap <= 3; $swap++) { 
	// for ($num=11; $num < 56050; $num+=2) {
$num=11;
	while ($result == 0) {
		if (isPrime($num))
		{
			for ($swap=0; $swap <= 3; $swap++) { 
				// echo $num," => ",numRepPrimes($num,$swap),"\n";
				$returnCount = numRepPrimes($num,$swap);
				if ($returnCount >= $searchNum) {
					// echo $num,"\n";
					$result = $num;
					break 2;
				}
			}
			// echo "----------------\n";
		}
		$num+=2;
	}
// }

// $string = "123454321";
// echo str_replace("2", "1", $string),"\n";
// var_dump($result);


$answer = $result;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 