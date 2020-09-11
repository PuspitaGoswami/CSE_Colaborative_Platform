<?php include 'inc/header.php';?>

<?php 
        global $occupation;
        global $Batch;
        global $pro_image;
        $sql="SELECT * FROM user2 WHERE user_name='".$_SESSION['username']."'";
        $result=$db->select($sql);
        if($result)
        {
                while ($row = $result->fetch_assoc())
                {
                    $occupation=$row['occupation'];
                }
        }
       
 ?>

<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <?php if ($occupation=='Alumni') {

                    $query = 'SELECT * FROM alumnus_feedback  WHERE author="'.$_SESSION['username'].'"';
                    $result = $db->select2($query);
                    if($result!=false){
                       if (mysqli_num_rows($result)==0) {?>
                    <a href="create-feedback.php" class="btn btn-default btn-lg active" role="button" 
                    style="color: white; background: #006669;float: right;margin-top: 20px;font-weight: bold;">
                    Add Your Feedback here</a>


                      <?php }

                    }


                    ?>

                <?php  } ?>
                <h2 style="color:black;">Alumni feedback page</h2>
                <h4>Share your Four Years Journey with Leading University.</h4>
            </div>
            

            <div class="panel-body">

		
            <?php	
                $query = "select * from alumnus_feedback order by id desc";
                $post= $db->select($query);
                if($post){
                while ($result = $post->fetch_assoc()){
            ?>
            <div class="page" >
                <div class="row" style="float:left;">
                    <div class="col-md-5" style="float:left; margin-left: -14px;">
                    
                        <div class="alumni clear" style="float:left;">
                            <div class="left-page clear">
                                
                                <?php 
                                 $sql="SELECT * FROM user2 WHERE user_name='".$result['author']."'";
                                 $r=$db->select($sql);
                                if($r){
                                     while ($row = $r->fetch_assoc()){
                                        $batch=$row['batch'];
                                        $pro_image = $row['image'];
                                     }

                                }?>

                                <img style="margin-left: 80px; margin-top: 15px;
                                width: 100px;height: 100px;border-radius: 70%;"
                                 src="<?php echo $pro_image; ?>">

                                <h2 style="color: white !important; padding-top: 0px;
                                 padding-left: 57px; font-style: normal !important; 
                                 font-weight: bold;"><a href="user_profile.php">
                                <?php echo $result['author'];?></a></h2>


                               <h4>Batch no. <?php echo $batch; ?></h4>
                                <h4><?php echo $fm->formatDate($result['date']);?></h4>
                            </div>
                            <div class="right-page clear">
                                <p>
                                    <?php
                                        if(strlen($result['body']) > 200) {
                                            echo substr($result['body'], 0, 370)." ....."; 
                                        }  else {
                                            echo $result['body'];
                                        }
                                    ?> 
                                </p>
                                <div class="readmore clear">
                                    <a href="alumni_details.php?id=<?php echo $result['id']; ?>">Read More</a>
                                </div>
                            </div>    
                        </div>
                    </div>    
                </div>
            </div>
           
            <?php } ?>    
    </div>


            
 <!-- end while loop -->

<!--pagination-->

        <?php } else { header("Location:404.php");} ?>	
</div>
 

	
<?php include "inc/footer.php"; ?>	