<!-- cash received reports -->
<!DOCTYPE html>
<html lang="en">
<head>
 <?php
    require_once ('sheader.html');
  ?>
     <title>Cash Received Report</title>
</head>
<body>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Cash Received Report</span>
            </h1>
                <p class="title-bar-description"> (Cash received from third parties)</p>

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
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Details </th>
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
                    $query="SELECT * FROM addcash ORDER BY cdate DESC";
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
                                print "<tr>";
                                print "<td>"; print $row["cdate"]; print "</td>" ;
                                print "<td>"; print number_format($row["amount"]); print "</td>" ;
                                print "<td>"; print $row["details"]; print "</td>" ; 
                                // $editvalue1=$value;    

                                // print "<td><a href='viewasale.php?editvalue1=$editvalue1'><span class='label label-outline-success'>View</span></a></td>";
                               // print "</tr>";


                              }
                            }
                          }

                                //total row
                                print "<tr>";
                                print "<th>Total amount</th>"; 
                                 //broker fee
                                         $query5="SELECT SUM(amount) from addcash";
                                            $result5= $conn->query($query5);                                   
                                                  if(!($result5))
                                                {
                                                echo"<p>Sorry but there seem to be no entry</p>" ; 
                                                }
                                              else {  
                                                if($result5->num_rows>0){
                                                  while($row5=$result5->fetch_assoc()) {
                                                    $cashreceived= $row5["SUM(amount)"];
                                                  }
                                                }
                                                else { echo "0 results fetched"; }
                                                    }

                                print "<th>"; print number_format($cashreceived);  print "</th>";
                                print "<th></th>"; 
                                print "</tr>";


                             
                                     ?>              
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