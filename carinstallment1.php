<!-- view installment history -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html'); 
    require("dbconnect.php"); 
    extract($_POST);
    $chasis=$_POST["chasis"];
?>
  <title>Payment History</title>
</head>
<body>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h2 class="title-bar-title">
              <span class="d-ib">Vehicle Installment History </span>
            </h2>
             <p class="title-bar-description">
            <!--   <small>Customers who purchased vehicles</small> -->
            </p>

          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                <div class="card-body">
                        <!-- insert the vehicle details here before displaying the table -->
                        <!--   <div class="row gutter-xs">
                      <div class="col-xs-12">
                        <div class="card">
                       <div class="card-body"> -->
                              <table id="demo-datatables-buttons-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <!-- vehicle name -->
                                  <th>Vehicle Name </th>
            
                              <?php
                              $query="SELECT vname from vehicles WHERE chasis='$chasis'";
                                  $result= $conn->query($query);                                   
                                        if(!($result))
                                      {
                                      echo"<p>Sorry but there seem to be no entry</p>" ; 
                                      }
                                    else {   
                                      if($result->num_rows>0){
                                        while($row=$result->fetch_assoc()) {
                                          $deposit= $row["vname"];
                                       print "<th>"; print $row["vname"]; print "</th>";  print "</tr>";
                                        }
                                        
                                      }
                                      else {
                                        echo "0 results fetched";
                                      }
                                          }

                              // vehicle chasis number
                                    print "<tr>";
                                    print "<th>Vehicle Chasis Number</th>"; 

                                         print "<th>"; print $chasis; print "</th>"; print "</tr>"; 


                                     // Date vehicle purchased
                                    print "<tr>";
                                    print "<th>Date Vehicle Sold</th>";  
                                     $query1="SELECT datesold, sellingprice,deposit,balance,duedate from soldcars WHERE chasis ='$chasis'";
                                        $result1= $conn->query($query1);                                   
                                              if(!($result1))
                                            {
                                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                                            }
                                          else {  
                                            if($result1->num_rows>0){
                                              while($row1=$result1->fetch_assoc()) {
                                               $datesold= $row1["datesold"];
                                               $sellingprice= $row1["sellingprice"];
                                               $deposit= $row1["deposit"];
                                               $duedate= $row1["duedate"];
                                               $balance= $row1["balance"];

                                              
                                             print "<th>"; print $datesold ;print "</th>"; print "</tr>";
                                              }
                                              
                                            }
                                            else {
                                              echo "0 results fetched";
                                            }
                                                } 

                                                // Client name and phone number 
                                              print "<tr>";
                                              print "<th>Client Name and Contact</th>";  
                                               $query1="SELECT client_idno FROM soldcars where chasis='$chasis'";
                                                $result1= $conn->query($query1);                                   
                                                        if(!($result1))
                                                      {
                                                      echo"<p>Sorry but there seem to be no entry</p>" ; 
                                                      }
                                                    else {  
                                                      if($result1->num_rows>0){
                                                        while($row1=$result1->fetch_assoc()) {
                                                         $client_idno= $row1["client_idno"];
                                                       }
                                                     }

                                                       else {
                                                        echo "0 results fetched";
                                                      }
                                                         //now fetch the phone number
                                                         $query2="SELECT phoneno FROM customer where idno=$client_idno" ;
                                                           $result2= $conn->query($query2);                                   
                                                        if(!($result2)){
                                                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                                                            }
                                                        else {  
                                                          if($result2->num_rows>0){
                                                            while($row2=$result2->fetch_assoc()) {
                                                             $phoneno= $row2["phoneno"];
                                                           }
                                                         }
                                                         else {
                                                            echo "0 results fetched";
                                                          }
                                                        }

                                                        //fetch client name
                                                         $query3="SELECT cname FROM customer where idno=$client_idno" ;
                                                           $result3= $conn->query($query3);                                   
                                                        if(!($result3)){
                                                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                                                            }
                                                        else {  
                                                          if($result3->num_rows>0){
                                                            while($row3=$result3->fetch_assoc()) {
                                                             $cname= $row3["cname"];
                                                           }
                                                         }
                                                         else {
                                                            echo "0 results fetched";
                                                          }

                                                       print "<th>"; print $cname; print " , "; print $phoneno; print "</th>"; print "</tr>";
                                                        }

                                                        
                                                      }

                                            // vehicle selling price
                                                 print "<tr>";
                                    print "<th>Vehicle Selling Price </th>";  
                                      print "<th>"; print number_format($sellingprice); print "</th>"; print "</tr>";  


                                                //vehicle deposit
                                          print "<tr>";
                                          print "<th>Vehicle Deposit Paid </th>"; 
                                            print "<th>"; print number_format($deposit); print "</th>"; print "</tr>"; 

                                                //vehicle balance 
                                                 print "<tr>";
                                                 print "<th>Vehicle Remaining Balance </th>"; 
                                             print "<th>"; print number_format($balance); print "</th>"; print "</tr>"; 

                                                //agreed due date
                                                 print "<tr>";
                                                 print "<th>Agreed Due Date</th>"; 
                                                 $formatdate=date_create($duedate);
                                                 $printdate= date_format($formatdate,"d"); 

                                               print "<th>"; print $printdate; print " of every month";  print "</th>"; print "</tr>"; 


                                      ?>
                    <tfoot>
                       <button style="float: right;" onclick="window.print()"> Print This </button> <br>
                       <br>
                    </tfoot>
                                          

                        <h3> Vehicle Information </h3>



                        <!-- end of vehicle details -->
             
                      <table id="demo-datatables-buttons-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Date Paid</th>
                        <th>Amount Paid</th>
                        <th>Reference</th>                    
                      </tr>
                    </thead>

     <h3> Installment Payment History </h3>

                     <?php
                    require("dbconnect.php");
                    $query="SELECT datepaid , amountpaid, reference FROM installments where chasis ='$chasis' ORDER by datepaid DESC ";
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
                                // $value=$row["id"];
                                print "<tr>";
                                print "<td>"; print $row["datepaid"]; print "</td>" ;
                                print "<td>"; print $row["amountpaid"]; print "</td>" ;
                                print "<td>"; print $row["reference"]; print "</td>" ;
                               print "</tr>";

                              }
                            }
                            else {
                              echo "0 results fetched";
                            }
                                }

 //start test 
                                //total row
                                  print "<tr>"; 
                                  print "<th>Total Amount Paid</th>"; 
                                       $query5="SELECT SUM(amountpaid) from installments where chasis ='$chasis' ";
                                        $result5= $conn->query($query5);                                   
                                              if(!($result5))
                                            {
                                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                                            }
                                          else {  
                                            if($result5->num_rows>0){
                                              while($row5=$result5->fetch_assoc()) {
                                                $sumamount= $row5["SUM(amountpaid)"];
                                              }
                                            }
                                            else { echo "0 results fetched"; }
                                                }

                                  print "<th>"; print number_format($sumamount);  print "</th>";   print "</tr>";

                                  //start empty row
                                  print "<tr>";
                                  print "<th></th>"; 
                                  print "<th></th>"; 
                                  print "<th></th>"; 
                                  print "</tr>";
                                    //end empty row

                                  print "<tr>";
                                  // print "<th></th>"; 
                                  print "<th>Remaining Balance as of Now </th>"; 
                                  
                                  $remainingbalance = $balance - $sumamount;


                                  print "<th>"; print number_format($remainingbalance); print "</th>"; 
                                  print "</tr>";


 //end test







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