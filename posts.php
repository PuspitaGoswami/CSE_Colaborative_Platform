<?php 
    include 'inc/header.php';
?>
<!--
<?php 
	if(!isset($_GET['catagory']) || $_GET['catagory']==NULL){
		header("Location: 404.php");
	}
	else{
		$id = $_GET['catagory'];
	}
?>
-->

	<div class="contentsection contemplete clear">
    <?php include "inc/sidebar.php"; ?>
		<div class="maincontent clear">
            <?php	
                $query = "select * from tbl_post where cat=$id";
                $post= $db->select($query);
                if($post){
                while ($result = $post->fetch_assoc()){
            ?>
            <div class="samepost clear">
                <h2><a href="post3.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
                <h4><?php echo $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
                <a href="#"><img src="<?php echo $result['image']; ?>" alt="post image"/></a>

                <?php echo $fm->textShorten($result['body'], 400); ?>

                <div class="readmore clear">
                    <a href="post3.php?id=<?php echo $result['id']; ?>">Read More</a>
                </div>
            </div>
            <?php } } else { ?>
                 <h3>No Post Available in this Category. </h3>
            <?php } ?>     	
        </div>
<?php include "inc/footer.php"; ?>