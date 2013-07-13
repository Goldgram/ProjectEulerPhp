<!-- 
n England the currency is made up of pound, £, and pence, p, and there are eight coins in general circulation:
1p, 2p, 5p, 10p, 20p, 50p, £1 (100p) and £2 (200p).
It is possible to make £2 in the following way:
1×£1 + 1×50p + 2×20p + 1×5p + 1×2p + 3×1p
How many different ways can £2 be made using any number of coins?
 -->
<?php $startTime = microtime(true);

function checkVal($inputVal,$nextCoin)
{
	return floor((200 - $inputVal)/$nextCoin);
}
$count = 1;//starting with the 2 pound singular count
for ($OnePound=0; $OnePound <= 2 ; $OnePound++) {
	$val = ($OnePound*100);
	$FiftyPMax = checkVal($val,50);
	for ($FiftyP=0; $FiftyP <= $FiftyPMax; $FiftyP++) {
		$val = ($OnePound*100) + ($FiftyP*50);
		$TwentyPMax = checkVal($val,20);
		for ($TwentyP=0; $TwentyP <= $TwentyPMax; $TwentyP++) { 
			$val = ($OnePound*100) + ($FiftyP*50) + ($TwentyP*20);
			$TenPMax = checkVal($val,10);
			for ($TenP=0; $TenP <= $TenPMax; $TenP++) { 
				$val = ($OnePound*100) + ($FiftyP*50) + ($TwentyP*20) + ($TenP*10);
				$FivePMax = checkVal($val,5);
				for ($FiveP=0; $FiveP <= $FivePMax; $FiveP++) {
					$val = ($OnePound*100) + ($FiftyP*50) + ($TwentyP*20) + ($TenP*10) + ($FiveP*5);
					$TwoPMax = checkVal($val,2);
					for ($TwoP=0; $TwoP <= $TwoPMax; $TwoP++) {
						$val = ($OnePound*100) + ($FiftyP*50) + ($TwentyP*20) + ($TenP*10) + ($FiveP*5) + ($TwoP*2);
						$OnePMax = checkVal($val,1);
		 				for ($OneP=0; $OneP <= $OnePMax; $OneP++) {
							$val = ($OnePound*100) + ($FiftyP*50) + ($TwentyP*20) + ($TenP*10) + ($FiveP*5) + ($TwoP*2) + ($OneP*1);
							if ($val == 200) {
		  					$count++;
							}
						}
					}
				}
			}
		}
	}
}

$answer = $count;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 73682
// Time: 0.64s
