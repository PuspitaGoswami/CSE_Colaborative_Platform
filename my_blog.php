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



<!DOCTYPE html>
<html   class="no-js" lang="">
<head>



	<title>Basic Website</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	

	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">	

	<!-- <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" /> -->
	<!--<link rel="stylesheet" href="css/main.css"> -->
	<!--<link rel="stylesheet" href="style.css">-->
	<link rel="stylesheet" href="css/bootstrap.css">
  <!-- <link rel="stylesheet" href="css/normalize.css"> -->



  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>

  <script src="https://cdn.tiny.cloud/1/gpkcoz7l8aac50kfto8n2jh3blht1cm47n6x7c4xps74pzfo/tinymce/5/tinymce.min.js"></script>
  <script>
      tinymce.init({
        selector: '#myEditor',
        plugins: "link",
        menubar: false,
        toolbar: ' styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link',
          default_link_target: "_blank"
      });

  </script>

 <!-- <script src="js/plugins.js"></script> -->
  <script src="js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	<!-- <script src="js/jquery.js" type="text/javascript"></script>
  </div>

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script> -->

<!-- <script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script> -->
</head>

<body>
<div class="top-navbar">
     <!--
    <div class="container">
         <<div class="row no-gutters d-flex align-items-center align-items-stretch">
        <div class="col-md-4 d-flex align-items-center py-4"> 
          <div class="title">
                <a class="navbar-brand" href="index.html">Computer Science<br/> Collaborative Platform. <br/>></a>
              </div>
          
              <div class="searchbtn clear">
                <form action="search.php" method="get">
                  <input type="text" name="search" placeholder="Search keyword..."/>
                  <input type="submit" name="submit" value="Search"/>
                </form>
              </div>
       </div>
    -->
    


        <nav class="navbar navbar-default">

          <div class="container-fluid">

              <ul class="nav navbar-nav navbar-left">
                <li><a style="font-size: 20px;"  href="index.php">Home</a></li>
                <li><a style="font-size: 20px;"  href="user_profile.php">Profile</a></li>
                <li><a style="font-size: 20px;"  href="index2.php">Inbox</a></li>
                <li><a style="font-size: 20px;"  href="post2.php">Post</a></li>
                <li><a style="font-size: 20px;"  href="blog2.php">Blog</a></li>

                <li class="dropdown">
                  <a style="font-size: 20px;"  href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">Informative Sites<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a style="font-size: 20px;"  href="career.php">Career Development</a></li>
                    <li><a style="font-size: 20px;"  href="alumni.php">Alumnus feedback</a></li>
                    <li><a style="font-size: 20px;"  href="event.php">LUCC events</a></li>
                  </ul>
                </li>
               


                <li><a style="font-size: 20px;"  href="logout.php">Log-out</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

    </div>
</div>







<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
			
html,
body{
	height: 100%;
	padding: 0px;
	margin: 0px;
	/* background: #C5DDEB !important; */
	background:#C5DDEB!important;
	font-family: inherit;
}

h1,h2,h3,h4,h5,h6{
	font-family:inherit;
	color: #006669;
	margin: 8px;
}
.font{
	color:#006669;
	margin:0;
	margin-bottom:8px;
}

a{
	text-decoration: none;
	color: inherit;
}

.clearfix::after {
	content:  '';
	display: block;
	clear: both;
}

.btn{
	padding:  .5rem 1rem;
	background: #006669;
	color: white;
	border: 1px solid transparent;
	border-radius: .25rem;
}

.btn:hover {
	color: white !important;
	background: #005255;
}

.btn-big {
	padding:.7rem 1rem;
	line-height: 1.3rem;
}

.text-input {
	padding: .7rem 1rem;
	display: block;
	width: 100%;
	border-radius: 5px;
	border: 1px solid #e0e0e0;
	font-size: 1.2em;
	outline: none;
	color: #444;
	line-height: 1.5rem;
	font-family: 'Lora' ,serif;
}

/*media queries*/

@media only screen and (max-width: 900px){
	.content {
		width: 100%;
	}
	.content .main-content {
		width: 100%;
	}
	.content .sidebar {
		width: 100%;
	}
}

.page-wrapper {
	min-height: 150%;
}


.page-wrapper a:hover{
	color: #006669;
}

/* post slider */
 .post-slider{
	
}
.post-slider .slider-title{
	text-align: left;
	margin: 30px auto;

}
.post-slider .next {

	position: absolute;
	top: 50%;
	right: 30px;
	font-size: 0.5cm;
	color: #006669;
	cursor: pointer;
}

.post-slider .prev{

	position: absolute;
	top: 50%;
	left: 30px;
	font-size: 0.5cm;
	color: #006669;
	cursor: pointer;
	
}


.post-slider .post-wrapper {
	
	height: 350px;
	width: 84%;
	margin: 0px auto;
	overflow: hidden;
	padding: 10px 0px 10px 0px;
	border-radius: 5px;
	

}

.post-slider .post-wrapper .post {
	height: 330px;
	width: 300px;
	margin: 0px 10px;
	display: inline-block;
	background: white;
	border-radius: 5px;
	box-shadow: 1px 1px 1px  #a0a0a033;

}
.post-slider .post-wrapper .post .post-info{
	height: 130px;
	padding: 0px 5px;
	
}

.post-slider .post-wrapper .post .slider-image{
	width: 100% !important;
	height: 200px;
	border-top-right-radius: 5px;
	border-top-left-radius:  5px;
}

/* content*/

.content{
	width: 90%;
	margin: 30px auto 30px;
	/*border:1px solid red;*/
}

.content .main-content{
	width: 70%;
	float: left;
	/*border:1px solid blue;*/
	
}

.content .main-content.single{
	background: white;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 15px;
	padding-right: 15px;
	font-size: 1.1em;
	border-radius: 5px;

}

.content .main-content.single .post-title{
	margin-bottom: 40px;
	margin-left: 9%;
}

.content .main-content .post {
	width: 95%;
	height: 270px;
	margin: 20px auto ;
	border-radius: 5px;
	background: white;
	position: relative;
}


.content .popular .post{
	border-top: 1px solid #e0e0e0;
	margin-top: 10px;
	padding-top: 10px;
}

.content .popular .post img{
	height: 60px;
	width: 75px;
	float: left;
	margin-right: 10px;
}

.content .main-content .post .read-more{
	position: absolute;
	bottom: 10px;
	right: 10px;
	border: 1px solid #006669;
	background: transparent;
	border-radius: 0px;
	color: #006669 !important;
}

.content .main-content .post .read-more:hover {
	background: #006669;
	color: white !important;
	transition: .25s;
}


.content .main-content .post .post-image{
	width: 40%;
	height: 100%;
	float: left;
}

.content .main-content .post .post-preview {
	width: 56%;
	padding: 10px;
	float: right;
}



.content .main-content .recent-post-title{
	margin: 20px;

}

.content .sidebar{
	width: 29.5%;
	float: left;
	height: 300px;
	/*border:1px dashed green;*/
}

.content .sidebar.single{
	padding: 0px 10px;
	width: 25%;
}


.content .sidebar .section {
	background: white;
	padding: 20px;
	border-radius: 5px;
	margin-bottom: 20px;

}

.content .sidebar .section .section-title{
	margin: 10px 0px 10px 0px;
}

.content .sidebar .section.search {
	margin-top: 35px;

}

.content .sidebar .section.topics ul{
	margin: 0px;
	padding: 0px;
	list-style: none;
	border-top: 1px solid #e0e0e0;



}

.content .sidebar .section.topics ul li a{
	display: block;
	border-bottom: 1px solid #e0e0e0;
	padding: 15px 0px 15px 0px;
	transition: all 0.3s;

}

.content .sidebar .section.topics ul li a:hover{
	padding-left: 10px;
	transition: all 0.3s;
}

/* namvar */
.container-fluid{
    background: #006669 !important;
    width: 100%;
    height: 57px;
}

.navbar-default{
    margin: 0px !important;
}
.navbar-default ul{
    margin-left: 292px !important;
    
}
.navbar-default ul li{
	padding-right: 5px;  
	background: #006669;
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size: 14px;
    line-height: 1.42857143;

	
}
.navbar-default ul li:hover{
	padding-right: 5px;  
	background: darkcyan !important;
	
}
.navbar-default li a{
    color: white !important;
    text-decoration: none;
    padding-right: 10px !important;
    font-size: 20px !important
	font-style: normal !important;
}
.dropdown ul{
	margin-left: 0px !important;
	
}
.dropdown ul li ul{
    background: black;
}
/* navbar */
.pagination{
	font-size: 20px;
    margin-left: 6.5%;
    color: #fff;
    margin-bottom: 50px;
    background: #006669;
    transition: 0.3s;

}
.pagination .arrow{
	width: 200px;
}

/*footer*/

.footer{
	background: #303036;
	color: #d3d3d3;
	height: 400px;
	position: relative;
}

.footer .footer-content {
	
	height: 350px;
	display: flex;

}

.footer .footer-content .footer-section{
	flex: 1;
	padding: 25px;
	

}

.footer .footer-content h1,
.footer .footer-content h2 {
	color: white;
}
.footer .footer-content .about h1 span {
	color: #05f7ff;
}

.footer .footer-content .about .contact span {
	display: block;
	font-size: 1.1em;
	margin-bottom: 8px;
}

.footer .footer-content .about .socials a {
	border: 1px solid gray;
	width: 45px;
	height: 41px;
	padding-top: 5px;
	margin-right: 5px;
	text-align: center;
	display: inline-block;
	font-size: 1.3em;
	border-radius: 5px;
	transition: all .3s;
}

.footer .footer-content .about .socials a:hover{
	border: 1px solid white;
	color: white;
	transition: all .3s;
}

.footer .footer-content .links ul a {
	display: block;
	margin-bottom: 10px;
	font-size: 1.2em;
	transition: all .3s;
}

.footer .footer-content .links ul a:hover {
	color: white;
	margin-left: 15px;
	transition: all .3s;
}

.footer .footer-content .contact-form .contact-input {
	background: #272727;
	color: #bebdbd;
	margin-bottom: 10px;
	line-height: 1.5rem;
	padding: .9rem 1.4rem;
	border: none;
	width: 85%;
}

.footer .footer-content .contact-form .contact-input:focus {
	background: #1a1a1a;

}

.footer .footer-content .contact-form .contact-btn {
	float: right;
	font-size: 1.1em;
	font-family: 'Lora',serif;
}




.footer .footer-bottom {
	background: #343a40;
	color: #686868;
	width: 100%;
	height: 50px;
	text-align: center;
	position: absolute;
	bottom: 0px;
	left: 0px;
	padding-top: 20px;
}
</style>
		<link rel="stylesheet" type="text/css" href="file:///C:/Users/Asus/Documents/fontawesome-free-5.11.2-web/css/all.css">
	<!--google font-->
	<link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">

	<title></title>
</head>
<body>
			<!--pagination-->
		<?php
			$per_page = 10;
			if (isset($_GET["page"])){
				$page = $_GET["page"];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1)*$per_page;
		?>
		<!--pagination-->
		<?php 
				$sql= "SELECT MAX(likes) AS maximum FROM tbl_blog";
				$result=$db->select($sql);
				$row=mysqli_fetch_assoc($result);
				$maximum=$row['maximum']-1;
				$maximum2=$row['maximum']-2;
				$maximum3=$row['maximum']-3;
			    $maximum4=$row['maximum']-4;	

		 ?>
		        <a href="addpost.php" class="btn btn-default btn-lg active" role="button" 
					style="color: white; background: #006669;float: right;margin-top:30px; height: 40px; font-size: 20px;
					 margin-right:8.5%; paddding:30px">
                    Add Your Blog Post here</a>
			
<div class="page-wrapper">
			


	<!--content-->

	<div class="content clearfix">
		<!--Main-content-->
		
		<div class="main-content">
			


		<?php	
				$query = "select * from tbl_blog where active=1 and author='".$_SESSION['username']."' order by id desc limit $start_from, $per_page";
				$post= $db->select($query);
				if ($post) {?>
				<h1 class="recent-post-title">My Posts</h1><?php

				while ($result = $post->fetch_assoc()){
            	$id = $result['id'];                                             
        ?>


			<div class="post">
				<img style="border-radius: 5px;" src="<?php echo $result['image'];?>" alt="" class="post-image">

				<div class="post-preview">
					<h2 class="font"><a href="blogpost.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>

					<div style="font-size: 20px; margin-bottom: 5px; color:#093c99;
					font-weight: bold;">
						<i class="fa fa-user"><a href="user_profile.php?user=<?php echo $result['author'];?>"> <?php echo $result['author'];?></a></i>
					&nbsp;
					<i class="fa fa-calendar">
						<span><?php echo $fm->formatDate($result['date']);?></span>
							
						</i>
					</div>

					<p style="font-size: 18px;margin-top: 20px;margin-left: 0px;" class="preview-text"><?php echo $fm->textShorten($result['body'],150); ?></p>


					<a href="blogpost.php?id=<?php echo $result['id'];?>" class="btn read-more">Read More</a>
					<form style="float: left; margin-right: 10px;margin-left: 0px;"  action='blog_like.php' method="POST">

                    <input type="hidden" name="id" value=<?php echo $id; ?>>

                    <?php 
                        $sql="SELECT * FROM blog_like WHERE blog_id = '$id'";
                        $result= $db->select2($sql);
                        $cnt_likes=mysqli_num_rows($result);
                     ?>

                    <input style="background: none; color:#093c99;border: none;margin-left:0px;font-size: 20px;" type="submit" name="like"  value="Like">
                        <span style="font-size: 20px;"><?php echo $cnt_likes; ?></span>

                </form>
                 <form   action='blog_dislike.php' method="POST">

                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                    <?php 
                        $sql="SELECT * FROM blog_dislike WHERE blog_id = '$id'";
                        $result= $db->select2($sql);
                    

                        $cnt_dislikes=mysqli_num_rows($result);
                     ?>
                    <input style="background: none; color:#093c99;border: none;font-size: 20px;" type="submit" name="dislike" value="Dislike"><span style="font-size: 20px;"><?php echo $cnt_dislikes; ?></span>

                </form>


				</div>
			</div>

    <?php } }else{ echo '
				<h1 class="recent-post-title">No Posts Available</h1>
    ';}?> <!-- end while loop -->



		</div>

		<!--//main-content-->

		<div class="sidebar">
			<div class="section search">
				<h2 class="section-title">Search</h2>
				<form action="blog_search.php" method="get">
					<input style="height:35px; width:300px;font-size:20px;" type="text" name="search" class="search_blog" placeholder="Search..."> 
					<input style="height:35px; width:75px; font-size:20px;" type="submit" name="submit" value="Search">
				</form>
			</div>



			<div class="section topics">
				<h2 class="section-title">Topics</h2>
				<?php	
							$query = "select * from tbl_catagory";
							$catagory= $db->select($query);
							if($catagory){
							while ($result = $catagory->fetch_assoc()){
				?>
				<ul style="font-size: 20px;">
					<li><a href="cat-post.php?catagory=<?php echo $result['id'];?>"><?php echo $result['name']; ?></a></li>
					<?php } } else { ?>	
					<li>No Category Created</li>						
					</ul>
				<?php } ?>

				</ul>
			</div>

		</div>

	</div>

	<!--//content-->

</div>
<!--//post wrapper-->
<!--pagination-->
<?php 
	$query = "select * from tbl_blog";
	$result = $db->select2($query);
	$total_rows = mysqli_num_rows($result);
	$total_pages = ceil($total_rows/$per_page);?>

	<span class="pagination">
	<a style="font-size: 30px; padding: 30px;" href="my_blog.php?page=<?php echo '1';?>"><?php echo '<'; ?></a>
	<?php for($i=1; $i<=$total_pages; $i++){?>
		<a style="padding: 2px;font-size: 30px;" href="my_blog.php?page= <?php echo $i;?>"><?php echo $i?></a>

	<?php }?>


	<a style="font-size: 30px; padding: 30px;" href="my_blog.php?page=<?php echo $total_pages;?>"><?php echo '>'; ?></a>
	</span>


</div>
<!--pagination-->

<!--footer-->

<div class="footer">
	<div class="footer-content">
		<div class="footer-section about">
			<h1 class="logo-text"><span>CSE </span>Colaborative Platform</h1>
			<p>Share your ideas...get information from this platform.</p>


			<div class="socials">
				<a href="#"><i class="fab fa-facebook"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>

				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-youtube"></i></a>

			</div>
		</div>
		<div class="footer-section links">
			<h2>Quick Links</h2>
			<br>
			<ul>
				<a href="#"><li>Events</li></a>
				<a href="#"><li>Team</li></a>

				<a href="#"><li>Mentors</li></a>
				<a href="#"><li>Gallery</li></a>
				<a href="#"><li>Terms and Conditions</li></a>

			</ul>
		</div>

	</div>

</div>

<!--//footer-->



<!--jquery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!--jQuery slick-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!--custom script-->
<script src="scripts.js"></script>
</body>
</html>