<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php
				  
					  $db = new Database();

					  $sqlCommand= "SELECT * FROM tbl_category;";
					  $sqlResult = $db->select($sqlCommand);
					  if ($sqlResult) {
					  		while($post = $sqlResult->fetch_assoc())
					  		{
			  	
			 		?>	
						<li><a href="posts.php?category=<?php echo $post['id'];?>"><?php echo $post['name'];?></a></li>
					<?php }} else{ ?>
						<li>No Categories available</li>
					<?php }?>
												
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>

				<?php
				  $db = new Database();
				  $sqlCommand= "SELECT * FROM tbl_post ORDER BY date DESC LIMIT 5";
				  $sqlResult = $db->select($sqlCommand);
				  if ($sqlResult) {
				  		while($post = $sqlResult->fetch_assoc())
				  		{

			  	
			 	?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
						<a href="post.php?id=<?php echo $post['id']; ?>"><img src="admin/<?php echo $post['image']; ?>" alt="post image"/></a>
						<p><?php 
							$f = new Format();
					  		echo $f->textShort($post['body'],157);
						?></p>	
					</div>
					
					<?php }}else{ echo "No posts to show";}?>
	
			</div>
			
		</div>