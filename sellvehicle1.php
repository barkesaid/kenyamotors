<!-- sell a vehicle -->
<!-- this fetches the vehicle details from the db based on the vehicle registration number -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html'); 
    require("dbconnect.php"); 
?>
  <title>Sell Vehicle</title>
</head>
<body style="position: center"> 
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title"><br>
              <span class="d-ib" style="position: center">Sell Vehicle</span>
            </h1>                <!-- this is form for selling a car -->
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="sellvehicle2.php" method="POST">
                  <div class="form-group">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Reg Number </label> 
                    <div class="col-sm-9">  
                    <!-- another form for picking the car reg no -->
                      <form action="sellvehicle2.php" method="POST">
                      <?php
                      $query = "SELECT regno,vname FROM vehicles ORDER by datein DESC";
                      $result= $conn->query($query);
                      echo "<select class='form-control' name='regno'>";                        
                       echo '<option value>select a car</option>';
                       while ($row = $result->fetch_assoc()) {                                   
                        $regno = $row['regno'];   $vname = $row['vname']; 
                        echo '<option value="'.$regno.'">'.$regno.' '.$vname.'</option>';                 
                          } 
                          echo "</select>";
                           ?>  <br><input type="submit" value="Sell This Vehicle">
                           </form>                  
                    </div>
                  </div> <br>

                  </form>
                  </div>
                  </div>
                  </div>
                  </div>

            <!-- end of test -->
            </div>
          </div>   
          </div>
</body>
</html>