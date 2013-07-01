<!-- 
A Pythagorean triplet is a set of three natural numbers, a  b  c, for which,
a2 + b2 = c2
For example, 32 + 42 = 9 + 16 = 25 = 52.
There exists exactly one Pythagorean triplet for which a + b + c = 1000.
Find the product abc.
 -->
<?php $startTime = microtime(true);

$triplet;
for ($a=1; $a <= 998; $a++) { 
	for ($b=1; $b <= (999-$a); $b++) { 
		for ($c=1; $c <= (1000-$a-$b); $c++) { 
			if ($a+$b+$c==1000 && ($a*$a)+($b*$b)==($c*$c)) {
				$triplet = $a*$b*$c;
				break 3;
			}
		}
	}
}

$answer = $triplet;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 31875000
// Time: 8.77s