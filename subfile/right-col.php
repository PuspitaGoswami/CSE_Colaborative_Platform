<div id="right-col-container">
	<?php 
						if(isset($_GET['user'])){
					# code...
					$user = $_GET['user'];?>
					<div id="user"><?php echo $user; ?></div>

					<?php
				}


	 ?>

	<div id="message-container">

		<?php 

			$no_message = false;

				if(isset($_GET['user'])){
					# code...
					$_GET['user'] = $_GET['user'];
				}else{
					$query = 'SELECT `sender_name`, `receiver_name` FROM `messages`
					WHERE `sender_name` = "'.$_SESSION['username'].'"
					or `receiver_name` = "'.$_SESSION['username'].'"
					ORDER BY `date_time` DESC LIMIT 1';

					$result = $db->select2($query);
					

					if ($result!=false) {
						# code...
						if(mysqli_num_rows($result)>0){

							while ($row=mysqli_fetch_assoc($result)) {
								# code...
								$sender_name = $row['sender_name'];
								$receiver_name = $row['receiver_name'];


								if ($_SESSION['username'] == $sender_name) {
									# code...
									$_GET['user'] = $receiver_name;

								}else{
									$_GET['user']=$sender_name;
								}


							}

						}else{
							echo 'no message';
							$no_message = true;
						}
					}else{
						echo $query;
					}
				}
		if ($no_message == false) {
				

				$query='SELECT * FROM `messages` WHERE `sender_name`="'.$_SESSION['username'].'"
			AND `receiver_name`="'.$_GET['user'].'"
			OR 
			`sender_name`="'.$_GET['user'].'" 
			AND `receiver_name`="'.$_SESSION['username'].'"';

		$result = $db->select($query);
			

			if ($result!=false) {
				while ($row = mysqli_fetch_assoc($result)) {
					# code...
					$sender_name = $row['sender_name'];
					$receiver_name = $row['receiver_name'];
					$message = $row['message_text'];


					if($sender_name == $_SESSION['username']){
						?>

					<div class="grey-message">
			          <a style="color:  #444753;" href="user_profile.php?user=<?php echo $_SESSION['username']?>"><?php echo $_SESSION['username']; ?></a>
			          <p><?php echo $message ?></p>
	            	</div>

					<?php		
					}else{


						?>
						
							<div class="white-message">
			                    <a style="color:  #444753;" href="user_profile.php?user=<?php echo $sender_name?>"><?php echo $sender_name; ?></a>

			                    <p><?php echo $message; ?></p>
							</div>


						<?php

					}
				}
			}else{?>
				<div id="blank"><h2>Start A New Conversation</h2></div>
				
			<?php }
//end of no_message
		}






		 ?>

		

			


	</div>
	<form method="post" id="message_form">
	<textarea class="textarea" id="message_text" placeholder="Write your message..."></textarea>
	</form>

		<script src="subfile/jquery-3.4.1.min.js"></script>

		<script>
			$("document").ready(function(event){

				$("#right-col-container").on('submit','#message_form', function(){

					var message_text = $("#message_text").val();

					$.post("subfile/sending_process.php?user=<?php echo $_GET['user']; ?>",
					{
						text: message_text,
					},

					function(data,status){

						//alert(data);
						$("#message_text").val("");

						document.getElementById("message-container").innerHTML += data;
					}

					);
				});

				$("#right-col-container").keypress(function(e){
					if(e.keyCode == 13 && !e.shiftKey){
						$("#message_form").submit();
					}
				});
			});
		</script>

	

</div>