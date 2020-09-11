<?php 	include 'inc/header.php' ?>


<style type="text/css">

.wrapper{margin:0 auto;width:600px;background:#EFEFEE;margin-top:5%;}
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
    width:600px;
    padding-left: 50px;
    padding-right: 50px;    
    border: none;
}


.login_reg input[type="reset"],.login_reg input[type="submit"] {
  float: right;
  height: 30px;
  width: 80px;
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
    width: 600px;
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

<div class="wrapper">
    <p class="user">Update Your Password</p>

<p class="msg">
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $old_pass 	= md5($_POST['old_password']);
        $new_pass 	= md5($_POST['new_assword']);
        $confirm_new= md5($_POST['confirm_password']);
        
        if(empty($old_pass) or empty($new_pass) or empty($confirm_new)){
            echo "<span style='color:#e53d37'>Field must not be empty</span>";
        }elseif($new_pass!=$confirm_new){
            echo "<span style='color:#e53d37'>Password did not matched</span>";
        }else{
            $sql="SELECT id FROM user2 WHERE password = '$old_pass'";
            $result=$db->select($sql);
            if (mysqli_num_rows($result)==1) {
                $sql="UPDATE user2 SET password='$new_pass' WHERE user_name='".$_SESSION['username']."'";
                $result=$db->update($sql);
                if ($result) {
                    echo "Password Changed Successfully";
                }
                
            }else{
                    echo "Old password not exist";

            }
        }

    }


    ?>	
</p>
<div class="login_reg">
    <form action="" method="post" name="reg">
        <table>
            <tr>
                <td>Old Password:</td>
                <td><input type="text" name="old_password" placehplder="Please enter your old password"/></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="text" name="new_assword" placehplder="Please enter your new password"/></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="text" name="confirm_password" placehplder="Please enter again your new password"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="update" value="Update"/>
                    <input type="reset"  value="Reset"/>
                </td>
            </tr>
        </table>
    </form>
<div style="height:30px;"></div>

</div>

</body>
</html>

