<!-- 
We shall say that an n-digit number is pandigital if it makes use of all the digits 1 to n exactly once; for example, the 5-digit number, 15234, is 1 through 5 pandigital.
The product 7254 is unusual, as the identity, 39 × 186 = 7254, containing multiplicand, multiplier, and product is 1 through 9 pandigital.
Find the sum of all products whose multiplicand/multiplier/product identity can be written as a 1 through 9 pandigital.
HINT: Some products can be obtained in more than one way so be sure to only include it once in your sum.
 -->
<?php $startTime = microtime(true);

$results = array();
$resultsIndex = 0;
$count = 0;
for ($i=2; $i <= 99; $i++) {
	for ($j=100; $j <= 4999; $j++) {
		$currentVal = $i*$j;
		$currentString = ">".$i."*".$j."=".$currentVal;
		if (
			substr_count($currentString,"0")==0 && 
			substr_count($currentString,"1")==1 && 
			substr_count($currentString,"2")==1 && 
			substr_count($currentString,"3")==1 &&
			substr_count($currentString,"4")==1 &&
			substr_count($currentString,"5")==1 &&
			substr_count($currentString,"6")==1 && 
			substr_count($currentString,"7")==1 &&
			substr_count($currentString,"8")==1 &&
			substr_count($currentString,"9")==1 &&
			!in_array($currentVal,$results)
			)
		{
			$results[$resultsIndex] = $currentVal;
			$resultsIndex++;
		}
	}
}
$sumResults = array_sum($results);

$answer = $sumResults;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 45228
// Time: 0.76s
