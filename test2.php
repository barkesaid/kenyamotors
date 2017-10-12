<!DOCTYPE html>
<html lang="en">
<head>
   <?php  
         require("dbconnect.php"); 
         $result ="SELECT chasis, sum(amountpaid) from installments GROUP BY chasis ORDER by datepaid DESC";
        // $result1= $conn->query($query1);                                                  
        // while ($row1 = $result1->fetch_assoc()){                               
        // $amountpaid = $row1['sum(amountpaid)']; 
        // $chasis = $row1['chasis'];  -->
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Chasis', 'Paid'], 
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['chasis']."', ".$row['sum(amountpaid']."],";
          }
      }
      ?>
    ]);
    
    var options = {
        title: 'installments paid by cars',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
</head>
<body>
    <!-- Display the pie chart -->
    <div id="piechart"></div>
</body>
</html>



 



