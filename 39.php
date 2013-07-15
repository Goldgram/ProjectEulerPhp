<!-- 
If p is the perimeter of a right angle triangle with integral length sides, {a,b,c}, there are exactly three solutions for p = 120.
{20,48,52}, {24,45,51}, {30,40,50}
For which value of p ≤ 1000, is the number of solutions maximised?
 -->
<?php $startTime = microtime(true);

for ($p=6; $p <= 100; $p++) { 
	$count = 0;
	for ($a=2; $a <= ($p/2); $a++) {
		for ($b=$a; $b <= ($p/2); $b++) {
			$c = $p - $a - $b;
			if (($a*$a)+($b*$b) == ($c*$c))
			{
				// echo $a," , ",$b," , ",$c,"\n";
				$count++;
			}
		}
	}
	if ($count>0) {
		echo $p," => ",$count,"\n";
	}
}


$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 