<!-- 
Take the number 192 and multiply it by each of 1, 2, and 3:
192 × 1 = 192
192 × 2 = 384
192 × 3 = 576
By concatenating each product we get the 1 to 9 pandigital, 192384576. We will call 192384576 the concatenated product of 192 and (1,2,3)
The same can be achieved by starting with 9 and multiplying by 1, 2, 3, 4, and 5, giving the pandigital, 918273645, which is the concatenated product of 9 and (1,2,3,4,5).
What is the largest 1 to 9 pandigital 9-digit number that can be formed as the concatenated product of an integer with (1,2, ... , n) where n > 1?
 -->
<?php $startTime = microtime(true);

$topResult = 0;
for ($i=1; $i <= 9999; $i++) {
	$currentString = "".$i;
	$int = 2;
	while (strlen($currentString)<9) {
		$currentString .= $i*$int;
		$int++;
	}
	if (substr_count($currentString,"0")==0 && 
			substr_count($currentString,"1")==1 && 
			substr_count($currentString,"2")==1 && 
			substr_count($currentString,"3")==1 &&
			substr_count($currentString,"4")==1 &&
			substr_count($currentString,"5")==1 &&
			substr_count($currentString,"6")==1 && 
			substr_count($currentString,"7")==1 &&
			substr_count($currentString,"8")==1 &&
			substr_count($currentString,"9")==1) 
	{
		$currentStringVal = intval($currentString);
		if ($currentStringVal>$topResult) {
			$topResult = $currentStringVal;
		}
	}
}

$answer = $topResult;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 932718654
// Time: 0.014s