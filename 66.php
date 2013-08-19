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

for ($D=2; $D <= 16; $D++) {
	// echo $D,"\n";
	$currentD = sqrt($D);
	if (floor($currentD) != $currentD) {
	// 	echo $currentD,"\n";
		for ($y=1; $y > 0; $y++) { 
			$x = sqrt(($D*$y*$y)+1);
			if (floor($x) == $x) {
				// echo $D," => ",$x,"\n";
				echo $D," => ",$y," >> ",$x,"\n";
				if ($x>$maxX) {
					$maxX = $x;
				}
				break;
			}
		}
	}
}

// function numOfPeriods($input,$baseroot) {
// 	// $count = 0;
// 	// $m = 0;
// 	// $d = 1;
// 	$a = $baseroot-1;


// 		$d = $input-($a*$a);
// 		$a = floor(($a+$a)/$d);
// 		echo ($a*floor(sqrt($input)))+1,"\n";
	
// }

$startNum = 2;
$endNum = 0;
for ($baseRoot=2; $baseRoot <= 4; $baseRoot++) { 
	$endNum = pow($baseRoot,2);
	for ($D=$startNum; $D < $endNum; $D++) {
		echo "=>",$D,"\n";
		// numOfPeriods($D,$baseRoot);

		$a = $baseRoot-1;
		$d = $D-($a*$a);
		$a = floor(($a+$a)/$d);
		echo ($a*floor(sqrt($D)))+1,"\n";




	}
	$startNum = $endNum+1;
}


$answer = $maxX;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 