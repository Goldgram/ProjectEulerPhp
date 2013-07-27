<!-- 
By replacing the 1st digit of the 2-digit number *3, it turns out that six of the nine possible values: 13, 23, 43, 53, 73, and 83, are all prime.

By replacing the 3rd and 4th digits of 56**3 with the same digit, this 5-digit number is the first example having seven primes among the ten generated numbers, yielding the family: 56003, 56113, 56333, 56443, 56663, 56773, and 56993. Consequently 56003, being the first member of this family, is the smallest prime with this property.

Find the smallest prime which, by replacing part of the number (not necessarily adjacent digits) with the same digit, is part of an eight prime value family.
-->
<?php $startTime = microtime(true);

// for ($i=0; $i <= 9; $i++) { 
// 	for ($j=0; $j <= 9; $j++) { 
// 		echo $i,$j,"\n";


// 	}
// }
// for ($i="00"; $i != "20"; $i=bcadd($i,"01")) { 
// 	echo $i,"\n";
// }
function isPrime($input) {
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}
// function numRepPrimes($input)
// {
// 	$inputStr = "".$input;
// 	$inputStrLen = strlen($inputStr);

// 	for ($i=1; $i <= $inputStrLen; $i++) {
// 		for ($j=0; $j < $inputStrLen-$i+1; $j++) {
// 			echo $inputStr,"\n";
// 		}
// 	}
// }

$rightDigit = array(1,3,7,9);
for ($leftDigits=1; $leftDigits < 10; $leftDigits++) {
	for ($rightDigitI=0; $rightDigitI < count($rightDigit); $rightDigitI++) { 
		$numStr = $leftDigits.$rightDigit[$rightDigitI];
		echo "=>",intval($numStr),"\n";
		// numRepPrimes($i);
		echo "----------------\n";
	}
}




$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 