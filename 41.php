<!-- 
We shall say that an n-digit number is pandigital if it makes use of all the digits 1 to n exactly once. For example, 2143 is a 4-digit pandigital and is also prime.
What is the largest n-digit pandigital prime that exists?
 -->
<?php $startTime = microtime(true);

function isPrime($input) {
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}

for ($a=1; $a < 10; $a++) {
	for ($b=1; $b < 10; $b++) {
		if($b==$a)
		{
			continue;
		}
		for ($c=1; $c < 10; $c++) {
			if($c==$b || $c==$b)
			{
				continue;
			}
			echo $a," ",$b," ",$c,"\n";
		}
	}
}


$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 