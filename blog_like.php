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
    

        $query2="SELECT * FROM blog_like WHERE user_name='$user' AND blog_id='$blog_id'";
        $result2=$db->select($query2);
        if (mysqli_num_rows($result2)>0) {
        	      header("location:blog2.php?id=" .$blog_id);
                  exit;
        }
        else{
				if (isset($_POST['like'])) {
					$sql = "INSERT INTO blog_like(user_name,blog_id)
					VALUES('$user','$blog_id')";
					$result=$db->insert($sql);
					if ($result) {
                   $query = "SELECT * FROM tbl_blog WHERE id='$blog_id'";
                   $result=$db->select2($query);
                   $row = mysqli_fetch_array($result);
                   $n=$row['likes'];
    
                    $sql="UPDATE tbl_blog SET likes=$n+1 WHERE id='$blog_id'";
                    $result=$db->update($sql);

			                header("location:blog2.php?id=" .$blog_id);
		                     exit;
					}
				}        	
        } ?>
