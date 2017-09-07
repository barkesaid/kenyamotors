<?php 
  require_once ('dbconnect.php'); 


function getClientbyId($phone)
{ 		 global $conn;
		$query1="SELECT idno FROM customer WHERE phoneno=$phone";
		$result1=$conn->query($query1);
		if(!$result1){	echo "".$conn->error; }
		else {
			//echo "Record successfully fetched!";
			while ($rows1= $result1->fetch_assoc())
				 {     
				 	$idno=$rows1["idno"];  
				
				  }
				  return $idno;
		}
		
	}

//get customer name
function getClientNamebyId($idno)
{ 		 global $conn;
		$query1="SELECT cname FROM customer WHERE idno=$idno";
		$result1=$conn->query($query1);
		if(!$result1){	echo "".$conn->error; }
		else {
			//echo "Record successfully fetched!";
			while ($rows1= $result1->fetch_assoc())
				 {     
				 	$cname=$rows1["cname"];  
				
				  }
				  return $cname;
		}
		
	}

//get chasis number
function getChasisusingId($idno)
	 {		global $conn;
		$query2="SELECT chasis FROM soldcars WHERE client_idno=$idno";
		$result2=$conn->query($query2);
		if(!$result2){	echo "".$conn->error; }
		else {
			//echo "Record successfully fetched!";
			while ($rows2= $result2->fetch_assoc())
		  {     $chasis=$rows2["chasis"]; }

    			return $chasis;
			}			

		}

//get the due date for payment
function getInstallmentdate($chasis)
		{
			global $conn;
			$query2="SELECT duedate FROM soldcars WHERE chasis='$chasis'";
			$result2=$conn->query($query2);
			if(!$result2){	echo "".$conn->error; }
			else {
				//echo "Record successfully fetched!";
				while ($rows2= $result2->fetch_assoc())
			  {     $duedate=$rows2["duedate"]; }

	    			return $duedate;
				}

		}

//get registration number
function getRegNosusingChasis($chasis)
	 {		global $conn;
		$query2="SELECT regno FROM vehicles WHERE chasis='$chasis'";
		$result2=$conn->query($query2);
		if(!$result2){	echo "".$conn->error; }
		else {
			//echo "Record successfully fetched!";
			while ($rows2= $result2->fetch_assoc())
		  {     $regno=$rows2["regno"]; }

    			return $regno;
			}

			
		}

function allInstallmentPaid($chasis){
			global $conn;
			$query="select SUM(amountpaid) from installments where chasis='$chasis'";
			$result=$conn->query($query);
			if(!$result){	echo "".$conn->error; }
			else {
				//echo "Fetched successfully";
				while ($row = $result->fetch_assoc()) {                                   
			         $totalinstallmentspaid = $row['SUM(amountpaid)']; 
			        echo"this is how much you have paid so far:\t" ;  echo $totalinstallmentspaid; 
			        //echo "<br>";echo "<br>";
			            }
			            return $totalinstallmentspaid;

			        }



		}

function getBalanceRemaining($chasis,$totalinstallmentspaid){
		 global $conn;
		$query1="SELECT balance FROM soldcars WHERE chasis='$chasis'";
		$result1=$conn->query($query1);
		if(!$result1){	echo "".$conn->error; }
		else {
			//echo "Fetched successfully";
			while ($row1 = $result1->fetch_assoc()) {                                   
		         $initialbalance = $row1['balance']; 
		         echo"this is your initial balance:\t" ; echo $initialbalance;  
		         //echo "<br>";echo "<br>";
		         }
		        $balanceremaining=  $initialbalance-$totalinstallmentspaid;
		        echo "This is what you have to pay:\t "; echo $balanceremaining; 
		        //echo "<br>";echo "<br>";
		        return $balanceremaining;

		}

}



?>