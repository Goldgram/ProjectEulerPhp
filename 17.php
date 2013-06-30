<!-- 
If the numbers 1 to 5 are written out in words: one, two, three, four, five, then there are 3 + 3 + 5 + 4 + 4 = 19 letters used in total.
If all the numbers from 1 to 1000 (one thousand) inclusive were written out in words, how many letters would be used?
NOTE: Do not count spaces or hyphens. For example, 342 (three hundred and forty-two) contains 23 letters and 115 (one hundred and fifteen) contains 20 letters. The use of "and" when writing out numbers is in compliance with British usage.
 -->
<?php $startTime = microtime(true);

$valsArray = array();
$valsArray[0] = 0;//"zero"
$valsArray[1] = 3;//"one"
$valsArray[2] = 3;//"two"
$valsArray[3] = 5;//"three"
$valsArray[4] = 4;//"four"
$valsArray[5] = 4;//"five"
$valsArray[6] = 3;//"six"
$valsArray[7] = 5;//"seven"
$valsArray[8] = 5;//"eight"
$valsArray[9] = 4;//"nine"
$valsArray[10] = 3;//"ten"
$valsArray[11] = 6;//"eleven"
$valsArray[12] = 6;//"twelve"
$valsArray[13] = 8;//"thirteen"
$valsArray[14] = 8;//"fourteen"
$valsArray[15] = 7;//"fifteen"
$valsArray[16] = 7;//"sixteen"
$valsArray[17] = 9;//"seventeen"
$valsArray[18] = 8;//"eighteen"
$valsArray[19] = 8;//"nineteen"
$valsArray[20] = 6;//"twenty"
$valsArray[30] = 6;//"thirty"
$valsArray[40] = 5;//"forty"
$valsArray[50] = 5;//"fifty"
$valsArray[60] = 5;//"sixty"
$valsArray[70] = 7;//"seventy"
$valsArray[80] = 6;//"eighty"
$valsArray[90] = 6;//"ninety"
$valsArray[100] = 10;//"onehundred"
$valsArray[200] = 10;//"twohundred"
$valsArray[300] = 12;//"threehundred"
$valsArray[400] = 11;//"fourhundred"
$valsArray[500] = 11;//"fivehundred"
$valsArray[600] = 10;//"sixhundred"
$valsArray[700] = 12;//"sevenhundred"
$valsArray[800] = 12;//"eighthundred"
$valsArray[900] = 11;//"ninehundred"
$valsArray[1000] = 11;//"onethousand"
$valsArray['and'] = 3;//"and"

$thisTotal = 0;
for ($i=1; $i <= 999; $i++) {
	$thisTotal += $valsArray[intval($i/100) * 100];
	$belowOneHun = $i%100;
	if ($belowOneHun!=0 && $i>99) {
		$thisTotal += $valsArray['and'];
	}
	if ($belowOneHun>19) {
		$thisTotal += $valsArray[(intval($belowOneHun/10)) * 10];
		$thisTotal += $valsArray[$belowOneHun%10];
	}
	else
	{
		$thisTotal += $valsArray[$belowOneHun];
	}
}
$thisTotal += $valsArray[1000];

$answer = $thisTotal;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
