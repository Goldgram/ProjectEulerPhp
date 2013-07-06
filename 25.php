<!-- 
The Fibonacci sequence is defined by the recurrence relation:
Fn = Fn1 + Fn2, where F1 = 1 and F2 = 1.
Hence the first 12 terms will be:
F1 = 1
F2 = 1
F3 = 2
F4 = 3
F5 = 5
F6 = 8
F7 = 13
F8 = 21
F9 = 34
F10 = 55
F11 = 89
F12 = 144
The 12th term, F12, is the first term to contain three digits.
What is the first term in the Fibonacci sequence to contain 1000 digits?
 -->
<?php $startTime = microtime(true);

$a[0] = 1;
$b[0] = 1;
$seqCount = 0;
$numOfDigits = 0;
while ($numOfDigits <= 999) {
	$temp = $b;
	// $b => $a + $b
	$leftover = 0;
	for ($i=0; $i < count($a); $i++) { 
		$b[$i] = $b[$i] + $a[$i]+$leftover;
		if ($b[$i]>9) {
			$b[$i]-=10;
			$leftover = 1;
			if (!isset($b[$i+1])) {
				$b[$i+1] = 0;
			}
		}
		else
		{
			$leftover = 0;
		}
	}
	if ($leftover>0) {
		$b[count($b)-1] += 1;
	}
	$a = $temp;
	$numOfDigits = count($a);
	$seqCount++;
}
$index = $seqCount+1;

$answer = $index;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 4782
// Time 1.18s