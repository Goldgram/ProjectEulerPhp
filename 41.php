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

// $count = 0;
// for($a=9; $a >= 1; $a--) {//1
// 	for($b=9; $b >= 1; $b--) {//2
// 		if($b==$a){continue;}
// 		for($c=9; $c >= 1; $c--) {//3
// 			if($c==$a||$c==$b){continue;}
// 			for($d=9; $d >= 1; $d--) {//4
// 				if($d==$a||$d==$b||$d==$c){continue;}
// 				for($e=9; $e >= 1; $e--) {//5
// 					if($e==$a||$e==$b||$e==$c||$e==$d){continue;}
// 					for($f=9; $f >= 1; $f--) {//6
// 						if($f==$a||$f==$b||$f==$c||$f==$d||$f==$e){continue;}
// 						for($g=9; $g >= 1; $g--) {//7
// 							if($g==$a||$g==$b||$g==$c||$g==$d||$g==$e||$g==$f){continue;}
// 							for($h=9; $h >= 1; $h--) {//8
// 								if($h==$a||$h==$b||$h==$c||$h==$d||$h==$e||$h==$f||$h==$g){continue;}
// 								for($i=9; $i >= 1; $i--) {//9
// 									if($i==$a||$i==$b||$i==$c||$i==$d||$i==$e||$i==$f||$i==$g||$i==$h){continue;}
// 									// $count++;
// 									$testStr = "".$a.$b.$c.$d.$e.$f.$g.$h.$i;
// 									if (isPrime(intval($testStr))) {
// 										echo $testStr,"\n";
// 									}
// 								}
// 							}
// 						}
// 					}
// 				}
// 			}
// 		}
// 	}
// }
// echo $count,"\n";




// for($a=9; $a >= 1; $a--) {//1
// 	$str .= $a;
// 	for($b=9; $b >= 1; $b--) {//2
// 		if(strpos($str,"".$b)){continue;}
// 		$str .= $b;
// 		for($c=9; $c >= 1; $c--) {//3
// 			if(strpos($str,"".$c)){continue;}
// 			$str .= $c;
// 			for($d=9; $d >= 1; $d--) {//4
// 				if(strpos($str,"".$d)){continue;}
// 				$str .= $d;
// 				for($e=9; $e >= 1; $e--) {//5
// 					if(strpos($str,"".$e)){continue;}
// 					$str .= $e;
// 					for($f=9; $f >= 1; $f--) {//6
// 						if(strpos($str,"".$f)){continue;}
// 						$str .= $f;
// 						for($g=9; $g >= 1; $g--) {//7
// 							if(strpos($str,"".$g)){continue;}
// 							$str .= $g;
// 							for($h=9; $h >= 1; $h--) {//8
// 								if(strpos($str,"".$h)){continue;}
// 								$str .= $h;
// 								for($i=9; $i >= 1; $i--) {//9
// 									if(strpos($str,"".$i)){continue;}
// 									// echo $str,"\n";
// 									// break 10;
// 									$count++;
// 									// $testStr = "".$a.$b.$c.$d.$e.$f.$g.$h.$i;
// 									// if (isPrime(intval($testStr))) {
// 									// 	echo $testStr,"\n";
// 									// }
// 								}
// 								$str = substr($str,0,-1);
// 							}
// 							$str = substr($str,0,-1);
// 						}
// 						$str = substr($str,0,-1);
// 					}
// 					$str = substr($str,0,-1);
// 				}
// 				$str = substr($str,0,-1);
// 			}
// 			$str = substr($str,0,-1);
// 		}
// 		$str = substr($str,0,-1);
// 	}
// 	$str = substr($str,0,-1);
// }
// echo $count,"\n";


function recLoop($str,$upTo)
{
	global $numLoops,$count,$highestVal;
	$numLoops++;
	for($b=$upTo; $b >= 1; $b--) {//2
		if(strpos($str,"".$b))
		{
			continue;
		}
		$str .= $b;
		if (strlen($str)<=$upTo) {
			recLoop($str,$upTo);
		}
		else {
			$currentNum = intval(substr($str, 1));
			if (isPrime($currentNum)) {
				if ($currentNum>$highestVal) {
					$highestVal = $currentNum;
				}
			}
		}
		$str = substr($str,0,-1);
	}
}
$highestVal = 0;
for ($upTo=9; $upTo >= 1; $upTo--) { 
	$str = ".";
	$numLoops = 0;
	recLoop($str,$upTo);
	if ($highestVal>0) {
		break;
	}
}

$answer = $highestVal;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 7652413 
// Time: 5.4s