<div class="footer">
	<div class="footer-content">
		<div class="footer-section about">
			<h1 class="logo-text"><span>CSE </span>Colaborative Platform</h1>
			<p>Share your ideas...get information from this platform.</p>


			<div class="socials">
				<a href="#"><i class="fab fa-facebook"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>

				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-youtube"></i></a>

			</div>
		</div>
		<div class="footer-section links">
			<h2>Quick Links</h2>
			<br>
			<ul>
				<a href="#"><li>Events</li></a>
				<a href="#"><li>Team</li></a>

				<a href="#"><li>Mentors</li></a>
				<a href="#"><li>Gallery</li></a>
				<a href="#"><li>Terms and Conditions</li></a>

			</ul>
		</div>
		<div class="footer-section contact-form">
			<h2>Contact us</h2>
			<br>
			<form action="" method="post">
				<textarea name="message" rows="4" class="text-input contact-input" placeholder="Your message..."></textarea>

				<button name="msg" type="submit" class="btn btn-big contact-btn">
					<i class="fas fa-envelope"></i>
				Send</button>
			</form>
		</div>

		<?php 

        global $email;
        $sql="SELECT * FROM user2 WHERE user_name='".$_SESSION['username']."'";
        $result=$db->select($sql);
        if($result)
        {
                while ($row = $result->fetch_assoc())
                {
                    $email=$row['email'];
                }
        }
       
 ?>

		<?php 
		     if ($_SERVER['REQUEST_METHOD']=='POST'){

					$message=$_POST['message'];
					$query = "INSERT INTO contactUs(user_name,email,message)
				VALUES('".$_SESSION['username']."','".$email."','$message')";
					$result=$db->insert($query);
				}

		 ?>

	</div>

</div>
