
<?php include 'config/config.php';?>
<?php include 'lib/database.php';?>
<?php include 'helpers/Format.php';?>

<?php
	$db = new Database();
	$fm = new Format();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="css/login_design.css">


</head>
<body style="background: url(images/un.jfif)no-repeat;
 margin: 0;
  padding: 0;
  font-family: sans-serif;
  background-size: cover;
">

<div style="height: 570px;" class="uv-logo" style="float:left;">
	<img src="images/dark-lu-logo.jpg" alt="" style="height: 250px;width: 250px;/* padding: 125px; */padding-left: 123px;padding-top: 130px;">
</div>
	<div style="height:570px;" class="login-box">
	<h1 align="center">Registration Form</h1>
		<div style="color: red;font-size:20px;" id="error"></div>


    <form method="post">

  <div class="textbox">
    <i class="far fa-id-card"></i>
    <input type="text" name="std_id" id="std_id" onkeyup="check_std_id()" placeholder="Student ID" class="input" required/>
    <?php if (!isset($std_id)) {?>
    
      <div id="checking_student_id"></div>

   <?php } ?>

  </div>


  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="user_name" id="user_name" onkeyup="check_user()" placeholder="Username.." class="input" required/>
      <div id="checking"></div>

  </div>
   <div class="textbox">
    <i class="far fa-envelope"></i>
    <input type="text" name="email" id="email" onkeyup="check_email()" placeholder="Email Address.."  required/>
    <div id="email_checking"></div>
  </div>
  
  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" id="password" onkeyup="check_pass()" placeholder="Password.." class="input" required/></div>
      <div id="checking_pass"></div>


     <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="batch" placeholder="Batch No." class="input" required/>
  </div>
  <div class="textbox">

   <select class="btn" name="occupation">
                         <option style="background-color: #000"; class="textbox">Select User Role</option>
                         <option style="background-color: #000"; value="Alumni">Alumni</option>
                 <option style="background-color: #000"; value="Student">Student</option>
             </select>  
           </div>

 <input type="submit" id="register" class="btn" name="register" value="Register" />
      <a style="  width: 100%;
  background: none;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;" href="login.php">Login Here</a>
  </form>
		
	</div>
		 <?php
		if ($_SERVER['REQUEST_METHOD']=='POST')
	{
		$std_id = $_POST['std_id'];
		$user_name = $fm->validation($_POST['user_name']);
		$email = $fm->validation($_POST['email']);
		$email = $fm->validation($email);
		$password = $fm->validation(md5($_POST['password']));
		$occupation = $_POST['occupation'];
		$batch = $_POST['batch'];



		$std_id = mysqli_real_escape_string($db->link, $std_id);
		$user_name = mysqli_real_escape_string($db->link, $user_name);
		$email = mysqli_real_escape_string($db->link, $email);
		$password = mysqli_real_escape_string($db->link, $password);
		$occupation = mysqli_real_escape_string($db->link, $occupation);
		$batch = mysqli_real_escape_string($db->link, $batch);
		if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
						# code...
						echo "<span style='color:#e53d37'>Invalid E-mail format.</span>";


					}


		$check_id="SELECT std_id FROM tbl_student_id WHERE std_id = '$std_id'";
		$check_id = $db->select2($check_id);



		$check_id="SELECT std_name FROM tbl_student_id WHERE std_id = '$std_id'";
		$check_id = $db->select2($check_id);
		

		$check_name="SELECT std_name FROM tbl_student_id WHERE std_id = '$std_id
		'";
		$check_name = $db->select2($check_name);
		



		if ($check_id !=false && $check_name !=false)
		{
			$row=mysqli_fetch_array($check_id);
		    $id1=$row['std_name'];

			
			$value2 = mysqli_fetch_array($check_id);
			$row2 = mysqli_num_rows($check_id);
			if($row2>=1 and $id1==$user_name)
			{
				$query = "INSERT INTO user2(id,std_id,user_name,email,password,batch,occupation)
				VALUES('','".$std_id."', '".$user_name."','".$email."',  '".$password."','".$batch."','".$occupation."')";
					$result = $db->insert($query);
					if ($result!=false) {
					$value = mysqli_fetch_array($result);
			        $row = mysqli_num_rows($result);
			             if ($row!=1) {
			             	# code...
						    header("Location:login.php");

			             }

						
					}
					else{
						echo $query;
					}
				
				
			}
			else
			{
				echo "<span style='color:red;font-size:25px;'>User name and Student ID do not match !!</span>";
			}

		}
		else
		{
			?><script>document.getElementById("register").disabled=true;</script><?php
			echo "<span style='color:red;align:center; font-size:18px;'>Name or Student ID dose not match!</span>";
		}
	}
	?>
<


	<script src="subfile/jquery-3.4.1.min.js"></script>

	<script>
		document.getElementById("register").disabled=true;

		function check_user(){
			var user_name = document.getElementById("user_name").value;

			$.post("subfile/user_check.php",

				{
					user : user_name
				},
					function(data,status){
						if(data=='<p style="color:red;">User already registered!</p>'){
							document.getElementById("register").disabled=true;
						}
				
						else{
							document.getElementById("register").disabled=false;

						}
						
						
						document.getElementById("checking").innerHTML = data;
					}
				);
			
		}
		function check_email(){
			var email = document.getElementById("email").value;

			$.post("subfile/email_check.php",

				{
					email : email
				},
					function(data,status){
						if(data=='<p style="color:red;">E-mail already exists</p>'){
							document.getElementById("register").disabled=true;
						}else{
							document.getElementById("register").disabled=false;

						}
						document.getElementById("email_checking").innerHTML = data;
					}
				);
			
		}

		function check_std_id(){
			var std_id = document.getElementById("std_id").value;

			$.post("subfile/std_check.php",

				{
					std_id : std_id
				},
					function(data,status){
						if(data=='<p style="color:red;">Student ID already exists</p>'){
							document.getElementById("register").disabled=true;
						}else{
							document.getElementById("register").disabled=false;

						}
						document.getElementById("checking_student_id").innerHTML = data;
					}
				);
			
		}

		function check_pass(){
			var password = document.getElementById("password").value;

			$.post("subfile/pass_check.php",

				{
					password : password
				},
					function(data,status){
					
						 if(data=='<p style="color:red;">Password should be at least 8 characters in length and should include one special character.</p>'){
							document.getElementById("register").disabled=true;
						}else{
							document.getElementById("register").disabled=false;

						}
						document.getElementById("checking_pass").innerHTML = data;
					}
				);
			
		}

	</script>

</body>
</html>