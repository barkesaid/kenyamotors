<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');  require("dbconnect.php"); 
  ?>
   <title>Update Installment</title>
</head>
<body>
 <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title"><br>
              <span class="d-ib" style="position: center">Update Installment Payment</span>
            </h1>         
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="postinstallment.php" method="POST">
                  <div class="form-group">
                  <!-- start test -->
                      <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Reg Number </label> 
                    <div class="col-sm-9">  
                        <?php
                      $query = "SELECT vehicles.vname,vehicles.chasis,vehicles.regno FROM vehicles INNER JOIN soldcars ON vehicles.chasis=soldcars.chasis";
                      $result= $conn->query($query);
                      echo "<select class='form-control' name='chasis'>";                        
                       echo '<option value>select a car</option>';
                       while ($row = $result->fetch_assoc()) {                                   
                       $vname = $row['vname']; $regno = $row['regno']; $chasis=$row['chasis'];   
                        echo '<option value="'.$chasis.'">'.$chasis.' '.$regno.' '.$vname.'</option>';                 
                          } 
                          echo "</select>";
                           ?> <!--  <br><input type="submit" value="Sell This Vehicle">
                           </form>   -->                
                    </div>
                  </div> <br>
                <!-- end test -->
<!-- 
                start test -->
                  <!--   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Installment Amount</label> 
                    <div class="col-sm-9"> 
           <!--              <?php
                 // $installmentamount=NULL;    
                // $query1="SELECT installmentamount FROM soldcars WHERE chasis='$chasis'";
                // $result1=$conn->query($query1);
                // if(!$result1){

                //   echo "".$conn->error;
                  
                // }
                //  else {
                // // $result=$mysqli->query( "SELECT * FROM customer WHERE idno='$idtoedit'");
                // while ($rows1= $result1->fetch_assoc())
                //   { 
                    // $installmentamount= $rows1['installmentamount']; 
               // }
                //}
                //?> -->
                   <!--  <input id="form-control-3" class="form-control" type="text" name="regno" value="<?php //echo $installmentamount ?>">  -->                  
            <!--          </div>
                  </div> <br> -->

                  <!-- end test --> 

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Amount Paid </label> 
                    <div class="col-sm-9"> 
                    <input id="form-control-3" class="form-control" type="text" name="amountpaid">                   
                     </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date Paid </label> 
                    <div class="col-sm-9"> 
                    <input id="form-control-3" class="form-control" type="date" name="datepaid">                   
                     </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Reference And Notes </label> 
                    <div class="col-sm-9"> 
                     <textarea id="form-control-8" class="form-control" rows="3" name="reference" placeholder="Bank reference number/ Mpesa Transaction number\etc..." ></textarea>
                     </div>
                  </div> <br>

                    <div style="padding-left:730px">                 
                <input type="submit" name="submit" value="Update Payment">               
                </div>


</body>
</html>