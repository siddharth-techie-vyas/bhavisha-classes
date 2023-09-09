<?php error_reporting(0);
require('session.php'); include('web/header.php'); include('class/Admin.php'); 
$admin=new Admin();
?>
<?php
if(isset($_POST['submit']))
{
    $_SESSION['syear'] = $_POST['syear'];
    $_SESSION['branch'] = $_POST['branch'];
    echo "<script type='text/javascript'>location.href='".$base_url."index.php?action=dashboard';</script>";
}
?>
<link rel="stylesheet" href="<?php echo $base_url;?>doc/theme/css/maruti-login.css" />
<div id="loginbox" style="margin:0 auto; margin-top:20px;">
                <div class="card" style="padding:60px; ">
                    <div class="card-body">
                    <center><img src="<?php echo $base_url.'theme/images/logo.png';?>"/></center>
                    <hr>
                    <form id="loginform" action="session_select.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                        <div class="alert alert-info">Please Select The Session</div>
                        </div>
                        <div class="col-md-6">
                                <select class="form-control" name="syear" required>
								<option value="">--Select--</option>
                                <?php $session_y = $admin->get_session_year();
                                foreach ($session_y as $key => $value) {
                                    echo "<option value='".$session_y[$key]['id']."'>".$session_y[$key]['syear']."</option>";
                                }
                                ?>
															
                                </select>
                        </div>
                        <div class="col-md-6">
                                <select class="form-control" name="branch" required>
                                <option value="">--Select--</option>
                                <?php $branch = $admin->get_allbranch();
                                foreach ($branch as $key => $value) {
                                    echo "<option value='".$branch[$key]['id']."'>".$branch[$key]['branch_name']."</option>";
                                }
                                ?>
                                                            
                                </select>
                        </div>
                        <div class="col-md-10"><br>
                            <button type="submit" name="submit" class="btn btn-bg btn-primary">Proceed</button>
                        </div>
                    </div>
                    </form>
                              
      </div>
     </div>
  </div>    
<?php include('web/footer.php'); ?>
