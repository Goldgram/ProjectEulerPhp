<!-- 

-->
<?php $startTime = microtime(true);


function isPrime($input) {
	$sq = sqrt($input);
	for($i=2; $i <= $sq; $i++) {
		if($input%$i==0) {
			return false;
		}
	}
	return true;
}
//set up array of primes up to needed
// $primeArray = array();
// $primeArray[0] = 2;
// // for ($num=3; $num < 1000; $num+=2) {
// $num=3;
// while (end($primeArray)<1000) {
// 	if (isPrime($num))
// 	{
// 		$primeArray[] = $num;
// 	}
// 	$num+=2;
// }

// function getTotient($input) {
// 	global $primeArray;
// 	$factorsArray = array();
// 	$sq = sqrt($input);
// 	for($i=0; $primeArray[$i] <= $sq; $i++) {
// 		$primeFactor = $primeArray[$i];
// 		if($input%$primeFactor==0) {
// 			$factorsArray[] = $primeFactor;
// 			// echo $primeFactor,",";
// 			// $minusCount+=(($input/$primeFactor)-1);

// 			$otherFactor = $input/$primeFactor;
// 			if (isPrime($otherFactor) && $otherFactor%$primeFactor!=0) {
// 				$factorsArray[] = $otherFactor;
// 				// echo $otherFactor,",";
// 				// $minusCount+=($primeFactor-1);
// 			}
// 		}
// 	}
// 	$minusCount = 1;


// // var_dump($factorsArray);
// //calculate the real minus count...???


// 	return " Tot:".($input - $minusCount);


// }

$primes = array();
for ($num=2; $num <= 1000000; $num++) { 
	if (isPrime($num)) {
		$primes[] = $num;
		// echo $num," -> ",($num-1),"\n";
	} else {
		$currentNum = $num;
		$currentTotal = 1;
		$primesCount = count($primes);
		// for ($factor=2; $factor < $primesCount; $factor++) { 
		foreach ($primes as $divisor) {
			// $divisor = $key;
			if ($divisor > $currentNum || $currentNum == 1) {
				break;
			}
			if ($currentNum%$divisor==0) {
				$currentTotal *= $divisor-1;
				$currentNum = $currentNum/$divisor;
			}
		}
		if ($currentNum > 1) {
			$currentTotal *= $currentNum;
		}
		// echo $num," => ",$currentTotal,"\n";
		// break;
	}
	// echo "============================>$num\n";
}
// var_dump($primes);

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 
