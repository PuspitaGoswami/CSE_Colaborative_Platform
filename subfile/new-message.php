		<div id="new-message">
			<p class="m-header">New message.</p>
			<p class="m-body">
				<form align="center" method="post">
					<input type="text" list="user" onkeyup="check_in_db()" 
					class="message-input" name="user_name" placeholder="username" id="user_name" />
					<!--this detailswill show available user-->
					<datalist id="user"></datalist>


					<br><br>
					<textarea style="width: 300px;height: 100px;" name="message"  placeholder="Write your message..."></textarea><br><br>
					<input type="submit" name="send" id="send" value="send" >
					<button onclick="document.getElementById('new-message').style.display='none'">Cancel</button>

				</form>
			</p>
			<p class="m-footer">Click send to send</p>

			
		</div>

<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();

?>
		<script src="subfile/jquery-3.4.1.min.js"></script>

		<?php
		if (isset($_POST['user_name'])){
			$user_name=$_POST['user_name'];
		$query = "SELECT * FROM user2 WHERE user_name = '$user_name'";
		$result = $db->select($query);

		if ($result != false){

			$value = mysqli_fetch_array($result);
			$row = mysqli_num_rows($result);
			if($row > 0){

				if(isset($_POST['send'])){
					$sender_name = $_SESSION['username'];
					$receiver_name = $_POST['user_name'];
					$message = $_POST['message'];
					$date = date("Y-m-d h:i:sa");


					$query = 'INSERT INTO `messages` (`id`,`sender_name`,`receiver_name`,`message_text`,`date_time`)
							VALUES("","'.$sender_name.'","'.$receiver_name.'","'.$message.'","'.$date.'")
					';

					$result = $db->insert($query);
					
					if($result != false){?>
						   <script type="text/javascript">
                                    location.replace("index2.php?user=<?php echo  $receiver_name?>");
                                </script>
						<?php
						exit;
					}else{
						echo $query;
				echo 'No user found!';
						
					}
				} 

			}
			else{
				echo 'No user found!';
			
			}
		}		

	}



			?>

		<?php
		      

				
		 ?>



		<script>

				document.getElementById("send").disabled=true;

			function check_in_db(){
				var user_name = document.getElementById("user_name").value;
				$.post("subfile/check_in_db.php",
					{
						user: user_name
					},
						//we will receive this data from check_in_db.php

						function(data, status){
							//alert(data);
							if (data=='<option value="no user"') {

									document.getElementById("send").disabled=true;

							}else{
							document.getElementById("send").disabled=false;

							}
							document.getElementById('user').innerHTML=data;
						}
					);

			}
		</script>
