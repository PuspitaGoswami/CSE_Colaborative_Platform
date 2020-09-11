<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Messages</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>							
							<th width="15%">Name</th>
							<th width="20%">Email</th>
							<th width="50%">Message</th>
						</tr>
					</thead>
					<tbody>

					<?php
						
						
						$query = "SELECT * FROM contactUs ORDER BY id";
						$post = $db->select2($query);
						if($post){
							$i=0;
							while($result = $post->fetch_assoc()){
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['user_name']; ?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['message']?></td>
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
