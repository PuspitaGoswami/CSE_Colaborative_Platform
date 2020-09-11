<?php include 'inc/header.php'; ?>

    <div class="grid_10">

        <div class="container">
		
            <<div class="box round first grid">
                
                <?php
                if (isset($_POST['submit']))
                    
                    {
                        $body   = mysqli_real_escape_string($db->link, $_POST['body']);
                        $author = mysqli_real_escape_string($db->link, $_SESSION['username']);
                        $pro_image = mysqli_real_escape_string($db->link, $pro_image);

                        if($body == ""|| $author == ""){
                            echo "<span class= 'error'>Field must not be empty !</span>";
                        }

   
                       else
                        {
                           $query = "INSERT INTO tbl_post( body, author, pro_image) VALUES('$body', '$author',
                           '$pro_image')";
    
                           $inserted_rows = $db->insert($query);
                           if ($inserted_rows) 
                           {
                            echo "<span class='success'>Post Inserted Successfully.</span>";
                           }else 
                           {
                            echo "<span class='error'>Post Not Inserted !</span>";
                           }
                        }
                    }   
                ?>

                <div class="block-post">      

                        <h2>Start Discussion</h2>    

                     <form action="" method="post" enctype="multipart/form-data">
                        <table class="addpost-form">
                            
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px; margin-left:50px;">
                                      <!-- profile image -->
        <?php   
        global $pro_image;          
            $query = "SELECT * FROM user2 WHERE user_name='".$_SESSION['username']."'";
                $result = $db->select($query);
                if($result != false){
                    if(mysqli_num_rows($result)>0){
        ?>                              

        <?php  
            while ($user = mysqli_fetch_array($result)) {
                $pro_image= $user['image']; ?>                                              
            <img src="<?php echo $user['image'];?> " style="width:90px;height: 90px;margin:2px; border-radius:60%;" />          
        <?php }}}?>
                    <?php if (isset($_POST['cmnt_submit'])) {
                             # code...
                            $comment = $_POST['comment_content'];
                            $user_name= $_SESSION['username'];
                            $post_id = $_POST['id'];
                            if($comment == ''){
                                    echo "<span style='color:#e53d37'>Field must not be empty</span>";
                             }
                            else{
                                
                                $sql = "INSERT INTO tbl_comment(user_name,post_id,comment)
                                VALUES('$user_name','$post_id','$comment')";
                                $cmnt = $db->insert($sql);
                                if($cmnt){                    
                                }
                            header("location:post2.php?id=".$post_id);
                            exit;
                            }
                         } 
                     ?>
         <!-- profile image -->
                                </td>
                                <td>
                                    <textarea id="myEditor" name="body" style="width:100%;"> </textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" hidden name= "author"  class="medium" />
                                </td>
                            </tr>
                           
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Save" />
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                </div>
                <!-- add post -->
        </div>    
    </div>




\
    </script>


<?php include 'inc/footer.php'; ?>