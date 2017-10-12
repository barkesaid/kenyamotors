<!-- post received cash -->
<?php
require("dbconnect.php");
extract($_POST);

$edate=$_POST["edate"];
$amount=$_POST["amount"];
$details=$_POST["details"];
$query="INSERT INTO givecash (id,cdate,amount,details) VALUES (NULL, '$edate', '$amount', '$details')";
$result=$conn->query($query);
if(!$result){

	echo "".$conn->error;
	
}
else { 	echo "Record entered successfully"; }

header('Location:http://localhost/kenyamotors/givecash.php');
?>