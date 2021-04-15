<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
 <style type="text/css">
 
 </style> 
        <div class="grid_10">
		
            <div class="box round first grid">
               
                
                  <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">               
                <?php 
                  if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    
                    $title  = $f->validate($_POST['title']);
                    $title  = $db->escapeString($title);
                    $slogan = $f->validate($_POST['slogan']);
                    $slogan = $db->escapeString($slogan);
                    

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $same_image = "logo".'.'.$file_ext;
                    $uploaded_image = "upload/".$same_image;
                    //echo "CHECKING";
                    if ($title==''||$slogan=='') {
                        echo "<span class='fail'>Field must not be empty!!!</span>";
                    }else if (empty($file_name)) {
                         move_uploaded_file($file_temp, $uploaded_image);
                        $query = "UPDATE title_slogan SET slogan='$slogan',title='$title' WHERE id=1;";
                        $inserted_rows = $db->insert($query);
                        if ($inserted_rows) {
                         //echo "<span class='succ'>UPDATED SUCCESSFULLY.</span>";
                         //header("location:postlist.php?msg=success"); 
                         echo "<script>alert('UPDATED!!! ');</script>";
                         echo "<script>window.location = 'titleslogan.php';</script>";
                         
                         
                        }else {
                         echo "<span class='fail'>FAILED !</span>";
                        }
                    }elseif ($file_size >1073741824) {
                         echo "<span class='fail'>Image Size should be less then 1GB!</span>";
                    } elseif (in_array($file_ext, $permited) === false) {
                         echo "<span class='fail'>You can upload only:-".implode(', ', $permited)."</span>";
                    } else{
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "UPDATE title_slogan SET slogan='$slogan',title='$title',logo=  '$uploaded_image' WHERE id=1;";
                        $inserted_rows = $db->insert($query);
                        if ($inserted_rows) {
                         echo "<script>alert('UPDATED!!! ');</script>";
                         echo "<script>window.location = 'titleslogan.php';</script>";
                        }else {
                         echo "<span class='fail'>POSTED was UNSUCCESSFULLY !</span>";
                        }
                    }
                  }
                ?>     

                <?php
                    $sqlCommand = "SELECT * FROM title_slogan WHERE id = 1;";
                    $sqlResult = $db->select($sqlCommand);
                    if ($sqlResult) {
                        $row = $sqlResult->fetch_assoc();
                    }
                    else
                    {
                        echo "DB ERROR!!!";
                        return;
                    }
                ?>
                <div class="leftside">
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Title..."  name="title" class="medium" value="<?php echo $row['title']; ?>" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Website Slogan..." name="slogan" class="medium" value="<?php  echo $row['slogan']; ?>" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr> 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>
                    <div class="rightside">
                        <img src="<?php echo $row['logo']; ?>" alt="logo">
                        LOGO
                    </div>
                </div>
            </div>
        </div>
       <?php include_once "inc/footer.php" ?>