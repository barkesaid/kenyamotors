<!-- fetching a sale details and display to update -->

<!DOCTYPE html>
<html>
<head>
 <?php  require_once ('sheader.html');  ?>
  <title>Edit Sale</title>
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
                $saletoedit=$_GET["editvalue1"]; 
// test
                $query="SELECT vehicles.regno,vehicles.chasis,vehicles.vname,soldcars.datesold,soldcars.sellingprice,soldcars.deposit,soldcars.balance,soldcars.duedate,soldcars.client_idno FROM vehicles INNER JOIN soldcars ON vehicles.chasis=soldcars.chasis WHERE vehicles.regno='$saletoedit'";
                $result=$conn->query($query);
                if(!$result){ echo "".$conn->error; }
                 else {
                while ($rows= $result->fetch_assoc())
                  { 
                    $regno=$rows['regno']; 
                    $chasis=$rows['chasis'];
                    $vname= $rows['vname']; 
                    $datesold=$rows['datesold'];
                    $sellingprice=$rows['sellingprice'];
                    $deposit=$rows['deposit'];
                    $balance=$rows['balance'];
                    $duedate=$rows['duedate'];
                    $client_idno=$rows['client_idno'];
                }
// another test
          $query1="SELECT soldcars.client_idno,customer.cname,customer.cname,customer.phoneno,customer.email FROM soldcars INNER JOIN customer ON soldcars.client_idno=customer.idno WHERE soldcars.client_idno='$client_idno'";
                $result1=$conn->query($query1);
                if(!$result){

                  echo "".$conn->error;
                  
                }

                 else {
                // $result=$mysqli->query( "SELECT * FROM customer WHERE idno='$idtoedit'");
                while ($rows1= $result1->fetch_assoc())
                  { 
                    $cname=$rows['cname']; 
                    $phoneno=$rows['phoneno'];
                    $email= $rows['email']; 
                }

          $query2="SELECT broker.brokername,broker.brokercommission,broker.brokerphone FROM soldcars INNER JOIN broker ON soldcars.chasis=broker.chasis WHERE broker.chasis='$chasis'";
                $result2=$conn->query($query2);
                if(!$result){

                  echo "".$conn->error;
                  
                }

                 else {
                // $result=$mysqli->query( "SELECT * FROM customer WHERE idno='$idtoedit'");
                while ($rows2= $result2->fetch_assoc())
                  { 
                    $brokername=$rows['brokername']; 
                    $brokercommission=$rows['brokercommission'];
                    $brokerphone= $rows['brokerphone']; 
                }
                //another test

                }
              }
            }
                ?>
               <!--   // end test -->
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
                      <input id="form-control-3" class="form-control" type="date" name="datesold" value="<?php echo $datesold ?>" />
                    </div>
                  </div> <br>
                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Selling Price</label>
                    <div class="col-sm-9">                     
                       <input id="sp" id="form-control-3" class="form-control" type="text"  name="sellingprice"  value="<?php echo $sellingprice ?>"/>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Deposit </label>
                    <div class="col-sm-9">
                      <input id="dep" id="form-control-3" class="form-control" type="text"  name="deposit" value="<?php echo $deposit ?>" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Balance</label>
                    <div class="col-sm-9">
                      <input id="bal" id="form-control-3" class="form-control" type="text"  name="balance" value="<?php echo $balance ?>" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Installment Due Date </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="duedate"  value="<?php echo $duedate ?>"/>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Client Id Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="client_idno" value="<?php echo $client_idno ?>" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Client Name</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="cname" value="<?php echo $cname ?>" />
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Client phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="phoneno" value="<?php echo $phoneno ?>">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Email </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="email" value="<?php echo $email ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Broker Name</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="brokername" value="<?php echo $brokername ?>">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Broker Commission </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="brokercommission" value="<?php echo $brokercommission ?>">
                    </div>
                  </div> <br>

                      <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Broker Phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="brokerphone" value="<?php echo $brokerphone ?>">
                    </div>
                  </div> <br>

                  </div>                
             <div style="padding-left:700px">                
                <input type="submit" name="submit" value="Update Sale">             
                </div>
                   


    
              </div>

            </div>
            </div>
                  </div>
                  </div>
                  </div>
</body>
</html>