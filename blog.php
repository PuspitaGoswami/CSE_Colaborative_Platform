<?php include 'inc/header.php';?>
<div class="container">
    <div class="contentsection contemplete clear">
            
        <?php include "inc/sidebar.php"; ?>
        <div class="maincontent clear">
        <!--pagination-->
        <?php
            $per_page = 10;
            if (isset($_GET["page"])){
                $page = $_GET["page"];
            }
            else{
                $page=1;
            }
            $start_from = ($page-1)*$per_page;
        ?>
        <?php   

            global $id;
                
            $query = "SELECT * FROM user2 WHERE user_name='".$_SESSION['username']."'";
                $result = $db->select($query);
                if($result != false){
                    if(mysqli_num_rows($result)>0){
        ?>                              

        <?php  
            while ($user = mysqli_fetch_array($result)) {
                 ?>                                              
            <img src="<?php echo $user['image'];?> " style="width:50px;height: 50px;margin:2px; border-radius:60%;" />          
        <?php }}}?>
        
        <!--pagination-->
        <?php   
            $query = "select * from tbl_blog where active=1 order by id desc limit $start_from, $per_page";
            $post= $db->select($query);
            if($post){
            while ($result = $post->fetch_assoc()){
            $id = $result['id'];?>                                              

            
            <h3><a href="user_profile.php"><?php echo $result['author'];?></a></h3>
            <div class="samepost clear">
            <img src="<?php echo $result['image']; ?>" alt="post image"/>
                <h2><a href="blogpost.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
                <h4><?php echo $fm->formatDate($result['date']);?></h4>
                <p>
                    <?php echo $fm->textShorten($result['body']); ?>
               </p>
                <div class="readmore clear">
                    <a href="blogpost.php?id=<?php echo $result['id']; ?>">Read More</a>
                </div>
                <form action='blog_like.php' method="POST">

                    <input type="hidden" name="id" value=<?php echo $id; ?>>

                    <?php 
                        $sql="SELECT * FROM blog_like WHERE blog_id = '$id'";
                        $result= $db->select2($sql);
                        $cnt_likes=mysqli_num_rows($result);
                     ?>
                    <input style="background: none; color:blue;border: none;" type="submit" name="like" value="Like"><?php echo $cnt_likes; ?>

                </form>

                <form action='blog_dislike.php' method="POST">

                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                    <?php 
                        $sql="SELECT * FROM blog_dislike WHERE blog_id = '$id'";
                        $result= $db->select2($sql);
                    

                        $cnt_dislikes=mysqli_num_rows($result);
                     ?>
                    <input style="background: none; color:blue;border: none;" type="submit" name="dislike" value="Dislike"><?php echo $cnt_dislikes; ?>

                </form>
            </div>
    <?php } ?> <!-- end while loop -->

    <!-- add post -->
<div class="box round first grid">
                
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $title  = mysqli_real_escape_string($db->link, $_POST['title']);
                    $cat    = mysqli_real_escape_string($db->link, $_POST['cat']);
                    $body   = mysqli_real_escape_string($db->link, $_POST['body']);
                    $author = mysqli_real_escape_string($db->link, $_SESSION['username']);
                   
                    
                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
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
                       '$title','$uploaded_image', '$body', '$author',1)";

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
                <div class="block-blog">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">

                        <h2>Add New Blog</h2>
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name= "title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
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
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name = "image"/>
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

<!--pagination-->
<?php 
    $query = "select * from tbl_blog";
    $result = $db->select($query);
    $total_rows = mysqli_num_rows($result);
    $total_pages = ceil($total_rows/$per_page);         

    echo "<span class='pagination'><a href='blog.php?page=1'>".'First Page'."</a>"; 

    for($i=1; $i<=$total_pages; $i++){
        echo "<a href='blog.php?page=".$i."'>$i</a>";
    }

    echo "<a href='blog.php?page=$total_pages'>".'Last Page'."</a></span>"
?>

</div>
<!--pagination-->
        <?php } else { header("Location:404.php");} ?>  
</div>

        <?php include "inc/footer.php"; ?>