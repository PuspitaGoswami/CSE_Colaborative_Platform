<?php 
	include 'lib/Session.php';
	Session::init();

?>
<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();
	global $p;
?>

					 <?php $query2 = "SELECT * FROM status WHERE user_name = '".$_POST['search']."'";
					$result2 = $db->select($query2);
					if($result2){
				while ($user = mysqli_fetch_array($result2)) {
								?><?php
								$v1='active';


						if ($user['user_status']==$v1) {
							   $p='yes';
						}else{
							
							 $p='no';


					}?><?php 

					}}?>

<?php
	$output='';
	$query ="SELECT * FROM user2 WHERE user_name LIKE '%".$_POST["search"]."%' 
	OR job LIKE '%".$_POST["search"]."%' OR batch LIKE '%".$_POST["search"]."%'
	OR occupation LIKE '%".$_POST["search"]."%'"  ;	
	$result = $db->select($query); 


	if($result != false){

		if(mysqli_num_rows($result)>0){
			$output .= '<h4 align="center">Search Result</h4>';
			$output .= '
    						<table class="style_table">
										
											<tr>
													<th></th>
													<th></th>
													<th></th>
											</tr>';

									while($row= mysqli_fetch_array($result)){
										$output.='
										 <tr style="height:80px; padding:5px;">

  									 	<td><img style="width:60px;height: 60px;margin:2px; border-radius:60%;" src='.$row["image"].' alt="">
  									 	</td>
  										
  							
  									 	<td><a style="font-family: helvetica;color:  #444753;text-decoration:none;font-size: 20px; padding-left: 2px;" href="user_profile.php?user=<?php echo '.$row['user_name'].';?>">'.$row['user_name'].'</a>


  									 	</td>

  									 	<td style=" margin-left: 15px; margin-right: 5px;"><a href="index2.php?user=<?php echo '.$row['user_name'].'?>" id="msg"><i style="font-size: 25px;" class="fa fa-comments-o" aria-hidden="true"></i></a></</td>

  	 									 	<td><a style="font-family: helvetica;color:  #444753;text-decoration:none;font-size: 20px; padding-left: 2px;" href="user_profile.php?user=<?php echo '.$row['user_name'].';?>">'.$row['job'].'</a>


  									 	</td>

  									 
  									 </tr>



											 ';
											}echo $output;					 
  									
		}else{
			echo 'Data not found';
		}
	}else{
		
			echo 'Data not found';

	}

	
 ?>
