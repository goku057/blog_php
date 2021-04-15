<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
<?php 
    if ($_GET['id']==null || !isset($_GET['id'])) {
        echo "<script>window.location='catlist.php'</script>";
    }
    else
    {
      $id= $_GET['id'];
    }

 ?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
                
               <div class="block copyblock"> 
            <?php 
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                  $name=$f->validate($_POST['name']);
                  $name=$db->escapeString($name);  
                  if (empty($name)==false) {
                      
                      $sqlCommand= "UPDATE tbl_category SET name = '$name' WHERE id=$id;";
                      $sqlResult= $db->insert($sqlCommand);
                      if ($sqlResult) {
                          echo "<span class='succ'>DATA UPDATED SUCCESSFULLY</span>";
                          
                      }
                      else
                      {
                        echo "<span class='fail'>FAILED TO UPDATED</span>";
                      }

                   }
                   else
                   {
                        echo "<span class='fail'>FAILED TO UPDATED 2</span>";
                   }    
              }
            ?>

            <?php 
             $sqlCommand = "SELECT  * FROM tbl_category WHERE id=$id";
             $sqlResult = $db->select($sqlCommand);
             if ($sqlResult==false) {
               header("location:catlist.php");
               return;
             }
             $row = $sqlResult->fetch_assoc();
            ?>
                 <form method="post" action="">
                    <table class="form" >					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." required="" class="medium" value="<?php echo $row['name'] ?>" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once "inc/footer.php" ?>
