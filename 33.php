<!-- 
The fraction 49/98 is a curious fraction, as an inexperienced mathematician in attempting to simplify it may incorrectly believe that 49/98 = 4/8, which is correct, is obtained by cancelling the 9s.
We shall consider fractions like, 30/50 = 3/5, to be trivial examples.
There are exactly four non-trivial examples of this type of fraction, less than one in value, and containing two digits in the numerator and denominator.
If the product of these four fractions is given in its lowest common terms, find the value of the denominator.
 -->
<?php $startTime = microtime(true);


function findLeftOverNum ($nemStr,$testStr)
{
	$nemIndex = strpos($nemStr,$testStr);
	if ($nemIndex==2) {
		return 1;
	}
	else if ($nemIndex==1) {
		return 2;
	}
	else {
		return -1;
	}
}
$resultNem = 1;
$resultDen = 1;
for ($i=11; $i <= 99; $i++) {
	for ($j=11; $j <= 99; $j++) {
		$nemStr = ">".$i;
		$denStr = ">".$j;
		for ($k=1; $k <= 9; $k++) { 
			$testStr = "".$k;
			$nemIndex = findLeftOverNum($nemStr,$testStr);
			$denIndex = findLeftOverNum($denStr,$testStr);
			if ($nemIndex!=-1 && $denIndex!=-1 && $denStr[$denIndex]>0) {
				$fractionVal = $i/$j;
				$minusCommon = $nemStr[$nemIndex]/$denStr[$denIndex];
				if ($fractionVal===$minusCommon && $fractionVal<1) {
					$resultNem *= $nemStr[$nemIndex];
					$resultDen *= $denStr[$denIndex];
				}
			}
		}
	}
}
for ($i=$resultNem; $i >=1; $i--) { 
	if ($resultDen%$i==0) {
		$productDenVal =  $resultDen/$i;
		break;
	}
}



$answer = $productDenVal;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 100
// Time: 0.11s
