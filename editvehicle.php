<!-- fetching a customer and updating their information based on the new acquired information -->

<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
  <title>Edit Vehicle</title>
</head>
<body>
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Update Vehicle</span>
            </h1>    <br>
            <!-- this is a test -->
             </div>
                 <?php 
                require("dbconnect.php");
                extract($_GET);

                $chasistoedit=$_GET["editvalue1"]; 

                $query="SELECT * FROM vehicles WHERE chasis='$chasistoedit'";
                $result=$conn->query($query);
                if(!$result){

                  echo "".$conn->error;
                  
                }

                 else {
                // $result=$mysqli->query( "SELECT * FROM customer WHERE idno='$idtoedit'");
                while ($rows= $result->fetch_assoc())
                  { 
                    $vname= $rows['vname']; 
                    $chasis=$rows['chasis']; 
                    $regno=$rows['regno']; 
                    $color=$rows['color'];
                    $datein=$rows['datein'];
                    $bl=$rows['bl'];
                    $duty=$rows['duty'];
                    $costing=$rows['costing'];
                    $otherexpenses=$rows['otherexpenses'];
                    $details=$rows['details'];
                }
                }
                ?>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                    <form class="form form-horizontal" action="updatevehicle.php" method="POST">
                  <div class="form-group">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Car Name </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="vname" value="<?php echo $vname ?>">
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Chasis Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="chasis" value="<?php echo $chasis  ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Registration Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="regno" value="<?php echo $regno  ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Color </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="color" value="<?php echo $color ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date in</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="datein" value="<?php echo $datein ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Bill of Landing  </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="bl" value="<?php echo $bl ?>">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Duty Paid </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="duty" value="<?php echo $duty ?>">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Car Costing</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="costing" value="<?php echo $costing ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Other Expenses </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="otherexpenses" value="<?php echo $otherexpenses ?>">
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Details of Other Expenses</label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="details"><?php  echo $details ?></textarea>
                    </div>
                  </div> <br>

                    <!-- <div class="form-group"> -->
                  </div>
                
                <div style="padding-left:760px">                 
                <input type="submit" name="submit" value="Save">               
                </div>

                  </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
</body>
</html>