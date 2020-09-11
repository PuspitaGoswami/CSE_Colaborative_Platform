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
        $post_id = $_POST['id'];
        $query="SELECT * FROM tbl_dislike WHERE user_name='$user' AND post_id='$post_id'";
        $result=$db->select($query);
        if (mysqli_num_rows($result)>0) {
                header("location:post2.php?id=" .$post_id);
                  exit;
        }
        else{

              $query="SELECT * FROM tbl_like WHERE user_name='$user' AND post_id='$post_id'";
              $result=$db->select($query);
              if (mysqli_num_rows($result)>0) {
                header("location:post2.php?id=" .$post_id);
                  exit;
                 }
              else{
                if (isset($_POST['dislike'])) {
                $sql = "INSERT INTO tbl_dislike(user_name,post_id)
                VALUES('$user','$post_id')";
                $result=$db->insert($sql);
                if ($result) {
                            header("location:post2.php?id=" .$post_id);
                               exit;
                }
              }
              }

          
        }

 ?>
