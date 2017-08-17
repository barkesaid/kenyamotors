<!DOCTYPE html>
<html lang="en"> 
<head>
 <?php   
 require("mheader.html"); 
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
                      <!-- start test -->
                      <?php
                      $query ="SELECT vehicles.regno,vehicles.vname FROM vehicles LEFT JOIN soldcars ON vehicles.chasis=soldcars.chasis WHERE soldcars.chasis IS NULL";
                      $result= $conn->query($query);
                            if(!$result){ echo "".$conn->error;  }
                            else {
                               $stock=mysqli_num_rows($result);                    
                               echo "<span class='fw-l'>$stock</span>";                           
                                 }
                           ?> 
                       <!-- end test -->
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
                      <!-- start test -->
                      <?php
                      $query ="Select * from vehicles where MONTH(datein) = MONTH(NOW())";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      $newcars=mysqli_num_rows($result);                    
                      echo "<span class='fw-l'>$newcars</span>";
                           }
                           ?> 
                      <!-- end test -->
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- start test -->
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
                      <!-- start test -->
                      <?php
                      $query ="Select * from soldcars where MONTH(datesold) = MONTH(NOW())";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      $sold=mysqli_num_rows($result);                    
                      echo "<span class='fw-l'>$sold</span>";
                           }
                           ?> 
                      <!-- end test -->
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
                      <h6 class="media-heading">Installments Received</h6>
                      <h3 class="media-heading">
                            <!-- start test -->
                      <?php
                      $query ="SELECT SUM(amountpaid) from installments where MONTH(datepaid) = MONTH(NOW())";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      while ($rows= $result->fetch_assoc())
                        { 
                          $amountpaid=$rows["SUM(amountpaid)"];                         
                         }     

                      echo "<span class='fw-l'>$amountpaid</span>";
                           }?> 
                      <!-- end test -->
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<!-- how to select the pending installments to be received or remove it -->
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
                      <h6 class="media-heading">Pending Installments</h6>
                      <h3 class="media-heading">
                         <?php
                      $query ="SELECT SUM(amountpaid) from installments where MONTH(datepaid) = MONTH(NOW())";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      while ($rows= $result->fetch_assoc())
                        { 
                          $amountpaid=$rows["SUM(amountpaid)"];                         
                         }     

                      echo "<span class='fw-l'>$amountpaid</span>";
                           }?> 

                        <span class="fw-l">1,256 Items</span>
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
                      $query ="SELECT SUM(amountpaid) from installments where MONTH(datepaid) = MONTH(NOW())";
                      $result= $conn->query($query);
                       if(!$result){ echo "".$conn->error;  }
                            else {
                      while ($rows= $result->fetch_assoc())
                        { 
                          $amountpaid=$rows["SUM(amountpaid)"];                         
                         }     

                      echo "<span class='fw-l'>$amountpaid</span>";
                           }?> 
                      
                        <span class="fw-l">1,256 Items</span>
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
                      <h6 class="media-heading">Cash Outside</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">1,256 Items</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-pull-3">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-primary circle sq-48">
                        <span class="icon icon-clock-o"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading"> AOB</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">00:07:56</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Visitors</h4>
                </div>
                <div class="card-body">
                  <div class="card-chart">
                    <canvas id="demo-visitors" data-chart="bar" data-animation="false" data-labels='["Aug 1", "Aug 2", "Aug 3", "Aug 4", "Aug 5", "Aug 6", "Aug 7", "Aug 8", "Aug 9", "Aug 10", "Aug 11", "Aug 12", "Aug 13", "Aug 14", "Aug 15", "Aug 16", "Aug 17", "Aug 18", "Aug 19", "Aug 20", "Aug 21", "Aug 22", "Aug 23", "Aug 24", "Aug 25", "Aug 26", "Aug 27", "Aug 28", "Aug 29", "Aug 30", "Aug 31"]' data-values='[{"label": "Visitors", "backgroundColor": "#0ac29d", "borderColor": "#0ac29d",  "data": [29432, 20314, 17665, 22162, 31194, 35053, 29298, 36682, 45325, 39140, 22190, 28014, 24121, 39355, 36064, 45033, 42995, 30519, 20246, 42399, 37536, 34607, 33807, 30988, 24562, 49143, 44579, 43600, 18064, 36068, 41605]}]' data-hide='["legend", "scalesX"]' height="150"></canvas>
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
    <div class="theme">
      <div class="theme-panel theme-panel-collapsed">
        <div class="theme-panel-controls">
          <button class="theme-panel-toggler" title="Expand theme panel ( ] )" type="button">
            <span class="icon icon-cog icon-spin" aria-hidden="true"></span>
          </button>
        </div>
        <div class="theme-panel-body">
          <div class="custom-scrollbar">
            <div class="custom-scrollbar-inner">
              <h5 class="theme-heading">
                <a href="../buy/index.html" class="btn btn-primary btn-block">Buy Elephant Now!</a>
              </h5>
              <ul class="theme-settings">
                <li class="theme-settings-heading">
                  <div class="divider">
                    <div class="divider-content">Theme Settings</div>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Header fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-header-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar sticky*</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-sticky" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar collapsed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-collapsed" data-sync="false">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Footer fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-footer-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-description">
                  <span>
                    <strong>Sidebar sticky*</strong> - by scrolling up and down the page, the menu placed on the sidebar moves along with the content until the bottom of the menu is reached. <a href="page-layouts.html">Learn more</a></span>
                </li>
              </ul>
              <hr class="theme-divider">
              <ul class="theme-variants">
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../flaming-red/index.html" title="Flaming Red (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/9722110524.jpg" alt="Flaming Red Theme">
                  </a>
                  <a class="theme-variants-alt" href="../flaming-red-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../flaming-red-inverse/index.html" title="Flaming Red (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/9870681590.jpg" alt="Flaming Red Theme">
                  </a>
                  <a class="theme-variants-alt" href="../flaming-red-inverse-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../theme-4/index.html" title="Flatistic Green (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/9964167452.jpg" alt="Flatistic Green Theme">
                  </a>
                  <a class="theme-variants-alt" href="../theme-4-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../theme-4-inverse/index.html" title="Flatistic Green (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1007517980.jpg" alt="Flatistic Green Theme">
                  </a>
                  <a class="theme-variants-alt" href="../theme-4-inverse-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../theme-3/index.html" title="Midnight Blue (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1015664515.jpg" alt="Midnight Blue Theme">
                  </a>
                  <a class="theme-variants-alt" href="../theme-3-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../theme-3-inverse/index.html" title="Midnight Blue (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1025453682.jpg" alt="Midnight Blue Theme">
                  </a>
                  <a class="theme-variants-alt" href="../theme-3-inverse-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../theme-5/index.html" title="Materialistic Blue (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1033422797.jpg" alt="Materialistic Blue Theme">
                  </a>
                  <a class="theme-variants-alt" href="../theme-5-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../theme-5-inverse/index.html" title="Materialistic Blue (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1044368407.jpg" alt="Materialistic Blue Theme">
                  </a>
                  <a class="theme-variants-alt" href="../theme-5-inverse-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../theme-6/index.html" title="Eerie Black (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1050099119.jpg" alt="Eerie Black Theme">
                  </a>
                  <a class="theme-variants-alt" href="../theme-6-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="../theme-6-inverse/index.html" title="Eerie Black (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1067123558.jpg" alt="Eerie Black Theme">
                  </a>
                  <a class="theme-variants-alt" href="../theme-6-inverse-rounded/index.html" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="theme-panel-footer">
          <a class="rounded sq-36 bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;t=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device" title="Share on Facebook" target="_blank">
            <span class="icon icon-facebook"></span>
          </a>
          <a class="rounded sq-36 bg-twitter" href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;text=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device:%20http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;via=naksoid" title="Tweet" target="_blank">
            <span class="icon icon-twitter"></span>
          </a>
          <a class="rounded sq-36 bg-googleplus" href="https://plus.google.com/share?url=http%3A%2F%2Fdemo.naksoid.com%2Felephant" title="Share on Google+" target="_blank">
            <span class="icon icon-google-plus"></span>
          </a>
          <a class="rounded sq-36 bg-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;title=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device&amp;summary=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner.&amp;source=http%3A%2F%2Fdemo.naksoid.com%2Felephant" title="Share on LinkedIn" target="_blank">
            <span class="icon icon-linkedin"></span>
          </a>
          <a class="rounded sq-36 bg-pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;media=http://demo.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg&amp;description=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner." title="Pin it" target="_blank">
            <span class="icon icon-pinterest-p"></span>
          </a>
          <a class="rounded sq-36 bg-default" href="mailto:?subject=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device&body=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner.:%20http%3A%2F%2Fdemo.naksoid.com%2Felephant" title="Send email" target="_blank">
            <span class="icon icon-envelope-o"></span>
          </a>
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