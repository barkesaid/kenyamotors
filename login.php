<html>
<head>
 <?php
    require_once ('lheader.html');
  ?>
  <title>Login</title>
</head>
<body> 
<div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title"><br>
              <span class="d-ib" style="position: center">Login</span>
            </h1>         
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="login1.php" method="POST">
                  <div class="form-group">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Username </label> 
                    <div class="col-sm-9"> 
                    <input id="form-control-3" class="form-control" type="text" name="username">                   
                     </div>
                  </div> <br>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Password </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="password" name="password" />
                    </div>
                  </div> <br>
                  	<div style="padding-left: 800px"><input type="submit" name="submit" value="Login"></div>          			
                  </div>
                  </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>

</body>
</html>