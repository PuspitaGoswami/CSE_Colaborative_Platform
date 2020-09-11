<?php 
  include 'lib/Session.php';
  Session::init();

?>
<?php if (!isset($_SESSION['username'])) {
  header('location:login.php');

} ?>

<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();
?>

<?php
	global $users;

	if(isset($_REQUEST ['user'])){
	$uname = $_REQUEST ['user'];
	}else{
			$uname = $_SESSION['username'];		
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>All user Profile</title>
		<link rel="stylesheet" href="style.css">
				
		

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
.profile-card {
	
	margin: 0px auto;
	background: #fff;
	box-shadow: 0 4px 10px 0 rgb(0,0,0,0.5);
	margin-left: 1px;
	overflow-y:scroll;
	width: 550px;
	height: 100%;
	position: fixed;

}

.image-container{
	position: relative;

}
.info{
	color: #4b4fe2;
	margin-right: 16px;
}
.main-container {
	padding: 20px;
}
.skill-bar{
	background-color: #bdc9ea;
	border-radius: 16px;
}

.progress-bar{
	padding: 0.1em 16px;
	border-radius: 16px;
	text-align: center;
	color: #fff;
	background-color: #4b4fe2;
}

.title{
	position: absolute;
	left: 15px;
	bottom: 0;
	
}
#menu{
 	background: #006669;
		color: white;
		padding: 1%;
		font-size: 30px;
		
	}
	</style>
	</head>
	<body>
		
		<!-- menu
		<div class="top-navbar">


			<nav class="navbar navbar-default" style="width: 100%; margin-top:none;">

				<div class="container-fluid" style="width: 100%; margin-right: auto;margin-left: auto;background: white; margin-top:none;">

					<ul class="nav navbar-nav navbar-left" style="list-style:none;">
						<li style="float:left; padding-right:20px; padding-bottom:12px; font-weight:bold; font-size:20px;"><a href="index.php"
						style="    color: white !important;text-decoration: none;padding-right: 10px !important;font-size: 20px !important;"
						>Home</a></li>
						<li style="float:left; padding-right:20px; padding-bottom:12px; font-weight:bold; font-size:20px;"><a href="user_profile.php">Profile</a></li>
						<li style="float:left; padding-right:20px; padding-bottom:12px;font-weight:bold; font-size:20px;"><a href="index2.php">Inbox</a></li>
						<li style="float:left; padding-right:20px; padding-bottom:12px; font-weight:bold; font-size:20px;"><a href="post2.php">Post</a></li>
						<li style="float:left; padding-right:20px; padding-bottom:12px; font-weight:bold; font-size:20px;"><a href="blog2.php">Blog</a></li>
					
						<li style="float:left; padding-right:20px; padding-bottom:12px; font-weight:bold; font-size:20px;"><a href="logout.php">Log-out</a></li>
					</ul>
				</div>/.navbar-collapse 
			    
			</nav>

        </div>
		 menu -->

	<div class="container" style="width: 974px;height: 90%;margin-bottom: 150px; margin-left:200px;border-radius: 15px;">
	        <div id="menu">
	      <?php 
		
			$query = "SELECT * FROM user2 WHERE user_name='$uname'";
			$result = $db->select($query);
			if($result!=false){
	
		while ($getuser = $result->fetch_assoc()){	
			$un=$getuser['user_name'];
				
					echo 'Profile Of ' .$un;; 
					echo'<a style="float:right;color:white; font-size:25px;font-style:none;" href="index.php">Back to Home</a>';
					
				 }}?>			
			</div>
		<?php 
			$img='no';
			$sql="SELECT * FROM user2 WHERE user_name='$uname'"; 
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
<?php include 'inc/pro_userlist.php';?>

		<!--
			<p style="text-align: center;
			font-style: normal !important;
			width: 600px;
			font-size: 25px;
			color: #4b4fe2;
			box-shadow: 0 4px 10px 0 rgb(0,0,0,0.5);
			margin-left: 366px;
			" class="userlist">Profile Of <?php echo $uname?></p>

		-->	

		
			<?php 
		
			$query = "SELECT * FROM user2 WHERE user_name='$uname'";
			$result = $db->select($query);
			if($result!=false){
	
		while ($getuser = $result->fetch_assoc()){	
			$un=$getuser['user_name'];
			?>
			


		<div style="" class="profile-card" style="width:600px;">
		<div class="image-container">
		<img 

				src="<?php
					echo $getuser['image'];
				?>
						 
            "style="width: 100%; margin-bottom: 50px; height: 350px;">
			<div class="title" style="color: #4b4fe2;">
				<h2 style="font-size:30px; font-weight: bold; color: #006669;"><?php echo $getuser['user_name']?></h2>
			</div>
			<div style="float:right; margin-right: 50px;margin-top: 0px;">
			<?php if( $getuser['user_name']==$_SESSION['username']){?>


			<button type="button" class="btn btn-link" style="padding:10px">	
				<a href="update_profile.php?id=<?php echo $uname?>" style="text-decoration:none;">Edit profile</a>
			</button>	
			<button type="button" class="btn btn-link" style="padding:10px">
				<a href="skill.php?id=<?php echo $uname?>" style="text-decoration:none;">Add Skill</a>
			</button>	

			<?php } ?>
			</div>
		</div>
		


		<div class="main-container">
					<?php if($getuser['occupation']=='Student' ){ ?>
			<P><i class="fa fa-user info" aria-hidden="true"></i><?php echo $getuser['occupation']; ?></P><?php } else{?>
				<P><i class="fa fa-graduation-cap info" aria-hidden="true"></i><?php echo $getuser['occupation']; ?></P>

			<?php } ?>
			
			
			<P><i class="fa fa-envelope-o info" aria-hidden="true"></i>
			<?php echo $getuser['email'];?></P>
			<?php if($getuser['job']!=NULL ){ ?>
			<P><i class="fa fa-map-marker info" aria-hidden="true"></i><?php echo $getuser['job']; ?></P><?php } ?>
			<P><i class="fa fa-id-card-o info" aria-hidden="true"></i><?php echo $getuser['std_id'];?></P>
		<?php if($getuser['phone']!=NULL || $getuser['phone']!='0' ){ ?>
			<P><i class="fa fa-phone info" aria-hidden="true"></i><?php echo $getuser['phone']; ?></P><?php } ?>
			
			<hr><?php } }?>
			<p><b><i class="fa fa-asterisk info"></i>Skills </b></p>

			<?php 

					$query = "SELECT * FROM tbl_s WHERE user_name='$uname'";
					$result = $db->select($query);
					if($result !=false){
						while ($allskill = $result->fetch_assoc()){?>
							<p style="font-weight:bold; font-size:bold;"><?php echo $allskill['name'];?></p>
							<div class="skill-bar">
								<div class="progress-bar" style="width:<?php echo $allskill['percentage'];?>%"><?php echo $allskill['percentage'];?>%</div>
							</div><?php					
						}

					}






			 ?>

	

		</div>

		</div>
				
		</body>
</html>

