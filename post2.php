<?php 
  include 'lib/Session.php';
  Session::init();
    if (!isset($_SESSION['username'])) {
    # code...
    header("location:login.php");
  }

?>

<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/Format.php';?>

<?php
    $db = new Database();
    $fm = new Format();
?>

<!DOCTYPE html>
<html>
<head>
 
    <title>Basic Website</title>
    
    <meta name="language" content="English">
    <meta name="description" content="It is a website about education">
    <meta name="keywords" content="blog,cms blog">
    <meta name="author" content="Delowar">


    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">    
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


  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>
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

<!-- navbar -->
<div class="top-navbar">

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
    


        <nav class="navbar navbar-default">

          <div class="container-fluid">

              <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">Home</a></li>
                <li><a href="user_profile.php">Profile</a></li>
                <li><a href="index2.php">Inbox</a></li>
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
<!-- navbar -->
    <div class="container">

    <div class="contentsection contemplete clear">

          <div class="box round first grid">
              
            <?php
                if (isset($_POST['submit']))
                    
                    {
                        $body   = mysqli_real_escape_string($db->link, $_POST['body']);
                        $author = mysqli_real_escape_string($db->link, $_SESSION['username']);
                        $pro_image = mysqli_real_escape_string($db->link, $pro_image);

                        if($body == ""|| $author == ""){
                            echo "<span class= 'error'>Field must not be empty !</span>";
                        }

   
                       else
                        {
                           $query = "INSERT INTO tbl_post( body, author, pro_image) VALUES('$body', '$author',
                           '$pro_image')";
    
                           $inserted_rows = $db->insert($query);
                           if ($inserted_rows) 
                           {
                            echo "<span class='success' >Post Inserted Successfully.</span>";
                           }else 
                           {
                            echo "<span class='error'>Post Not Inserted !</span>";
                           }
                        }
                    }
?>

<?php include 'inc/userlist.php';?>
                <div class="block-post">      

                        <h2>Start Discussion</h2>    

                     <form action="" method="post" enctype="multipart/form-data">
                        <table class="addpost-form">
                            
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px; margin-left:50px;">
                                      <!-- profile image -->
        <?php   
                  
            $query = "SELECT * FROM user2 WHERE user_name='".$_SESSION['username']."'";
                $result = $db->select($query);
                if($result != false){
                    if(mysqli_num_rows($result)>0){
        ?>                              

        <?php  
            while ($user = mysqli_fetch_array($result)) {?>
                                                             
            <img src="<?php echo $user['image'];?> " style="width:90px;height: 90px;margin:2px; border-radius:60%;" />   
        <h4><?php echo $_SESSION['username']; ?></h4>
                   
        <?php }}}?>
                    <?php if (isset($_POST['cmnt_submit'])) 
                       {
                             # code...
                            $comment = $_POST['comment_content'];
                            $user_name= $_SESSION['username'];
                            $post_id = $_POST['id'];
                            if($comment == ''){?>
                                <span style='color:#e53d37'>Field must not be empty</span>
                             <?php}
                            else{
                                
                                $sql = "INSERT INTO tbl_comment(user_name,post_id,comment)
                                VALUES('$user_name','$post_id','$comment')";
                                $cmnt = $db->insert($sql);
                                if($cmnt){                    
                                }?>
                                <script type="text/javascript">
                                    location.replace("post2.php");
                                </script>
                                
                                    
                           <?php }
                         } 
                     ?>
         <!-- profile image -->
                                </td>
                                <td>
                                    <textarea id="myEditor" name = "body"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" hidden name= "author"  class="medium" />
                                </td>
                            </tr>
                           
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                <!-- add post -->

   
    <div class="post-section contemplete clear">
            
        <div class="post-main clear">
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
                global $pic;   
                $query = "select * from tbl_post where active=1 order by id desc limit $start_from, $per_page";
                $post= $db->select($query);
                if($post){
                while ($result = $post->fetch_assoc()){
                $id = $result['id'];

            ?>

            
            <div class="post clear> 
                <a href="#"><img  style="width:50px;height: 50px;margin:1px; border-radius:60%;"  src="<?php echo $result['pro_image']?>">
                <h3><?php echo $result['author'];?><br> <br></a></h3> </br>

                <?php if ($result['author']==$_SESSION['username']) {?>
                    
                    <a style="float: right;" class="btn" href="delete_post.php?post_id=<?php echo $result['id']?>"> Delete</a>

               <?php } ?>

                <h5><?php echo $fm->formatDate($result['date']);?></h5> </br>

                <p style=" margin-bottom: 20px;margin-top: 20px; font-size: 1.1em; ">
                    <?php echo $result['body']; ?>
                </p> <br/>

                <div class="vote">
                    <div class="upvote">
                        <form action='like.php' method="POST">
                            <input type="hidden" name="id" value=<?php echo $id; ?>>
                            
                            <?php 
                                $sql="SELECT * FROM tbl_like WHERE post_id = '$id'";
                                $result= $db->select2($sql);
                                $cnt_likes=mysqli_num_rows($result);
                            ?>
                            <i class="fa fa-arrow-circle-up">
                            <input type="submit" name="like" value="Upvote">
                            </i>
                           
                            <?php echo $cnt_likes; ?> </input>
                        </form>
                    </div>

                    <div class="downvote">
                        <form action='dislike.php' method="POST">
                            <input type="hidden" name="id" value=<?php echo $id; ?>>
                            <?php 
                                $sql="SELECT * FROM tbl_dislike WHERE post_id = '$id'";
                                $result= $db->select2($sql);                   

                                $cnt_dislikes=mysqli_num_rows($result);
                            ?>
                            <i class="fa fa-arrow-circle-down">
                            <input type="submit" name="dislike" value="Downvote">
                            </i>
                            <?php echo $cnt_dislikes; ?></input>
                        </form>
                    </div>    
                             

                    <div class="cmnt_container">
                        <form method="post" id="comment_form">
                            <input type="hidden" name="id" value=<?php echo $id; ?>>

                            <div class="form_group">
                                <img src="<?php echo $pro_image;?> " style="width:40px;height: 40px;margin:2px;margin-top: 15px; border-radius:80%;" />
                                <input  type="text" name="comment_content" id="comment_content" class="form_control" 
                                placeholder="Give your Opinior"/>          
                            </div>
                            <div class="cmnt-submit">          
                                <input type="submit" name="cmnt_submit" id="cmnt_submit" Value="Save" />
                            </div>                           
                        </form>                    
                    </div>
                </div>  
                <?php 
                               $sql="SELECT * FROM tbl_comment WHERE post_id = '$id'";
                                $result= $db->select2($sql);                   

                                $cnt_comments=mysqli_num_rows($result);                

                 ?>

                <div style="margin-left: 70px;margin-top: 20px;" class="row">
                       <a style="color: #006669; font-weight: bold; margin-bottom: 10px;"  id="abouttb" tabindex="1" class="opinion"><?php echo $cnt_comments; ?> Opinion</a>


                    <div style="margin-top: 10px; padding: 5px;"  class="comment-section" id="comment_section">
                        <?php
                            $con_query="SELECT * FROM tbl_comment WHERE post_id = '$id' ORDER BY post_id DESC";
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
                                <div style="border: 1px  #006669;padding: 3px;" class="comment">
                                <a href="#"><img  style="width:30px;height: 30px;margin:1px; border-radius:60%; margin-right: 5px;"  src="<?php echo $row['image']?>">
                                <i style="color: #006669; font-size: 1.1em;margin-right: 5px;"><?php echo $user_name; ?></i>
                                <?php echo $comment; ?><br>
                                <br>                                     

                                </div>

                         
                        <?php } } }?>
                    </div>

                </div>

                
            </div>
    <?php } ?> <!-- end while loop -->

    

<!--pagination-->
<?php 
    $query = "select * from tbl_post";
    $result = $db->select($query);
    $total_rows = mysqli_num_rows($result);
    $total_pages = ceil($total_rows/$per_page);         

    echo "<span class='pagination'><a href='post2.php?page=1'>".'First Page'."</a>"; 

    for($i=1; $i<=$total_pages; $i++){
        echo "<a href='post2.php?page=".$i."'>$i</a>";
    }

    echo "<a href='post2.php?page=$total_pages'>".'Last Page'."</a></span>"
?>

</div>
<!--pagination-->
        <?php } else { ?>
                <script type="text/javascript">
                    location.replace("post2.php");
            </script>
   <?php } ?>  
        </div>
    </div>

        </body>