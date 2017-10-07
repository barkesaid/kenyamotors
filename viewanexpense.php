<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
     <title>View an Expense</title>
</head>
<body>

 <?php 
require("dbconnect.php");
extract($_GET);
$expensetoedit=$_GET["editvalue1"]; 

// fetch the chasis number
$query1="SELECT edate,amount,details from expenses WHERE id='$expensetoedit'";
$result1=$conn->query($query1);
if(!$result1){
  echo "".$conn->error;
}
else {
while ($rows1= $result1->fetch_assoc())
  { 
    $edate=$rows1["edate"];
    $details=$rows1["details"];
    $amount=number_format($rows1["amount"]);
}
}
?>

        <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Expense details</span>
            </h1> <br>
             </div>

            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                         <form class="form form-horizontal" action="updateexpense.php" method="POST" autocomplete="off">
                  <div class="form-group">

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date Incurred</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="edate" value="<?php echo $edate ?>" readonly>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Amount</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="amount" value="<?php echo $amount ?>" readonly>
                    </div>
                  </div> <br>              

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Details</label>
                    <div class="col-sm-9">
                     <textarea id="form-control-8" class="form-control" rows="3" name="details" readonly> <?php echo $details ?></textarea>
                    </div>
                  </div> <br>

                  </div>
                </form>
                
                <div style="padding-left:760px"> 
                    <button>Download</button>
                  </div>

               </div>
             </div>
           </div>
         </div>
</div>
               
</body>
</html>