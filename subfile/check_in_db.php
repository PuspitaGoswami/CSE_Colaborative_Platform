
<?php require_once '../config/config.php';?>
<?php require_once '../lib/database.php';
include '../helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();




	if (isset($_POST['user'])) {
		$query='SELECT * FROM `user2` WHERE `user_name`="'.$_POST['user'].'"';
		$result = $db->select2($query);
		
		if($result!=false){
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					$user_name = $row['user_name'];

					echo '<option value="'.$user_name.'">';
				}
			}else{
				
				echo '<option value="no user">';
			}

		}
		else{
			echo $query;
		}
	}
 ?>