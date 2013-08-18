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

$e = array(2,1);
$j = 1;
for ($i=2; $i <= 100; $i+=3) {
	$e[$i] = 2*$j;
	$e[$i+1] = 1;
	$e[$i+2] = 1;
	$j++;
}
$num = "".$e[99];
$den = "1";
for ($j=98; $j >= 0; $j--) {
	$startNum = $num;
	//shifted around to get ((next*numerator)+denominator)/ numerator
	$num = bcadd(bcmul($num,"".$e[$j]),$den);
	$den = $startNum;
}
$digitSum = 0;
for ($i=0; $i < strlen($num); $i++) { 
	$digitSum += $num[$i];
}

$answer = $digitSum;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 272
// Time: 0.0007