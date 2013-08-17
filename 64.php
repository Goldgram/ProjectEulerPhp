<!-- 
All square roots are periodic when written as continued fractions and can be written in the form:
√N = a0 +	1/a1 +	1/a2 +	1/a3 + ...
For example, let us consider √23:
√23 = 4 + √23 — 4 = 4 + 1/1/√23—4 = 4 + 1/ 1 + 	√23 – 3/7
If we continue we would get the following expansion:
√23 = 4 +	1/1+1/3+1/1+1/8 +....
It can be seen that the sequence is repeating. For conciseness, we use the notation √23 = [4;(1,3,1,8)], to indicate that the block (1,3,1,8) repeats indefinitely.
The first ten continued fraction representations of (irrational) square roots are:
√2=[1;(2)], period=1
√3=[1;(1,2)], period=2
√5=[2;(4)], period=1
√6=[2;(2,4)], period=2
√7=[2;(1,1,1,4)], period=4
√8=[2;(1,4)], period=2
√10=[3;(6)], period=1
√11=[3;(3,6)], period=2
√12= [3;(2,6)], period=2
√13=[3;(1,1,1,1,6)], period=5
Exactly four continued fractions, for N ≤ 13, have an odd period.
How many continued fractions for N ≤ 10000 have an odd period?
-->
<?php $startTime = microtime(true);
//$j is all numbers that aren't exact square numbers
$startNum = 2;
$endNum = 0;
for ($i=2; $i <= 5; $i++) { 
	$endNum = pow($i,2);
	for ($j=$startNum; $j < $endNum; $j++) {




		echo $j," => ";

		$m = 0;
		$d = 1;
		$a = $i-1;
		$aZero = $i-1;


		for ($k=0; $k < 10; $k++) { 
			$m = ($d*$a)-$m;
			$d = ($j-($m*$m))/$d;

			$a = floor(($aZero+$m)/$d);
			echo $a;
		}


		echo "\n";


	}
	$startNum = $endNum+1;
}



$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 