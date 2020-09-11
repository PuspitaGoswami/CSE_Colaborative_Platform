<?php include "inc/header.php";?>

<?php 
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		/*header("Location: 404.php");*/
	}
	else{
		$id = $_GET['id'];
	}
?>
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
        <?php }}}?>

	<div class="container clear">
	<?php include "inc/sidebar.php";?>
		<div class="content-details clear">
			<div class="about">

			<?php
				$query = "select * from tbl_blog where id=$id";
				$post= $db->select($query);
			    if($post){
			    while ($result = $post->fetch_assoc()){
			    	$blog_id=$result['id'];
			?>

				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $fm->formatDate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				<img src="<?php echo $result['image']; ?>" alt="post image"/> 
				<?php echo $result['body']; ?>

				  <?php if (isset($_POST['cmnt_submit'])) {
                             # code...
                            $comment = $_POST['comment_content'];
                            $user_name= $_SESSION['username'];
                            $blog_id = $_POST['id'];
                            if($comment == ''){
                                    echo "<span style='color:#e53d37'>Field must not be empty</span>";
                             }
                            else{
                                
                                $sql = "INSERT INTO blog_comment(user_name,blog_id,comment)
                                VALUES('$user_name','$blog_id','$comment')";
                                $cmnt = $db->insert($sql);
                                if($cmnt){                    
                                }?>
                                <script type="text/javascript">
                                    location.replace("blog.php");
                                </script>
                                
                                    
                           <?php }
                         } 
                     ?>

                    <div class="cmnt_container">
                        <form method="post" id="comment_form">
                            <input type="hidden" name="id" value=<?php echo $blog_id; ?>>

                            <div class="form_group"><?php
            $query = "SELECT * FROM user2 WHERE user_name='".$_SESSION['username']."'";
                $result = $db->select($query);
                if($result != false){
                    if(mysqli_num_rows($result)>0){
?>                              

        <?php  
            while ($user = mysqli_fetch_array($result)) {
                $pro_image= $user['image']; ?>
                   <img src="<?php echo $user['image'];?> " style="width:40px;height: 40px;margin:2px;margin-top: 15px; border-radius:80%;" />
                                                      
        <?php }}}?>



                                                             <input  type="text" name="comment_content" id="comment_content" class="form_control" 
                                placeholder="Give your Opinion"/>          
                            </div>
                            <div class="cmnt-submit">          
                                <input type="submit" name="cmnt_submit" id="cmnt_submit" Value="Save" />
                            </div>                           
                        </form>                    
                    </div>

                 <?php 
                               $sql="SELECT * FROM blog_comment WHERE blog_id = '$blog_id'";
                                $result= $db->select2($sql);                   

                                $cnt_comments=mysqli_num_rows($result);                

                 ?>

                                 <div style="margin-left: 70px;margin-top: 20px;" class="row">
                       <a style="color: #006669; font-weight: bold; margin-bottom: 10px;"  id="abouttb" tabindex="1" class="opinion"><?php echo $cnt_comments; ?> Opinion</a>


                    <div style="margin-top: 10px; padding: 5px;"  class="comment-section" id="comment_section">
                        <?php
                            $con_query="SELECT * FROM blog_comment WHERE blog_id = '$blog_id' ORDER BY id DESC";
                            $cmt = $db->select2($con_query);
                            if ($cmt!=false) {
                                # code...
                        
                                if (mysqli_num_rows($cmt)>0) {
                                while ($com =mysqli_fetch_assoc($cmt)){
                                $user_name = $com['user_name'];
                                $comment = $com['comment'];
                                $sql="SELECT * FROM user2 WHERE user_name='$user_name'";
                                $result=$db->select2($sql);
                                $row=mysqli_fetch_assoc($result);?>
                                <div style="border: 1px  #006669;padding: 3px;" class="comment">
                                <a href="#"><img  style="width:30px;height: 30px;margin:1px; border-radius:60%; margin-right: 5px;"  src="<?php echo $row['image']?>">
                                <i style="color: #006669; font-size: 1.1em;margin-right: 5px;"><?php echo $user_name; ?></i>
                                <?php echo $comment; ?><br>
                                <br>                                     

                                </div>

                         
                        <?php } } }?>
                    </div>

                </div>





			

				<div class="relatedpost clear">
					<h2>Related articles</h2>

					<?php
						$catid = $result['cat'];
						$queryrelated = "select * from tbl_blog where cat='$catid' order by rand() limit 6";
				        $relatedpost= $db->select($queryrelated);
			            if($relatedpost){
			            while ($rrresult = $relatedpost->fetch_assoc()){
					?>

				<a href="blogpost.php?id=<?php echo $result['id']; ?>">
					<!-- <img src="admin/post1.jpg" alt="post image"/> -->
                    <h2><?php echo $result['title']; ?></h2>
				</a>
					<?php }} else{echo "No related post available !! "; }?>	
				</div>
				<?php } } else { header("Location:404.php"); }?>
	        </div>
		</div>
		