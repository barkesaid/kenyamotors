<!-- display  particular user and edit  -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('adminheader.html');
  ?>
   <title>Edit User</title>
    <script type="text/javascript">
    function sayHello() {
    alert("User updated successfully!!")
    }
</script>
</head>
<body>
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Update User</span>
            </h1>    <br>
             <p class="title-bar-description">
              <small>Use Privilege 4  for user not to access the system</small>
            </p>
             </div>
 <?php 
require("dbconnect.php");
extract($_GET);

$idtoedit=$_GET["editvalue1"]; 

$query="SELECT * FROM login WHERE id='$idtoedit'";
$result=$conn->query($query);
if(!$result){

  echo "".$conn->error;
  
}

 else {
// $result=$mysqli->query( "SELECT * FROM customer WHERE idno='$idtoedit'");
while ($rows= $result->fetch_assoc())
  { 
    $username= $rows['username']; 
    $pass=$rows['pass']; 
    $privilege=$rows['privilege']; 
    $id =$rows['id']; 
  
}
}
?>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                               <form class="form form-horizontal" action="updateuser.php" method="POST" autocomplete="off">
                  <div class="form-group">
                  <!-- <div class="form-group"> -->
                   <!--  <label class="col-sm-3 control-label" for="form-control-3">National Id No </label>
                    <div class="col-sm-9"> -->
                      <input id="form-control-3" class="form-control" type="hidden" name="id" value="<?php echo $id ?>"  required>
                    <!-- </div> -->
                <!--   </div> <br> -->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Username</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="username" value="<?php echo $username ?>" required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3"> Password </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="pass" value="<?php echo $pass ?>" required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Privilege </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="privilege" value="<?php echo $privilege ?>">
                    </div>
                  </div> <br>

                  </div>          
                <div style="padding-left:760px">                 
                <input type="submit" name="submit" onclick="sayHello()" value="Update">               
                </div>

                  </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
</body>
</html>