
<style type="text/css">


.wrapper{margin:0 auto;width:600px;background:#EFEFEE;margin-top: 10%;padding-right: 110px;padding-bottom: 80px;}
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
    border:1px solid;
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
    width:600px;
    padding-left: 50px;
    padding-right: 50px;    
    border: none;
}


.login_reg input[type="reset"],.login_reg input[type="submit"] {
  float: right;
  height: 30px;
  width: 180px;
    bottom: 10px;
    right: 10px;
    border: 1px solid #006669;
    background: transparent;
    border-radius: 0px;
    color: #006669 !important;
    margin-left: 100px;
    font-size: 15px;
    padding: 5px 5px 5px 5px;
 
}
.login_reg input[type="submit"] {margin-right: 15px;
    padding-right: 20px;
    margin-left: 100px;
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
    background: #fff;
    padding: 2px 71px;
    width: 550px;
    color: #006669;
    font-size: 25px;
    font-style: bold;
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
   .style_table{margin:0 auto; width: 400px;}
  .style_table tr th{background:#94C2ED;padding:5px 15px;color:#006669;font-size: 15px;}
  .style_table tr:nth-child(2n){background:#efefef;height: 100px;}
  .style_table tr:nth-child(2n+1){background:#94C2ED;}
  .style_table tr td a{text-decoration:none;color:#0078D7;}
  
  .login_msg{margin: 10px auto;
    background:#00FA08;
    text-align: center;
    width: 350px;}
    
    .error{color: red;}
  input{
          width: 100%;
  overflow: hidden;
  font-size: 15px;
  padding: 8px 0;
  margin: 8px 0;
  border: none;

  border-bottom: 1px solid #4caf50;
    }
  td{
    font-size: 15px;
    padding-right:10px; 
   }
   



   
    
</style>




<?php
require 'phpmailer/PHPMailerAutoload.php';

if (isset($_POST['reset_pass'])) {

    $email = $_POST['email'];

    $body = '<html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <meta http-equiv="X-UA-Compatible" content="ie=edge">
                            <title>Verify Email</title>
                        </head>
                        <body>
                        
                        <div class="wrapper">
                        
                        <p>
                        
                        Thank you for signing up on our website. Please click on the link below to reset your password.
                        </p>
                        
                        <a href="http://localhost/Final_Project%20(1)/Final_Project/CSE_Colaborative_Platform-main/Project-part2/change_pass_forget.php?token=' . base64_encode($email) . '">
                        Reset Password
                        
                        </a>
                        
                        </div>
                            
                        </body>
                        </html>';

    $mail = new PHPMailer();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '587';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->isSMTP();
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Username = 'lsaexpress5472@gmail.com';
    $mail->Password = '1612020121';

    $mail->setFrom($email);
    $mail->addAddress($email);
    $mail->addReplyTo('lsaexpress5472@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Reset Password';
    $mail->Body = $body;

    if (!$mail->send()) {
        $mail_error = "Something worng. Please try again";
    } else {
        $email = "";
        $mail_success_send = "Successfully link send";
    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    

    <title>Reset Password</title>
</head>

<body style="background: #C5DDEB;">
 
 <div class="wrapper">

    <p class="user">Reset Password</p>

    <div class="login_reg">
        <?php //mailer success
        if (isset($mail_success_send)) {
            echo '<div class="alert alert-success">' . $mail_success_send . '</div>';
        }
        ?>
        <?php //mailer error
        if (isset($mail_error)) {
            echo '<div class="alert alert-warning">' .  $mail_error . '</div>';
        }
        ?>
        <form  action="" method="POST">
            <div class="form-group">
                <div class="row">
                    <label class="control-lable col-sm-1" for="email">Email</label>
                    <div class="col-sm-4">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email">
                    </div>
                    <label class="error" for="">

                        <?php

                        if (isset($input_error['email'])) {
                            echo $input_error['email'];
                        }

                        ?>

                    </label>
                    <label class="error" for="">

                        <?php

                        if (isset($email_error)) {
                            echo $email_error;
                        }

                        ?>

                    </label>
                </div>
            </div>

            <div class="col-sm-4 offset-md-1">
                <input type="submit" value="Reset Password" name="reset_pass" class="btn btn-primary">
            </div>

        </form>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>