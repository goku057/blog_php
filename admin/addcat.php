<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
       
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                
               <div class="block copyblock"> 
            <?php 
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                  $name=$f->validate($_POST['name']);
                  $name=$db->escapeString($name);  
                  if (empty($name)==false) {
                            
                      
                      
                      $sqlCommand= "INSERT INTO  tbl_category VALUES(null,'$name');";
                      $sqlResult= $db->insert($sqlCommand);
                      if ($sqlResult) {
                          echo "<span class='succ'>DATA ADDED SUCCESSFULLY</span>";
                          
                      }
                      else
                      {
                        echo "<span class='fail'>FAILED TO ADD</span>";
                      }

                   }
                   else
                   {
                        echo "<span class='fail'>FAILED TO ADD 2</span>";
                   }    
              }
            ?>
                 <form method="post" action="">
                    <table class="form" >					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." required="" class="medium" />
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
