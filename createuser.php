<!-- add a new vehcile -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('adminheader.html');
  ?>
  <title>Create User</title>
  <script type="text/javascript">
    function sayHello() {
    alert("The new user has been created!")
    }
  </script>
</head>
<body>
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Add New User</span>
            </h1>    <br>
            <!-- this is a test -->
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="postnewuser.php" method="POST" autocomplete="off">
                  <div class="form-group">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Username </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="username" placeholder="Eg newuser73729" maxlength="8" required>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Password</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="password" required>
                    </div>
                  </div> <br>

                  </div>
                
                <div style="padding-left:760px">                 
                <input type="submit" name="submit" onclick="sayHello()" value="Create">               
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