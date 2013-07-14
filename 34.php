<!-- 
145 is a curious number, as 1! + 4! + 5! = 1 + 24 + 120 = 145.
Find the sum of all numbers which are equal to the sum of the factorial of their digits.
Note: as 1! = 1 and 2! = 2 are not sums they are not included.
 -->
<?php $startTime = microtime(true);

for ($i=0; $i <= 9; $i++) { 
	$factorial[$i] = 1;
	for ($j=$i; $j > 1; $j--) { 
		$factorial[$i] *= $j;
	}
}
$results = 0;
for ($i=3; $i <= 99999; $i++) {//guessed the limit and it worked so, great success!
	$iStr = "".$i;
	$iStrLen = strlen($iStr);
	$iTotal = 0;
	for ($j=0; $j < $iStrLen; $j++) { 
		$iTotal += $factorial[intval($iStr[$j])];
	}
	if ($i==$iTotal) {
		$results += $i;
	}
}

$answer = $results;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 40730
// Time: 0.23s
