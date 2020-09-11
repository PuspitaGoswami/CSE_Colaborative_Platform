<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();
?>
<?php 
	include 'lib/Session.php';
	Session::init();

?>
<?php
if(!isset($_SESSION['username'])){
	header('location:login.php');
	exit();
}

?>
?>

<?php
global $users;
$uname = $_SESSION['username'];


if (isset($_SESSION['username'])) {
	# code...
	echo 'Hello '.$_SESSION['username'];
	 
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Registration Page</title>
		<script src="subfile/jquery-3.4.1.min.js"></script>
  		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.css">


		<link rel="stylesheet" type="text/css" href="style2.css">
	</head>
	<body>
		<div class="wrapper">
			

			<div class="st">
			</div>
	
			<h2 class='user'>Welcome <?php echo $uname; ?></h2>
			<p class="userlist">All User List.</p>
						<div class="search" style="margin-left: 386px;
    margin-bottom: 20px;">


        						<form action="user_search.php" method="get">
									<input type="text" name="search" placeholder="Please enter something...">
									<button type="submit">Search</button>

								</form>

        		   <?php
				
				if(isset($_GET['search'])){
					$search = $_GET['search'];
					
					if(empty($search)){
						echo "<span style='color:#e53d37'>Field must not be empty</span>";
					}
					else{
						$query ="SELECT * FROM user2 WHERE occupation LIKE '%$search%'";	
						$result = $db->select($query);
						if($result !=false){
							if(mysqli_num_rows($result)>0){
								?>

									<table class="style_table">
										
											<tr>
													<th>Serial</th>
													<th>Name</th>
													<th>Profile</th>
												</tr>

								

									<?php  
									while ($user = mysqli_fetch_array($result)) {
										# code...
										?>
										
												
												<tr>
													<td><img src="<?php echo $user['image'];?> " style="width:50px;height: 50px;margin:2px auto; border-radius:90%;" /></td>

													
													<td>
													
													<a href="user_profile.php?user=<?php echo $user['user_name'];?>"><?php echo $user['user_name'];?> </a>

													<?php if($user['user_name'] == $_SESSION['username']){?>
													<a href="update_profile.php?user=<?php echo $user['user_name']?>">| Edit</a>
													<?php } ?>
														
													
													</td>
												
												</tr>
												
										
										<?php

									}?></table>

<?php

							}else{
								echo "data not found";

							}


						}else{
							echo $query;
						}					
					}
				
				}
					


				?>


    		   



						</div>
			
		  
			<?php include_once "inc/footer.php"?>
		</div>

	</body>
</html>
<?php } 
else{
	header("location:login.php");
}


?>

