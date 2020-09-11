<div class="sidebar clear">
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
	<div class="samesidebar clear">
		<h2>User List</h2>
			
			<ul>
				<?php	
					$query = "select * from user2";
					$catagory= $db->select($query);
					if($catagory){
					while ($result = $catagory->fetch_assoc()){
				?>
				<a href=""><img src="<?php echo $result['image'];?> " style="width:50px;height: 50px;margin:2px; border-radius:60%; float: left;margin-right: 10px;margin-bottom: 5px;" />
			</a>
			<li><a href="user_profile.php?user=<?php echo $result['user_name'];?>">
			<?php echo $result['user_name'];?> </a></li>					 <?php $query2 = "SELECT * FROM status WHERE user_name = '".$result['user_name']."'";
					$result2 = $db->select($query2);
					if($result2){
				while ($user = mysqli_fetch_array($result2)) {
								?><?php
								$v1='active';


						if ($user['user_status']==$v1) {?>
							<i style="font-size: 10px;" class="fa fa-circle online"></i><span style="color: #A8A3A3;margin: 2px;"><?php echo 'Active'; ?></span>
							<?php
							
								$s='active';
						}else{
							?>
							<i style="font-size: 10px;" class="fa fa-circle offline"></i><span style="color: #A8A3A3;margin: 2px;"><?php echo 'Not active'; ?></span>

								

							<?php
	
								$s=' not active';


					}?><?php 

					}}?> <hr>
		<?php } } else { ?>	
			<li>No Category Created</li>						
			</ul>
		<?php } ?>
	</div>		 
</div>	