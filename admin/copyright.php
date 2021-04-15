<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                <?php 
                  if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    //$note = $_POST['note'];
                    $note  = $f->validate($_POST['note']);
                    $note  = $db->escapeString($note);
                    

                    
                    if ($note=='') {
                        echo "<span class='fail'>Field must not be empty!!!</span>";
                    }
                    else
                    {
                        $sqlCommand = "UPDATE tbl_footer SET 
                         note = '$note'
                         WHERE id = 1;
                        ";
                        $sqlResult = $db->update($sqlCommand);
                        if ($sqlResult) {
                            echo "<script>alert('UPDATED!!! ');</script>";
                            echo "<script>window.location = 'copyright.php';</script>";
                        }
                        else
                        {
                            echo "<span class='fail'>Failed to update!!! </span>";
                        }
                    }
                }
                ?>     


                <?php
                    $sqlCommand = "SELECT * FROM tbl_footer WHERE id = 1;";
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

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $row['note']; ?>" placeholder="Enter Copyright Text..." name="note" class="large" required="" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once "inc/footer.php" ?>