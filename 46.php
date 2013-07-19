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
	$sq = sqrt($input);
	for($i=2; $i <= $sq; $i++) {
		if($input%$i==0) {
			return false;
		}
	}
	return true;
}
function isComposite($input) {//opposit of prime
	$sq = sqrt($input);
	for ($i=2; $i <= $sq; $i++) {
		if ($input%$i==0) {
			return true;
		}
	}
	return false;
}
for ($i=4; $i <= 20; $i++) { 
	if (isComposite($i)) {
		echo "=>",$i,"\n";
		$checker = 0;
		for ($j=2; $j <= $i-2; $j++) { 
			if (isPrime($i-$j)) {
				echo ($i-$j);
				$num = sqrt(($i-$j)/2);
				if (floor($num) == $num)
				{
					$checker++;
					echo "<=";
				}
				echo "\n";
			}
		}
		if ($checker==0) {
			echo "=====>>>>>",$i," =? ",$checker,"\n";
			break;
		}
		// echo "====\n";
	}
}


// $i=4;
// $result = 0;
// // $checker = false;
// while ($result==0) {
// 	if (isComposite($i)) {
// 		$checker = false;
// 		for ($j=2; $j <= $i-2; $j++) { 
// 			$num = sqrt(($i-$j)/2);
// 			if (floor($num) == $num)
// 			{
// 				$checker = true;
// 			}
// 		}
// 		if (!$checker) {
// 			echo $i,"\n";
// 			$result = $i;
// 		}
// 		// echo "====\n";
// 	}
// 	$i++;
// }
// echo $i,"\n";

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 