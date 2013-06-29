<!-- 
The following iterative sequence is defined for the set of positive integers:
n  n/2 (n is even)
n  3n + 1 (n is odd)
Using the rule above and starting with 13, we generate the following sequence:
13  40  20  10  5  16  8  4  2  1
It can be seen that this sequence (starting at 13 and finishing at 1) contains 10 terms. Although it has not been proved yet (Collatz Problem), it is thought that all starting numbers finish at 1.
Which starting number, under one million, produces the longest chain?
NOTE: Once the chain starts the terms are allowed to go above one million.
 -->
<?php $startTime = microtime(true);

$numArray = array();
$numArray[1] = 1;
$topNum = 0;
$topNumCount = 0;
for ($i=2; $i < 1000000; $i++) { 
	$num = $i;
	$count = 1;
	while ($num > 1) 
	{
		if ($num%2==0) 
		{
			$num = $num/2;
		}
		else 
		{
			$num =  (3*$num)+1;
		}
		if ($num<$i) {
			$count += $numArray[$num];
			break;
		}
		$count++;
	}
	if ($count>$topNumCount) {
		$topNum = $i;
		$topNumCount = $count;
	}
	$numArray[$i] = $count;
}

$answer = $topNum;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
