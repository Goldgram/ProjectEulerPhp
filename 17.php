<!-- 
If the numbers 1 to 5 are written out in words: one, two, three, four, five, then there are 3 + 3 + 5 + 4 + 4 = 19 letters used in total.
If all the numbers from 1 to 1000 (one thousand) inclusive were written out in words, how many letters would be used?
NOTE: Do not count spaces or hyphens. For example, 342 (three hundred and forty-two) contains 23 letters and 115 (one hundred and fifteen) contains 20 letters. The use of "and" when writing out numbers is in compliance with British usage.
 -->
<?php $startTime = microtime(true);
$valsArray = array();
$valsArray[0] = "";
$valsArray[1] = "one";
$valsArray[2] = "two";
$valsArray[3] = "three";
$valsArray[4] = "four";
$valsArray[5] = "five";
$valsArray[6] = "six";
$valsArray[7] = "seven";
$valsArray[8] = "eight";
$valsArray[9] = "nine";
$valsArray[10] = "ten";
$valsArray[11] = "eleven";
$valsArray[12] = "twelve";
$valsArray[13] = "thirteen";
$valsArray[14] = "fourteen";
$valsArray[15] = "fifteen";
$valsArray[16] = "sixteen";
$valsArray[17] = "seventeen";
$valsArray[18] = "eighteen";
$valsArray[19] = "nineteen";
$valsArray[20] = "twenty";

$valsArray[30] = "thirty";
$valsArray[40] = "forty";
$valsArray[50] = "fifty";
$valsArray[60] = "sixty";
$valsArray[70] = "seventy";
$valsArray[80] = "eighty";
$valsArray[90] = "ninety";

$valsArray[100] = "onehundred";
$valsArray[200] = "twohundred";
$valsArray[300] = "threehundred";
$valsArray[400] = "fourhundred";
$valsArray[500] = "fivehundred";
$valsArray[600] = "sixhundred";
$valsArray[700] = "sevenhundred";
$valsArray[800] = "eighthundred";
$valsArray[900] = "ninehundred";

$valsArray[1000] = "onethousand";
$valsArray['and'] = "and";
for ($i=1; $i <= 15; $i++) { 
	$numStr = "";
	if ($i<10) 
	{
		$numStr .= "000".$i;
	}
	else if ($i<100)
	{
		$numStr .= "00".$i;
	}
	else if ($i<1000)
	{
		$numStr .= "0".$i;
	}
	else
	{
		$numStr .= $i;
	}


echo strlen($valsArray[substr($numStr, 2,1)*10])," - ";
echo strlen($valsArray[substr($numStr, 3,1)]),"\n";



}
//echo strlen($valsArray[500]);

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
