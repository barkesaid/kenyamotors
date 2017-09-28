<!-- dselect and display all vehicles for the user to select and edit -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
   <title>Display Vehicles</title>
</head>
<body>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Edit Vehicle</span>
            </h1><br>
            <p class="title-bar-description">
              <small>Select a Vehicle to Edit/Update</small>
            </p>
          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>All Vehicles</strong>
                </div>
                    <!-- start test   -->
                    <?php
                    require("dbconnect.php");
                    $query="SELECT vname,regno,chasis FROM vehicles ORDER BY datein DESC" ;
                        $result= $conn->query($query);
                        echo "<div class='card-body'>"; 
                            print "<table id='demo-datatables-1' class='table table-striped table-nowrap dataTable' cellspacing='0' width='100%''>";
                            print "<thead >" ;   
                            print "<tr>";
                            print "<th>Car Name</th>" ; 
                            print "<th>Registration Number</th>" ; 
                            print "<th>Chasis Number</th>" ;  
                            print "<th>Action</th>";
                            print "</tr>"; 
                            print "</thead>" ; 
                              
                            print "<tfoot>";
                            print "<tr>";
                            print "<th>Car Name</th>" ; 
                            print "<th>Registration Number</th>" ; 
                            print "<th>Chasis Number</th>" ; 
                            print "<th>Action</th>";
                            print "</tr>"; 
                            print "</tfoot>";

                              if(!($result))
                            {
                            echo"<p>Sorry but there seem to be no cars</p>" ; 
                            }
                          else
                            { 
                            print "<tbody>" ; 
                            for($i =0 ; $row = $result->fetch_row() ; $i++ )
                            {      
                                print "<tr>" ;                          
                              foreach($row as $key => $value)
                              {                                                                                           
                                
                                print "<td>$value</td>"; 
                              }
                               
                             $editvalue1=$value;                              
                             print "<td><a href='editvehicle.php?editvalue1=$editvalue1'><span class='label label-outline-success'>Edit</span></a></td>";
                            print "</tr>" ;
                            }
                            print "</tbody>" ;                          
                            }
                            print "</table>";
                                      ?>
                    <!-- end test -->
                </div>
              </div>
            </div>
          </div>
          </div>
<!-- end of test -->
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
</html>