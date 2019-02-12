<?php
   require_once('Distribution.php'); 

   
   $test = new Distribution();
   
 
   
   $test->setTotal(htmlentities(floatval($_POST["total"])));
   $test->setBaseline(htmlentities(floatval($_POST["baseline"])));
   $test->setStartDate(htmlentities($_POST["start_date"]));
   $test->setEndDate(htmlentities($_POST["end_date"]));

 
   
   $result = $_POST;
   $result["result"] = $test->getResult();
   print_r ($result["result"]);


?>