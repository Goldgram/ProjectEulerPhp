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
$primeArray = array();
$primeArray[0] = 2;
$primeArrayIndex = 1;
for ($num=3; $num < 1000; $num+=2) { 
	if (isPrime($num))
	{
		$primeArray[$primeArrayIndex] = $num;
		$primeArrayIndex++;
	}
}

function getTotient($input) {
	global $primeArray;
	$minusCount = 1;
	$sq = sqrt($input);
	for($i=0; $primeArray[$i] <= $sq; $i++) {
		if($input%$primeArray[$i]==0) {
			$minusCount+=(($input/$primeArray[$i])-1);

			$otherFactor = $input/$primeArray[$i];
			if ($otherFactor%$primeArray[$i]!=0) {
				$minusCount+=($primeArray[$i]-1);
			}
		}
	}
	return $input - $minusCount;
}


for ($num=2; $num <= 100; $num++) { 

	//results are incorrect somewhere after 10

	echo $num," => ",getTotient($num),"\n";
	// $var = ($num - getTotient($num));
	// if ($num%1000==0) {
	// 	echo $num,"\n";
	// }
}


$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 