<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
     <title>Edit Payment</title>

        <script type="text/javascript">
    function sayHello() {
    alert("Your Updates have been saved!")
    }
</script>

</head>
<body>
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Update Payment</span>
            </h1>    <br>
            <!-- this is a test -->
             </div>
 <?php 
require("dbconnect.php");
extract($_GET);

$expensetoedit=$_GET["editvalue1"]; 

$query="SELECT id,chasis,datepaid,amountpaid,reference FROM installments WHERE id='$expensetoedit'";
$result=$conn->query($query);
if(!$result){

  echo "".$conn->error;
  
}

else {
while ($rows= $result->fetch_assoc())
  { 
    $id=$rows["id"];
    $chasis=$rows["chasis"];
    $datepaid=$rows["datepaid"];
    $amountpaid=$rows["amountpaid"];
    $reference=$rows["reference"];

}
}
?>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                                    <form class="form form-horizontal" action="updateinstallment.php" method="POST" autocomplete="off">
                  <div class="form-group">

                  <!-- start test  -->
                    <div class="form-group">
                   <!--  <label class="col-sm-3 control-label" for="form-control-3">Id</label> -->
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="hidden" name="id" value="<?php echo $id ?>">
                    </div>
                  </div> <br>
                    <!-- end test -->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Chasis</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="chasis" value="<?php echo $chasis ?>" readonly>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date Paid</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="datepaid" value="<?php echo $datepaid ?>">
                    </div>
                  </div> <br>              

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Amount Paid </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="amountpaid" value="<?php echo $amountpaid ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Reference </label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="reference" ><?php echo $reference ?></textarea>
                    </div>
                  </div> <br>

                  </div>
                
                <div style="padding-left:760px">                 
              <input type="submit" name="submit" onclick="sayHello()" value="Update">
              

                </div>

                  </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
</body>
</html>