<?php 
    include 'inc/header.php';
?>
<?php 
	if(!isset($_GET['catagory']) || $_GET['catagory']==NULL){
		header("Location: 404.php");
	}
	else{
		$id = $_GET['catagory'];
	}
?>

	<div class="contentsection contemplete clear">

	<?php include "inc/sidebar.php"; ?>
		<div class="maincontent clear">
		
            <?php	
                $query = "select * from tbl_blog where cat=$id";
                $post= $db->select($query);
                if($post){
                while ($result = $post->fetch_assoc()){
            ?>
            <h3><a href="user_profile.php"><?php echo $result['author'];?></a></h3>
			<div class="samepost clear">
            <img src="<?php echo $result['image']; ?>" alt="post image"/>
				<h2><a href="blogpost.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($result['date']);?></h4>
                <p>
					<?php echo $fm->textShorten($result['body']); ?>
               </p>
				<div class="readmore clear">
					<a href="blogpost.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>
            <?php } } else { ?>
                 <h3>No Post Available in this Category. </h3>
            <?php } ?>     	
        </div>
    