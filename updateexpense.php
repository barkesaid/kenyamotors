<?php
require("dbconnect.php");
extract($_POST);

$id= $_POST["id"]; echo $id;
$edate=$_POST["edate"]; echo $edate;
$amount=$_POST["amount"]; echo $amount;
$details=$_POST["details"]; echo $details;

// this is a test
// $query="SELECT id FROM expenses WHERE expenses.details='$details'";
// $result=$conn->query($query);
// if(!$result){

//   echo "".$conn->error;
  
// }
// else {
// while ($rows= $result->fetch_assoc())
//   { 
//     $id= $rows['id']; 
//    echo " this is the id"; echo $id;
// }
// }

//end of test

$query1="UPDATE expenses SET edate ='$edate',amount ='$amount',details ='$details' WHERE expenses.id='$id'";
// UPDATE expenses SET edate ='$edate ', amount ='$amount', details ='$details' WHERE expenses.id='$id' 
// UPDATE `expenses` SET `edate` = '2017-05-16', `amount` = '200', `details` = 'This is a test' WHERE `expenses`.`id` = 1;

$result1=$conn->query($query1);
if(!$result1){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

header('Location:http://localhost/kenyamotors/displayexpenses.php');

?>