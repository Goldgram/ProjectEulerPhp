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
$maxD = 0;
//$D is all numbers that aren't exact square numbers
$startNum = 2;
$endNum = 0;
for ($baseroot=2; $baseroot <= 32; $baseroot++) { 
	$endNum = pow($baseroot,2);
	for ($D=$startNum; $D < $endNum; $D++) {
		if ($D <= 1000) {
	 		//solved using Continued fraction expansion
	 		$m = 0;
	    $d = 1;
	    $a = $baseroot - 1;
	    $aStart = $a;
	    $numerLast = "1";
	    $denomLast = "0";
	    $numer = "".$a;
	    $denom = "1";
			$periodNum=0;
			while (  bcsub(bcmul($numer,$numer),bcmul($D,bcmul($denom,$denom))) != "1") {
	    	$m = ($d*$a)-$m;
	    	$d = ($D-($m*$m))/$d;
				$a = floor(($aStart+$m)/$d);
				$numerTemp = $numer;
        $denomTemp = $denom;
        // calculate the numerator and denominator while calculating the repeating block
        $numer = bcadd(bcmul($a,$numer),$numerLast);
        $denom = bcadd(bcmul($a,$denom),$denomLast);
        $numerLast = $numerTemp;
        $denomLast = $denomTemp;
	    }
			if ($numer > $maxX) {
				$maxX = $numer;
				$maxD = $D;
			}
		}
	}
	$startNum = $endNum+1;
}

$answer = $maxD;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 661
// Time: 0.165s