<?php include "inc/header.php";?>
<style type="text/css">
    /* Alumni page */
.page{
    justify-content: center !important;
}
.alumni {
    height: 300px;
    margin: 6px;
    background: white;
    position: relative;
    width: 525px;
    transition: 1s;
    margin-top: 30px;
}

.alumni:hover{
    transform:scale(1.3);
    box-shadow: 2px 2px 2px #000;
    z-index: 2;
}
.left-page{
    width: 50%;
    height: 300px;
    float: left;
    background: darkcyan;
    color: white;
}
.left-page h2{
    
    margin: 8px;
    padding-top: 20px;
    float: left;
    margin-left: 31px;
    
}
.left-page h4{
    float: left;
    width: 50%;
    margin-left: 31px;
}

.left-page h2 a{
    font-family: 'candal',serif !important;
    color: white !important;
    text-decoration: none !important;

}
.right-page p{
    float: left;
    width: 50%;
    margin-left: 271px;
    margin-top: -272px;
    padding-left: 10px;
    padding-right: 20px;
}
.right-page .readmore{
   position: absolute;
    bottom: 20px;
    right: 20px;
    border: 1px solid #006669;
    background: transparent;
    border-radius: 0px;
    color: #006669 !important;
}
.alumni .readmore a{
    text-decoration: none;
    font-size: 20px !important;
    padding: 10px;
}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}
.{}

/* Alumni page */
</style>

<?php 
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        header("Location: 404.php");
    }
    else{
        $id = $_GET['id'];
    }
?>

    <div class="container clear">
        <div class="career-details clear">
        <a href="alumni.php" class="btn btn-default btn-lg active" role="button"
        style="color:white; background:#006669; font-weight:bold; float:right;margin-top: 30px;">
        Back</a>
            <div class="about">

                <?php
                    $query = "select * from alumnus_feedback where id=$id";
                    $post= $db->select($query);
                    if($post){
                    while ($result = $post->fetch_assoc()){
                ?>

                    <h2><a href="user_profile.php"><?php echo $result['author'];?></a></h2>
                    <h3><a href="blogpost.php?id=<?php echo $result['id'];?>"></a></h3>
                    <h4><?php echo $fm->formatDate($result['date']);?></h4>
                    <?php echo $result['body']; ?>
                <?php } }?>
                
            </div>
        </div>

        
