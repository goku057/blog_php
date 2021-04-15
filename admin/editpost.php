<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
<?php 
    if ($_GET['id']==null || !isset($_GET['id'])) {
        echo "<script>window.location='postlist.php'</script>";
        return ;
    }
    else
    {
      $id= $_GET['id'];
    }

 ?> 
 <?php
    $sqlCommand = "SELECT *,tbl_category.name FROM `tbl_post` JOIN tbl_category ON cat=tbl_category.id WHERE tbl_post.id=$id ORDER BY tbl_post.id DESC ;";
    $sqlResult = $db->select($sqlCommand);
    if ($sqlResult) {
        $post = $sqlResult->fetch_assoc();
    }

    
 ?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>EDIT Post</h2>
                <div class="block"> 
                <?php 
                  if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    
                    $title  = $f->validate($_POST['title']);
                    $title  = $db->escapeString($title);
                    $author = $f->validate($_POST['author']);
                    $author = $db->escapeString($author);
                    $cat    = $f->validate($_POST['cat']);
                    $cat    = $db->escapeString($cat);
                    $body =$_POST['body'];
                    //$body   = $f->validate($_POST['body']);
                    $body   = $db->escapeString($body);
                    $tag    = $f->validate($_POST['tag']);
                    $tag    = $db->escapeString($tag);

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];

                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;
                    //echo "CHECKING";
                    if ($title==''||$author==''||$cat==''||$body==''||$tag=='') {
                        echo "<span class='fail'>Field must not be empty!!!</span>";
                    }else if (empty($file_name)) {
                        // move_uploaded_file($file_temp, $uploaded_image);
                        $query = "UPDATE tbl_post SET cat='$cat',title='$title',body='$body',author='$author',tags ='$tag' WHERE id=$id;";
                        $inserted_rows = $db->insert($query);
                        if ($inserted_rows) {
                         echo "<span class='succ'>UPDATED SUCCESSFULLY.
                         </span>";
                        }else {
                         echo "<span class='fail'>POSTED was UNSUCCESSFULLY !</span>";
                        }
                    }elseif ($file_size >1048567) {
                         echo "<span class='fail'>Image Size should be less then 1MB!
                         </span>";
                    } elseif (in_array($file_ext, $permited) === false) {
                         echo "<span class='fail'>You can upload only:-".implode(', ', $permited)."</span>";
                    } else{
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "UPDATE tbl_post SET cat='$cat',title='$title',body='$body',image=  '$uploaded_image',author='$author',tags ='$tag' WHERE id=$id;";
                        $inserted_rows = $db->insert($query);
                        if ($inserted_rows) {
                         echo "<span class='succ'>UPDATED SUCCESSFULLY.
                         </span>";
                        }else {
                         echo "<span class='fail'>POSTED was UNSUCCESSFULLY !</span>";
                        }
                    }
                  }
                ?>              
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $post['title']; ?>" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $post['author']; ?>" placeholder="Enter Author name..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat" value="<?php echo $post['name']; ?>" required="">
                                 
                                 <?php 
                                    $sqlCommand = "SELECT * FROM tbl_category;";
                                    $sqlResult = $db->select($sqlCommand);
                                    if ($sqlResult) {
                                      while ($row = $sqlResult->fetch_assoc()) {
                                        
                                 ?>   
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                 
                                 <?php  } } ?>
                                </select>
                            </td>
                        </tr>
                   
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                               <img src="<?php echo $post['image']; ?>" height=57px width= 157px> <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $post['body']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $post['tags']; ?>" name="tag" placeholder="Enter Post tags..." class="medium" />
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
        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>        
        
        <?php include_once "inc/footer.php" ?>
