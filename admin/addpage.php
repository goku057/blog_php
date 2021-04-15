<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
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
                        
                        $query = "INSERT INTO tbl_page (name,body)
                        VALUES('$name', '$body')";
                        $inserted_rows = $db->insert($query);
                        if ($inserted_rows) {
                         echo "<script>alert('Page created SUCCESSFULLY')</script>";
                         //header("location:postlist.php?msg=success");
                         echo "<script>window.location = 'addpage.php';</script>";

                        }else {
                         echo "<script>alert('Page creation was UNSUCCESSFULL')</script>";
                         //header("location:postlist.php?msg=success");
                         echo "<script>window.location = 'addpage.php';</script>";
                        }
                    }
                  }
                ?>              
                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter name here..." class="medium" />
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
