<!-- monthly installments received -->
<!DOCTYPE html>
<html lang="en">
<head>
 <?php
    require_once ('sheader.html');
  ?>
     <title>Montly Installments</title>
</head>
<body>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Montly Installments Received </span>
            </h1>
           <!--   <p class="title-bar-description"> Vehicles available for sale </p> -->
          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                <div class="card-body">
                  <!-- <table id="demo-datatables-buttons-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%"> -->
                    <table id="demo-datatables-buttons-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                    <thead>
                      <tr>
                        <th>Registration No</th>
                        <th>Vehicle Name</th>
                        <th>Amount </th>
                        <th>Reference</th>
                        <th>Duty Paid</th>
                        <!-- <th>Action</th> -->
                      </tr>
                    </thead>
                    <tfoot>
                       <button style="float: right;" onclick="window.print()"> Print This </button> <br>
                       <br>
                    </tfoot>

                       <tbody>

                    <!-- start test -->
                     <?php
                    require("dbconnect.php");
                    $query="SELECT soldcars.chasis,vehicles.vname,vehicles.regno,installments.amountpaid,installments.datepaid, installments.reference FROM soldcars JOIN installments ON installments.chasis= soldcars.chasis JOIN vehicles ON soldcars.chasis= vehicles.chasis WHERE MONTH(installments.datepaid) = MONTH(NOW()) ORDER BY installments.datepaid DESC ";
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
                                $value=$row["chasis"];
                                print "<tr>";
                                print "<td>"; print $row["regno"]; print "</td>" ;
                                print "<td>"; print $row["vname"]; print "</td>" ;
                                print "<td>"; print  number_format($row["amountpaid"]); print "</td>" ;
                                print "<td>"; print $row["datepaid"]; print "</td>" ;
                                print "<td>"; print $row["reference"]; print "</td>" ;
                                

                                // print "<td><a href='viewastock.php?editvalue1=$editvalue1'><span class='label label-outline-success'>View</span></a></td>";
                               print "</tr>";

                              }
                                 //start test
                               //  print "<tr>"; 
                               //  print "<th></th>";
                               //  print "<th></th>";
                               //  print "<th></th>";                                
                               //  print "<th>Total Duty Paid</th>"; 
                               //         $query5="SELECT sum(vehicles.duty) FROM vehicles LEFT JOIN soldcars ON vehicles.chasis=soldcars.chasis WHERE soldcars.chasis IS NULL ORDER BY vehicles.datein DESC";
                               //          $result5= $conn->query($query5);                                   
                               //                if(!($result5))
                               //              {
                               //              echo"<p>Sorry but there seem to be no entry</p>" ; 
                               //              }
                               //            else {  
                               //              if($result5->num_rows>0){
                               //                while($row5=$result5->fetch_assoc()) {
                               //                  $dutypaid= $row5["sum(vehicles.duty)"];
                               //                }
                               //              }
                               //              else { echo "0 results fetched"; }
                               //                  }

                               //    print "<th>"; print number_format($dutypaid);  print "</th>";   print "</tr>";



                               // //end test
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