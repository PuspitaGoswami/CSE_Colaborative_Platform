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
                echo "<script>window.location = 'pending-post2.php';</script>";
            }
            else
            {
                $postid = $_GET['approvepostid'];

                $query = "select * from tbl_post where id='$postid'";
                $getData = $db->select($query);
                if ($getData) {
                while ($approveimg = $getData->fetch_assoc()){
                    $approvelink = $approveimg['image'];
                    //unlink($approvelink);
                }

            }
            
            //$approvequery = "update from tbl_post where id= '$postid'";
            $approvequery = "update tbl_post set active=1 where id='$postid' ";
            $approveData = $db->update($approvequery);
            if ($approveData){
                echo "<script>alert('Data Approved Successfully.');</script>";
                echo "<script>window.location = 'pending-post2.php';</script>";
            }
            else{
                echo "<script>alert('Data Not Approves.');</script>";
                echo "<script>window.location = 'pending-post2.php';</script>";
            }
        }
?>