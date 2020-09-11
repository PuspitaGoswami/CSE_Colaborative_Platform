
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
	<link rel="stylesheet" href="style.css">
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
    


        <nav class="navbar navbar-default" style="width: 100%;">

          <div class="container-fluid" style="width: 100%; padding-left: 311px;">

              <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">Home</a></li>
                <li><a href="user_profile.php">Profile</a></li>
                <li ><a href="index2.php">Inbox</a></li>
                <li><a href="post2.php">Post</a></li>
                <li><a href="blog2.php">Blog</a></li>

                <li class="dropdown">
                  <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">Informative Sites<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="career.php">Career Development</a></li>
                    <li><a href="alumni.php">Alumnus feedback</a></li>
                    <li><a href="event.php">LUCC events</a></li>
                  </ul>
                </li>
               
                <li><a href="logout.php">Log-out</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

    </div>
</div>