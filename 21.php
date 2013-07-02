<!-- 
Let d(n) be defined as the sum of proper divisors of n (numbers less than n which divide evenly into n).
If d(a) = b and d(b) = a, where a  b, then a and b are an amicable pair and each of a and b are called amicable numbers.
For example, the proper divisors of 220 are 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 and 110; therefore d(220) = 284. The proper divisors of 284 are 1, 2, 4, 71 and 142; so d(284) = 220.
Evaluate the sum of all the amicable numbers under 10000.
 -->
<?php $startTime = microtime(true);

function isPrime($input)
{
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}

//Thābit ibn Qurra theorem

// for ($n=2; $n < 100; $n++) { 
// 	$p = (3*pow(2,($n-1)))-1;
// 	$q = 3*pow(2,$n)- 1;
// 	$r = 9*pow(2,(2*$n)-1) - 1;

// 	if (isPrime($p) && isPrime($q) && isPrime($r)) {
// 		echo pow(2,$n)*$p*$q," - ",pow(2,$n)*$r,"\n";
// 	}
// 	//this does not produce a comprehensive list
// }



$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
