<?php

$baseline=20;
		$total=100;
		$start_date='2016-12-19';
		$end_date='2016-12-23';
		// This set of parameters should guarantee that each day will have a minimum value of 4
		// Example result
		
/*$date1=date_create($start_date);
$date2=date_create($end_date);
$diff=date_diff($date1,$date2);

$diff = intval($diff->format("%R%a days"))+1;*/

$datetime1 = new DateTime($start_date);
$datetime2 = new DateTime($end_date);
$interval = $datetime1->diff($datetime2);
$woweekends = 0;
for($i=0; $i<=$interval->d; $i++){
    $modif = $datetime1->modify('+1 day');
    $weekday = $datetime1->format('w');

    if($weekday != 0 && $weekday != 6){ // 0 for Sunday and 6 for Saturday
        $woweekends++;  
    }

}



//$min = $baseline/$woweekends;

echo $woweekends;

			/*Array(
				[2016-12-19]=>12,
				[2016-12-20]=>4.22,
				[2016-12-21]=>34.53,
				[2016-12-22]=>19.47,
				[2016-12-23]=>29.78
			)*/
			
?>