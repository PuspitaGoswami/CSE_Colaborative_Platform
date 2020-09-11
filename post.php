<?php include "inc/header.php";?>

<?php 
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		header("Location: 404.php");
	}
	else{
		$id = $_GET['id'];
	}
?>

	<div class="container clear">
		<div class="career-details clear">
		<a href="career.php" class="btn btn-default btn-lg active" role="button" 
                    style="color: white; background: #006669;float: right;margin-top: 20px;font-weight: bold;">
                    Back</a>
			<div class="about">

				<?php
					$query = "select * from tbl_careerpage where id=$id";
					$post= $db->select($query);
					if($post){
					while ($result = $post->fetch_assoc()){
				?>

					<h2><?php echo $result['title']; ?></h2>
					<img src="admin/<?php echo $result['image']; ?>" alt="post image"/>
					<?php echo $result['body']; ?>
				<?php } }?>
				
	        </div>
		</div>

		
