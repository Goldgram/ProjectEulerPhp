<!-- 
Consider quadratic Diophantine equations of the form:
x2 – Dy2 = 1
For example, when D=13, the minimal solution in x is 6492 – 13×1802 = 1.
It can be assumed that there are no solutions in positive integers when D is square.
By finding minimal solutions in x for D = {2, 3, 5, 6, 7}, we obtain the following:
32 – 2×22 = 1
22 – 3×12 = 1
92 – 5×42 = 1
52 – 6×22 = 1
82 – 7×32 = 1
Hence, by considering minimal solutions in x for D ≤ 7, the largest x is obtained when D=5.
Find the value of D ≤ 1000 in minimal solutions of x for which the largest value of x is obtained.
-->
<?php $startTime = microtime(true);

$maxX = 0;
for ($D=2; $D <= 1000; $D++) {
	$currentD = sqrt($D);
	if (floor($currentD) != $currentD) {
		for ($y=1; $y > 0; $y++) { 
			$x = sqrt(($D*$y*$y)+1);
			if (floor($x) == $x) {
				echo $D," => ",$x,"\n";
				if ($x>$maxX) {
					$maxX = $x;
				}
				break;
			}
		}
	}
}

$answer = $maxX;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 