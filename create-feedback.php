<?php include 'inc/header.php'; ?>

        <div class="grid_10">

        <div class="container">
		
            <div class="box round first grid">
        
            <div class="feedback" style="background: white;width: 700px;justify-content: center;
        margin-left: 220px;padding: 30 20 0 0px;paddind-bottom: 10px;padding-top: 50px;padding-left: 105px;}">
            
            <a href="alumni.php" class="btn btn-default btn-lg active" role="button"
        style="color:white; background:#006669; font-weight:bold; float:right;    margin-top: -44px; margin-right: 20px;">
        Back</a>
                <h4>Say something about four years journey with Leading University</h4>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $body   = mysqli_real_escape_string($db->link, $_POST['body']);
                    
                    if( $body == ""){
                        echo "<span class= 'error' style='color:red; font-size:20px; font-weight:bold;'>
                        Field must not be empty !</span>";
                    }
                    else
                    {
                        $user=$_SESSION['username'];
                       $query = "INSERT INTO alumnus_feedback (author,body) VALUES('$user','$body')";

                       $inserted_rows = $db->insert($query);
                       if ($inserted_rows) 
                       {
                        echo "<span class='success' style='color:#006669; font-size:20px; font-weight:bold;'>Feedback Created Successfully.
                        </span>";
                       }else 
                       {
                        echo "<span class='error' style='color:red; font-size:20px; font-weight:bold;'>Feedback Not Created !</span>";
                       }
                    }
                }    
            ?>
                <div class="block">               
                 <form action=" " method="post" enctype="multipart/form-data">
                    <table class="form">
                
                        <tr>
                            
                            <td>
                                <textarea id="myEditor" name = "body" 
                                style="margin-left:40px"
                                ></textarea>
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
