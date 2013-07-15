<!-- 
An irrational decimal fraction is created by concatenating the positive integers:
0.123456789101112131415161718192021...
It can be seen that the 12th digit of the fractional part is 1.
If dn represents the nth digit of the fractional part, find the value of the following expression.
d1 × d10 × d100 × d1000 × d10000 × d100000 × d1000000
 -->
<?php $startTime = microtime(true);

$longStr = ".";
$int = 1;
while (strlen($longStr) <= 1000000) {
	$longStr .= $int;
	$int++;
}
$d = 1;
for ($i=1; $i <= 1000000; $i*=10) { 
	$d *= $longStr[$i];
}

$answer = $d;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 210
// Time: 0.077s