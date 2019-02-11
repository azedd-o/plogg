<?php
   require_once('Distribution.php'); 

   
   $test = new Distribution();
   
 
   
   $test->setTotal(floatval($_POST["total"]));
   $test->setBaseline(floatval($_POST["baseline"]));
   $test->setStartDate($_POST["start_date"]);
   $test->setEndDate($_POST["end_date"]);

 
   
   $result = $_POST;
   $result["result"] = $test->getResult();
   print_r ($result["result"]);


?>