
<?php include 'inc/header.php';?>


<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" >
                <h2 style="color:black;">Career Development</h2>

            </div>

            <div class="panel-body">
		
		
            <?php	
                $query = "select * from tbl_careerpage order by id desc";
                $post= $db->select($query);
                if($post){
                while ($result = $post->fetch_assoc()){
            ?>
            
            <div>
                <div >

                    <div class="card" style="float:left;">
                        <?php $i; ?>
                            <img class= "img" src="admin/<?php echo $result['image']; ?>"/> 
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $result['title']; ?> </h4>
                                <p class="card-text">
                                    <?php
                                        if(strlen($result['body']) > 200) {
                                            echo substr($result['body'], 0, 70)." ..."; 
                                        }  else {
                                            echo $result['body'];
                                        }
                                    ?> 
                                </p>
                                <a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
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
 


	