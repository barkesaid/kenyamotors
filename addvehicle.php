<!-- add a new vehcile -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
  <title>Add Vehile</title>
</head>
<body>
  <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">           
            <h1 class="title-bar-title">
              <span class="d-ib" style="position: center">Add New Vehicle</span>
            </h1>    <br>
            <!-- this is a test -->
            </div>
            <div class="row">
            <div class="col-md-9">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal" action="postvehicle.php" method="POST">
                  <div class="form-group">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Car Name </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="vname" placeholder="Car Name">
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Chasis Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="chasis" placeholder="Chasis Number">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Registration Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="regno" placeholder="Registration Number">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Color </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="color" placeholder="Color">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date in</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="datein" placeholder="Date in">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Bill of Landing  </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="bl" placeholder="Bill of Landing">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Duty Paid </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="duty" placeholder="Duty Paid">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Car Costing</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="costing" placeholder="Car Costing">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Other Expenses </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="otherexpenses" placeholder="Other Expenses">
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Details of Other Expenses</label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="details"></textarea>
                    </div>
                  </div> <br>

                    <!-- <div class="form-group"> -->
                  </div>
                
                <div style="padding-left:760px">                 
                <input type="submit" name="submit" value="Save">               
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