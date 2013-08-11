<!-- 

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
// $total=1;
$num=1;
$increase =2;

$endNum = 8*8;
while ($num < $endNum) {
	for ($i=0; $i < 4; $i++) { 
		// echo $num,"\n";
		echo $primeCount,"/",$totalCount,"\n";

		$num += $increase;

		if (isPrime($num)) {
			$primeCount++;
		}
		$totalCount++;
		// $total += $num;
	}
	$increase+=2;
}

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 