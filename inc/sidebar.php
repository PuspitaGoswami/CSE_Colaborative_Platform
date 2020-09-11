<div class="sidebar clear">
	<div class="searchbtn clear">
		<form action="search.php" method="get">
			<input type="text" name="search" placeholder="Search keyword..."/>
			<input type="submit" name="submit" value="Search"/>
		</form>
	</div>

	<div class="samesidebar clear">
		<h2>Categories</h2>
			<ul>
				<?php	
					$query = "select * from tbl_catagory";
					$catagory= $db->select($query);
					if($catagory){
					while ($result = $catagory->fetch_assoc()){
				?>
			<li><a href="cat-post.php?catagory=<?php echo $result['id'];?>">
			<?php echo $result['name']; ?></a></li>
		<?php } } else { ?>	
			<li>No Category Created</li>						
			</ul>
		<?php } ?>
	</div>

		
</div>	