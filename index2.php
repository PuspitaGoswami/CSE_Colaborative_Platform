<?php 
	include 'lib/Session.php';
	Session::init();

?>
<?php if (!isset($_SESSION['username'])) {
	
  header('location:login.php');

} ?>




<?php

if (isset($_SESSION['username'])) {
	# code...
	//echo 'Hello '.$_SESSION['username']; 
	?>



	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<style>		<?php require_once("subfile/style.php") ?>


		</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		  <script type="text/javascript">
   window.addEventListener('scroll', function () {
    localStorage.scrollX = window.scrollX;
    localStorage.scrollY = window.scrollY;
})
window.addEventListener('load',function () {
    window.scrollTo(localStorage.scrollX || 0, localStorage.scrollY || 0);
})
 </script>


	</head>


	<body>

		<?php require_once("subfile/new-message.php"); ?>




	
		<div id="container">
			<div id="menu">
				<?php
					echo $_SESSION['username']; 
					echo'<a style="float:right;color:white; font-size:15px" href="index.php">  Home</a>';
					echo'<a style="float:right;color:white; font-size:15px" href="user_list.php">User List  | </a>';


				 ?>		

		

			</div>
				<div id="left-col">
					 <?php require_once("subfile/left-col.php") ?>
				</div>


				<div id="right-col">
					
					 <?php require_once("subfile/right-col.php") ?>

					
				</div>
			    

		</div>
	</body>
	</html>


	<?php

}

 ?>