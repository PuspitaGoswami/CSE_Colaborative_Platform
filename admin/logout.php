<?php 
		if (isset($_SESSION['name'])) {


	 	
	 	unset($_SESSION['rname']);
	 	header("location:login.php");
	 } else{
	 	header("location:login.php");
	 	
	 }
 ?>