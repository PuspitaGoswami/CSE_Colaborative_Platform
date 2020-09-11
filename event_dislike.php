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
        $event_id = $_POST['id'];
        $query="SELECT * FROM event_dislike WHERE user_name='$user' AND event_id='$event_id'";
        $result=$db->select($query);
        if (mysqli_num_rows($result)>0) {
                header("location:event.php?id=" .$event_id);
                  exit;
        }
        else{

              $query="SELECT * FROM event_like WHERE user_name='$user' AND event_id='$event_id'";
              $result=$db->select($query);
              if (mysqli_num_rows($result)>0) {
                header("location:event.php?id=" .$event_id);
                  exit;
                 }
              else{
                if (isset($_POST['dislike'])) {
                $sql = "INSERT INTO event_dislike(user_name,event_id)
                VALUES('$user','$event_id')";
                $result=$db->insert($sql);
                if ($result) {
                            header("location:event.php?id=" .$post_id);
                               exit;
                }
                else{
                  echo $sql;
                }
              }
              }

          
        }

 ?>
