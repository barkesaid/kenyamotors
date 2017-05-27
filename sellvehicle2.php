<!-- add a new vehcile -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html'); 
    require("dbconnect.php"); 
    extract($_POST);
    $regno=$_POST["regno"];
?>
  <title>Sell Vehicle</title>

    <script type="text/javascript">
    function getbalance(){
      var balance= document.getElementById("bal").value;
      var deposit= document.getElementById("dep").value;
      var sellingprice= document.getElementById("sp").value;

      balance = sellingprice-deposit;
      document.getElementById("bal").focus();
      document.getElementById("bal").value=balance;
    }

  </script>
</head>
<body>
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title"><br>
              <span class="d-ib" style="position: center">Sell Vehicle</span>
            </h1>         
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="postsale.php" method="POST">
                  <div class="form-group">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Reg Number </label> 
                    <div class="col-sm-9"> 
                    <input id="form-control-3" class="form-control" type="text" name="regno" value="<?php echo $regno ?>">                   
                     </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Chasis Number </label>
                    <div class="col-sm-9">        
                      <!-- test -->
                      <?php 
                      require("dbconnect.php");
                      extract($_GET);
                      $query="SELECT chasis,vname FROM vehicles WHERE regno='$regno'"; 
                      $result=$conn->query($query);
                      if(!$result){

                        echo "".$conn->error;
                        
                      }
                      else {
                      while ($rows= $result->fetch_assoc())
                        { 
                          $chasis=$rows["chasis"];
                          $vname=$rows["vname"];
                      }
                      }
                      ?>
                      <!-- end test -->
                    <input id="form-control-3" class="form-control" type="text" name="chasis" value="<?php echo $chasis ?>">
                    </div></div>
                    <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Car Name </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="vname" value="<?php echo $vname ?>">
                    </div>
                  </div> <br>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date Sold </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="datesold" />
                    </div>
                  </div> <br>
                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Selling Price</label>
                    <div class="col-sm-9">                     
                       <input id="sp" id="form-control-3" class="form-control" type="text"  name="sellingprice" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Deposit </label>
                    <div class="col-sm-9">
                      <input id="dep" id="form-control-3" class="form-control" type="text"  name="deposit" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Balance</label>
                    <div class="col-sm-9">
                      <input id="bal" id="form-control-3" class="form-control" type="text"  name="balance" onclick="return getbalance()" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Installment Due Date </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="duedate" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Client Id Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="client_idno" placeholder="317" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Client Name</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="cname" placeholder="Joe Doe" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Client phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="phoneno" placeholder="Bill of Landing">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Email </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="email" placeholder="Bill of Landing">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Postal Address </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="paddr" placeholder="Duty Paid">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Town</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="town" placeholder="Car Costing">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Broker Name</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="brokername" placeholder="John Doe">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Broker Commission </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="brokercommission" placeholder="20000">
                    </div>
                  </div> <br>

                      <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Broker Phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="brokerphone" placeholder="John Doe">
                    </div>
                  </div> <br>

                  </div>                
             <div style="padding-left:700px">                
                <input type="submit" name="submit" value="Sell Vehicle">             
                </div>

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