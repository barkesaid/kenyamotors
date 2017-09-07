<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('mheader.html');
  ?>
  <title>Add Cash</title>

        <script type="text/javascript">
    function sayHello() {
    alert("Your input have been saved!")
    }
</script>
</head>
<body>
 <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Add Cash Received</span> <br>
            </h1>    <br>
            <!-- this is a test -->
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="postcashreceived.php" method="POST" autocomplete="off">
                  <div class="form-group">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date Received</label>
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
                      <textarea id="form-control-8" class="form-control" rows="3" name="details" placeholder="Repayment for....." required></textarea>
                    </div>
                  </div> <br>

                  </div>
                
                <div style="padding-left:760px">                 
                <input type="submit" name="submit" value="Save" onclick="sayHello()">                
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