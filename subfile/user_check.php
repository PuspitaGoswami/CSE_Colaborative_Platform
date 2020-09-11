<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();

?>




<?php 

	
	if (isset($_POST['user']) && $_POST['user']!='') {
		# code...
		$query = 'SELECT * FROM user2 WHERE user_name="'.$_POST['user'].'"';
		$result = $db->select($query);
		

		if($result!=false){

			if (mysqli_num_rows($result)>0) {
				# code...
				echo '<p style="color:red;">User already registered!</p>';
			}else{
				echo '';
			}
		}else{
			$query;
		}
	}
 ?>