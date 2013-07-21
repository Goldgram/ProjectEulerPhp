<!-- 
It was proposed by Christian Goldbach that every odd composite number can be written as the sum of a prime and twice a square.
9 = 7 + 2×12
15 = 7 + 2×22
21 = 3 + 2×32
25 = 7 + 2×32
27 = 19 + 2×22
33 = 31 + 2×12
It turns out that the conjecture was false.
What is the smallest odd composite that cannot be written as the sum of a prime and twice a square?
 -->
<?php $startTime = microtime(true);

function isPrime($input) {
	if ($input==1) {
		return false;
	}
	$sq = sqrt($input);
	for($i=2; $i <= $sq; $i++) {
		if($input%$i==0) {
			return false;
		}
	}
	return true;
}
$i=9;
$result = 0;
while ($result==0) {
	if (!isPrime($i)) {
		$j = 1;
		$num = 2;
		$checker = 0;
		while ((2*($j*$j))<$i) {
			$num = $i-(2*($j*$j));
			if (isPrime($num)) {
				$checker++;
				break;
			}
			$j++;
		}
		if ($checker==0) {
			$result = $i;
			break;
		}
	}
	$i+=2;
}

$answer = $result;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 5777
// Time: 0.02s