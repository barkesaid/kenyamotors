<?php
require("dbconnect.php");
extract($_POST);

$vname=$_POST["vname"];
$chasis=$_POST["chasis"];
$regno=$_POST["regno"];
$color=$_POST["color"];
$datein=$_POST["datein"];
$bl=$_POST["bl"];
$duty=$_POST["duty"];
$costing=$_POST["costing"];
$otherexpenses=$_POST["otherexpenses"];
$details=$_POST["details"];


$query="INSERT INTO vehicles(vname,chasis,regno,color,datein,bl,duty,costing,otherexpenses,details) VALUES ('$vname','$chasis','$regno','$color','$datein','$bl','$duty','$costing','$otherexpenses','details')";

$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}

header('Location:http://localhost/kenyamotors/addvehicle.php');
?>