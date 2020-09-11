<?php include 'inc/header.php';?>
		<!--
		   <div style="float: right; margin-right: 50px; margin-bottom: 50px;margin-top:30px;" class="section search">
				<form action="event_search.php" method="get">
					<input type="text" name="search" class="search_blog" placeholder="Search..."> 
					<input type="submit" name="submit" value="search">
				</form>
			</div>
		-->

<div class="event" style="background: #C5DDEB;">
<div class="container">
	<div class="contentsection contemplete clear">          
		<div class="maincontent clear">
			<!-- ----search -------- -->
			<div class="section-search" style="float: right; margin-right: 50px; margin-bottom: 30px;margin-top:40px;">
				<form action="event_search.php" method="get">
					<input type="text" name="search" class="search_blog" placeholder="Search event..."> 
					<input type="submit" name="submit" value="search">
				</form>
			</div>
		<!-- ----search -------- -->
		<!--pagination-->
		<?php
			$per_page = 5;
			if (isset($_GET["page"])){
				$page = $_GET["page"];
			}
			else{
				$page = 1;
			}
			$start_from = ($page-1) * $per_page;
		?>
		<!--pagination-->
		<?php	
			// $query = "select tbl_event.title, tbl_event.body, event_img.image 
			// from tbl_event join event_img
			// on tbl_event.id = event_img.event_id
			//  limit $start_from, $per_page";

			$query = "SELECT id, title, body,status FROM tbl_event limit $start_from, $per_page";
			$post = $db->select($query);
			if($post) {
				while ($result = $post->fetch_assoc()) {
        ?>
			<div class="event2 clear">
			    <h2><?php echo $result['title'];?></h2>
			    
			    <div class="container2">
			    	<?php
			    		$i = 0;
			    		$event_id = $result['id'];
						$query1 = "SELECT * FROM event_img WHERE event_id = $event_id";
						$image = $db->select($query1);
						if($image) {
			    	?>
		        	<div id="myCarousel_<?php echo $event_id;?>" class="carousel slide" data-ride="carousel" data-interval="3000" data-wrap="false">
		        		<div class="carousel-inner" role="listbox">
		        			<?php
		        				$i = 1;
		        				while ($result_img = $image->fetch_assoc()) {
		        					if($i == 1) {
		        			?>
			        			<div class="item active">
			        				<img src="admin/<?php echo $result_img['image'];?>" alt="no image" width="360" height="245">
			        			</div>
		        			<?php
		        					} else {
		        			?>
		        				<div class="item">
			        				<img src="admin/<?php echo $result_img['image'];?>" alt="no image" width="360" height="245">
			        			</div>
		        			<?php
		        					}
		        					$i++;
		        				}
		        			?>
		        		</div>

		        		<a class="left carousel-control" href="#myCarousel_<?php echo $event_id;?>" role="button" data-slide="prev">
		        			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		        			<span class="sr-only">Previous</span>
		        		</a>
		        		<a class="right carousel-control" href="#myCarousel_<?php echo $event_id;?>" role="button" data-slide="next">
		        			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		        			<span class="sr-only">Next</span>
		        		</a>
		        	</div>
		        	<?php
		        		}
		        	?>
		        </div>
            	
				<p><?php echo $result['body'];?></p>   
			</div>
				

					<?php 
				if ($result['status']=='upcoming') {?>
					<form  action='event_like.php' method="POST">

                    <input type="hidden" name="id" value=<?php echo $event_id; ?>>

                    <?php 
                        $sql="SELECT * FROM event_like WHERE event_id = '$event_id'";
                        $result= $db->select2($sql);
                        $cnt_likes=mysqli_num_rows($result);
                     ?>
                    <input style="background: none; color:blue;border: none;" type="submit" name="like" value="Interested"><?php echo $cnt_likes; ?>

                </form>

                <form action='event_dislike.php' method="POST">

                    <input type="hidden" name="id" value=<?php echo $event_id; ?>>
                    <?php 
                        $sql="SELECT * FROM event_dislike WHERE event_id = '$event_id'";
                        $result= $db->select2($sql);
                    

                        $cnt_dislikes=mysqli_num_rows($result);
                     ?>
                    <input style="background: none; color:blue;border: none;" type="submit" name="dislike" value="Not Interested"><?php echo $cnt_dislikes; ?>

                </form>

							
						<?php}?>

    <?php }} ?> <!-- end while loop -->

<!--pagination-->
<?php 
	$total_pages_sql = "SELECT * FROM tbl_event";
	$total_pages_result = $db->select($total_pages_sql);
	$total_rows = mysqli_num_rows($total_pages_result);
	$total_pages = ceil($total_rows/$per_page);
	
	echo "<span class='pagination'><a href='event.php?page=1'>".'First Page'."</a>"; 

	for($i=1; $i<=$total_pages; $i++){
		echo "<a href='event.php?page=".$i."'>$i</a>";
	}

	echo "<a href='event.php?page=$total_pages'>".'Last Page'."</a></span>"
?>

</div>
<!--pagination-->
        <?php } else { header("Location:404.php");} ?>	
</div>
</div>
		<?php include "inc/footer.php"; ?>

	<!-- ---------------------Styling------------ -->
	<style>
		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
			width: 70%;
			margin: auto;
		}
	</style>

  	<!-- --------------------Scirpt------------------ -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	