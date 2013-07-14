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
	$FiftyPMax = checkVal(($OnePound*100),50);
	for ($FiftyP=0; $FiftyP <= $FiftyPMax; $FiftyP++) {
		$TwentyPMax = checkVal(($OnePound*100)+($FiftyP*50),20);
		for ($TwentyP=0; $TwentyP <= $TwentyPMax; $TwentyP++) { 
			$TenPMax = checkVal(($OnePound*100)+($FiftyP*50)+($TwentyP*20),10);
			for ($TenP=0; $TenP <= $TenPMax; $TenP++) { 
				$FivePMax = checkVal(($OnePound*100)+($FiftyP*50)+($TwentyP*20)+($TenP*10),5);
				for ($FiveP=0; $FiveP <= $FivePMax; $FiveP++) {
					$TwoPMax = checkVal(($OnePound*100)+($FiftyP*50)+($TwentyP*20)+($TenP*10)+($FiveP*5),2);
					for ($TwoP=0; $TwoP <= $TwoPMax; $TwoP++) {
						$OnePMax = checkVal(($OnePound*100)+($FiftyP*50)+($TwentyP*20)+($TenP*10)+($FiveP*5)+($TwoP*2),1);
		 				for ($OneP=0; $OneP <= $OnePMax; $OneP++) {
							if (($OnePound*100)+($FiftyP*50)+($TwentyP*20)+($TenP*10)+($FiveP*5)+($TwoP*2)+($OneP*1) == 200) {
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
