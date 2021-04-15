<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block"> 
                <?php 
                  if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    
                    $facebook  = $f->validate($_POST['facebook']);
                    $facebook  = $db->escapeString($facebook);
                    $twitter = $f->validate($_POST['twitter']);
                    $twitter = $db->escapeString($twitter);
                    $ln = $f->validate($_POST['ln']);
                    $ln = $db->escapeString($ln);
                    $google = $f->validate($_POST['google']);
                    $google = $db->escapeString($google);

                    
                    if ($facebook==''||$twitter==''||$ln=="" ||$google == "") {
                        echo "<span class='fail'>Field must not be empty!!!</span>";
                    }
                    else
                    {
                        $sqlCommand = "UPDATE tbl_social SET 
                         fb = '$facebook',
                         twitter = '$twitter',
                         ln = '$ln',
                         google = '$google'
                         WHERE id = 1;
                        ";
                        $sqlResult = $db->update($sqlCommand);
                        if ($sqlResult) {
                            echo "<script>alert('UPDATED!!! ');</script>";
                        }
                        else
                        {
                            echo "<span class='fail'>Failed to update!!! </span>";
                        }
                    }
                }
                ?>     


                <?php
                    $sqlCommand = "SELECT * FROM tbl_social WHERE id = 1;";
                    $sqlResult = $db->select($sqlCommand);
                    if ($sqlResult) {
                        $row = $sqlResult->fetch_assoc();     
                       // echo "<script>alert('UPDATED!!! ');</script>";
                        //echo "<script>window.location = 'titleslogan.php';</script>";
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
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $row['fb'];?>" placeholder="Facebook link.." class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $row['twitter'];?>" placeholder="Twitter link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $row['ln'];?>" placeholder="LinkedIn link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="google"  value="<?php echo $row['google'];?>" placeholder="Google Plus link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
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
