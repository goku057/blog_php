<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
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
                         echo "<span class='fail'>Please Select any Image !</span>";
                    }elseif ($file_size >1048567) {
                         echo "<span class='fail'>Image Size should be less then 1MB!
                         </span>";
                    } elseif (in_array($file_ext, $permited) === false) {
                         echo "<span class='fail'>You can upload only:-".implode(', ', $permited)."</span>";
                    } else{
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "INSERT INTO tbl_post (cat,title,body,image,author,tags)
                        VALUES('$cat', '$title', '$body', '$uploaded_image', '$author', '$tag')";
                        $inserted_rows = $db->insert($query);
                        if ($inserted_rows) {
                         echo "<span class='succ'>POSTED SUCCESSFULLY.
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
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" placeholder="Enter Author name..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat"  required="">
                                 <option></option>
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
                                <input type="file" name="image" required="" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tag" placeholder="Enter Post tags..." class="medium" />
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
