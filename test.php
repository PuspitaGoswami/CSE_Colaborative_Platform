
<?php 
	include 'lib/Session.php';
	Session::init();

?>
<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();
?>

<?php
global $users;
$uname = $_SESSION['username'];


if (isset($_SESSION['username'])) {
	# code...
	echo 'Hello '.$_SESSION['username']; ?>
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
	
			
						<div class="search" style="margin-left: 386px;
    margin-bottom: 20px;">




    						<form action="user_search.php" method="get">
									<input type="text" id="search" class="form-control" name="search" placeholder="Search by Name Or Proffession...">
									<button type="submit">Search</button>

								</form>

						</div>
						<div id="result"></div>



						<script>
							
							$(document).ready(function(){
											

								
								$('#search').keyup(function(){
									var txt = $(this).val();
									if (txt != '') {
										$.ajax({
											url:"fetch.php",
											method:"post",
										data:{search:txt},
										dataType:"text",
										success:function(data)
										{
											$('#result').html(data);
										}
										});

									}else{
										$('#result').html('');
										$.ajax({
											url:"fetch.php",
											method:"post",
										data:{search:txt},
										dataType:"text",
										success:function(data)
										{
											$('#result').html(data);
										}
										});
									}
								});
							});
						</script>
			
			<?php 

				
				$query = "SELECT * FROM user2 ORDER BY id ASC";
						$result = $db->select($query);

						if($result != false){

								if(mysqli_num_rows($result)>0){
									?>

									<table class="style_table" >
										
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
													
													<td><img src="<?php echo $user['image'];?> " style="width:80px;height: 80px;margin:2px; border-radius:60%;" /></td>

													
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
								}

						}else{
							
						}

				
			


			 ?>
		  
			<?php include_once "inc/footer.php"?>
		</div>

	</body>
</html>
<?php }
	else{
	header("location:login.php");
}

 ?>

