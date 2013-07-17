<!-- 
We shall say that an n-digit number is pandigital if it makes use of all the digits 1 to n exactly once. For example, 2143 is a 4-digit pandigital and is also prime.
What is the largest n-digit pandigital prime that exists?
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
function recLoop($currentStr,$upTo)
{
	for($b=$upTo; $b >= 1; $b--) {
		if(strpos($currentStr,"".$b))
		{
			continue;
		}
		$currentStr .= $b;
		if (strlen($currentStr)<=$upTo) {
			$result = recLoop($currentStr,$upTo);
			if ($result) {
				return $result;
			}
		}
		else {
			$currentNum = intval(substr($currentStr, 1));
			if (isPrime($currentNum)) {
				return $currentNum;
			}
		}
		$currentStr = substr($currentStr,0,-1);
	}
}
for ($upTo=9; $upTo >= 1; $upTo--) { 
	$result = recLoop(".",$upTo);
	if ($result) {
		break;
	}
}

$answer = $result;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 7652413 
// Time: 3.5s