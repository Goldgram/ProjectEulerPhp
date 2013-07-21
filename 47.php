<!-- 
The first two consecutive numbers to have two distinct prime factors are:
14 = 2 × 7
15 = 3 × 5
The first three consecutive numbers to have three distinct prime factors are:
644 = 2² × 7 × 23
645 = 3 × 5 × 43
646 = 2 × 17 × 19.
Find the first four consecutive integers to have four distinct prime factors. What is the first of these numbers?
 -->
<?php $startTime = microtime(true);


function isPrime($input) {
	// if ($input==1) {
	// 	return false;
	// }
	$sq = sqrt($input);
	for($i=2; $i <= $sq; $i++) {
		if($input%$i==0) {
			return false;
		}
	}
	return true;
}

function getFactors($input)
{
	global $factors,$factorsIndex;
	$sq = sqrt($input);
	for($i=2; $i <= $sq; $i++) {
		if($input%$i==0) {
			// echo $i," , ",$secondI,"\n";
			if (!isPrime($i)) {
				getFactors($i);
			}
			else if (!in_array($i,$factors)) {
				$factors[$factorsIndex] = $i;
				$factorsIndex++;
				// echo $i,"\n";
			}
			$secondI = $input/$i;
			if (!isPrime($secondI)) {
				getFactors($secondI);
			}
			else if (!in_array($secondI,$factors)) {
				$factors[$factorsIndex] = $secondI;
				$factorsIndex++;
				// echo $secondI,"\n";
			}
			break;
		}
	}
}



$numPrimeFactors = 2;
$factors;
$factorsIndex;
for ($i=2; $i <= 20; $i++) { 
	$factors = array();
	$factorsIndex = 0;
	getFactors($i);
	// foreach ($factors as $key => $value) {
	// 	if (isPrime($value)) {
	// 		$numPrimeFactors++;
	// 	}
	// 	// echo $value,"\n";
	// }
	if ($numPrimeFactors == count($factors)) {
		echo "=>",$i,"\n"; 
	}
	// var_dump($factors);
	// echo "====\n";
}

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 