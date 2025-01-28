<?php
require('session.php');
require("class/DBController.php");
$db = new DBController;
$conn = $db->connectDB();

if (isset($_POST['btnlogin'])) {


  $uname = $_POST['uname'];
  $upass = $_POST['password'];
  

  
if ($upass == '' || $uname==''){ $error = "Something is missing";
     ?>    <script type="text/javascript">
                //alert("Something is missing!");
                window.location = "web/login.php?error=<?php echo $error;?>";
                </script>
        <?php
}
else{
//create some sql statement             
        $sql = "SELECT * FROM  tbluser WHERE  uname =  '" . $uname . "' AND  upass =  '" . $upass . "'";
        $result = mysqli_query($conn, $sql);

        if ($result){
             //get the number of results based n the sql statement
        $numrows = mysqli_num_rows($result);
     
        //check the number of result, if equal to one   
        //IF theres a result
            if ($numrows == 1) {
                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);

                //fill the result to session variable
               
               $_SESSION['uid'] = $found_user['id'];
               $_SESSION['uname'] = $found_user['uname'];
               $_SESSION['utype'] = $found_user['utype'];
               $_SESSION['email'] = $found_user['email'];
               $_SESSION['phone'] = $found_user['phone'];
              
              //== if admin then select session 
              //  if($_SESSION['uid']=='1')
              //   {
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      window.location = "session_select.php";
                  </script>
             <?php        
                // }
                // else {
                //     //== giv session and branch id
                //    $year_now= date('Y');
                //     $year_next= date('y',strtotime('+1 years'));
                //     $year_latest=$year_now.'-'.$year_next;
                    
                //     //== get session id
                //      $year = "SELECT * FROM  session WHERE syear='$year_latest' ";
                //      $result_y = mysqli_query($conn, $year);
                //      $result_y  = mysqli_fetch_array($result_y);
                //      $syear_id = $result_y['id'];
                    
                    
                //     $_SESSION['syear'] = $syear_id;
                //     $_SESSION['branch'] = $found_user['branchid'];
                //   //  exit();
                   
                ?>
        
                    <!-- <script type="text/javascript">
                      //then it will be redirected to index.php
                      window.location = "index.php?action=dashboard";
                  </script> -->
            <?php
                   // }
        
            } else {
            //IF theres no result
              ?>    <script type="text/javascript">
                //alert("Username or upassword Not Registered! Contact Your Administrator.");
                window.location = "web/login.php?status=1";
                </script>
        <?php

            }

         } else {
                 # code...
        // die("Table Query failed: " );
          ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                     // alert("Query Failed !!! , Contact Your Administrator")
                      window.location = "web/login.php?status=2";
                  </script>
             <?php   
        }
        
    }       
} 
 
?>