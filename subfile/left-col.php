<div id="left-col-container">

		<div style="cursor: pointer;" onclick="document.getElementById('new-message').style.display='block'" class="white-back">
			<p align="center">New Message</p>
	</div>
	<?php global $receiver_status; ?>

	


<?php 
	$query = "SELECT DISTINCT `receiver_name`, `sender_name`
	FROM `messages` WHERE 
	`sender_name`= '".$_SESSION['username']."' OR 
	`receiver_name`= '".$_SESSION['username']."'
	ORDER BY `date_time` DESC";

		$result = $db->select2($query);
	
	if($result!=false){
		if(mysqli_num_rows($result)>0){

			$counter = 0;
			$added_user = array();


			while($row=mysqli_fetch_assoc($result)){
				$sender_name = $row['sender_name'];
				$receiver_name = $row['receiver_name'];

				$sql="SELECT * FROM user2 WHERE user_name='$receiver_name'";
				$r = $db->select2($sql);

				
				while($row=mysqli_fetch_array($r)){
					$receiver_img = $row['image'];
				}

				$sql="SELECT * FROM user2 WHERE user_name='$sender_name'";
				$r2 = $db->select2($sql);

				
				while($row=mysqli_fetch_array($r2)){
					$sender_img = $row['image'];
				}




				if($_SESSION['username']==$sender_name){
					//add the receiver name but only once
					//so to do that check the user in array

					if(in_array($receiver_name, $added_user)){
						//don't add reciver name because he is already added.

					}else{
						//add the reciver name
						?>
				<div class="grey-back">
					
				<img style="height: 40px;width: 40px;border-radius: 60%;" src="<?php echo $receiver_img?>" class="image" alt=""/>


						
				<span style="padding-left: 3px;"><?php echo '<a href="?user='.$receiver_name.'">'.$receiver_name.'</a>';?></span> 
				
			


				</div>
	         <?php 
	         //as reciver name added ao add it to the array as well
	         $added_user = array($counter => $receiver_name);
	         //increment the counter
	         $counter++;

					}

				}elseif($_SESSION['username']==$receiver_name){
					//add the sender name but only once
					//so to do that check the user in array

					if(in_array($sender_name, $added_user)){
						//don't add sender name because he is already added.

					}else{
						//add the sender name
						?>
				<div class="grey-back">

					<img style="height: 40px;width: 40px;border-radius: 60%;" src="<?php echo $sender_img?>" alt="" class="image" />

					<?php echo '<a href="?user='.$sender_name.'" >'.$sender_name.'</a>'; 
					

					$query2 = "SELECT * FROM status WHERE user_name = '$sender_name'";
					$result2 = $db->select($query2);
					if($result2){
				while ($user = mysqli_fetch_array($result2)) {
						
							
							$v2="active";


					if ($user['user_status']==$v2) {?>
						<?php
							
								$s2='active';
						}else{
							?>

							<?php
	
								$s2=' not active';


					}?><?php 

					
				
					}}?>

				</div>
	         <?php 
	         //as sender name added ao add it to the array as well
	         $added_user = array($counter => $sender_name);
	         //increment the counter
	         $counter++;

					}

				}
			}
		}else{
			//no message fetch
			echo 'No user';

		}

	}else{
		echo $query;
	}




 ?>

	
</div>