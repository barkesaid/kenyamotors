<!doctype html>
<html>
<head> 
<title>Login</title> 
</head>
<?php 
require("dbconnect.php");
// require_once ('lheader.html');
extract($_POST);
$username = ($_POST['username']);
$password = ($_POST['password']);

    if(!empty($username) && !empty($password)){
      $query="SELECT pass FROM login WHERE username='$username'";
      $result= $conn->query($query);
      if(($result)){ 
        $row=$result->fetch_row();
        if(trim($row[0])==trim($password)){
          //echo "password valid!";
          $query1="SELECT privilege FROM login WHERE username='$username'";
          $result1= $conn->query($query1);
              if(($result1)){
              $row1=$result1->fetch_row() ;
              switch( $row1[0] ){
                case 0:
                     header('Location:http://localhost/kenyamotors/homeadmin.php');
                     break;

                     case 1:
                     header('Location:http://localhost/kenyamotors/homesecretary.php');
                     break;

                     case 2:
                     header('Location:http://localhost/kenyamotors/homeaccountant.php');
                     break;

                     case 3:
                     header('Location:http://localhost/kenyamotors/homemanager.php');
                     break;
               
          }//end of switch
      }//end of if
                       else {  echo "" .$conn->error;   }
                    }
                         else {  
                          // echo "<h3><strong>Wrong password/username combination</strong></h3>";   
                          header('Location:http://localhost/kenyamotors/wrongpassword.php');   
                            }
                                }
                          else {    echo "" .$conn->error;   }
                         }
                                 else{   echo "<h3>Enter you username and password to proceed</h3>" ;    }
                              ?>

    
</html>