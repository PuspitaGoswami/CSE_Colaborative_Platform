<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

				<?php
					if(isset($_GET['delcat'])){
						$delid = $_GET['delcat'];
						$delquery = "delete from tbl_catagory where id = '$delid'";
						$deldata = $db->delete($delquery);
						if ($deldata){
							echo "<span class= 'success'>Category deleted successfully !</span>";
						}
						else{
							echo "<span class= 'error'>Category not deleted !</span>";
						}
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
						$query = "select * from tbl_catagory order by id";
						$catagory = $db->select($query);
						if($catagory){
							$i = 0;
							while($result = $catagory->fetch_assoc()){
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name'];?></td>
							<td>
							<button type="button" class="btn btn-info" style="background:darkcyan;">
								<a  href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> 
							</button>	
							<button type="button" class="btn btn-danger" style="background:red; color:white !important;">	
							    <a onclick="return confirm('Are you sure to delete !');" href="?delcat=<?php echo $result['id']; ?>">Delete</a></td>
							</button>
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