<!DOCTYPE html>
<html lang="en">
<head>
 <?php
    require_once ('sheader.html');
  ?>
     <title>Sales Report</title>
</head>
<body>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Sales Report</span>
            </h1>
             <p class="title-bar-description">
             <!--  <small>Select a Sale to view</small> -->
            </p>

          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
               <!--  <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong></strong>
                </div> -->
                <div class="card-body">
                  <!-- <table id="demo-datatables-buttons-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%"> -->
                    <table id="demo-datatables-buttons-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                    <thead>
                      <tr>
                        <th>Vehicle Name</th>
                        <th>Chasis Number</th>
                        <th>Registration Number</th>
                        <th>Date Sold</th>
                        <th>Selling Price</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                   <!-- removed the table footer from here -->
                    <tfoot>
                       <button style="float: right;" onclick="window.print()"> Print This </button> <br>
                       <br>
                    </tfoot>

                       <tbody>

                    <!-- start test -->
                     <?php
                    require("dbconnect.php");
                    $query="SELECT vehicles.chasis,vehicles.vname,soldcars.datesold,vehicles.regno,soldcars.sellingprice,soldcars.id FROM vehicles INNER JOIN soldcars ON vehicles.chasis=soldcars.chasis ORDER BY `soldcars`.`datesold` DESC";
                        $result= $conn->query($query);                                   
                              if(!($result))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else
                            {  
                            print "<tbody>" ; 
                            if($result->num_rows>0){
                              while($row=$result->fetch_assoc()) {
                                //id for the expense to edit
                                $value=$row["id"];
                                print "<tr>";
                                print "<td>"; print $row["vname"]; print "</td>" ;
                                print "<td>"; print $row["chasis"]; print "</td>" ;
                                print "<td>"; print $row["regno"]; print "</td>" ;
                                print "<td>"; print $row["datesold"]; print "</td>" ;
                                print "<td>"; print number_format($row["sellingprice"]); print "</td>"; 
                                $editvalue1=$value;    

                                // print "<td><a href='viewasale.php?editvalue1=$editvalue1'><span class='label label-outline-success'>View</span></a></td>";
                               print "</tr>";

                              }
                            //start test
                                print "<tr>"; 
                                print "<th></th>";
                                print "<th></th>";
                                print "<th></th>";                                
                                print "<th>Total Sales Made</th>"; 
                                       $query5="SELECT sum(soldcars.sellingprice),vehicles.chasis FROM vehicles INNER JOIN soldcars ON vehicles.chasis=soldcars.chasis ORDER BY `soldcars`.`datesold` DESC";
                                        $result5= $conn->query($query5);                                   
                                              if(!($result5))
                                            {
                                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                                            }
                                          else {  
                                            if($result5->num_rows>0){
                                              while($row5=$result5->fetch_assoc()) {
                                                $sellingprice= $row5["sum(soldcars.sellingprice)"];
                                              }
                                            }
                                            else { echo "0 results fetched"; }
                                                }

                                  print "<th>"; print number_format($sellingprice);  print "</th>";   print "</tr>";
                                }
                               //end test

                            else {
                              echo "0 results fetched";
                            }
                                }
                                     ?>
                    <!-- end test -->                
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

    <script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script src="js/application.min.js"></script>
    <script src="js/demo.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
<!-- Mirrored from demo.naksoid.com/elephant-v1.2.0/theme-2-inverse/datatables-buttons.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jan 2017 05:36:18 GMT -->
</html>