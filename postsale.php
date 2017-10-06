<?php
require("dbconnect.php");
extract($_POST);

$regno=$_POST["regno"];
$chasis=$_POST["chasis"];
$vname=$_POST["vname"];
$datesold=$_POST["datesold"];
$sellingprice=$_POST["sellingprice"];
$deposit=$_POST["deposit"];
$balance=$_POST["balance"];
$duedate=$_POST["duedate"];
$client_idno=$_POST["client_idno"];
$cname=$_POST["cname"];
$phoneno=$_POST["phoneno"];
$email=$_POST["email"];
$paddr=$_POST["paddr"];
$town=$_POST["town"];
$brokername=$_POST["brokername"];
$brokercommission=$_POST["brokercommission"];
$brokerphone=$_POST["brokerphone"];

// put in a +254 format so that  the API can recognize it
$brokerphone="+254".$brokerphone; 
$phoneno="+254".$phoneno; 

//insert sold car details
$query1="INSERT INTO soldcars(id,chasis,datesold,client_idno,sellingprice,deposit,balance,duedate) VALUES (NULL,'$chasis','$datesold','$client_idno','$sellingprice','$deposit','$balance','$duedate')";
$result1=$conn->query($query1);
if(!$result1){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}


// insert cutomer details
$query2="INSERT INTO customer(idno,cname,phoneno,email,paddr,town) VALUES ('$client_idno','$cname','$phoneno','$email','$paddr','$town')";
$result2=$conn->query($query2);
if(!$result2){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}


//insert broker details

$query3="INSERT INTO broker(chasis,brokername,brokercommission,brokerphone) VALUES ('$chasis','$brokername','$brokercommission','$brokerphone')";
$result3=$conn->query($query3);
if(!$result3){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}




//header('Location:http://localhost/Learn/daikyo/carform.php');

?>