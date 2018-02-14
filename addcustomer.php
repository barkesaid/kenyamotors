<!-- add a new vehcile -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
  <title>Customer Request</title>
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
              <span class="d-ib" style="position: center">Add Customer Request</span>
            </h1>    <br>
            <!-- this is a test -->
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="postcustomer.php" method="POST" autocomplete="off">
                  <div class="form-group">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">National Id No </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="idno" placeholder="Eg 3178..." maxlength="8" required>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Customer Names</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="cname" placeholder="John Doe" required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3"> Phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="phoneno" value="7" maxlength="9" required >
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Alternative Phone Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="altphone" value="7" maxlength="9">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Email Address</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="email" name="email" placeholder="someone@......">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Postal Address </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="paddr" placeholder="47540-00100">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Town </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="town" placeholder="Nairobi">
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Request/Other Information</label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="otherinfo" placeholder="The customer wanted to purchase....."></textarea>
                    </div>
                  </div> <br>

                  </div>
                
                <div style="padding-left:760px">                 
                <input type="submit" name="submit" onclick="sayHello()" value="Save">               
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