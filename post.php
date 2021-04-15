<?php
	include "inc/header.php";
	include "inc/slider.php";
	
 ?>
 <?php
 	if (!isset($_GET['id']) || $_GET['id']==null) {
 		header("location:404.php");
 	}
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
			  $id=$_GET['id'];
			  $db = new Database();
			  $sqlCommand= "SELECT *,date_format(date,'%D %M ,%Y %l:%i %p') AS time_details FROM tbl_post WHERE id=$id;";
			  $sqlResult = $db->select($sqlCommand);
			  if ($sqlResult) {
			  		while($post = $sqlResult->fetch_assoc())
			  		{
			  			$cat_id=$post['cat'];

			 ?>
			<div class="about">
				<h2><?php echo $post['title']; ?></h2>
				<h4><?php echo $post['time_details']; ?>, By <?php echo $post['author']; ?></h4>
				<img src="admin/<?php echo $post['image']; ?>" alt="MyImage"/>
				<p><?php echo $post['body']; ?></p>

				<?php } ?>
			
				<div class="relatedpost clear" style="clear: both;">
				<h2>Related articles</h2>
				<?php
				  
				  $db = new Database();
				  $sqlCommand= "SELECT * FROM tbl_post WHERE cat=$cat_id LIMIT 6;";
				  $sqlResult = $db->select($sqlCommand);
				  $rows= mysqli_num_rows($sqlResult);

				  if ($sqlResult) {
				  		while($post = $sqlResult->fetch_assoc())
				  		{
				  			if ($rows==1 && $post['id']==$_GET['id']) {
				  				echo "NO RELATED POSTS ARE AVAILBLE";
				  				continue;
				  			}
				  			if ($post['id']==$_GET['id']) {
				  				continue;
				  			}
				  			
			 	?>	
					
					<a href="post.php?id=<?php echo $post['id'];?>"><img src="admin/<?php echo $post['image']; ?>" alt="post image"/></a>
				
				<?php }}else { echo "NO RELATED POSTS ARE AVAILBLE"; }?>
				</div>
			    

				<?php }else { header("location:404.php"); }?>
	
			</div>	
		</div>
		<?php include "inc/sidebar.php"; ?>
	</div> 
	<?php include "inc/footer.php"; ?>