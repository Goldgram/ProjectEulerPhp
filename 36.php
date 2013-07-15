<!-- 
The decimal number, 585 = 10010010012 (binary), is palindromic in both bases.
Find the sum of all numbers, less than one million, which are palindromic in base 10 and base 2.
(Please note that the palindromic number, in either base, may not include leading zeros.)
 -->
<?php $startTime = microtime(true);

function isPalindromic($input)
{
	$inputStr = "".$input;
	if ($inputStr == strrev($inputStr)){
		return true;
	}
	return false;
}
$total = 0;
for ($num=1; $num < 1000000; $num+=2) 
{ 
	if (isPalindromic($num) && isPalindromic(decbin($num))) 	
	{
		$total += $num;
	}
}

$answer = $total;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 872187
// Time: 0.32s