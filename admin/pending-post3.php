<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
						<thead>
							<tr>
								<th width="5%">No</th>
								<th width="40%">Description</th>
								<th width="15%">Author</th>
								<th width="10%">Date</th>
								<th width="10%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT * FROM alumnus_feedback ORDER BY id DESC ";
								$post = $db->select($query);
								if($post){
									$i=0;
									while($result = $post->fetch_assoc()){
									$i++;
							?>
								<tr class="odd gradeX">
									<td><?php echo $i; ?></td>
							
									<td><?php echo $fm->textShorten($result['body'], 50); ?></td>
									<td><?php echo $result['author'];?></td>					
									<td><?php echo $fm->formatDate($result['date']); ?></td>
									<td>
									<a onclick="return confirm('Are you sure to approve !');" 
							         href="approve3.php?approvepostid=<?php echo $result['id']; ?>">Approve</a>
								</tr>
							<?php	} }?>
							
						</tbody>
					</table>
				</div>
            </div>
        </div>

	<!--

	<script>
		const approv=document.querySelectorAll(".approve");
		approv.forEach(function(item,index))
		{
			item.addEventListener("click",approvNow)
		}
		function approvNow(e)
		{
			e.preventDefault();
			if (confirm("Do you really Want to Approve"))
			{
				const xhr= new XMLHttpRequest();
				xhr.open("GET", "approve.php?id="+Number(e.target.id), true)
				xhr.onload=function()
				{
					const messg=xhr.responseText;
					const message=document.getElementById("message")
					message.innerHTML=messg;
				}
				xhr.send()
			}
		}
	</script>   
	-->

	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
   <?php include 'inc/footer.php'; ?>
