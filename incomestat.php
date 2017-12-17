<!-- broker reports -->
<!DOCTYPE html>
<html lang="en">
<head>
 <?php
    require_once ('sheader.html');
     require_once("dbconnect.php");
  ?>
     <title>Income Report</title>
</head>
<body>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Income Statement</span>
            </h1>
             <p class="title-bar-description"></p>

          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
             <div class="card-body">
                    <table id="demo-datatables-buttons-2" class="table table-bordered table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>

                    <tr>
                  <!--   <th style=" text-align: center;">Income Statement</th> -->
                    </tr>

                      <tr>
                        <th>Deposit from motor vehicle sales</th>
    
                    <?php
                    // deposit from Selling vehicles 
                    $query="SELECT SUM(deposit) from soldcars";
                        $result= $conn->query($query);                                   
                              if(!($result))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {   
                            if($result->num_rows>0){
                              while($row=$result->fetch_assoc()) {
                                $deposit= $row["SUM(deposit)"];
                             print "<th>"; print number_format($row["SUM(deposit)"]);print "</th>";  print "</tr>";
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                }
                    // other cash received
                    print "<tr>";
                    print "<th>Third party payments</th>";  
                     $query1="SELECT SUM(amount) from addcash";
                        $result1= $conn->query($query1);                                   
                              if(!($result1))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {  
                            if($result1->num_rows>0){
                              while($row1=$result1->fetch_assoc()) {
                               $othercash= $row1["SUM(amount)"];
                             print "<th>"; print number_format($row1["SUM(amount)"]);print "</th>"; print "</tr>";
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                }  

                // installments received
                    print "<tr>";
                    print "<th>Installments paid for sold motor vehicles</th>";  
                     $query3="SELECT SUM(amountpaid) from installments";
                        $result3= $conn->query($query3);                                   
                              if(!($result3))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {  
                            if($result3->num_rows>0){
                              while($row3=$result3->fetch_assoc()) {
                                $amountpaid= $row3["SUM(amountpaid)"];
                             print "<th>"; print number_format($row3["SUM(amountpaid)"]);print "</th>"; print "</tr>";
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                } 

              //cash receivables
                        
                   print "<tr>";
                    print "<th>Account Receivables (Hire purchase balances)</th>";  

                    //select all balances from MV 
                     $query7="SELECT SUM(balance) from soldcars";
                        $result7= $conn->query($query7);                                   
                              if(!($result7))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {  
                            if($result7->num_rows>0){
                              while($row7=$result7->fetch_assoc()) {
                                $balance= $row7["SUM(balance)"];

                              }
                              $receivables = $balance - $amountpaid;
                             print "<th>"; print number_format($receivables);print "</th>"; print "</tr>";
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                } 


                //total for revenue 
                  print "<tr>";
                    print "<th style='text-align:center;'> Total Income </th>"; 
                    $sum =  $othercash + $amountpaid + $deposit +$receivables;
                  print "<th>"; print number_format($sum);print "</th>"; print "</tr>";

                    //space- empty row
                    // print "<tr>";
                    // print "<th><br></th>"; 
                    // print "</tr>";

                 //expenses incurred 
                    print "<tr>";
                    print "<th>Expenses Incurred</th>";
                     $query2="SELECT SUM(amount) from expenses";
                        $result2= $conn->query($query2);                                   
                              if(!($result2))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {  
                            if($result2->num_rows>0){
                              while($row2=$result2->fetch_assoc()) {
                                $expenses= $row2["SUM(amount)"];
                             print "<th>"; print number_format($row2["SUM(amount)"]);print "</th>"; 
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                }  

                  // other cash given out 
                              
                    print "<tr>";
                    print "<th>Third Party Lendings</th>";
                     $query4="SELECT SUM(amount) from givecash";
                        $result4= $conn->query($query4);                                   
                              if(!($result4))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {  
                            if($result4->num_rows>0){
                              while($row4=$result4->fetch_assoc()) {
                                $givecash= $row4["SUM(amount)"];
                             print "<th>"; print number_format($row4["SUM(amount)"]);print "</th>"; 
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                }
                             

                  //broker fee
                    print "<tr>";
                    print "<th>Broker expenses and commission</th>";
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
                             print "<th>"; print number_format($row5["SUM(brokercommission)"]);print "</th>"; 
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                }

                  //duty
                    print "<tr>";
                    print "<th>Duty paid for motor vehicles </th>";
                     $query6="SELECT SUM(duty) from vehicles";
                        $result6= $conn->query($query6);                                   
                              if(!($result6))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {  
                            if($result6->num_rows>0){
                              while($row6=$result6->fetch_assoc()) {
                                $duty= $row6["SUM(duty)"];
                             print "<th>"; print number_format($row6["SUM(duty)"]);print "</th>"; 
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                }


                  //other expenses
                    print "<tr>";
                    print "<th>Other motor vehicle expenses paid </th>";
                     $query8="SELECT SUM(otherexpenses) from vehicles";
                        $result8= $conn->query($query8);                                   
                              if(!($result8))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {  
                            if($result8->num_rows>0){
                              while($row8=$result8->fetch_assoc()) {
                                $duty= $row8["SUM(otherexpenses)"];
                             print "<th>"; print number_format($row8["SUM(otherexpenses)"]);print "</th>"; 
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                }

                      //costing 
                    print "<tr>";
                    print "<th>Vehicle costing fee </th>";
                     $query9="SELECT SUM(costing)*101 from vehicles";
                        $result9= $conn->query($query9);                                   
                              if(!($result9))
                            {
                            echo"<p>Sorry but there seem to be no entry</p>" ; 
                            }
                          else {  
                            if($result9->num_rows>0){
                              while($row9=$result9->fetch_assoc()) {
                                $costing= $row9["SUM(costing)*101"];
                             print "<th>"; print number_format($row9["SUM(costing)*101"]);print "</th>"; 
                              }
                              
                            }
                            else {
                              echo "0 results fetched";
                            }
                                } 



                      //total for expenses 
                      print "<tr>";
                        print "<th style='text-align:center;'> Total Expenses</th>"; 
                        $sum1 =  $expenses + $broker + $duty + $costing;
                      print "<th>"; print number_format($sum1);print "</th>"; print "</tr>";



                       //space- empty row
                    print "<tr>";
                    print "<th><br></th>"; 
                    print "</tr>";


                            //total for expenses 
                      print "<tr>";
                      print "<th style='text-align:center;'>Profit before tax</th>"; 
                      $res =  $sum - $sum1;
                      print "<th>"; print number_format($res);print "</th>"; print "</tr>";
                             
                                     ?>

</tr>
                  </thead>
         </table>
                
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