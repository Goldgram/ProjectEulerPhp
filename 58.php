<!-- 
Starting with 1 and spiralling anticlockwise in the following way, a square spiral with side length 7 is formed.
37 36 35 34 33 32 31
38 17 16 15 14 13 30
39 18  5  4  3 12 29
40 19  6  1  2 11 28
41 20  7  8  9 10 27
42 21 22 23 24 25 26
43 44 45 46 47 48 49
It is interesting to note that the odd squares lie along the bottom right diagonal, but what is more interesting is that 8 out of the 13 numbers lying along both diagonals are prime; that is, a ratio of 8/13 ≈ 62%.
If one complete new layer is wrapped around the spiral above, a square spiral with side length 9 will be formed. If this process is continued, what is the side length of the square spiral for which the ratio of primes along both diagonals first falls below 10%?
-->
<?php $startTime = microtime(true);

function isPrime($input) {
	if ($input == 1) {
		return false;
	}
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return false;
		}
	}
	return true;
}
$totalCount = 0;
$primeCount = 0;
$sideLength = 0;
$num=1;
$increase =2;
while ($sideLength == 0) {
	if ($totalCount>0) {
		if (($primeCount*100)/$totalCount < 10 ) {
			$sideLength = ($totalCount+1)/2;
			break;
		}
	}
	$num += $increase;
	if (isPrime($num)) {
		$primeCount++;
	}
	$totalCount++;
	if (($totalCount)%4==0) {
		$increase+=2;
	}
}

$answer = $sideLength;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 26241
// Time: 7.48s