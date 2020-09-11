
<?php include 'inc/header.php'; ?>
    <?php include 'inc/sidebar.php'; ?>
    <div class="grid_10">  

    <div class="box round first grid">              
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        $status   = mysqli_real_escape_string($db->link, $_POST['status']);
                        $title   = mysqli_real_escape_string($db->link, $_POST['title']);
                        $body   = mysqli_real_escape_string($db->link, $_POST['body']);
        
    
                        if($title == "" || $body == "" || $status == "")
                        {
                            echo "<span class= 'error'>Field must not be empty !</span>";
                        }
    
                        else
                        {
                           $query = "INSERT INTO tbl_event(title, body,status)  VALUES('$title', '$body','$status')";
    
                    
                           if ($db->insert($query) === TRUE) 
                           {
                               $last_id = $db->link->insert_id;



                                // $event_id   = mysqli_real_escape_string($db->link, $_POST['event_id']);

                                foreach($_FILES['image']['name'] as $key=>$val){
                                
                                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                                $file_name = $_FILES['image']['name'][$key];
                                echo $file_name;
                                $file_size = $_FILES['image']['size'];
                                $file_temp = $_FILES['image']['tmp_name'][$key];
                            
                                $div = explode('.', $file_name);
                                $file_ext = strtolower(end($div));
                                $unique_image = substr(md5(time()), 0, 10).$key.'.'.$file_ext;
                                $uploaded_image = "upload/event/".$unique_image;
                                
            
                                if( $last_id == "" || $file_name == ""){
                                    echo "<span class= 'error'>Field must not be empty !</span>";
                                }
                                           
                                elseif (in_array($file_ext, $permited) === false) 
                                {
                                    echo "<span class='error'>You can upload only:-"
                                    .implode(', ', $permited)."</span>";
                                } 
                            
                                else
                                {
                                    move_uploaded_file($file_temp, $uploaded_image);
                                   $query = "INSERT INTO event_img(event_id, image) VALUES('$last_id','$uploaded_image')";
            
                                   $inserted_rows = $db->insert($query);
                                   if ($inserted_rows) 
                                   {
                                    echo "<span class='success'>Image Uploaded Successfully.</span>";
                                   }else 
                                   {
                                    echo "<span class='error'>Image Not Uploaded Inserted !</span>";
                                   }
                                }
                            }
                    
                               echo "Event Created Successfully. Last inserted id:".$last_id;
                           }
                           else {
                               echo "Sry! Event not created.";
                           }
                        }
                        
                        
                    }   
                ?>



                <div class="block">               
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
    
                            <h2>Add New Event</h2>
                                <select class="btn" name="status">
                                    <option style="background-color: #000" ; class="textbox">Select Event</option>
                                    <option style="background-color: #000" ; value="upcoming">Upcoming Event</option>
                                    <option style="background-color: #000" ; value="past">Past Event</option>
                                </select>

                 
                            <tr>
                                <td>
                                    <label>Title</label>
                                </td>
                                <td>
                                    <input type="text" name= "title" placeholder="Event name..." class="medium" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <label>Description</label>
                                </td>
                                <td>
                                    <textarea class="tinymce" name = "body"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Image</label>
                                </td>
                                <td>
                                    <input type="file" name = "image[]" multiple="multiple"/>
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