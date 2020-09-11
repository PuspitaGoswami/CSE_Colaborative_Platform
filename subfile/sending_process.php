<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();

?>
<?php 
	include '../lib/Session.php';
	Session::init();

?>


<?php 
		
		if (isset($_SESSION['username']) and isset($_GET['user'])) {
			# code...
			if(isset($_POST['text'])){

				if ($_POST['text'] !='') {
					# code...
					$sender_name = $_SESSION['username'];
					$reciever_name = $_GET['user'];
					$message = $_POST['text'];
					$date = date("Y-m-d h:i:sa");

					$query = 'INSERT INTO `messages` (`id`,`sender_name`,`receiver_name`,`message_text`,`date_time`)
							VALUES("","'.$sender_name.'","'.$reciever_name.'","'.$message.'","'.$date.'")
					';

					$result = $db->insert($query);
					

					if ($result!=false) {
						# code...
					?>

					<div class="grey-message">
			          <a href="#">Me</a>
			          <p><?php echo $message ?></p>
	            	</div>
	            	<?php

					}else
					{
						echo $query;
					}


				}else{
					echo 'Please write something first.';
				}

			}else{
				echo 'Problem with text.';
			}
		}else{
			echo 'Please log in or select a user to send message.';
		}

 ?>