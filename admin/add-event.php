<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Event</h2>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    
                    $title  = mysqli_real_escape_string($db->link, $_POST['title']);
                    $body   = mysqli_real_escape_string($db->link, $_POST['body']);

                    if($title == "" || $body == "")
                    {
                        echo "<span class= 'error'>Field must not be empty !</span>";
                    }

                    else
                    {
                       $query = "INSERT INTO tbl_event(title, body)  VALUES('$title', '$body')";

                
                       if ($db->insert($query) === TRUE) 
                       {
                           $last_id = $db->link->insert_id;
                           echo "Event Created Successfully. Last inserted id:".$last_id;
                       }
                       else {
                           echo "Sry! Event not created.";
                       }
                    }
                    

                    $event_id  = mysqli_real_escape_string($db->link, $_POST['event_id']);
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];
                
                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/event/".$unique_image;
                    if($event_id == "" || $file_name == "")
                    {
                        echo "<span class= 'error'>Field must not be empty !</span>";
                    }

                    else
                    {
                       $query = "INSERT INTO event_images(event_id, image)  VALUES('$event_id', '$uploaded_image')";

                
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
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                     
                        <tr>  
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name= "title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name = "body"></textarea>
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
                

                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">

                        <tr>  
                            <td>
                                <label>Event No</label>
                            </td>
                            <td>
                                <input type="text" name= "event_id" placeholder="Enter Last Generated Event No..." class="medium" />
                            </td>
                        </tr>      
                        
                        <tr>  
                            <td>
                                <label>Images</label>
                            </td>
                            <td>
                                <input type="file" name="image" >
                            </td>
                        </tr>                    

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Upload" />
                            </td>
                        </tr>
                    </table>
                    </form>
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