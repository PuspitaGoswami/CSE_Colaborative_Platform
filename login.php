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

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
	<title>login Page</title>
    <link rel="stylesheet" href="css/login_design.css">

</head>
<body style="background: url(images/un.jfif)no-repeat;
 margin: 0;
  padding: 0;
  font-family: sans-serif;
  background-size: cover;
  ">



<div class="uv-logo" style="float:left;">
	<img src="images/dark-lu-logo.jpg" alt="" style="height: 250px;width: 250px;/* padding: 125px; */padding-left: 123px;padding-top: 59px;">
</div>


<div class="login-box" style="float:left;">
  <h1>Login</h1>
  <form method="post">
  <div class="textbox">
  	    <i class="fas fa-user"></i>
    <input type="text" name="user_name" class="input" placeholder="Username/Student ID.."/><br><br>
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" class="input" placeholder="Password.."/><br><br>
  </div>
  <input type="submit" name="login" class="btn" value="Login" />
  <a href="register.php" style="color: white; text-decoration: none; padding-left: 110px; font-size:18px;">Register Here</a>
  <a href="forget_pass.php" style="color: white; text-decoration: none; padding-left: 30px;font-size:18px;">Forget password?</a>

  </form>

</div>

	 <?php
		if ($_SERVER['REQUEST_METHOD']=='POST')
	{
		$user_name = $fm->validation($_POST['user_name']);
		$password = $fm->validation(md5($_POST['password']));
					$user_status = 'active';

		


		$user_name = mysqli_real_escape_string($db->link, $user_name);
		$password = mysqli_real_escape_string($db->link, $password);

		$query = "SELECT * FROM user2 WHERE (std_id= '$user_name') AND password = '$password'";
		$result = $db->select($query);


		if ($result != false)
		{
			
			
			$value = mysqli_fetch_array($result);
			$row = mysqli_num_rows($result);
			if($row > 0)
			{
				Session::set("login", true);
				//Session::set("user_name", $value['user_name']);
				Session::set("userId", $value['id']);
		 		$_SESSION['username'] = $value['user_name'];
				$_SESSION['uid'] = $userId;

				$query3 = "SELECT * FROM status WHERE user_name = '".$_SESSION['username']."'";
				$result3 = $db->select2($query3);
				$row3 = mysqli_num_rows($result3);


				if($row3>0){
					$query = "UPDATE status SET user_status='".$user_status."' WHERE user_name='".$_SESSION['username']."'";
						$update = $db->update($query);
				}else{
					$query2= "INSERT INTO status(user_name,user_status)VALUES('".$_SESSION['username']."', '".$user_status."')";
			          $result2 = $db->insert($query2);

				}
				
	         
				header("Location:index.php");

        



			}
			else
			{
				echo "<span style='color:red; font-size:18px;'>No result found !!</span>";
			}

		}
		else
		{
			echo "<span style='color:red; font-size:18px;'>Username or Password not matched !!</span>";
		}
		
	}
	?>
</body>
</html>