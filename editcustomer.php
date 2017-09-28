<!-- fetching a customer and updating their information based on the new acquired information -->

<!-- add a new vehcile -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
   <title>Edit Customer</title>
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
              <span class="d-ib" style="position: center">Update Customer Information</span>
            </h1>    <br>
             </div>
 <?php 
require("dbconnect.php");
extract($_GET);

$idtoedit=$_GET["editvalue1"]; 

$query="SELECT * FROM customer WHERE idno='$idtoedit'";
$result=$conn->query($query);
if(!$result){

  echo "".$conn->error;
  
}

 else {
// $result=$mysqli->query( "SELECT * FROM customer WHERE idno='$idtoedit'");
while ($rows= $result->fetch_assoc())
  { 
    $idno= $rows['idno']; 
    $cname=$rows['cname']; 
    $phoneno=$rows['phoneno']; 
    $altphone=$rows['altphone'];
    $email=$rows['email'];
    $paddr=$rows['paddr'];
    $town=$rows['town'];
    $otherinfo=$rows['otherinfo'];
}
}
?>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                               <form class="form form-horizontal" action="updatecustomer.php" method="POST" autocomplete="off">
                  <div class="form-group">
                  <!-- <div class="form-group"> -->
                   <!--  <label class="col-sm-3 control-label" for="form-control-3">National Id No </label>
                    <div class="col-sm-9"> -->
                      <input id="form-control-3" class="form-control" type="hidden" name="idno" value="<?php echo $idno ?>"  required>
                    <!-- </div> -->
                <!--   </div> <br> -->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Customer Names</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="cname" value="<?php echo $cname ?>" required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3"> Phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="phoneno" value="<?php echo $phoneno ?>" required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Alternative Phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="altphone" value="<?php echo $altphone ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Email Address</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="email" name="email" value="<?php echo $email ?>" >
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Postal Address </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="paddr" value="<?php echo $paddr ?>" >
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Town </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="town" value="<?php echo $town ?>" required>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Other Information</label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="otherinfo">  <?php echo $otherinfo ?> </textarea>
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