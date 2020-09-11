<div style="margin-right: 50px;width: 370px;" class="sidebar clear">
	<!--
	<div class="searchbtn clear">
		<form action="search.php" method="get">
			<input type="text" name="search" placeholder="Search keyword..."/>
			<input type="submit" name="submit" value="Search"/>
		</form>
	</div>
-->
<style type="text/css">
</style>
	<div style="width: 370px;" class="samesidebar clear">
		<h2>User List</h2>
			
			<ul>
				<?php	
					$query = "select * from user2";
					$catagory= $db->select($query);
					if($catagory){
					while ($result = $catagory->fetch_assoc()){
				?>
			<?php 
					$img='no';
					$sql="SELECT * FROM user2 WHERE user_name='". $result['user_name']."'"; 
					$r=$db->select($sql);
					if ($r) {
						while ($row=$r->fetch_assoc()) {
							if($row['image']==NULL){
							  $img='no';

															
							}else{
								$img='yes';
															
							}
						}
					}
		        ?>



				<a href=""><img src="<?php if($img=='yes'){
					  echo $result['image']; 
				} else{
				echo 'images/placeholder.png';

				}?>" 

				style="width:50px;height: 50px;margin:2px; border-radius:60%; float: left;margin-right: 10px;" /></a>
			<li style="height: 50px;"><a  style="margin-top: 15px;text-decoration: none;" href="user_profile.php?user=<?php echo $result['user_name'];?>">
			<?php echo $result['user_name'];?>
			<a href="index2.php?user=<?php echo $result['user_name']?>" id="msg"><i style="font-size: 15px;padding-left: 5px;color:#03b6fc;" class="fa fa-comments-o" aria-hidden="true"></i></a>
			 </a> <br><?php $query2 = "SELECT * FROM status WHERE user_name = '".$result['user_name']."'";
					$result2 = $db->select($query2);
					if($result2){
				while ($user = mysqli_fetch_array($result2)) {
								?><?php
								$v1='active';


						if ($user['user_status']==$v1) {?>
						<!-- 	<i style="font-size: 10px;" class="fa fa-circle online"></i><span style="color: #A8A3A3;margin: 2px;"><?php echo 'Active'; ?></span> -->
							<?php
							
								$s='active';
						}else{
							?>
						<!-- 	<i style="font-size: 10px;" class="fa fa-circle offline"></i><span style="color: #A8A3A3;margin: 2px;"><?php echo 'Not active'; ?></span> -->

								

							<?php
	
								$s=' not active';


					}?><?php 

					}}?></li>
								 <hr>
		<?php } } else { ?>	
			<li>No Category Created</li>						
			</ul>
		<?php } ?>
	</div>		 
</div>	