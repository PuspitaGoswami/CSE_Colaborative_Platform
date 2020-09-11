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
		
    if(isset($_GET['blog_id'])){
       $id = $_GET['blog_id'];
       $sql="DELETE  FROM tbl_blog WHERE id='$id'";
       $result=$db->delete($sql);
       if ($result) {
      header('location:my_blog.php');

       	# code...
       }
       else{
       	echo $sql;
       }
    }


 ?>