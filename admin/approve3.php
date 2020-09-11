<?php 
	include '../lib/Session.php';
	Session::checkSession();

?>
<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include '../helpers/Format.php';?>

<?php
	$db = new Database();
?>

<?php
            if(!isset($_GET['approvepostid']) || $_GET['approvepostid'] == NULL)
            {
                echo "<script>window.location = 'pending-post3.php';</script>";
            }
            else
            {
                $postid = $_GET['approvepostid'];

                $query = "select * from alumnus_feedback where id='$postid'";
                $getData = $db->select($query);
                if ($getData) {
                while ($approveimg = $getData->fetch_assoc()){
                    $approvelink = $approveimg['image'];
                    //unlink($approvelink);
                }

            }
            
            //$approvequery = "update from tbl_post where id= '$postid'";
            $approvequery = "update alumnus_feedback set active=1 where id='$postid' ";
            $approveData = $db->update($approvequery);
            if ($approveData){
                echo "<script>alert('Data Approved Successfully.');</script>";
                echo "<script>window.location = 'pending-post3.php';</script>";
            }
            else{
                echo "<script>alert('Data Not Approves.');</script>";
                echo "<script>window.location = 'pending-post3.php';</script>";
            }
        }
?>