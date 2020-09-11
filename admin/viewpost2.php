<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        

<?php
    if(!isset($_GET['viewpostid']) || $_GET['viewpostid'] == NULL)
    {
        echo "<script>window.location = 'pending-post2.php';</script>";
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
            $query = "select * from tbl_post where  id ='$postid' order by id desc";
            $getpost = $db->select($query);
            while ($postresult = $getpost->fetch_assoc())
                {
        ?>    
                 <form action="" method="post" enctype="multipart/form-data">
                 <table class="form">
    
    <h2>View Post</h2>
    <a href="pending-post2.php" class="btn btn-default btn-lg active" role="button" 
					style="color: #444; background: white;float: right;margin-top: 20px;
					font-weight: bold; margin-right:120px; paddding:30px">
                    Back</a>

    <form action="pending-post2.php" method="post" enctype="multipart/form-data">
        <table class="form">
    
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
            <input type="text" name= "author" readonly value="<?php echo $postresult['author']; ?>" 
                class="medium" />
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="OK" />
        </td>
    </tr>
</table>
                    </form>
        <?php }  ?>
                </div>
            </div>
        </div>



<?php include 'inc/footer.php'; ?>