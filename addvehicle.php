<!-- add a new vehicle -->
<!DOCTYPE html>
<html>
<head>
 <?php
    require_once ('sheader.html');
  ?>
  <title>Add Vehicle</title>
    <script type="text/javascript">
    function sayHello() {
    alert("New Vehicle have been saved!")
    }
</script>
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
                <form class="form form-horizontal" action="postvehicle.php" method="POST" autocomplete="off">
                  <div class="form-group">
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Car Name </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="vname" placeholder="Toyota Prado" autofocus="on" required>
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Chasis Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="chasis" placeholder="WDD..." required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Registration Number </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="regno" placeholder="KCA785K" required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Color </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="color" placeholder="red" required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Date in</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="date" name="datein" placeholder="8/8/2014" required>
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Bill of Landing </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="bl" placeholder="Morning Glory 087" >
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Duty Paid </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="duty" placeholder="478000">
                    </div>
                  </div> <br>

                     <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Car Costing(USD)</label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="costing" placeholder="In dollars eg 4200">
                    </div>
                  </div> <br>

                   <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-3">Other Expenses </label>
                    <div class="col-sm-9">
                      <input id="form-control-3" class="form-control" type="text" name="otherexpenses" placeholder="78000">
                    </div>
                  </div> <br>

                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-8">Details of Other Expenses</label>
                    <div class="col-sm-9">
                      <textarea id="form-control-8" class="form-control" rows="3" name="details" placeholder="clearing charges=40000, ....."></textarea>
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