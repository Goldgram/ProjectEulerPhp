<!-- 
You are given the following information, but you may prefer to do some research for yourself.
1 Jan 1900 was a Monday.
Thirty days has September,
April, June and November.
All the rest have thirty-one,
Saving February alone,
Which has twenty-eight, rain or shine.
And on leap years, twenty-nine.
A leap year occurs on any year evenly divisible by 4, but not on a century unless it is divisible by 400.
How many Sundays fell on the first of the month during the twentieth century (1 Jan 1901 to 31 Dec 2000)?
-->
<?php $startTime = microtime(true);

$month[1] = 31;
$month[2] = 28;
$month[3] = 31;
$month[4] = 30;
$month[5] = 31;
$month[6] = 30;
$month[7] = 31;
$month[8] = 31;
$month[9] = 30;
$month[10] = 31;
$month[11] = 30;
$month[12] = 31;
//1st of jan 1900 is monday, making 7th and every % 7 a sunday
$day = 1;
$count = 0;
for ($year=1900; $year < 2001; $year++) { 
	for ($i=1; $i <= 12; $i++) { 
		if ($day%7==0 && $year>1900) {
			$count++;
		}
		$day += $month[$i];
		if ($i==2 && $year%4==0) {
			if ($year%100!=0) {
				$day++;
			}
			else if ($year%100==0 && $year%400==0 )
			{
				$day++;
			}
		}
	}
}

$answer = $count;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
