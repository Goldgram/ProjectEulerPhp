<!-- 
The prime factors of 13195 are 5, 7, 13 and 29.
What is the largest prime factor of the number 600851475143 ?
 -->
<?php $startTime = microtime(true);
//is prime checker
function isPrime($input) {
	$sq = sqrt($input);
	for($i=2; $i <= $sq; $i++) {
		if($input%$i==0) {
			return false;
		}
	}
	return true;
}
//checks if prime and highest and sets if so. 
function checkIfHighestAndPrime($input) {
	global $HighestPrime;
	if (isPrime($input) && $input>$HighestPrime) {
		$HighestPrime = $input;
	}
}
$div = 2;
$num = 600851475143;
//sqrt num now to save on computation
$sqrtOfNum = sqrt($num);
//loop and check both factors up to sqrt
while ($div <= $sqrtOfNum) {
	if ($num%$div==0) {
		checkIfHighestAndPrime($div);
		checkIfHighestAndPrime($num/$div);
	}
	$div++;
}

$answer = $HighestPrime;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 6857
// Time: 0.03s