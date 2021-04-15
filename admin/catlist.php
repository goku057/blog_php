<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

<?php
    if (isset($_GET['delid'])) {
          $delid=$f->validate($_GET['delid']);
          $delid=$db->escapeString($delid);  
          if (empty($delid)==false) {
              
              $sqlCommand= "DELETE FROM tbl_category WHERE id=$delid;";
              $sqlResult= $db->insert($sqlCommand);
              if ($sqlResult) {
                  echo "<span class='succ'>DATA DELETED SUCCESSFULLY</span>";      
              }else{
                echo "<span class='fail'>FAILED TO DELETE</span>";
              }

           }else{
                echo "<span class='fail'>FAILED TO DELETE 2</span>";
           } 
    }

?>
      
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>  
					</thead>
					<tbody>
						<?php 
                            $sqlCommand = "SELECT * FROM tbl_category ORDER BY id DESC;";
                            $sqlResult  = $db->select($sqlCommand); 
                            $i = 0;
                            if ($sqlResult) {
                            
                            while ( $row= $sqlResult->fetch_assoc()) {
                                 $i++;  
                        ?>
                        <tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><a href="editcat.php?id=<?php echo $row['id']; ?>">Edit</a> || <a onclick="return confirm('Do you want to delete it?');" href="?delid=<?php echo $row['id']; ?>">Delete</a></td>
						</tr>
                        <?php } }else { ?>
                            <tr class="odd gradeX">
                            <td></td>
                            <td>No category added yet</td>
                            <td></td>
                        </tr>
                       <?php  } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <script type="text/javascript">

            $(document).ready(function () {
                setupLeftMenu();

                $('.datatable').dataTable();
                setSidebarHeight();


            });
        </script>
<?php include_once "inc/footer.php" ?>

