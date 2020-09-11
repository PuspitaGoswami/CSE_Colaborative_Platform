<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">

        <?php
            if(!isset($_GET['editpostid']) || $_GET['editpostid'] == NULL){
                echo "<script>window.location = 'postist.php';</script>";
            }
            else{
                $postid = $_GET['editpostid'];
            }
        ?>
		
            <div class="box round first grid">
                <h2>Update Post</h2>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $title  = mysqli_real_escape_string($db->link, $_POST['title']);
                    $body   = mysqli_real_escape_string($db->link, $_POST['body']);


                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];
                
                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;

                    if($title == "" || $body == ""|| $author == "" || $file_name == ""){
                        echo "<span class= 'error'>Field must not be empty !</span>";
                    }
                    
                    elseif ($file_size >1048567) 
                    {
                        echo "<span class='error'>Image Size should be less then 1MB!
                        </span>";
                    } 
                    
                    
                    elseif (in_array($file_ext, $permited) === false) 
                    {
                        echo "<span class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                    } 
                    
                    else
                    {
                       move_uploaded_file($file_temp, $uploaded_image);
                       $query = "INSERT INTO tbl_careerpage(title, body, image) 
                        VALUES('$title', '$body','$uploaded_image')";

                       $inserted_rows = $db->insert($query);
                       if ($inserted_rows) 
                       {
                        echo "<span class='success'>Post Inserted Successfully.
                        </span>";
                       }else 
                       {
                        echo "<span class='error'>Post Not Inserted !</span>";
                       }
                    }
                }    
            ?>
                <div class="block">           

        <?php
            $query = "select * from tbl_careerpage where  id ='$postid' order by id desc";
            $getpost = $db->select($query);
            while ($postresult = $getpost->fetch_assoc())
        {
        ?>    
                 <form action="addpost.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name= "title" value="<?php echo $postresult['title']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $postresult['image']; ?>" height="80px" width="200px"><br/>
                                <input type="file" name = "image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name = "body">
                                    <?php echo $postresult['body']; ?>
                                </textarea>
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
        <?php } ?>
                </div>
            </div>
        </div>




<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>


<?php include 'inc/footer.php'; ?>