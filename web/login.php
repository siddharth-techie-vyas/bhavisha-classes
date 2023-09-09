<!DOCTYPE html>
<html id='login'> 
  <?php  error_reporting(0);?>
<head>
<?php include('../session.php'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>theme/css/menu.css<?php echo "?ver=".rand();?>">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>theme/plugins/fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>theme/bootstrap-4.6.2/css/bootstrap.css">
</head>
<body class='login'>
<title>Bhavisha ERP</title>
<div >
  <div id='login_form' >
 

    
    
    
  <form class="pt-1" action="<?php echo $base_url.'processlogin.php';?>" method="post" name="login">
    <img src="../theme/images/logo.png" alt="logo">
    <h1 class="h3 mb-3 fw-normal">Sign in to continue.</h1>
    
    <?php if($_GET['status']=='1'){echo "<div class='alert alert-danger'>Wrong User Id Or Password</div>";} ?>
    <?php if($_GET['status']=='2'){echo "<div class='alert alert-info'>Something went wroing. Please contact your administrator</div>";} ?>
    
    <div class="form-floating">
    <input type="text" name="uname" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
    </div><br>
    <div class="form-floating">
    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
      
    </div><br>

    
    <input type="submit" class="btn btn-block btn-primary btn-md" name="btnlogin" value="Sign In">
    
  </form>

   
  </div>
</div>

<?php include('footer.php'); ?>

