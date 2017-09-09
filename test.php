<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pie Chart Demo (LibChart)- https://codeofaninja.com/</title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
 
<?php
    //include the library
    include "libchart/libchart/classes/libchart.php";
 
    //new pie chart instance
    $chart = new PieChart( 500, 300 );
 
    //data set instance
    $dataSet = new XYDataSet();
    
    //actual data
    //get data from the database
    
    //include database connection
    include 'dbconnect.php';
 
    //query all records from the database
    $query = "SELECT chasis, sum(amountpaid) from installments GROUP BY chasis ORDER by datepaid DESC";
 
    //execute the query
    $result = $conn->query( $query );
 
    //get number of rows returned
    $num_results = $result->num_rows;
 
    if( $num_results > 0){
    
        while( $row = $result->fetch_assoc() ){
            extract($row);
            $dataSet->addPoint(new Point("{$name} {$ratings})", $ratings));
        }
    
        //finalize dataset
        $chart->setDataSet($dataSet);
 
        //set chart title
        $chart->setTitle("Tiobe Top Programming Languages for June 2012");
        
        //render as an image and store under "generated" folder
        $chart->render("generated/1.png");
    
        //pull the generated chart where it was stored
        echo "<img alt='Pie chart' style='border: 1px solid gray;'/>";
    
    }else{
        echo "No programming languages found in the database.";
    }
?>
 
</body>
</html>