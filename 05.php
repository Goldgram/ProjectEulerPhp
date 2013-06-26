<!-- 
2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.
What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?
 -->
<?php $startTime = microtime(true);

//Lowest Common factor of two numbers
function LCF($a,$b)
{
	$HCDValue = 0;
	for ($i = $b; $i >= 1; $i--) { 
		if ($a%$i==0 && $b%$i==0) {
			$HCDValue = $i;
			break;
		}
	}
	return $HCDValue;
}
//lowest common multiple of two numbers
function LCM($a,$b)
{
	return ($a*$b)/LCF($a*$b);
}
// looping values 2-20
$CurrentNum = 2;
for ($i=3; $i < 21; $i++) { 
	$CurrentNum = LCM($CurrentNum,$i);
}

$answer = $CurrentNum;
$endTime = microtime(true);
echo 'Answer: ',$answer,' <br> Time: ',($endTime - $startTime),' ';
?>