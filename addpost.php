<?php include 'inc/header.php';?>

        <div class="grid_10">

        <div class="container">
		
         <!-- add post -->
            <div class="box round first grid">

            <div class="feedback" style="background: white;width: 700px;justify-content: center;
             margin-left: 220px;padding: 30 20 0 0px;paddind-bottom: 10px;padding-top: 50px;padding-left: 105px;}">
            
            <a href="blog2.php" class="btn btn-default btn-lg active" role="button"
            style="color:white; background:#006669; font-weight:bold; float:right;    margin-top: -44px; margin-right: 20px;">
            Back</a>
                
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        $title  = mysqli_real_escape_string($db->link, $_POST['title']);
                        $cat    = mysqli_real_escape_string($db->link, $_POST['cat']);
                        $body   = mysqli_real_escape_string($db->link, $_POST['body']);
                        $author = mysqli_real_escape_string($db->link, $_SESSION['username']);
                       
                        
                        $permited  = array('jpg', 'jpeg', 'png', 'gif','jfif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                    
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "admin/upload/".$unique_image;
                        
    
                        if( $cat == "" || $body == ""|| $author == ""){
                            echo "<span class= 'error'>Field must not be empty !</span>";
                        }
                        
                       elseif ($file_size >10485760) 
                        {
                            echo "<span class='error'>Image Size should be less then 10MB!
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
                           $query = "INSERT INTO tbl_blog(cat, title, image, body, author,likes) VALUES('$cat', 
                           '$title','$uploaded_image', '$body', '$author',0)";
    
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
                    <div class="block">               
                     <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
    
                            <h2 style="margin-bottom:30px;">Add New Blog</h2>
                           
                            <tr>
                                <td>
                                    <label style="margin-right:100px; color: #444 !important; font-size: 18px;">Title</label>
                                </td>
                                <td>
                                    <input type="text" name= "title" placeholder="Enter Post Title..." class="medium" />
                                </td>
                            </tr>
                         
                            <tr>
                                <td>
                                    <label style="color: #444 !important; font-size: 18px;"> Category</label>
                                </td>
                                <td>
                                    <select id="select" name="cat">
                                    <option>Select Category</option>
    
                                <?php
                                    $query = "select * from tbl_catagory";
                                    $category = $db->select($query);
                                    if($category){
                                        while($result = $category->fetch_assoc()){
                                ?>
                                        <option value= "<?php echo $result['id']; ?>" >
                                        
                                        <?php echo $result['name']; ?></option>
                                <?php } } ?>        
                                    </select>
                                </td>
                            </tr>
    
    
                            <tr>
                                <td>
                                    <label style="color: #444 !important; font-size: 18px;">Upload Image</label>
                                </td>
                                <td>
                                    <input type="file" name = "image"/>
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label style="color: #444 !important; font-size: 18px;">Content</label>
                                </td>
                                <td>
                                    <textarea name = "body"></textarea>
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
                </div>
                </div>
                <!-- add post -->
            </div>
        </div>