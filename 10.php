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

$totalPrimes = 2+3+5+7;
//incrementing by 2
// for ($num=11; $num < 2000000; $num+=2) { 
// 	if (isPrime($num))
// 	{
// 		$totalPrimes += $num;
// 	}
// }
//incmenting by 10 and checking _1,_3,_7,_9 of numbers
for ($num=11; $num < 2000000; $num+=10) { 
	if (isPrime($num))
	{
		$totalPrimes += $num;
	}
	if (isPrime($num+2))
	{
		$totalPrimes += $num+2;
	}
	if (isPrime($num+6))
	{
		$totalPrimes += $num+6;
	}
	if (isPrime($num+8))
	{
		$totalPrimes += $num+8;
	}
}
//incmenting by 2 and checking _1,_3,_7,_9 of numbers (skipping _5 with an if)
// $num=11;
// while ($num < 2000000) {
// 	if (isPrime($num))
// 	{
// 		$totalPrimes += $num;
// 	}
// 	if (substr($num, -1)=="3") {
// 		$num+=2;
// 	}
// 	$num+=2;
// }

$answer = $totalPrimes;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 142913828922
// Time: 10.93s