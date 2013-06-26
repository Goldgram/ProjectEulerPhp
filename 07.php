<!-- 
By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.
What is the 10 001st prime number?
 -->
<?php $startTime = microtime(true);
//simple prime varifier
function isPrime($input)
{
	$coin = 1;
	$sq = sqrt($input);
	for ($i=2; $i < $sq; $i++) {
		if ($input%$i==0) {
			$coin--;
			break;
		}
	}
	return $coin;
}

$primeIndex = 0;
$i=2;
// loop until the 10001 prime found
while ($primeIndex < 10001) {
	if (isPrime($i)==1) {
		$primeIndex++;
		if ($primeIndex==10001) {
			$AnswerPrime = $i;
		}
	}
	$i++;
}

$answer = $AnswerPrime;
$endTime = microtime(true);
echo 'Answer: ',$answer,' <br> Time: ',($endTime - $startTime),' ';
?>