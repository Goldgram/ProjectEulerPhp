<!-- 
A unit fraction contains 1 in the numerator. The decimal representation of the unit fractions with denominators 2 to 10 are given:
1/2	= 	0.5
1/3	= 	0.(3)
1/4	= 	0.25
1/5	= 	0.2
1/6	= 	0.1(6)
1/7	= 	0.(142857)
1/8	= 	0.125
1/9	= 	0.(1)
1/10	= 	0.1
Where 0.1(6) means 0.166666..., and has a 1-digit recurring cycle. It can be seen that 1/7 has a 6-digit recurring cycle.
Find the value of d  1000 for which 1/d contains the longest recurring cycle in its decimal fraction part.
 -->
<?php $startTime = microtime(true);

function isMulRec($input)//is recursive of multiple nums
{
	$numerator = 1;
	$numText = "0.";
	$leftover = 1;
	while ($leftover>0) {
		$number = floor(($numerator*10)/$input);
		$leftover = ($numerator*10)%$input;
		$currentText = ".".$number."-".$leftover.".";
		$numText .= $currentText;
		$testText = "";
		for ($i=0; $i < 4; $i++) { 
			$testText .= $currentText;
		}
		if (substr_count($numText, $currentText)>1) {
			// this isn't the exact number due to adding "." and "-" in but the offset is exact across all numbers, it's roughly x5 plus leading values that don't reoccur
			//this returns 5 for any single digit cycle
			return strripos($numText, $currentText)-stripos($numText, $currentText);
		}
		$numerator = $leftover;
	}
	return 0;
}
$HighestVal = 0;
$HighestNum = 0;
for ($i=2; $i < 1000; $i++) { 
	$iRecValue = isMulRec($i);
	if ($iRecValue>$HighestVal) {
		$HighestVal = $iRecValue;
		$HighestNum = $i;
	}
}

$answer = $HighestNum;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 983
// Time: 0.44s