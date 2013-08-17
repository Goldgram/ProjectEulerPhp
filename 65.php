<!-- 
The square root of 2 can be written as an infinite continued fraction.
√2 = 1 + 1/2 + 1/2 + 1/2 + 1/2 + ...
The infinite continued fraction can be written, √2 = [1;(2)], (2) indicates that 2 repeats ad infinitum. In a similar way, √23 = [4;(1,3,1,8)].
It turns out that the sequence of partial values of continued fractions for square roots provide the best rational approximations. Let us consider the convergents for √2.
1 + 1/2 = 3/2
1 + 1/2 + 1/2 = 7/5
1 + 1/2 + 1/2 + 1/2 = 17/12
1 + 1/2 + 1/2 + 1/2 + 1/2 = 41/29
Hence the sequence of the first ten convergents for √2 are:
1, 3/2, 7/5, 17/12, 41/29, 99/70, 239/169, 577/408, 1393/985, 3363/2378, ...
What is most surprising is that the important mathematical constant,
e = [2; 1,2,1, 1,4,1, 1,6,1 , ... , 1,2k,1, ...].
The first ten terms in the sequence of convergents for e are:
2, 3, 8/3, 11/4, 19/7, 87/32, 106/39, 193/71, 1264/465, 1457/536, ...
The sum of digits in the numerator of the 10th convergent is 1+4+5+7=17.
Find the sum of digits in the numerator of the 100th convergent of the continued fraction for e.
-->
<?php $startTime = microtime(true);

// 	echo pow(1+(1/$n),$n),"\n";
// }
// $top = 10000000000;
// $e  = pow(1+(1/$top),$top);
// echo $e,"\n";



// $e = 2.71828182845904523536028747135266249775724709369995;

// $m = 0;
// $d = 1;
// $a = $e-1;
// $aZero = $a;
// for ($periodNum=1; $periodNum <= 10; $periodNum++) { 
// 	$m = ($d*$a)-$m;
// 	$d = ($e-($m*$m))/$d;
// 	$a = floor(($aZero+$m)/$d);
// 	echo $periodNum," => ",$m," ",$d," ",$a,"\n";
// }


// for ($n=1; $n < 100; $n++) { 
// 	// echo 4*((4*$n)-1),"\n";
// 	// echo (4*$n)+1,"\n";
// }}


echo "e = [2; 1";
for ($i=1; $i <= 10; $i++) { 
	echo ",",2*$i;
	echo ",1";
	echo ",1";
}
echo "\n";





$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 