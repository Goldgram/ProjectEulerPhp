<!-- 
Starting in the top left corner of a 22 grid, and only being able to move to the right and down, there are exactly 6 routes to the bottom right corner.
(images missing)
How many such routes are there through a 2020 grid?
 -->
<?php $startTime = microtime(true);
// solves any grid size
$gridSize = 20;
$numArray = array();
for ($i=0; $i < $gridSize*2; $i++) { 
	$numArray[$i] = 0;
}
$numArray[$gridSize*2] = 1;

for ($j=0; $j < $gridSize*2; $j++) { 
	for ($i=0; $i <= $gridSize*2; $i++) {
		if ($i!=$gridSize*2) {
			$numArray[$i] += $numArray[$i+1];
		}
	}
}

$answer = $numArray[$gridSize];
$endTime = microtime(true); 
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
