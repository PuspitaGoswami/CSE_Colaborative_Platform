<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		<div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display "> 
						<thead>
							<tr>
								<th width="10%">No</th>
								<th width="35%">Description</th>
								<th width="20%">Author</th>
								<th width="20%">Date</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT * FROM tbl_post where active='0' ORDER BY id DESC ";
								$post = $db->select($query);
								if($post){
									$i=0;
									while($result = $post->fetch_assoc()){
									$i++;
							?>
								<tr class="odd gradeX">
								    
									<td><?php echo $i; ?></td>
									<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
									<td><?php echo $result['author'];?></td>	
									<!-- <td><img src="<?php echo $result["pro_image"]?>" height="10px" width="10px" alt=""></td>	-->				
									<td><?php echo $fm->formatDate($result['date']); ?></td>
									<div class="view">
										<td>
										    <button type="button" class="btn btn-info" style="background:darkcyan;">
												<a href="viewpost2.php?viewpostid=<?php echo $result['id']; ?>">View</a>
											</button>			
											
											<button type="button" class="btn btn-info" style="background:darkcyan;">
												<a onclick="return confirm('Are you sure to approve !');" 
												href="approve2.php?approvepostid=<?php echo $result['id']; ?>">Approve</a>
											</button>	
										</td>
									</div>
								</tr>
							<?php	} }?>
							
						</tbody>
					</table>
				</div>
            </div>
			<div class="box round first grid">
                <h2>Seen Post</h2>
				<?php
					if(isset($_GET['delid'])){
						$delid = $_GET['delid'];
						$delquery = "delete from tbl_post where id = '$delid'";
						$deldata = $db->delete($delquery);
						if ($deldata){
							echo "<span class= 'success'>Post deleted successfully !</span>";
						}
						else{
							echo "<span class= 'error'>Post not deleted !</span>";
						}
					}
				?>
            	<div class="block">        
				<table class="data display">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="35%">Description</th>
							<th width="20%">Author</th>
							<th width="20%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "select * from tbl_post where active='1' order by id desc";
							$msg = $db->select($query);
							if($msg){
								$i = 0;
								while($result = $msg->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
						            <td><?php echo $i; ?></td>
									<td><?php echo $fm->textShorten($result['body'], 50); ?></td>
									<td><?php echo $result['author'];?></td>
									<!-- <td><img src="<?php echo $result["pro_image"]?>" height="10px" width="10px" alt=""></td> -->					
									<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td>
								<button type="button" class="btn btn-info" style="background:darkcyan;">
									<a href="viewpost2.php?viewpostid=<?php echo $result['id']; ?>">View</a>
								</button>

								<button type="button" class="btn btn-danger" style="background:red; color:white !important;">
									<a onclick="return confirm('Are you sure to delete !');" href="?delid=<?php echo $result['id']; ?>">Delete</a>
								</button>
							</td>
						</tr>
						<?php }}?>
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