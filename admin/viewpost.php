<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        

<?php
    if(!isset($_GET['viewpostid']) || $_GET['viewpostid'] == NULL)
    {
        echo "<script>window.location = 'pending-post.php';</script>";
    }
    else
    {
        $postid = $_GET['viewpostid'];
    }
?>
		<div class="grid_10">
            <div class="box round first grid">
                
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                   
                }   
            ?>
                <div class="block">           

        <?php
            $query = "select * from tbl_blog where  id ='$postid' order by id desc";
            $getpost = $db->select($query);
            while ($postresult = $getpost->fetch_assoc())
                {
        ?>    
                 <form action="" method="post" enctype="multipart/form-data">
                 <table class="form">
    
    <h2>View Blog Post</h2>
    <a href="pending-post.php" class="btn btn-default btn-lg active" role="button" 
					style="color: #444; background: white;float: right;margin-top: 20px;
					font-weight: bold; margin-right:120px; paddding:30px">
                    Back</a>

    <form action="pending-post.php" method="post" enctype="multipart/form-data">
        <table class="form">
   
    <tr>
        <td>
            <label>Title</label>
        </td>
        <td>
            <input type="text" readonly value="<?php echo $postresult['title']; ?>" class="medium" />
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
                <option 
                            <?php 
                                if ($postresult['cat'] == $result['id']) { ?>
                                    selected = "selected";
                                
                            <?php }?>
                                    
                                value= "<?php echo $result['id']; ?>" >
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
            <input src="<?php echo $postresult['image']; ?>" height="100px" width="250px"/>
        </td>
    </tr>
    
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
                <textarea type="text" name = "body" style="width:650px; height:300px;">
                    <?php echo $postresult['body']; ?>
                </textarea>
        </td>
    </tr>

    <tr>
        <td>
            <input type="text" name= "author" value="<?php echo $postresult['author']; ?>" 
                class="medium" />
        </td>
    </tr>
    <tr>
        <td></td>
        
        <td>
            <a onclick="return confirm('Are you sure to approve !');" 
            href="approve.php?approvepostid=<?php echo $result['id']; ?>">Approve</a>
        </td>
 
    </tr>
 
</table>
                    </form>
        <?php }  ?>
                </div>
            </div>
        </div>



<?php include 'inc/footer.php'; ?>