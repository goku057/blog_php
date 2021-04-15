<?php include_once "inc/header.php" ?>
<?php include_once "inc/sidebar.php" ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Post Title</th>
							<th >Description</th>
							<th>Category</th>
							<th>Image</th>
							<th>Author</th>
							<th>Tags</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$sqlCommand = "SELECT *,tbl_post.id as tid,tbl_category.name FROM `tbl_post` JOIN tbl_category ON tbl_post.cat=tbl_category.id ORDER BY tbl_post.id DESC ;";
					$sqlResult = $db->select($sqlCommand);
					if ($sqlResult) {
						$i=0;
						while ($row = $sqlResult->fetch_assoc()) {
							$i++;
						

				?>		
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td style="max-width: 50px;overflow-wrap: break-word;"><?php echo $f->textShort($row['body'],100); ?></td>
							<td ><?php echo $row['name']; ?></td>
							<td><img src="<?php echo $row['image']; ?>" height=40px width=50px/></td>
							<td><?php echo $row['author']; ?></td>
							<td><?php echo $row['tags']; ?></td>
							<td><?php echo $f->formatDate($row['date']); ?></td>
							<td><a href="editpost.php?id=<?php echo $row['tid']; ?>">Edit</a> || <a onclick="return confirm('ARE YOU SURE???')" href="delete.php?delid=<?php echo $row['tid']; ?>">Delete</a></td>
						</tr>
				<?php
					  }
					}
				?>		
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
	<!--<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script> -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>  
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function () {
            //setupLeftMenu();
            $('.datatable').DataTable();
			//setSidebarHeight();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            
			setSidebarHeight();
        });
    </script>
	<!--<script type="text/javascript">
			$(document).ready( function () {
			    $('#example').DataTable();
			} );
	</script> --->
    <?php include_once "inc/footer.php" ?>