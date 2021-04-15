<?php
	include "inc/header.php";
	include "inc/slider.php";
	
 ?>

	
 	<!-- Pagination setup-->
 	<?php
 	  $per_page = 3;
 	  if(isset($_GET['page']))
 	  {
 	  	$page = $_GET['page'];
 	  }
 	  else
 	  {
 	  	$page = 1;
 	  }
 	  $start_from = ($page-1)*$per_page;
 	?>
 	<!-- Pagination setup ends-->
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<!-- start php loop -->
			<?php
			  $db = new Database();
			  $sqlCommand= "SELECT *,date_format(date,'%D %M ,%Y %l:%i %p') AS time_details FROM tbl_post ORDER BY id DESC LIMIT $start_from,$per_page";
			  $sqlResult = $db->select($sqlCommand);
			  if ($sqlResult) {
			  		while($post = $sqlResult->fetch_assoc())
			  		{

			  	
			 ?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
				<h4><?php echo $post['time_details']; ?>, By <a href="post.php?id=<?php echo $post['id']; ?>"><?php echo $post['author']; ?></a></h4>
				 <a href="post.php?id=<?php echo $post['id']; ?>"><img src="admin/<?php echo $post['image']; ?>" alt="post image"/></a>
				<p>
					<?php 
					  $f = new Format();
					  echo $f->textShort($post['body'],400);
					 ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
				</div>
			</div>
			<?php 
			  	}
			  }
			  else {
			  	 header("location:404.php");
			  }
			?>
			<!-- Ends php loop -->	

			<!-- Pagination -->
			
			<?php 
				$sqlCommand = "SELECT * FROM tbl_post";
				$sqlResult  = $db->select($sqlCommand);
				$rows = mysqli_num_rows($sqlResult);
				$totalPages = ceil($rows/$per_page);
				echo "<span class='pagination' ><a href='index.php?page=1'>First Page </a>"; 
		
				for ($i=1;$i<=$totalPages;$i++) { 
					echo "<a href='index.php?page=$i'> $i </a>"; 
				}
			
			    echo "<a href='index.php?page=$totalPages'> Last Page</a></span>";

			 ?>			<!-- Pagination ends -->
		
		</div>
		<?php include "inc/sidebar.php"; ?>
	</div>
<?php include "inc/footer.php"; ?>
	