<!-- broker reports -->
<!DOCTYPE html>
<html lang="en">
<head>
 <?php
    require_once ('sheader.html');
  ?>
     <title>Broker Report</title>
</head>
<body>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Broker Report</span>
            </h1>
            <!--  <p class="title-bar-description"> Brokers and the vehicles they sold </p> -->

          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
             <!--    <div class="card-header">
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
                        <th>Broker Name</th>
                        <th>Broker Contact</th>
                        <th>Broker Commission </th>
                        <th>Vehicle Name</th>
                        <th>Registration Number</th>
                        <th>Vehicle Selling Price</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tfoot>
                           <button style="float: right;" onclick="window.print()"> Print </button> <br>
                           <br>
                        </tfoot>

                       <tbody>

                    <!-- start test -->
                     <?php
                    require("dbconnect.php");
                    $query="SELECT broker.brokername, broker.brokerphone,broker.brokercommission,soldcars.chasis, vehicles.regno,vehicles.vname, soldcars.sellingprice,vehicles.regno FROM broker JOIN soldcars ON broker.chasis=soldcars.chasis JOIN vehicles ON vehicles.chasis= broker.chasis WHERE broker.brokercommission != 0 ORDER BY soldcars.datesold DESC";
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
                                 $chasis=$row["chasis"];
                                print "<tr>";
                                print "<td>"; print $row["brokername"]; print "</td>" ;
                                print "<td>"; print $row["brokerphone"]; print "</td>" ;
                                print "<td>"; print number_format($row["brokercommission"]); print "</td>" ;
                                print "<td>"; print $row["vname"]; print "</td>" ;
                                print "<td>"; print $row["regno"]; print "</td>" ;
                                print "<td>"; print number_format($row["sellingprice"]); print "</td>"; 
                                // $editvalue1=$value;    

                                // print "<td><a href='viewasale.php?editvalue1=$editvalue1'><span class='label label-outline-success'>View</span></a></td>";
                               // print "</tr>";


                              }

                                //total row
                                print "<tr>";
                                print "<th></th>"; 
                                print "<th>Total Commission</th>"; 
                                 //broker fee
                                         $query5="SELECT SUM(brokercommission) from broker";
                                            $result5= $conn->query($query5);                                   
                                                  if(!($result5))
                                                {
                                                echo"<p>Sorry but there seem to be no entry</p>" ; 
                                                }
                                              else {  
                                                if($result5->num_rows>0){
                                                  while($row5=$result5->fetch_assoc()) {
                                                    $broker= $row5["SUM(brokercommission)"];
                                                  }
                                                }
                                                else { echo "0 results fetched"; }
                                                    }

                                print "<th>"; print number_format($broker);  print "</th>"; 
                                print "<th></th>"; 
                                print "<th>Total Selling Price</th>"; 
                                //total selling price
                                  $query6="SELECT SUM(sellingprice) from soldcars";
                                            $result6= $conn->query($query6);                                   
                                                  if(!($result6))
                                                {
                                                echo"<p>Sorry but there seem to be no entry</p>" ; 
                                                }
                                              else {  
                                                if($result6->num_rows>0){
                                                  while($row6=$result6->fetch_assoc()) {
                                                    $sp= $row6["SUM(sellingprice)"];
                                                  }
                                                }
                                                else { echo "0 results fetched"; }
                                                    }
                                print "<th>"; print number_format($sp); print "</th>"; 
                                print "</tr>";


                            }

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