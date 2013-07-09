<!-- 
Euler discovered the remarkable quadratic formula:
n² + n + 41
It turns out that the formula will produce 40 primes for the consecutive values n = 0 to 39. However, when n = 40, 40pow(2) + 40 + 41 = 40(40 + 1) + 41 is divisible by 41, and certainly when n = 41, 41² + 41 + 41 is clearly divisible by 41.
The incredible formula  n²  79n + 1601 was discovered, which produces 80 primes for the consecutive values n = 0 to 79. The product of the coefficients, 79 and 1601, is 126479.
Considering quadratics of the form:
n² + an + b, where |a|  1000 and |b|  1000
where |n| is the modulus/absolute value of n
e.g. |11| = 11 and |4| = 4
Find the product of the coefficients, a and b, for the quadratic expression that produces the maximum number of primes for consecutive values of n, starting with n = 0.
 -->
<?php $startTime = microtime(true);

function isPrime($input)
{
	$input = sqrt($input*$input);//this accounts for minus values
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}
$storeCount = 0;
$storedA = 0;
$storedB = 0;
for ($a=-999; $a < 1000; $a++) { 
	if (isPrime($a)) {
		for ($b=-999; $b < 1000; $b++) { 
			if (isPrime($b)) {
				$count = 0;
				$i = 0;
				$formulaVal = ($i*$i) + ($a*$i)+$b;
				while (isPrime($formulaVal)) {
					$count++;
					$i++;
					$formulaVal = ($i*$i) + ($a*$i)+$b;
				}
				if ($count > $storeCount) {
					$storeCount = $count;
					$storedA = $a;
					$storedB = $b;
				}
			}
		}
	}
}
$multiply = $storedA*$storedB;

$answer = $multiply;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: -59231
// Time: 1.14s