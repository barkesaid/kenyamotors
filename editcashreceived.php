<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('mheader.html');
  ?>
     <title>Edit Cash Received</title>
<!-- 
        <script type="text/javascript">
    function sayHello() {
    alert("Your Updates have been saved!")
    }
</script> -->

</head>
<body>
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Update Cash Received</span>
            </h1>    <br>
             </div>
 <?php 
require("dbconnect.php");
extract($_GET);

$expensetoedit=$_GET["editvalue1"]; 

$query="SELECT id,cdate,amount,details FROM addcash WHERE id='$expensetoedit'";
$result=$conn->query($query);
if(!$result){

  echo "".$conn->error;
  
}

else {
while ($rows= $result->fetch_assoc())
  { 
    $id=$rows["id"];
    $edate=$rows["cdate"];
    $amount=$rows["amount"];
    $details=$rows["details"];
}
}
?>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                                    <form class="form form-horizontal" action="updatecashreceived.php" method="POST" autocomplete="off">
                  <div class="form-group">

                  <!-- start test  -->
                    <div class="form-group">
                    <!-- <label class="col-sm-3 control-label" for="form-control-3"></label>
                    <div class="col-sm-9"> -->
                      <input id="form-control-3" class="form-control" type="hidden" name="id" value="<?php echo $id ?>" required>
                   <!--  </div>
                  </div> <br> -->
                    <!-- end test -->
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date Received</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="cdate" value="<?php echo $edate ?>" required>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Amount</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="amount" value="<?php echo $amount ?>" required>
                    </div>
                  </div> <br>              

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Details/Particulars </label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="details" required><?php echo $details ?></textarea>
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