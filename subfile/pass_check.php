<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();

?>




<?php 

	
	if (isset($_POST['password']) && $_POST['password']!='') {
		$password=$_POST['password'];
		$specialChars = preg_match('@[^\w]@', $password);


			if (!$specialChars || strlen($password) < 8) {
				echo '<p style="color:red;">Password should be at least 8 characters in length and should include one special character.</p>';
			}else{
				echo '';
			}
		
	}else{
		echo '';
	}
 ?>