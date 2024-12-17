<?php
//before we store information of our member, we need to start first the session
	/*session_save_path('/opt/alt/php74/var/lib/php/session');
    ini_set('session.gc_probability', 1);
	*/
	
	date_default_timezone_set('Asia/Kolkata');
	//$base_url="http://localhost/mysoftware/bhavisha-classes/";
	$base_url="https://www.bhavishaclasses.com/";
   // error_reporting(0);
	session_start();
	//create a new function to check if the session variable member_id is on set
	function logged_in() {
		return isset($_SESSION['uid']);
	}
	//this function if session member is not set then it will be redirected to index.php
	function confirm_logged_in() {
		if (!logged_in()) {?>
			<script type="text/javascript">
				window.location = "web/login.php";
			</script>
		<?php
		}
	}
?>