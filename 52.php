<!-- 
It can be seen that the number, 125874, and its double, 251748, contain exactly the same digits, but in a different order.
Find the smallest positive integer, x, such that 2x, 3x, 4x, 5x, and 6x, contain the same digits.
-->
<?php $startTime = microtime(true);

for ($i=125870; $i <= 125875; $i++) { 
	echo $i," => ",($i*2),"\n";
	$checkStr = "".$i;
	$multiple = ($i*2);
	for ($j=0; $j < strlen($checkStr); $j++) { 
		if () {
			# code...
		}
	}

}


$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 