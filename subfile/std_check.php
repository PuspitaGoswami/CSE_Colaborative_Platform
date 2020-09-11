<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();

?>




<?php 

	
	if (isset($_POST['std_id'])) {
		# code...
		$query = 'SELECT * FROM user2 WHERE std_id="'.$_POST['std_id'].'"';
		$result = $db->select($query);
		

		if($result!=false){

			if (mysqli_num_rows($result)>0 && $_POST['std_id']!='') {
				# code...
				echo '<p style="color:red;">Student ID already exists</p>';
			}else{
				echo '';
			}
		}else{
			$query;
		}
	}
 ?>