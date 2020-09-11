<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();

?>




<?php 

	
	if (isset($_POST['email'])) {
		# code...
		$query = 'SELECT * FROM user2 WHERE email="'.$_POST['email'].'"';
		$result = $db->select2($query);
		

		if($result!=false){

			if (mysqli_num_rows($result)>0 && $_POST['email']!='') {
				# code...
				echo '<p style="color:red;">E-mail already exists</p>';
			}else{
				echo '';
			}
		}else{
			$query;
		}
	}
 ?>