<?php
   class Distribution 
   {
      private $total;
      private $baseline;
      private $startDate;
      private $endDate;

      
      function setTotal($par)
	  {
         $this->total = $par;
      }
      
      function getTotal()
	  {
         return $this->total;
      }
      
      function setBaseline($par)
	  {
         $this->baseline = $par;
      }
      
      function getBaseline()
	  {
         return $this->baseline;
      }
	  
	  function setStartDate($par)
	  {
         $this->startDate = $par;
      }
      
      function getStartDate()
	  {
         return $this->startDate;
      }
	  
	  function setEndDate($par)
	  {
         $this->endDate = $par;
      }
      
      function getEndDate()
	  {
         return $this->endDate;
      }
	  
	  
	  // Function to calculate the number of week days between start and end dates 
	  function getWeekDays()
	  {
		$begin=strtotime($this->startDate);
		$end=strtotime($this->endDate);
		if($begin>$end)
		{
			echo 'startdate is in the future! <br />';
			return 0;
		}
		else
		{
			$no_days=0;
			$weekends=0;
			while($begin<=$end)
			{
				$no_days++; // no of days in the given interval
				$what_day=date("N",$begin);
				if($what_day>5) 
				{ // 6 and 7 are weekend days
					$weekends++;
				};
				$begin+=86400; // +1 day
			};
			$working_days=$no_days-$weekends;
			return $working_days;
		}
	  }
	  
	  function getResult()
	  {
		  $sum = 0;
		  $weekdays = array();
         //Create a week days sized array
		 for ($i= 0 ; $i < $this->getWeekDays() ; $i++) 
		 {
		
				$val = mt_rand(1,100);
				//adding value to the sum
				$sum += $val;
				//insert value into an array
				array_push($weekdays , $val);
		}
	
		$sum = floatval($sum);
		$values = array();
		
		foreach ( $weekdays as $w ) 
		{	
			array_push( $values, floatval($w) / $sum);		
		}
		////////////////////////////////////////////////////
		
		//result array that outputs final values
		$result = array();
		
		//index for tha result array
		$j = 0;
		
		//minimum value assigned to any weekdays
		$min = floatval($this->total)*floatval($this->baseline)/(floatval($this->getWeekDays())*100.0);
		
		//the amount that needs to be distributed
	    $distribution_amount = floatval(100-$this->baseline) *floatval($this->total)/100.0;
		
		$begin = strtotime($this->startDate);
		$end = strtotime($this->endDate);

		
		while ($begin <= $end ) 
		{		
				if (date("N", $begin) < 6)
				{
					//fill the array with values
					$week_value = $values[$j]*$distribution_amount+$min;
					//convert to a 2 decimal number
					$final_value = number_format($week_value, 2,'.','');
					//increment the index of the values array	
					$j++;
				} 
				else 
				{
					//fill weekends elements with zero value
					$final_value = "0.00";	
				}
				
				//add it to the end of the array.
				$result += [date('Y-m-d',$begin) => $final_value];	
				//print out the values to check the math.				
				$begin += 86400;//add one day of seconds
				}
		     return $result;
			 
			

      }
	  
	 
	  
   }
   
   
    /*$test = new Distribution();
   
  // floatval($_POST["total"])
  // floatval($_POST["baseline"])
   
   $test->setTotal(100);
   $test->setBaseline(20);
   $test->setStartDate('19-12-2016');
   $test->setEndDate('23-12-2016');
	  
	  
	   var_dump($test->getResult());
			 die();*/
   

?>