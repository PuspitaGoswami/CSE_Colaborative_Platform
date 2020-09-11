

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
<style type="text/css">

    html,
body{
    height: 100%;
    padding: 0px;
    margin: 0px;
    /* background: #C5DDEB !important; */
    background:#C5DDEB!important;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;

}
    h1,h2,h3,h4,h5,h6{
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;

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
    min-height: 180%;
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
    padding-bottom: 50px;
    padding-left: 35px;
    padding-right: 35px;
    font-size: 1.1em;
    border-radius: 5px;

}

.content .main-content.single .post-title{
    margin-bottom: 40px;
    padding-bottom: 50px;
    margin-left: 9%;
}

.content .main-content .post {
    width: 95%;
    height: 270px;
    margin: 20px auto ;
    border-radius: 5px;
    background: white;
    position: relative;
    padding-bottom: 50px;
}


.content .popular .post{
    border-top: 1px solid #e0e0e0;
    margin-top: 10px;
    padding-top: 10px;
}

.content .popular .post img{
    height: 30px;
    width: 50px;
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
    margin-top: 80px;

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
    position: fixed;
    z-index: 99;
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


#comment_form{
    margin-bottom: 15px;
    margin-top: 15px;

}

.cmnt_container input{
    justify-items: center !important;
    margin-left: 10px;
}
.form_group input{
    border-radius: 25px;
    margin-top: 10px;
    width: 485px;
    padding: 8px;
}
.cmnt-submit input{
    margin-left: 650px;
    float: left;
    border-radius: 25px;
    margin-top: -48px;
    /* padding-left: 10px; */
    padding-right: 10px;
    color: #006669;
    font-weight: bold;
    font-size: 18px;
    padding: 8px 12px;
    top: -9px;
}
.comment-section {
    margin-left: 35px;
    width: 40%;
    display: none;
    border-radius: 10px;
    margin-bottom: 5px;
    margin-top: 10px;
    padding: 5px;
}
.opinion:focus + #comment_section{
    transition-property: all;
    transition-duration: 0.8s;
    display: block;
}
</style>
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

          <div class="container-fluid" style="width: 100%; padding-left: 31px;">

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

<?php 
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		/*header("Location: 404.php");*/
	}
	else{
		$id = $_GET['id'];
	}
?>

<?php   
        global $pro_image;          
            $query = "SELECT * FROM user2 WHERE user_name='".$_SESSION['username']."'";
                $result = $db->select($query);
                if($result != false){
                    if(mysqli_num_rows($result)>0){
?>                              

        <?php  
            while ($user = mysqli_fetch_array($result)) {
                $pro_image= $user['image']; ?>                                                      
        <?php }}}?>

<div class="page-wrapper">


	<div class="content clearfix">

		
		

			<?php
                global $cat;
				$query = "select * from tbl_blog where id=$id";
				$post= $db->select($query);
			    if($post){
			    while ($result = $post->fetch_assoc()){
			    	$blog_id=$result['id'];
                    $cat = $result['cat'];
			?>
            <div  class="main-content single">

				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['date']);?>, By <a href="user_profile.php?user=<?php echo $result['author']?>" ><?php echo $result['author'];?></a></h4>
            <div class="post-content">

		          <img src="<?php echo $result['image']; ?>" alt="post image" style="height:300px; width:100%;margin-bottom: 20px; margin-top: 20px;"/> 
                <p><?php echo $result['body']; ?></p>

            </div>

        </div>

                <!--sidebar-->

        <div class="sidebar single">

            <div class="section topics">
                <h2 class="section-title">Popular Post</h2>

            <?php 

            $sql= "SELECT likes  FROM tbl_blog";
                $result=$db->select($sql);
                $c=0;
                $array = array();
                if ($result) {
                    while ($row= mysqli_fetch_array($result)) {
                        $array[] = $row['likes'];
                        $c++;
                    }
                }
                 rsort($array);
         ?>
            <?php   
                $query = "SELECT * FROM tbl_blog WHERE active=1 AND (likes=$array[0] OR likes=$array[1] OR likes=$array[2]) AND likes!=0 ";
                $post= $db->select2($query);
                while ($result = mysqli_fetch_array($post)){
        ?>
                <ul style="font-size: 20px;">
                    <li><a href="blogpost.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></li>
                </ul>
            <?php } ?>
            </div>


            

            <div class="section topics">
                <h2 class="section-title">Related Post</h2>
                <?php
                        $catid = $cat;
                        $queryrelated = "select * from tbl_blog where cat='$catid' order by rand() limit 6";
                        $relatedpost= $db->select($queryrelated);
                        if($relatedpost){
                        while ($result = $relatedpost->fetch_assoc()){
                            if ($result['cat']==$cat) {
                                # code...
                            
                    ?>
                <ul style="font-size: 20px;">
                    <li><a href="blogpost.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></li>
                </ul>
            <?php }}} ?>
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

        <!--//sidebar-->


				  <?php if (isset($_POST['cmnt_submit'])) {
                             # code...
                            $comment = $_POST['comment_content'];
                            $user_name= $_SESSION['username'];
                            $blog_id = $_POST['id'];
                            if($comment == ''){
                                    echo "<span style='color:#e53d37'>Field must not be empty</span>";
                             }
                            else{
                                
                                $sql = "INSERT INTO blog_comment(user_name,blog_id,comment)
                                VALUES('$user_name','$blog_id','$comment')";
                                $cmnt = $db->insert($sql);
                                if($cmnt){                    
                                }
                                ?>
                                <script type="text/javascript">
                                    location.replace("blogpost.php?id=<?php echo $result['id']?>");
                                </script>
                                
                                    
                           <?php }
                         } 
                     ?>

                    <div class="cmnt_container">
                        <form method="post" id="comment_form">
                            <input type="hidden" name="id" value=<?php echo $blog_id; ?>>

                            <div class="form_group">
                                <img src="<?php echo $pro_image;?> " style="width:40px;height: 40px;margin:2px;margin-top: 10px; border-radius:80%;margin-left: 80px;" />
                                <input  type="text" name="comment_content" id="comment_content" class="form_control" 
                                placeholder="Give your Opinion"/>          
                            </div>
                            <div class="cmnt-submit">          
                                <input type="submit" name="cmnt_submit" id="cmnt_submit" Value="Save" />
                            </div>                           
                        </form>                    
                    </div>

                 <?php 
                               $sql="SELECT * FROM blog_comment WHERE blog_id = '$blog_id'";
                                $result= $db->select2($sql);                   

                                $cnt_comments=mysqli_num_rows($result);                

                 ?>

                <div style="margin-left: 72px;margin-top: 20px;margin-bottom: 50px;" class="row">
                       <a style="color: #006669; font-weight: bold; font-size:20px; margin-bottom: 10px;"  id="abouttb" tabindex="1" class="opinion"><?php echo $cnt_comments; ?> Opinion</a>


                    <div style="margin-top: 10px; padding: 5px;"  class="comment-section" id="comment_section">
                        <?php
                            $con_query="SELECT * FROM blog_comment WHERE blog_id = '$blog_id' ORDER BY id DESC";
                            $cmt = $db->select2($con_query);
                            if ($cmt!=false) {
                                # code...
                        
                                if (mysqli_num_rows($cmt)>0) {
                                while ($com =mysqli_fetch_assoc($cmt)){
                                $user_name = $com['user_name'];
                                $comment = $com['comment'];
                                $sql="SELECT * FROM user2 WHERE user_name='$user_name'";
                                $result=$db->select2($sql);
                                $row=mysqli_fetch_assoc($result);?>
                                <div style="padding: 3px;margin-bottom: 5px;border-radius: 10px;background: #fff;" class="comment">
                                <a href="#"><img  style="width:30px;height: 30px;margin:1px; border-radius:60%; margin-right: 5px;"  src="<?php echo $row['image']?>"></a>
                                <i style="color: #006669; font-size: 1.1em;margin-right: 5px;"><?php echo $user_name; ?></i>
                                <?php echo $comment; ?><br>
                                <br>                                     

                                </div>

                         
                        <?php } } }?>
                    </div>

                </div>
            </div>
	      	
				</div>
				<?php } } else { header("Location:404.php"); }?>
	        </div>
		</div>

    <?php include 'inc/footer.php' ?>

    
		