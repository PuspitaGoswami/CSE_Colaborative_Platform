<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Card List For Career Development</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>							
							<th width="15%">Image</th>
							<th width="20%">Post Title</th>
							<th width="50%">Description</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>

					<
					<?php
						
						
						$query = "SELECT * FROM tbl_careerpage ORDER BY id";
						$post = $db->select($query);
						if($post){
							$i=0;
							while($result = $post->fetch_assoc()){
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><img src="<?php echo $result['image'];?>" height="40px" width="60px"></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->textShorten($result['body'], 80); ?></td>
							
							<td>
							<a href="editpost.php?editpostid=<?php echo $result['id']; ?>">Edit</a> 
							|| 
							<a onclick="return confirm('Are you sure to delete !');" 
							 href="deletepost.php?delpostid=<?php echo $result['id']; ?>">Delete</a>
							</td>
						</tr>

				
					<?php }} ?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
       
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
   <?php include 'inc/footer.php'; ?>
