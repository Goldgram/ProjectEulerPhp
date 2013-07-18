<!-- The number, 1406357289, is a 0 to 9 pandigital number because it is made up of each of the digits 0 to 9 in some order, but it also has a rather interesting sub-string divisibility property.
Let d1 be the 1st digit, d2 be the 2nd digit, and so on. In this way, we note the following:
d2d3d4=406 is divisible by 2
d3d4d5=063 is divisible by 3
d4d5d6=635 is divisible by 5
d5d6d7=357 is divisible by 7
d6d7d8=572 is divisible by 11
d7d8d9=728 is divisible by 13
d8d9d10=289 is divisible by 17
Find the sum of all 0 to 9 pandigital numbers with this property. -->
<?php 
$startTime = microtime(true);

$divs[0] = 2;
$divs[1] = 3;
$divs[2] = 5;
$divs[3] = 7;
$divs[4] = 11;
$divs[5] = 13;
$divs[6] = 17;
$resultArray = array();
$resultArrayIndex=0;
function hasDivProp($inputStr)
{
	global $divs;
	$thisStrLen = strlen($inputStr);
	if ($thisStrLen<5)
	{
		return true;
	}
	else if (intval(substr($inputStr,-3)) % $divs[$thisStrLen-5]==0)
	{
		return true;
	}
	return false;
}
//pandigital n to 0
function pandigitalRec($currentStr,$upTo)
{
	global $resultArray;
	$upToPlusTwo = $upTo+2;
	for($i=$upTo; $i >= 0; $i--)
	{
		if(!strpos($currentStr,"".$i))
		{
			$currentStr .= $i;
			if (hasDivProp($currentStr))
			{
				if (strlen($currentStr)<$upToPlusTwo)
				{
					pandigitalRec($currentStr,$upTo);
				}
				else {
					$resultArray[substr($currentStr,1)] = substr($currentStr,1);
				}
			}
			$currentStr = substr($currentStr,0,-1);
		}
	}
}
pandigitalRec(".",9);
$total = array_sum($resultArray);

$answer = $total;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 16695334890
// Time: 0.24s