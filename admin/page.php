<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
 <?php 
    if ($_GET['pid']==null || !isset($_GET['pid'])) {
        echo "<script>window.location='index.php'</script>";
    }
    else
    {
      $id= $_GET['pid'];
    }

 ?>
 <?php
    if (isset($_GET['delid'])) {
        $did = $_GET['delid'];
        $sqlCommand = "DELETE FROM tbl_page WHERE id = $did";
        $sqlResult = $db->delete($sqlCommand);
        if ($sqlCommand) {
            echo "<script>alert('Page DELETED SUCCESSFULLY')</script>";
                         //header("location:postlist.php?msg=success");
            echo "<script>window.location = 'addpage.php';</script>";
            return;
        }
        else
        {
            echo "<script>alert('Page Deletion was SUCCESSFULLY')</script>";
             //header("location:postlist.php?msg=success");
             echo "<script>window.location = '';</script>";
        }
    }
 ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Page</h2>
                <div class="block"> 
                <?php 
                  if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    
                    $name  = $f->validate($_POST['name']);
                    $name  = $db->escapeString($name);
                   
                    $body =$_POST['body'];
                    //$body   = $f->validate($_POST['body']);
                    $body   = $db->escapeString($body);
                   
                    if ($name==''||$body=='') {
                        echo "<span class='fail'>Field must not be empty!!!</span>";
                    }else{
                        
                        $query = "UPDATE tbl_page SET
                                  name = '$name',
                                  body = '$body'
                                  WHERE id = $id;

                        ";
                        $inserted_rows = $db->update($query);
                        if ($inserted_rows) {
                         echo "<script>alert('Page UPDATED SUCCESSFULLY')</script>";
                         //header("location:postlist.php?msg=success");
                         echo "<script>window.location = '';</script>";

                        }else {
                         echo "<script>alert('Page UPDATE was UNSUCCESSFULL')</script>";
                         //header("location:postlist.php?msg=success");
                         echo "<script>window.location = '';</script>";
                        }
                    }
                  }
                ?> 
            <?php
                    $sqlCommand = "SELECT * FROM tbl_page WHERE id = $id;";
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
                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Enter name here..." class="medium" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $row['body']; ?></textarea>
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="delb"><a onclick="return confirm('Are you sure about deleting this page?');" href="?delid=<?php echo $id ?>">Delete</a></span>
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
