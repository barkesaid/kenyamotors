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
            <div class="col-md-6 col-lg-3 col-lg-push-0">
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
            <div class="col-md-6 col-lg-3 col-lg-pull-0">
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
              <div class="col-md-6 col-lg-3 col-lg-pull-0">
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

             <div class="col-md-6 col-lg-3 col-lg-pull-0">
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
             <div class="col-md-6 col-lg-3 col-lg-pull-0">
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
               <div class="col-md-6 col-lg-3 col-lg-pull-0">
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
            
               <div class="col-md-6 col-lg-3 col-lg-pull-0">
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
           <div class="col-md-6 col-lg-3 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-shopping-bag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Other cash receieved</h6>
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


<br><br>

           <div class="row gutter-xs">
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Visitors</h4>
                </div>
                <div class="card-body">
                  <div class="card-chart">
                    <canvas id="demo-visitors" data-chart="bar" 
                    data-animation="false" 
                    data-labels='["Aug 1", "Aug 2", "Aug 3", "Aug 4", "Aug 5", "Aug 6", "Aug 7", "Aug 8", "Aug 9", "Aug 10", "Aug 11", "Aug 12", "Aug 13", "Aug 14", "Aug 15", "Aug 16", "Aug 17", "Aug 18", "Aug 19", "Aug 20", "Aug 21", "Aug 22", "Aug 23", "Aug 24", "Aug 25", "Aug 26", "Aug 27", "Aug 28", "Aug 29", "Aug 30", "Aug 31"]' data-values='[{"label": "Visitors", 
                    "backgroundColor": "#0ac29d", 
                    "borderColor": "#0ac29d", 
                     "data": [29432, 20314, 17665, 22162, 31194, 35053, 29298, 36682, 45325, 39140, 22190, 28014, 24121, 39355, 36064, 45033, 42995, 30519, 20246, 42399, 37536, 34607, 33807, 30988, 24562, 49143, 44579, 43600, 18064, 36068, 41605]}]'data-hide='["legend", "scalesX"]' height="150"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sales</h4>
                </div>
                <div class="card-body">
                  <div class="card-chart">
                    <canvas id="demo-sales" data-chart="bar" data-animation="false" data-labels='["Aug 1", "Aug 2", "Aug 3", "Aug 4", "Aug 5", "Aug 6", "Aug 7", "Aug 8", "Aug 9", "Aug 10", "Aug 11", "Aug 12", "Aug 13", "Aug 14", "Aug 15", "Aug 16", "Aug 17", "Aug 18", "Aug 19", "Aug 20", "Aug 21", "Aug 22", "Aug 23", "Aug 24", "Aug 25", "Aug 26", "Aug 27", "Aug 28", "Aug 29", "Aug 30", "Aug 31"]' data-values='[{"label": "Sales", "backgroundColor": "#0b88d5", "borderColor": "#0b88d5",  "data": [3601.09, 2780.29, 1993.39, 4277.07, 4798.58, 6390.75, 3337.37, 6786.94, 5632.1, 5460.43, 3905.17, 3070.82, 4263.55, 7132.64, 6103.88, 6020.76, 4662.25, 4084.34, 3464.87, 4947.89, 4486.55, 5898.46, 5528.33, 3616.03, 3255.17, 7881.06, 7293.8, 6863.6, 3161.31, 6711.08, 7942.9]}]' data-hide='["legend", "scalesX"]' height="150"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Traffic Source / Top Referrals</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 m-y">
                      <ul class="list-group list-group-divided">
                        <li class="list-group-item">
                          <div class="media">
                            <div class="media-middle media-body">
                              <h6 class="media-heading">
                                <span class="text-muted">Direct</span>
                              </h6>
                              <h4 class="media-heading">67%
                                <small>691,279</small>
                              </h4>
                            </div>
                            <div class="media-middle media-right">
                              <span class="bg-primary circle sq-40">
                                <span class="icon icon-arrow-right"></span>
                              </span>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="media">
                            <div class="media-middle media-body">
                              <h6 class="media-heading">
                                <span class="text-muted">Referrals</span>
                              </h6>
                              <h4 class="media-heading">21%
                                <small>216,670</small>
                              </h4>
                            </div>
                            <div class="media-middle media-right">
                              <span class="bg-primary circle sq-40">
                                <span class="icon icon-link"></span>
                              </span>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="media">
                            <div class="media-middle media-body">
                              <h6 class="media-heading">
                                <span class="text-muted">Search Engines</span>
                              </h6>
                              <h4 class="media-heading">12%
                                <small>123,811</small>
                              </h4>
                            </div>
                            <div class="media-middle media-right">
                              <span class="bg-primary circle sq-40">
                                <span class="icon icon-search"></span>
                              </span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-6 m-y">
                      <table class="table table-borderless table-fixed">
                        <tbody>
                          <tr>
                            <td class="col-xs-1 text-left">1.</td>
                            <td class="col-xs-7 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">themeforest.net</span>
                              </a>
                            </td>
                            <td class="col-xs-4 text-right">115,928</td>
                          </tr>
                          <tr>
                            <td class="col-xs-1 text-left">2.</td>
                            <td class="col-xs-7 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">facebook.com</span>
                              </a>
                            </td>
                            <td class="col-xs-4 text-right">43,651</td>
                          </tr>
                          <tr>
                            <td class="col-xs-1 text-left">3.</td>
                            <td class="col-xs-7 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">twitter.com</span>
                              </a>
                            </td>
                            <td class="col-xs-4 text-right">20,117</td>
                          </tr>
                          <tr>
                            <td class="col-xs-1 text-left">4.</td>
                            <td class="col-xs-7 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">linkedin.com</span>
                              </a>
                            </td>
                            <td class="col-xs-4 text-right">19,115</td>
                          </tr>
                          <tr>
                            <td class="col-xs-1 text-left">5.</td>
                            <td class="col-xs-7 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">pinterest.com</span>
                              </a>
                            </td>
                            <td class="col-xs-4 text-right">11,292</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Sales / Top Brands</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 m-y">
                      <ul class="list-group list-group-divided">
                        <li class="list-group-item">
                          <div class="media">
                            <div class="media-middle media-body">
                              <h6 class="media-heading">
                                <span class="text-muted">Women's Clothing</span>
                              </h6>
                              <h4 class="media-heading">28%
                                <small>$43,498.69</small>
                              </h4>
                            </div>
                            <div class="media-middle media-right">
                              <span class="bg-success circle sq-40">
                                <span class="icon icon-female"></span>
                              </span>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="media">
                            <div class="media-middle media-body">
                              <h6 class="media-heading">
                                <span class="text-muted">Men's Clothing</span>
                              </h6>
                              <h4 class="media-heading">19%
                                <small>$29,516.97</small>
                              </h4>
                            </div>
                            <div class="media-middle media-right">
                              <span class="bg-success circle sq-40">
                                <span class="icon icon-male"></span>
                              </span>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="media">
                            <div class="media-middle media-body">
                              <h6 class="media-heading">
                                <span class="text-muted">Computers</span>
                              </h6>
                              <h4 class="media-heading">15%
                                <small>$23,302.87</small>
                              </h4>
                            </div>
                            <div class="media-middle media-right">
                              <span class="bg-success circle sq-40">
                                <span class="icon icon-laptop"></span>
                              </span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-6 m-y">
                      <table class="table table-borderless table-fixed">
                        <tbody>
                          <tr>
                            <td class="col-xs-1 text-left">1.</td>
                            <td class="col-xs-6 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">Banana Republic</span>
                              </a>
                            </td>
                            <td class="col-xs-5 text-right">$7,124.23</td>
                          </tr>
                          <tr>
                            <td class="col-xs-1 text-left">2.</td>
                            <td class="col-xs-6 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">Calvin Klein</span>
                              </a>
                            </td>
                            <td class="col-xs-5 text-right">$6,389.26</td>
                          </tr>
                          <tr>
                            <td class="col-xs-1 text-left">3.</td>
                            <td class="col-xs-6 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">Ralph Lauren</span>
                              </a>
                            </td>
                            <td class="col-xs-5 text-right">$5,826.64</td>
                          </tr>
                          <tr>
                            <td class="col-xs-1 text-left">4.</td>
                            <td class="col-xs-6 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">Tommy Hilfiger</span>
                              </a>
                            </td>
                            <td class="col-xs-5 text-right">$5,064.62</td>
                          </tr>
                          <tr>
                            <td class="col-xs-1 text-left">5.</td>
                            <td class="col-xs-6 text-left">
                              <a class="link-muted" href="#">
                                <span class="truncate">Lenovo</span>
                              </a>
                            </td>
                            <td class="col-xs-5 text-right">$4,536.72</td>
                          </tr>
                        </tbody>
                      </table>
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
                  <strong>Most Viewed Products</strong>
                  <span aria-hidden="true"> · </span>
                  <a href="#">View full report</a>
                </div>
                <div class="card-body">
                  <ul class="media-list">
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/5615854990.jpg" alt="Raja Elephant T-shirt">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a class="link-muted" href="product.html">Raja Elephant T-shirt Women's S-XL #4398</a>
                        </h5>
                      </div>
                      <div class="media-middle media-right">
                        <small class="label arrow-left arrow-success">97k views</small>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/5991713086.jpg" alt="Maliha Elephant T-shirt">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a class="link-muted" href="product.html">Maliha Elephant T-shirt Women's S-XL #4909</a>
                        </h5>
                      </div>
                      <div class="media-middle media-right">
                        <small class="label arrow-left arrow-success">92k views</small>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/6501906268.jpg" alt="Donna Elephant T-shirt">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a class="link-muted" href="product.html">Donna Elephant T-shirt Men's S-2XL #4872</a>
                        </h5>
                      </div>
                      <div class="media-middle media-right">
                        <small class="label arrow-left arrow-success">81k views</small>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-md-push-4">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Most Sold Products</strong>
                  <span aria-hidden="true"> · </span>
                  <a href="#">View full report</a>
                </div>
                <div class="card-body">
                  <ul class="media-list">
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/5991713086.jpg" alt="Maliha Elephant T-shirt">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a class="link-muted" href="product.html">Maliha Elephant T-shirt Women's S-XL #4909</a>
                        </h5>
                        <small>197 Items
                          <span class="rating">
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                          </span>
                        </small>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/5774898501.jpg" alt="Sri Elephant T-shirt">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a class="link-muted" href="product.html">Sri Elephant T-shirt Men's S-2XL #4323</a>
                        </h5>
                        <small>165 Items
                          <span class="rating">
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star-half-o"></span>
                          </span>
                        </small>
                      </div>
                    </li>
                    <li class="media">
                      <div class="media-middle media-left">
                        <a href="product.html">
                          <img class="img-circle" width="48" height="48" src="img/6711938749.jpg" alt="Tess Elephant T-shirt">
                        </a>
                      </div>
                      <div class="media-middle media-body">
                        <h5 class="media-heading">
                          <a class="link-muted" href="product.html">Tess Elephant T-shirt Women's S-XL #4972</a>
                        </h5>
                        <small>125 Items
                          <span class="rating">
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star"></span>
                            <span class="icon icon-star-o"></span>
                          </span>
                        </small>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-md-pull-8">
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
            </div>
          </div>
        </div>
      </div>
      <div class="layout-footer">
        <div class="layout-footer-body">
          <small class="version">Version 1.2.0</small>
          <small class="copyright">2016 &copy; Elephant By <a href="http://naksoid.com/">Naksoid</a></small>
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
  </body>

<!-- Mirrored from demo.naksoid.com/elephant-v1.2.0/theme-2-inverse/dashboard-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jan 2017 05:36:12 GMT -->
</html>