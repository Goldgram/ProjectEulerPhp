<!-- 
Consider the following "magic" 3-gon ring, filled with the numbers 1 to 6, and each line adding to nine.
Working clockwise, and starting from the group of three with the numerically lowest external node (4,3,2 in this example), each solution can be described uniquely. For example, the above solution can be described by the set: 4,3,2; 6,2,1; 5,1,3.
It is possible to complete the ring with four different totals: 9, 10, 11, and 12. There are eight solutions in total.
Total	Solution Set
9 4,2,3; 5,3,1; 6,1,2
9 4,3,2; 6,2,1; 5,1,3
10 2,3,5; 4,5,1; 6,1,3
10 2,5,3; 6,3,1; 4,1,5
11 1,4,6; 3,6,2; 5,2,4
11 1,6,4; 5,4,2; 3,2,6
12 1,5,6; 2,6,4; 3,4,5
12 1,6,5; 3,5,4; 2,4,6
By concatenating each group it is possible to form 9-digit strings; the maximum string for a 3-gon ring is 432621513.
Using the numbers 1 to 10, and depending on arrangements, it is possible to form 16- and 17-digit strings. What is the maximum 16-digit string for a "magic" 5-gon ring?
-->
<?php $startTime = microtime(true);

$resultsArray = array();
$resultsArrayIndex = 0;

function allPermutations($string,$attachment,$endStrLen) {
	global $resultsArray,$resultsArrayIndex;
	for ($i=0; $i <= strlen($string); $i++) {
		$tempStr = substr($string,0,$i).$attachment.substr($string,$i,strlen($string)-$i);
		if ($attachment==$endStrLen) {
			//echo $tempStr,"\n"; //this problem's code inside permutation function
			$firstThree = $tempStr[0]+$tempStr[1]+$tempStr[2];
			if ($firstThree == $tempStr[3]+$tempStr[2]+$tempStr[4]
				&& $firstThree == $tempStr[5]+$tempStr[4]+$tempStr[6]
				&& $firstThree == $tempStr[7]+$tempStr[6]+$tempStr[8]
				&& $firstThree == $tempStr[9]+$tempStr[8]+$tempStr[1]
				) {
				$testStr = ($tempStr[0]+1).($tempStr[1]+1).($tempStr[2]+1).($tempStr[3]+1).($tempStr[2]+1).($tempStr[4]+1).($tempStr[5]+1).($tempStr[4]+1).($tempStr[6]+1).($tempStr[7]+1).($tempStr[6]+1).($tempStr[8]+1).($tempStr[9]+1).($tempStr[8]+1).($tempStr[1]+1);
				if (strlen($testStr) == 16) {
					$resultsArray[$resultsArrayIndex] = array($tempStr[0]+1,$tempStr[1]+1,$tempStr[2]+1,$tempStr[3]+1,$tempStr[2]+1,$tempStr[4]+1,$tempStr[5]+1,$tempStr[4]+1,$tempStr[6]+1,$tempStr[7]+1,$tempStr[6]+1,$tempStr[8]+1,$tempStr[9]+1,$tempStr[8]+1,$tempStr[1]+1);
					$resultsArrayIndex++;
				}
			}
		} else {
			allPermutations($tempStr,$attachment+1,$endStrLen);
		}
	}
}

allPermutations("0",1,9);
$maxString = "0";
foreach ($resultsArray as $result) {
	$tempArray = array(0 => $result[0],3 => $result[3],6 => $result[6],9 => $result[9],12 => $result[12]);
	asort($tempArray);
	$startKey = key($tempArray);
	$fullString = "";
	for ($i=$startKey; $i < count($result); $i++) { 
		$fullString .= $result[$i];
	}
	for ($i=0; $i < $startKey; $i++) { 
		$fullString .= $result[$i];
	}
	if (bccomp($fullString,$maxString)>0) {
		$maxString = $fullString;
	}
}

$answer = $maxString;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 6531031914842725
// Time: 10.2s