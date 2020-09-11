<?php 
	include 'lib/Session.php';
	Session::init();

?>

<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();





	
	$user_status='not active';
	if (isset($_SESSION['username'])) {


	 	# code...
	 	unset($_SESSION['username']);
	 	header("location:login.php");
	 } else{
	 	header("location:login.php");
	 	
	 }
 ?>