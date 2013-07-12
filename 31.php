<!-- 
n England the currency is made up of pound, £, and pence, p, and there are eight coins in general circulation:
1p, 2p, 5p, 10p, 20p, 50p, £1 (100p) and £2 (200p).
It is possible to make £2 in the following way:
1×£1 + 1×50p + 2×20p + 1×5p + 1×2p + 3×1p
How many different ways can £2 be made using any number of coins?
 -->
<?php $startTime = microtime(true);

$count = 0;
for ($OneP=0; $OneP <= 200; $OneP++) { 
	for ($TwoP=0; $TwoP <=100 ; $TwoP++) { 
		for ($FiveP=0; $FiveP <= 40; $FiveP++) {
			for ($TenP=0; $TenP <=20; $TenP++) { 
				for ($TwentyP=0; $TwentyP <= 10; $TwentyP++) { 
					for ($FiftyP=0; $FiftyP <= 4; $FiftyP++) { 
						for ($OnePound=0; $OnePound <= 2 ; $OnePound++) { 
							for ($TwoPound=0; $TwoPound <= 1 ; $TwoPound++) { 
								$count++;
								echo $count,"\n";
							}
						}
					}
				}
			}
		}
	}
}


$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 
