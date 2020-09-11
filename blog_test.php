<?php 
  include 'inc/header.php';
  ?>
<style type="text/css">

.wrapper{margin:0 auto;width:600px;background:#EFEFEE}
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
      <p class="user">Add Your Skill <?php echo $_SESSION['username']; ?></p>
            
      <p class="login_msg">
        
            </p>

            <div class="login_reg">
        <form action="skill.php" method="post" name="reg">
          <table>
            <tr>
              <td>Name</td>
              <td><input type="text" name="name" placeholder="Enter skill Name"></td>
            </tr>
                       

            <tr>
              <td>Percentage:</td>
              <td> <input type="number" name="percentage" placeholder="Enter Pecentage"></td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" name="update" value="Add Skill"/>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <?php 
           if (isset($_POST['update'])) {
           $query = "INSERT INTO tbl_skill(user_name,name,percentage)
        VALUES('gadhi','php',10)";
          $result = $db->insert($query);
          if ($result!=false) {
            echo "Success!";
           }


       ?>
        

        <p class="user">Skill List</p>
      <table class="style_table" style="text-align:center">
        <tr>
          <th>Serial</th>
          <th>Name</th>
          <th>Percentage</th>
          <th>Action</th>
        </tr>
        <?php 
        $i = 0;
        $query = "SELECT * FROM tbl_skill WHERE user_name = '".$_SESSION['username']."'";
        $result = $db->select2($query);
        if($result){
          while ($skill = mysqli_fetch_assoc($result)) {
            $i++;
            ?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $skill['name'];?></td>
          <td><?php echo $skill['percentage']."%"; ?></td>
          <td>
                       
 
            <a href="delete.php?skill_id=<?php echo $skill['name']?>"> Delete</a>
        
          </td>
        </tr>



          <?php  }



        }

        else{
          echo $query;
        }

          ?>
      </table>
      <?php //include_once "inc/footer.php"?>
    </div>
  </body>
</html>

