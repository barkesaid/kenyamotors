<!DOCTYPE html>
<html>
<head>
 <?php
  ?>
     <title>Generate Report</title>
</head>
<body>
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib"> Generate Report</span>
            </h1>
            <p class="title-bar-description">
              <small>Click on a button to generate that report</small>
            </p>
          </div>

          <div class="row gutter-xs">
    	 <div class="col-xs-6 col-md-3">
    	 <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Sales Report</h5>
                <p>
                  <small class="text-muted">Sales made so far</small>
                </p>
               <a href="salesreport.php"><button class="btn btn-outline-primary" type="button">Sales Report</button></a> 
          </div> 
          </div>

          	 <div class="col-xs-6 col-md-3">
          	 <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Monthly Expenses</h5>
                <p>
                  <small class="text-muted">Cash spent for daily operations</small>
                </p>
                <a href="expensesreport.php"><button class="btn btn-outline-primary" type="button">Expenses Report </button></a>
          </div>
          </div>
          
          <!-- not necessary for now -->
        <!--   	 <div class="col-xs-6 col-md-3">
          	 <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Daily Accounts Summary</h5>
                <p>
                  <small class="text-muted">Expenses and income of the day</small>
                </p>
              <a href=""><button class="btn btn-outline-primary" type="button">Accounts Summary</button></a>
          </div>
          </div> -->

          	 <div class="col-xs-6 col-md-3">
          	 <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Stock Available</h5>
                <p>
                  <small class="text-muted">Stock Available</small>
                </p>
                <a href="stock.php"><button class="btn btn-outline-primary" type="button"> Stock Report</button></a>
          </div>
          </div>

          	 <div class="col-xs-6 col-md-3">
          	 <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Car Costing Report</h5>
                <p>
                  <small class="text-muted">Costing for the vehicles imported</small>
                </p>
               <a href="costingreport.php"> <button class="btn btn-outline-primary" type="button">Costing Report</button></a>
          </div>
          </div>

          	<div class="col-xs-6 col-md-3">
          	<div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Customer Report</h5>
                <p>
                  <small class="text-muted">Customers who have purchased Vehicles</small>
                </p>
                <a href="customerreport.php"><button class="btn btn-outline-primary" type="button">Customer Report</button></a>
          </div>
          </div>

           <div class="col-xs-6 col-md-3">
             <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Customer Requests</h5>
                <p>
                  <small class="text-muted">Other customers and their requests</small>
                </p>
                <a href="othercustomersreport.php"><button class="btn btn-outline-primary" type="button">Customer Requests</button></a>
          </div>
          </div>



          <div class="col-xs-6 col-md-3">
          	 <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Broker Statement</h5>
                <p>
                  <small class="text-muted">Broker expenses and their payments</small>
                </p>
               <a href="brokerreport.php"> <button class="btn btn-outline-primary" type="button">Broker Report</button></a>
          </div>
          </div>

 			 <div class="col-xs-6 col-md-3">
 	         	 <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Income Statement</h5>
                <p>
                  <small class="text-muted">Income Statement</small>
                </p>
                <a href="incomestat.php"><button class="btn btn-outline-primary" type="button">Income Report</button></a>
          </div>
          </div>

             <div class="col-xs-6 col-md-3">
             <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Cash Given Out</h5>
                <p>
                  <small class="text-muted">History for all the cash given out</small>
                </p>
                <a href="cashoutreport.php"><button class="btn btn-outline-primary" type="button">Cash Out</button></a>
          </div>
          </div>

             <div class="col-xs-6 col-md-3">
             <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Cash Received</h5>
                <p>
                  <small class="text-muted">Statement for all the cash received.</small>
                </p>
                <a href="cashreceived.php"><button class="btn btn-outline-primary" type="button">Cash Received</button></a>
          </div>
          </div>

              <!-- too vague to have it because I have combined MV expenses into other exoenses -->
           <!--   <div class="col-xs-6 col-md-3">
             <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Motor Vehicle Expenses</h5>
                <p>
                  <small class="text-muted">View Motor vehicle expenses</small>
                </p>
                <a href=""><button class="btn btn-outline-primary" type="button">Expenses</button></a>
          </div>
          </div> 

             <div class="col-xs-6 col-md-3">
             <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Installment Payment</h5>
                <p>
                  <small class="text-muted">Income Statement</small>
                </p>
                <a href=""><button class="btn btn-outline-primary" type="button">Income</button></a>
          </div>
          </div> -->


             <div class="col-xs-6 col-md-3">
             <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Car Installment</h5>
                <p>
                  <small class="text-muted">View a car installment history</small>
                </p>
                <a href="carinstallment.php"><button class="btn btn-outline-primary" type="button">Installment Report</button></a>
          </div>
          </div>

          <!-- start test -->
            <div class="col-xs-6 col-md-3">
             <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>Monthly Installment</h5>
                <p>
                  <small class="text-muted">Monthly Installments Received </small>
                </p>
                <a href="monthlyinstallments.php"><button class="btn btn-outline-primary" type="button">Monthly Installment</button></a>
          </div>
          </div>


          <div class="col-xs-6 col-md-3">
             <div class="panel panel-body text-center" data-toggle="match-height">
                <h5>All Installment</h5>
                <p>
                  <small class="text-muted">All Installments Received </small>
                </p>
                <a href="allinstallments.php"><button class="btn btn-outline-primary" type="button">All Installment</button></a>
          </div>
          </div>

          <!-- end test -->

</div>
            
</body>
</html>