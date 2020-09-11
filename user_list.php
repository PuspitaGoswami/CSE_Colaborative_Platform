
<?php 
	include 'inc/header.php';
?>

<?php
global $users;
$uname = $_SESSION['username'];




if (isset($_SESSION['username'])) {
	# code...
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Registration Page</title>
				<script src="subfile/jquery-3.4.1.min.js"></script>
  		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.css">
		<style>
			*{margin: 0;padding: 0;outline: 0}
.wrapper{margin:0 auto;width:600px;background: #fff;
;}
.header{}
.header h3{color:#fff;font-size:25px;background:#fff;padding:15px 40px;text-align:center;}
.mainmenu{margin-top:5px;}
.mainmenu ul{list-style:none;}
.mainmenu ul li{float:left;}
.mainmenu ul li a:hover{}
.st{border-bottom:2px solid #000000;margin-top:30px}
.content {
  text-align: center;
    margin: 0 auto;
    margin-top: 60px;
    background: #fff;
    padding: 2px 71px;
    width: 400px;
}
.msg{text-align:center;}
.login_reg {
    margin: 0 auto;
    margin-top: 10px;
    background: #444753;
    padding: 12px 19px;
    width:400px;
}
.login_reg input[type="text"],.login_reg input[type="password"] {
  height: 20px;
  margin-top: 5px;
  width:400px;
}
.back{text-align: center;}
.footer{}
.footer h3{color:#fff;font-size:20px;background:#525251;padding:10px 40px;text-align:center;}
/*CSS for index page */

.user{margin:0 auto;
    margin-top: 10px;
    background: #D9D9D8;
    padding: 2px 71px;
    width: 400px;
    text-align: center;}
.userlist{margin:0 auto;
    margin-top: 10px;
    background:#fff;
    padding: 5px;
    width:400px;
    color:#444753;
    font-size:30px;
    font-style: bold;
    margin-bottom:10px;
  text-align: center;}
  .search{
  	margin:0 auto;
    margin-top: 10px;
    background:#fff;
    padding: 5px;
    width:400px;
    color:#444753;
    font-size:30px;
    font-style: bold;
    margin-bottom:10px;
  text-align: center;

  }
   .style_table{margin:0 auto; width: 100%;}
  .style_table tr th{padding:10px 35px; color:#444753;text-shadow:1px 1px 1px #000;}
  .
  .style_table tr:nth-child(n){height:100px; padding: 10px;background:#94C2ED;}
  .style_table tr td a{font-size:20px;
		 font-family: helvetica;
		 color:  #444753;

		 text-decoration:none;
		}
.style_table tr td a:hover{
	color: #86BB71;

}
  
  .login_msg{margin: 10px auto;
    background:#00FA08;
    text-align: center;
    width: 600px;}
    
    .error{color: red;}
.online, .offline {
    margin-right: 3px;
    font-size: 10px;
  }
  .online {
  color: #86BB71;
}
  
.offline {
  color:  #E38968;
}

   
    
		</style>
	

		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
			</head>
	<body>

		<div class="wrapper">
			<p class="userlist">All User List</p>
						<div class="search">
 								<form action="" method="get">
									<input type="text" id="search" class="form-control" name="search" placeholder="Search...">
								
								</form>

						</div>
						<div id="result"></div>

		<!--pagination-->
		<?php
			$per_page = 10;
			if (isset($_GET["page"])){
				$page = $_GET["page"];
			}
			else{
				$page=1;
			}
			$start_from = ($page-1)*$per_page;
		?>
		<!--pagination-->


			<?php 
				
				$query = "SELECT * FROM user2 ORDER BY id ASC";
						$result = $db->select($query);

						if($result != false){

								if(mysqli_num_rows($result)>0){
									?>
						<table id="tbl" class="style_table">
										
									<?php  
									while ($user = mysqli_fetch_array($result)) {
										# code...
										?>	

													<tr>
															<th></th>
															<th></th>
															<th></th>
															<th></th>


													</tr>											
									<tr >													
										<td style="padding-left:15px;">
											<img src="<?php echo $user['image'];?> " style="width:60px;height: 60px;margin:2px; border-radius:60%;" />
										</td>													
										<td>													
											<a style="font-size: 20px; padding-left: 10px;" href="user_profile.php?user=<?php echo $user['user_name'];?>"><?php echo $user['user_name'];?> </a>

												<?php if($user['user_name'] == $_SESSION['username']){?>
												<a style="font-size: 13px;" href="update_profile.php?user=<?php echo $user['user_name']?>">| Edit</a>
												<?php } ?>
															
										</td>
										<td style=" margin-left: 15px; margin-right: 5px;">
												<?php if($user['user_name'] != $_SESSION['username']){?>
														<a href="index2.php?user=<?php echo $user['user_name']?>" id="msg"><i style="font-size: 25px;padding-left: 15px;" class="fa fa-comments-o" aria-hidden="true"></i></a>

												<?php } ?>


											</td>

											<td style="padding-left:15px;">
											<a><?php echo $user['occupation'];?></a>
										</td>	
													
									</tr>
												
										
										<?php

							}?></table>


                    <?php
						}}else{

						}?>		
		</div>
		<div style="height: 20px;"></div>

	</body>
</html>
<?php }
	else{
	header("location:login.php");
}
 ?>

 						<script>
							
							$(document).ready(function(){
											

								
								$('#search').keyup(function(){
									var txt = $(this).val();
									if (txt != '') {
										$.ajax({
											url:"fetch.php",
											method:"post",
										data:{search:txt},
										dataType:"text",
										success:function(data)
										{
											document.getElementById("tbl").style.display="none";
											$('#result').html(data);
										}
										});

									}else{
										$('#result').html('');
										$.ajax({
											url:"fetch.php",
											method:"post",
										data:{search:txt},
										dataType:"text",
										success:function(data)
										{
											$('#result').html(data);
                                            location.replace("user_list.php");

										}
										});
									}
								});
							});
						</script>

