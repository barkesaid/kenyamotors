<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
     <title>View A Sale</title>
</head>
<body>


 <?php 
require("dbconnect.php");
extract($_GET);
$expensetoedit=$_GET["editvalue1"]; 

// fetch the chasis number
$query1="SELECT chasis,datesold,sellingprice,deposit,balance FROM soldcars WHERE id='$expensetoedit'";
$result1=$conn->query($query1);
if(!$result1){

  echo "".$conn->error;
  
}
else {
while ($rows1= $result1->fetch_assoc())
  { 
    $chasis=$rows1["chasis"];
    $datesold=$rows1["datesold"];
    $deposit=number_format($rows1["deposit"]);
    $balance=number_format($rows1["balance"]);
    $sellingprice=number_format($rows1["sellingprice"]);
}
}

// now fetch the vname, regno
$query2="SELECT vname,regno from vehicles where chasis='$chasis'";
$result2=$conn->query($query2);
if(!$result2){
  echo "".$conn->error; 
}
else{
while ($rows2= $result2->fetch_assoc())
  { 
    $vname=$rows2["vname"];
    $regno=$rows2["regno"];
}
}

// now fetch the broker name, commission
$query3="SELECT brokername, brokercommission FROM `broker` WHERE chasis='$chasis'";
$result3=$conn->query($query3);
if(!$result3){
  echo "".$conn->error;
}

else {
while ($rows3= $result3->fetch_assoc())
  { 
    $brokername=$rows3["brokername"];
    $brokercommission=number_format($rows3["brokercommission"]);
}
}
// now fetch the client details
$query4="SELECT client_idno FROM `soldcars` WHERE chasis='$chasis'";
$result4=$conn->query($query4);
if(!$result4){
  echo "".$conn->error;
}

else {
while ($rows4= $result4->fetch_assoc()){ 
    $client_idno=$rows4["client_idno"];
}
}

// select customer name and phone number
$query5="SELECT cname,phoneno FROM `customer` WHERE idno=$client_idno";
$result5=$conn->query($query5);
if(!$result5){
  echo "".$conn->error;
}

else {
while ($rows5= $result5->fetch_assoc())
  { 
    $cname=$rows5["cname"];
    $phoneno=$rows5["phoneno"];
}
}

//alll installments paid

$query6="select SUM(amountpaid) from installments where chasis='$chasis'";
$result6=$conn->query($query6);
if(!$result6){
  echo "".$conn->error;
}

else {
while ($rows6= $result6->fetch_assoc())
  { 
     $installmentspaid=number_format($rows6['SUM(amountpaid)']);
}


$remainingbalance=$balance-$installmentspaid;
}

?>

            <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Sale details for <?php echo $vname; ?></span>
            </h1> <br>
             </div>


            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                                    <form class="form form-horizontal" action="updatecashreceived.php" method="POST" autocomplete="off">
                  <div class="form-group">


                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Car Name</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="vname" value="<?php echo $vname ?>" readonly>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Registration No</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="amount" value="<?php echo $regno ?>" readonly>
                    </div>
                  </div> <br>              

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Date Sold </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="cdate" value="<?php echo $datesold ?>" readonly>
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Selling Price </label>
                    <div class="col-sm-9">
                     <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php echo $sellingprice ?>" readonly>
                    </div>
                  </div> <br>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Deposit Paid </label>
                    <div class="col-sm-9">
                     <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php echo $deposit  ?>" readonly>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Balance</label>
                    <div class="col-sm-9">
                     <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php echo $balance  ?>" readonly>
                    </div>
                  </div> <br>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Total Installments Paid</label>
                    <div class="col-sm-9">
                     <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php  echo $installmentspaid ?>" readonly>
                    </div>
                  </div> <br>

<!-- for some reason, it doesnt work! -->
<!-- 
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Installment Balance</label>
                    <div class="col-sm-9">
                     <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php  echo $remainingbalance ?>" readonly>
                    </div>
                  </div> <br> -->

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Client Name </label>
                    <div class="col-sm-9">
                       <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php echo $cname ?>" readonly>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php echo $phoneno ?>" readonly>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Broker Name </label>
                    <div class="col-sm-9">
                    <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php echo $brokername ?>" readonly>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Broker Commission </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="cdate" value="<?php echo $brokercommission ?>" readonly>
                    </div>
                  </div> <br>

                  </div>
                
                <div style="padding-left:760px"> 
   <button>Download</button>

                </div>

                  </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
</body>
</html>