<?php 
	include 'inc/header.php';
?>
<style type="text/css">
	*{margin: 0;padding: 0;outline: 0}
body{font-size:16px;line-height:25px;font-family:arial;}
.wrapper{margin:0 auto;width:960px;background:#EFEFEE}
.header{}
.header h3{color:#fff;font-size:25px;background:#525251;padding:15px 40px;text-align:center;}
.mainmenu{margin-top:5px;}
.mainmenu ul{list-style:none;}
.mainmenu ul li{float:left;}
.mainmenu ul li a{text-decoration:none;color:#fff;padding:5px 10px;background:#525251;border-right:1px solid #fff;}
.mainmenu ul li a:hover{}
.st{border-bottom:2px solid #000000;margin-top:30px}
.content {
  text-align: center;
    margin: 0 auto;
    margin-top: 60px;
    background: #fff;
    padding: 2px 71px;
    width: 500px;
    margin-bottom: 0px;
}
.msg{text-align:center;}
.login_reg {
    margin: 0 auto;
    margin-top: 5px;
    background: #fff;
    padding: 12px 19px;
    width:500px;
    padding-left: 50px;
    padding-right: 50px;    
    border: none;
}


.login_reg input[type="reset"],.login_reg input[type="submit"] {
  float: right;
  height: 30px;
  margin: 3px 3px;
  width: 60px;
	bottom: 10px;
	right: 10px;
	border: 1px solid #006669;
	background: transparent;
	border-radius: 0px;
	color: #006669 !important;
	padding-bottom: 5px;
	padding-right: 10px;
	margin-right: 5px;

 
}
.login_reg input[type="submit"] {margin-right: 15px;
	padding-right: 20px;
}
.login_reg input[type="reset"]:hover,.login_reg input[type="submit"]:hover {


	background: #006669;
	color: white !important;
	transition: .25s;}



.back{text-align: center;}
.footer{}
.footer h3{color:#fff;font-size:20px;background:#525251;padding:10px 40px;text-align:center;}
/*CSS for index page */

.user{margin:0 auto;
    margin-top: 10px;
    background: #D9D9D8;
    padding: 2px 71px;
    width: 210px;
    text-align: center;}
.userlist{margin:0 auto;
    margin-top: 10px;
    background: #fff;
    padding: 2px 71px;
    width: 210px;
    color:green;
    font-size:20px;
    margin-bottom:10px;
  text-align: center;}
   .style_table{margin:0 auto;}
  .style_table tr th{background:#888;padding:3px 5px;color:#fff;text-shadow:1px 1px 1px #000;}
  .style_table tr:nth-child(2n){background:#efefef;height: 200px;}
  .style_table tr:nth-child(2n+1){background:#ccc;}
  .style_table tr td a{text-decoration:none;color:#0078D7;}
  
  .login_msg{margin: 10px auto;
    background:#00FA08;
    text-align: center;
    width: 350px;}
    
    .error{color: red;}
  input{
    	  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border: none;

  border-bottom: 1px solid #4caf50;
    }
  td{
  
   	padding-right:10px; 
   }   
</style>


<?php
$uname = $_SESSION['username'];
?>

<?php 

 ?>

		<div class="">
			<?php //include_once "inc/header.php";?>
			
			<div class="content">
				<h2>Update Your Profile</h2>
			</div>
			<p class="msg">
			<?php
				if($_SERVER["REQUEST_METHOD"]=="POST"){
					$permited 	= array('jpg','jpeg','png','gif','swf');
			$file_name  = $_FILES['image']['name'];
			$file_size  = $_FILES['image']['size'];
			$file_temp  = $_FILES['image']['tmp_name'];

			$div 		= explode('.', $file_name);
			$file_ext   = end($div);
			$unique_name 	= substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "images/".$unique_name;

			
					$username = $_POST['username'];
					//$name = $_POST['name'];
					//$email = $_POST['email'];
					//$website = $_POST['website'];
					$occupation = $_POST['occupation'];
					$phone = $_POST['phone'];
					$std_id = $_POST['std_id'];
					$job = $_POST['job'];

					
				
					if(empty($username) or  empty($occupation) or empty($std_id)){
						echo "";
					// }else if(empty($file_name)){
					// 	echo "<span class='error'>Please Select Any image.</span>";
					// }elseif($file_size>1048576){
					// 	echo "<span class='error'>Image size should be less then 1 MB</span>";
					// }elseif(in_array($file_ext, $permited)===false){
					// 	echo "<span class='error'>You can uploads only:-".implode(',', $permited)."</span>";
					}
					elseif ($file_size >30048567) 
                    {
                        echo "<span class='error'>Image Size should be less then 1MB!
                        </span>";
                    } 


					else if (move_uploaded_file($file_temp, $uploaded_image)) 
						# code...
					{
						move_uploaded_file($file_temp, $uploaded_image);
						$query = "UPDATE user2 SET user_name='$username',occupation='$occupation', phone='$phone',image='$uploaded_image',std_id='$std_id',job='$job' WHERE user_name='$uname'";
						$update = $db->update($query);
						

						if($update){
							echo "<span style='color:green'>Information Updated Successfully.</span>";
						}

					}
					else{

						$query = "UPDATE user2 SET user_name='$username',occupation='$occupation', phone='$phone',std_id='$std_id',job='$job' WHERE user_name='$uname'";
						$update = $db->update($query);
						

						if($update){
							echo "<span style='color:green'>Information Updated Successfully.</span>";
						}

					}

				}


				?>	
			</p>
			<?php 

			   $query = "SELECT * FROM user2 WHERE user_name = '$uname'";

				$result = $db->select($query);
				if($result!=false){
					while ($userdetails = $result->fetch_assoc()){	
									?>
						<div class="login_reg">
							

							<form action="" method="post" name="reg" enctype="multipart/form-data">
								<table class="tbl">

									<tr>
										<td>Student ID:</td>
										<td><input type="text" name="std_id" value="<?php echo $userdetails['std_id']?>"/></td>
									</tr>
									<tr>
										<td>Username:</td>
										<td><input type="text" name="username" value="<?php echo $userdetails['user_name']?>"/></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><input type="text" name="email" value="<?php echo $userdetails['email']?>"/></td>
									</tr>
									<?php ?>
									<tr>
										<td>Occupation:</td>
										<td><input type="text" name="occupation" value="<?php echo $userdetails['occupation']?>"/></td>
									</tr>

									<tr>
										<td>Works At:</td>
										<td><input type="text" name="job" value="<?php echo $userdetails['job']?>"/></td>
									</tr>
									<tr>
										<td>Phone:</td>
										<td><input type="text" name="phone" value="<?php echo $userdetails['phone']?>"/></td>
									</tr>
									<tr>
										<td>Select Image</td>
										<td><input type="FILE" name="image" accept= "imageimage/png, image/jpeg, image/jpg" />

									</td>
									<?php
										global $pro_image;
										$sql="SELECT * FROM user2 WHERE user_name='$uname'"; 
										$r=$db->select($sql);
										if ($r) {
											while ($row=$r->fetch_assoc()) {
												if($row['image']==NULL){
													$pro_image='no';
													
												}else{
													$pro_image='yes';
												}
											}
										}

									 ?>

									<img src="<?php if($pro_image=='yes'){
										 echo $userdetails['image'];
									}else{
										echo 'images/placeholder.png';
									}
										?>" alt=""
												style="margin-right: 40px;margin-left: 70px;margin-bottom: 15px; display: block; width: 60%; height: 20%;
     								 border-radius: 50%;" 

									/>

									</tr>
									<tr>
										<td style="padding-top: 3px;" colspan="2">
											<input style="margin-right:5px;" class="btn" type="submit" name="update" value="Update"/>
											<input class="btn" type="reset"  value="Reset"/>
												<a style="color: #006669;" href="change_pass.php">Change Password</a>	

										</td>
									</tr>
								
								
								</table>

							</form>

						</div>
							<div style="height: 50px;">
							
						</div>
					
<?php  

					}

				}?>
			
			<?php //include_once "inc/footer.php"?>
		</div>


		
	</body>
</html>

