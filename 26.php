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
for ($i=0; $i < 10000; $i++) { 
	$number = floor(($numerator*10)/$input);
	$leftover = ($numerator*10)%$input;
	//echo $number," ~ ",$leftover;
	$numText .= $number;

	if (strpos($numText, $number.$number.$number)) {
		//echo "<=\n";
		return 0;
	}


	//echo "\n";

	$inputStr = substr($numText,(strlen("".$input)+1));
	if (strlen($inputStr)%2==0 && strlen($inputStr)>2) {
		//$inputStr = "".$input;
		//echo substr($numText,(strlen($inputStr)+1)),"\n";
		echo $inputStr,"\n";
		echo substr($inputStr,0,strlen($inputStr)/2)," - ",substr($inputStr,strlen($inputStr)/2),"\n";
		$firstHalf = substr($inputStr,0,strlen($inputStr)/2);
		$firstHalfLength = strlen($firstHalf);
		$secondHalf = substr($inputStr,strlen($inputStr)/2);
		if ($firstHalf==$secondHalf) {
			echo "> ",$firstHalfLength," <\n";
			return $firstHalfLength;

		}
	}





	if ($leftover==0) {
		return 0;
	}
	else
	{
		$numerator = $leftover;
	}
}


	//return 0
}


for ($i=2; $i < 20; $i++) { 
	echo $i," => ",(1/$i),"\n----\n";
	isMulRec($i);
	//echo isMulRec($i),"\n";
	echo "===================================================\n";
}


$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
