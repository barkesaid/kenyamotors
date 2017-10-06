<?php
require("dbconnect.php");
extract($_POST);
extract($_GET);

$chasis=$_POST["chasis"];
$vname=$_POST["vname"];
$regno=$_POST["regno"];
$color=$_POST["color"];
$datein=$_POST["datein"];
$bl=$_POST["bl"];
$duty=$_POST["duty"];
$costing=$_POST["costing"];
$otherexpenses=$_POST["otherexpenses"];
$details=$_POST["details"];


$query="UPDATE vehicles SET chasis = '$chasis',regno = '$regno', vname = '$vname', color = '$color',bl = '$bl', duty = '$duty', datein = '$datein', costing= '$costing', otherexpenses='$otherexpenses', details='$details' WHERE vehicles.chasis = '$chasis'";


// start test

// UPDATE `vehicles` SET `chasis` = 'ZGE200043138', `regno` = 'KCK475A', `vname` = 'Toyota Prius', `color` = 'Yellow', `bl` = 'Shree Gutchi 083', `duty` = '400995' WHERE `vehicles`.`chasis` = 'ZGE200043137';

// end test
$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else {
	echo "Record entered successfully";
}


?>