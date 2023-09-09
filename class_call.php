<?php
include_once('class/DBController.php');
include_once('class/Admin.php');
include_once('class/Leads.php');
include_once('class/Courses.php');
include_once('class/Teacher.php');
include_once('class/Student.php');
include_once('class/class_calender.php');
include_once('class/Accounts.php');
include_once('class/Library.php');

$db_handle = new DBController();

$admin = new Admin();
$leads = new Leads();
$course = new Courses();
$teacher = new Teacher();
$student = new Student();
$accounts = new Accounts();
$library = new Library();


$conn = new DBController();
$con = $conn->connectDB();

$action = "";
if (!empty($_GET["action"])) 
	{
    	$action = $_GET["action"];
	}
	else { ?><script type="text/javascript">
                window.location = "logout.php";
                </script><?php }

    
	
?>