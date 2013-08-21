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

// for ($D=2; $D <= 16; $D++) {
// 	// echo $D,"\n";
// 	$currentD = sqrt($D);
// 	if (floor($currentD) != $currentD) {
// 	// 	echo $currentD,"\n";
// 		for ($y=1; $y > 0; $y++) { 
// 			$x = sqrt(($D*$y*$y)+1);
// 			if (floor($x) == $x) {
// 				// echo $D," => ",$x,"\n";
// 				echo $D," => ",$y," >> ",$x,"\n";
// 				if ($x>$maxX) {
// 					$maxX = $x;
// 				}
// 				break;
// 			}
// 		}
// 	}
// }
// echo "=-=-=-=-=-=-=-==-=-=-==-=-=-==-=-=-=-==-=-=\n";
// function numOfPeriods($input,$baseroot) {
// 	// $count = 0;
// 	// $m = 0;
// 	// $d = 1;
// 	$a = $baseroot-1;


// 		$d = $input-($a*$a);
// 		$a = floor(($a+$a)/$d);
// 		echo ($a*floor(sqrt($input)))+1,"\n";
	
// }

// $startNum = 2;
// $endNum = 0;
// for ($baseRoot=2; $baseRoot <= 4; $baseRoot++) { 
// 	$endNum = pow($baseRoot,2);
// 	for ($D=$startNum; $D < $endNum; $D++) {
// 		echo "=>",$D,"\n";
// 		// numOfPeriods($D,$baseRoot);

// 		$a = $baseRoot-1;
// 		$d = $D-($a*$a);
// 		$a = floor(($a+$a)/$d);
// 		echo ($a*floor(sqrt($D)))+1,"\n";




// 	}
// 	$startNum = $endNum+1;
// }


function numOfPeriods($D,$baseroot) {
	// global $maxX;
	// $numer = 0;
	// $denom = 0;
	// $count = 0;
	$m = 0;
	$d = 1;
	$a = $baseroot-1;
	$aZero = $a;
	$periodNum = 0;


	$periodVals = array();
	$periodVals[0] = $a;
	$periodValsIndex = 1;


	while (1==1) {
		$m = ($d*$a)-$m;
		$d = ($D-($m*$m))/$d;
		$a = intval(floor(($aZero+$m)/$d));
		if ($periodNum==0) {
			$mStart = $m;
			$dStart = $d;
			$aStart = $a;
			$periodVals[$periodValsIndex] = $a;
			$periodValsIndex++;
		}
		else {
			// $count++;





			if ($mStart == $m && $dStart == $d && $aStart == $a) {
				echo "D: ",$D,"\n";
				// echo "periodNum: ",$periodNum,"\n";
				// echo "m: ",$m,"\n";
				// echo "d: ",$d,"\n";
				// echo "a: ",$a,"\n";
				echo "----------\n";
				var_dump($periodVals);
				$periodValsCount = count($periodVals);
				if ($periodValsCount == 2) {

					$num = "".$periodVals[count($periodVals)-1];
					$den = "1";
					for ($i=count($periodVals)-2; $i >= 0; $i--) { 
						$startNum = $num;
						//shifted around to get ((next*numerator)+denominator)/ numerator
						$num = bcadd(bcmul($num,"".$periodVals[$i]),$den);
						$den = $startNum;
					}

				} else {
					$num = "".$periodVals[count($periodVals)-2];
					$den = "1";
					for ($i=count($periodVals)-3; $i >= 0; $i--) { 
						$startNum = $num;
						//shifted around to get ((next*numerator)+denominator)/ numerator
						$num = bcadd(bcmul($num,"".$periodVals[$i]),$den);
						$den = $startNum;
					}
				}






				// if ($num>$maxX) {
				// 	$maxX = $x;
				// }



				echo "FinalResult: ",$num,"/",$den,"\n";
				// echo "Result: ",($a*$d)+$m,"\n";
				echo "=====================\n";


				return $num;
			}
				// echo "D: ",$D,"\n";
				// echo "periodNum: ",$periodNum,"\n";
				// echo "m: ",$m,"\n";
				// echo "d: ",$d,"\n";
				// echo "a: ",$a,"\n";
				// echo "Result: ",($a*$d)+$m,"\n";
				// echo "-------\n";

			$periodVals[$periodValsIndex] = $a;
			$periodValsIndex++;


		}
		$periodNum++;
	}
}
// $oddCount = 0;
//$D is all numbers that aren't exact square numbers
$startNum = 2;
$endNum = 0;
for ($baseroot=2; $baseroot <= 32; $baseroot++) { 
	$endNum = pow($baseroot,2);
	for ($D=$startNum; $D < $endNum; $D++) {
		if ($D <= 1000) {
			$numerator = numOfPeriods($D,$baseroot);
			if ($numerator > $maxX) {
				$maxX = $numerator;
			}
		}
		
	}
	$startNum = $endNum+1;
}






$answer = $maxX;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 