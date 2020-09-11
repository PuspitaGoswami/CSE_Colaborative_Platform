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

<?php 
    $user=$_SESSION['username'];
        $blog_id = $_POST['id'];
        $query="SELECT * FROM blog_dislike WHERE user_name='$user' AND blog_id='$blog_id'";
        $result=$db->select($query);
        if (mysqli_num_rows($result)>0) {
                header("location:blog2.php?id=" .$blog_id);
                  exit;
        }
        else{

              $query="SELECT * FROM blog_like WHERE user_name='$user' AND blog_id='$blog_id'";
              $result=$db->select($query);
              if (mysqli_num_rows($result)>0) {
                header("location:blog2.php?id=" .$blog_id);
                  exit;
                 }
              else{
                if (isset($_POST['dislike'])) {
                $sql = "INSERT INTO blog_dislike(user_name,blog_id)
                VALUES('$user','$blog_id')";
                $result=$db->insert($sql);
                if ($result) {
                            header("location:blog.php?id=" .$blog_id);
                               exit;
                }
              }
              }

          
        }

 ?>
