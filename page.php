<?php
	include "inc/header.php";
	
 ?>
 	<?php 
    if ($_GET['pid']==null || !isset($_GET['pid'])) {
        echo "<script>window.location='404.php'</script>";
    }
    else
    {
      $id= $_GET['pid'];
    }

 ?>
 <?php
                    $sqlCommand = "SELECT * FROM tbl_page WHERE id = $id;";
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

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $row['name']; ?></h2>
	
				<p><?php echo $row['body']; ?></p>
	</div>

		</div>
		<?php
		include "inc/sidebar.php";
	
        ?>

	</div>

	  <?php
		include "inc/footer.php";
	
        ?>