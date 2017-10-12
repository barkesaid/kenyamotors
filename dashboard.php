<!DOCTYPE html>
<html lang="en"> 
<head>
  <?php   
 // require("mheader.html"); 
 require("dbconnect.php");
  ?>

  <title>Dashboard</title>
</head>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Dashboard</span>
            </h1>
          </div> 
          <div class="row gutter-xs">
            <div class="col-md-8 col-lg-4 col-lg-push-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-primary circle sq-48">
                        <span class="icon icon-user"></span>
                      </span>

                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Stock Vehicles</h6>
                      <h3 class="media-heading">
                      <!-- start of cars in stock -->
                      <?php
                      $query ="SELECT vehicles.regno,vehicles.vname FROM vehicles LEFT JOIN soldcars ON vehicles.chasis=soldcars.chasis WHERE soldcars.chasis IS NULL";
                      $result= $conn->query($query);
                            if(!$result){ echo "".$conn->error;  }
                            else {
                               $stock=mysqli_num_rows($result);                    
                               echo "<span class='fw-l'>$stock</span>";                           
                                 }
                           ?> 
                       <!-- end  -->
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<!-- testing inputting an image -->
<!-- <div>
 <div class="col-md-6 col-lg-3 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div> 
  <h3>Image</h3>
  <img src="img/image1.jpg" alt="Mombasa">

</div>
<!-- </div>
</div>
</div>
</div> -->
            <div class="col-md-8 col-lg-4 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">New Vehicles</h6>
                      <h3 class="media-heading">
                      <!-- new vehicles- which came in this month -->
                      <?php
                      $query ="Select * from vehicles where MONTH(datein) = MONTH(NOW())";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      $newcars=number_format(mysqli_num_rows($result));                    
                      echo "<span class='fw-l'>$newcars</span>";
                           }
                           ?> 
                      <!-- end -->
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-8 col-lg-4 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Sold this Month</h6>
                      <h3 class="media-heading">
                      <!-- vehicles sold this month test -->
                      <?php
                      $query ="Select * from soldcars where MONTH(datesold) = MONTH(NOW())";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      $sold=mysqli_num_rows($result);                    
                      echo "<span class='fw-l'>$sold</span>";
                           }
                           ?> 
                      <!-- end  -->
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-md-8 col-lg-4 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Monthly Installments Received</h6>
                      <h3 class="media-heading">
                            <!-- total installments received in this month -->
                      <?php
                      $query ="SELECT SUM(amountpaid) from installments where MONTH(datepaid) = MONTH(NOW())";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      while ($rows= $result->fetch_assoc())
                        { 
                          $amountpaid=number_format($rows["SUM(amountpaid)"]);                         
                         }     

                      echo "<span class='fw-l'>$amountpaid</span>";
                           }?> 
                      <!-- end -->
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Installments receieved -->
             <div class="col-md-8 col-lg-4 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">All Installments Received</h6>
                      <h3 class="media-heading">                           
                      <?php
                      $query ="SELECT SUM(amountpaid) from installments";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      while ($rows= $result->fetch_assoc())
                        { 
                          $amountpaid=number_format($rows["SUM(amountpaid)"]);                         
                         }     

                      echo "<span class='fw-l'>$amountpaid</span>";
                           }?> 
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end  -->

<!-- displaying total pending installments(this is the acoount receivables for the showroom) -->
               <div class="col-md-8 col-lg-4 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Total Pending Installments</h6>
                      <h3 class="media-heading">
                         <?php
                         // first select all the balances for sold MV
                          // start test
                          $query1 ="SELECT SUM(balance) from soldcars";
                          $result1= $conn->query($query1);
                           if(!$result1){ echo "".$conn->error;  }
                                else {
                          while ($rows1= $result1->fetch_assoc())
                            { 
                              $balance=$rows1["SUM(balance)"];                         
                             }    

                          // echo "<span class='fw-l'>$balance</span>";
                               }

                          // now select the total installments paid
                           $query2 ="SELECT SUM(amountpaid) from installments";
                            $result2= $conn->query($query2);
                             if(!$result2){ echo "".$conn->error;  }
                                  else {
                            while ($rows2= $result2->fetch_assoc())
                              { 
                                $amountpaid=$rows2["SUM(amountpaid)"];                         
                               }    

                            // echo "<span class='fw-l'>$amountpaid</span>";
                                 }
                                $pendinginstallments= number_format($balance-$amountpaid);
                                  echo "<span class='fw-l'>$pendinginstallments</span>";
                         // end test

                      // $query ="SELECT SUM(amountpaid) from installments where MONTH(datepaid) = MONTH(NOW())";
                      // $result= $conn->query($query);
                      //  if(!$result){ echo "".$conn->error;  }
                      //       else {
                      // while ($rows= $result->fetch_assoc())
                      //   { 
                      //     $amountpaid=$rows["SUM(amountpaid)"];                         
                      //    }     

                      // echo "<span class='fw-l'>$amountpaid</span>";
                      //      }
                           ?> 

                        <!-- <span class="fw-l">1,256 Items</span> -->
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
               <div class="col-md-8 col-lg-4 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Brokerage Fees</h6>
                      <h3 class="media-heading">
                         <?php
                      $query3 ="SELECT SUM(brokercommission) from broker";
                      $result3= $conn->query($query3);
                       if(!$result3){ echo "".$conn->error;  }
                            else {
                      while ($rows3= $result3->fetch_assoc())
                        { 
                          $brokers=number_format($rows3["SUM(brokercommission)"]);                         
                         }     

                      echo "<span class='fw-l'>$brokers</span>";
                           }?> 
                      
                   <!--      <span class="fw-l">1,256 Items</span> -->
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<!-- cash received this month -->
           <div class="col-md-8 col-lg-4 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Other cash received</h6>
                      <h3 class="media-heading">
                         <?php
                      $query4 ="SELECT SUM(amount) from addcash where MONTH(cdate) = MONTH(NOW())";
                      $result4= $conn->query($query4);
                       if(!$result4){ echo "".$conn->error;  }
                            else {
                      while ($rows4= $result4->fetch_assoc())
                        { 
                          $cashin=number_format($rows4["SUM(amount)"]);                         
                         }     

                      echo "<span class='fw-l'>$cashin</span>";
                           }?> 
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

          <div class="row gutter-xs">
            <div class="col-md-4 col-md-push-4">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Installments to Receive this month</strong>
                  <span aria-hidden="true"> · </span>
                </div>
                <div class="card-body">
                  <ul class="media-list">
                    <li class="media">
                      <!-- start test -->
                        <h5 class="media-heading"><a class="link-muted" href="product.html">
                        <table border=1 px solid black>
                        <thead style="color: black; background: #50c878">
                        <th> Vehicle Name</th>
                        <th>Due Date</th> 
                        <th>Registration No </th>
                        </tr></thead>
                        <tbody>
                        </a></h5>

                      <?php
                            $query2 ="SELECT vehicles.vname,soldcars.duedate,vehicles.regno FROM vehicles INNER JOIN soldcars ON vehicles.chasis=soldcars.chasis ORDER BY duedate DESC LIMIT 5";
                            $result2= $conn->query($query2);
                            while ($row2 = $result2->fetch_assoc()){                               
                            $vname = $row2['vname'];  
                            $duedate=$row2['duedate'];
                            $duedate1=date_create($duedate);
                            $duedate2=date_format($duedate1,"d"); 
                            $regno=$row2['regno'];

                            echo '<tr><td><h5 class="media-heading">'.$vname.''; echo "</td>";
                             echo '<td>'.$duedate2.''; echo "</td>";
                             echo '<td>'.$regno.'</h5>'; echo "</td> </tr>";  
                                                      }
                              print "</tbody>" ;
                              print "</table>" ;
                          // end test 
                         ?>
                  </ul>
                </div>
              </div>
            </div>
<!-- start test -->
<div class="col-md-4 col-md-push-4">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Vehicles Recently Sold</strong>
                </div>
            <div class="card-body">
                  <ul class="media-list">
                    <li class="media">
                      <div class="media-middle media-left">
                      </div>
                            <!-- start test -->
                        <h5 class="media-heading"><a class="link-muted" href="product.html">
                        <table border=1 px solid black>
                        <thead style="color: black; background: #50c878">
                        <th> Reg. No </th>
                        <th> Vehicle Name </th>
                        <th> Date Sold </th>                         
                        </tr></thead>
                        <tbody>
                        </a></h5>
                          <!-- end test -->

                       
                          <?php
                            $query1 ="SELECT vehicles.regno,vehicles.vname,soldcars.datesold FROM vehicles INNER JOIN soldcars ON vehicles.chasis=soldcars.chasis ORDER by datesold DESC LIMIT 5";
                            $result1= $conn->query($query1);

                                                                           
                            while ($row1 = $result1->fetch_assoc()){                               
                            $regno = $row1['regno']; 
                            $vname = $row1['vname']; 
                            $datesold=$row1['datesold'];

                          echo '<tr><td><h5 class="media-heading">'.$regno.''; echo "</td>";
                             echo '<td>'.$vname.''; echo "</td>";
                             echo '<td>'.$datesold.'</h5>'; echo "</td> </tr>";  
                                                      }
                              print "</tbody>" ;
                              print "</table>" ;
                            
                            // echo '<h5 class="media-heading">';
                            //  echo '<a class="link-muted" href="product.html">'.$regno.' '.$vname.' '.$datesold.'</a>';
                            // echo "</h5>";
                            // echo "</option>";
                         ?>  
                    </li>
                  </ul>
                </div>
              </div>
            </div>
<!-- end test -->
<!-- comment it out for milestone 2 -->

   <!--          <div class="col-md-4 col-md-pull-8">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Activity Feed</strong>
                  <span aria-hidden="true"> · </span>
                  <a href="#">View full report</a>
                </div>
                <div class="card-body">
                  <ul class="media-list">
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/0299419341.jpg" alt="Harry Jones">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a href="#">Harry Jones</a>
                          <small>5 min ago</small>
                        </h5>
                        <small>Published a product: "Jade Elephant T-shirt".</small>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/0180441436.jpg" alt="Teddy Wilson">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a href="#">Teddy Wilson</a>
                          <small>(10 min ago)</small>
                        </h5>
                        <small>Created a new collection: "Summer with Style".</small>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/0310728269.jpg" alt="Daniel Taylor">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a href="#">Daniel Taylor</a>
                          <small>(12 min ago)</small>
                        </h5>
                        <small>Created a new page: "Free tools".</small>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div> -->

          </div>
        </div>
      </div>
    </div>            
      </div>
    </div>
    <script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script src="js/application.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
</html>