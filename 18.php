<!-- 
By starting at the top of the triangle below and moving to adjacent numbers on the row below, the maximum total from top to bottom is 23.
3
7 4
2 4 6
8 5 9 3
That is, 3 + 7 + 4 + 9 = 23.
Find the maximum total from top to bottom of the triangle below:
75
95 64
17 47 82
18 35 87 10
20 04 82 47 65
19 01 23 75 03 34
88 02 77 73 07 63 67
99 65 04 28 06 16 70 92
41 41 26 56 83 40 80 70 33
41 48 72 33 47 32 37 16 94 29
53 71 44 65 25 43 91 52 97 51 14
70 11 33 28 77 73 17 78 39 68 17 57
91 71 52 38 17 14 91 43 58 50 27 29 48
63 66 04 68 89 53 67 30 73 16 69 87 40 31
04 62 98 27 23 09 70 98 73 93 38 53 60 04 23
NOTE: As there are only 16384 routes, it is possible to solve this problem by trying every route. However, Problem 67, is the same challenge with a triangle containing one-hundred rows; it cannot be solved by brute force, and requires a clever method! ;o)
 -->
<?php $startTime = microtime(true);

//needed to take out any leading 0 for number under 10
$tri[0] = array(75);
$tri[1] = array(95,64);
$tri[2] = array(17,47,82);
$tri[3] = array(18,35,87,10);
$tri[4] = array(20,4,82,47,65);
$tri[5] = array(19,1,23,75,3,34);
$tri[6] = array(88,2,77,73,7,63,67);
$tri[7] = array(99,65,4,28,6,16,70,92);
$tri[8] = array(41,41,26,56,83,40,80,70,33);
$tri[9] = array(41,48,72,33,47,32,37,16,94,29);
$tri[10] = array(53,71,44,65,25,43,91,52,97,51,14);
$tri[11] = array(70,11,33,28,77,73,17,78,39,68,17,57);
$tri[12] = array(91,71,52,38,17,14,91,43,58,50,27,29,48);
$tri[13] = array(63,66,4,68,89,53,67,30,73,16,69,87,40,31);
$tri[14] = array(04,62,98,27,23,9,70,98,73,93,38,53,60,4,23);
$sumTri[0] = array(75);
for ($i=1; $i <= 14; $i++) {
	for ($j=0; $j < ($i+1); $j++) { 
		$sumTri[$i][$j] = 0;
	}
}
for ($i=0; $i < 14; $i++) {
	for ($j=0; $j < count($tri[$i]); $j++) { 
		$tempsum1 = $sumTri[$i][$j] + $tri[$i+1][$j];
		if ($tempsum1>$sumTri[$i+1][$j]) {
			$sumTri[$i+1][$j] = $tempsum1;
		}
		$tempsum2 = $sumTri[$i][$j] + $tri[$i+1][$j+1];
		if ($tempsum2>$sumTri[$i+1][$j+1]) {
			$sumTri[$i+1][$j+1] = $tempsum2;
		}
	}
}
$maxSum = 0;
for ($i=0; $i < count($sumTri[14]); $i++) { 
	$sumTri[14][$i];
	if ($sumTri[14][$i]>$maxSum) {
		$maxSum = $sumTri[14][$i];
	}
}

$answer = $maxSum;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 1074
// Time: 0.048s