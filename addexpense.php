<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
  <title>Add Expense</title>    
          <script type="text/javascript">
    function sayHello() {
    alert("The new record has been saved!")
    }
  </script>
</head>
<body>
 <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Add New Expense</span> <br>
            </h1>    <br>
            <!-- this is a test -->
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="postexpense.php" method="POST" autocomplete="off">
                  <div class="form-group">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date Incurred</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="edate" placeholder="" required>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Amount</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="amount" placeholder="3000" required>
                    </div>
                  </div> <br>              

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Details/Particulars </label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="details" placeholder="File Purchase....." required></textarea>
                    </div>
                  </div> <br>

                  </div>
                
                <div style="padding-left:760px">                 
                <input type="submit" name="submit"  onclick="sayHello()" value="Save">               
                </div>

                  </form>
                  </div>
                  </div>
                  </div>
                  </div>

            <!-- end of test -->
            </div>
          </div>   
          </div>
</body>
</html>