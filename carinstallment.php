<!-- view a car installment historu -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html'); 
    require("dbconnect.php"); 
?>
<title>Installment History</title>
</head>
<body style="position: center"> 
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title"><br>
              <span class="d-ib" style="position: center">Select a vehicle to view their installment payment</span>
            </h1>               
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="carinstallment1.php" method="POST" autocomplete="off">
                  <div class="form-group">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Reg / Chasis / Car Name </label> 
                    <div class="col-sm-9"> 
                      <form action="carinstallment1.php" method="POST">
                      <?php
                      $query ="SELECT vehicles.regno,vehicles.vname, vehicles.chasis FROM vehicles RIGHT JOIN soldcars ON vehicles.chasis=soldcars.chasis";
                      $result= $conn->query($query);
                      echo "<select class='form-control' name='chasis'>";                        
                       echo '<option value>select a car</option>';
                       while ($row = $result->fetch_assoc()) {                                   
                        $regno = $row['regno'];   $vname = $row['vname']; $chasis = $row['chasis']; 
                        echo '<option value="'.$chasis.'">'.$regno.' '.$vname.' '.$chasis.'</option>';                 
                          } 
                          echo "</select>";
                           ?>  <br><input type="submit" value="View Installment History">
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