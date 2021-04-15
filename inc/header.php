<?php
	
	include "config/config.php";
	include "lib/Database.php";
	include "helpers/Format.php";
	$db = new Database();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo TITLE ?></title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="styletwo.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	<style type="text/css">
		

	</style>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
		<?php
                    $sqlCommand = "SELECT * FROM title_slogan WHERE id = 1;";
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
			<div class="logo">
				<img src="admin/<?php echo $row['logo']; ?>" alt="Logo" height="57px"/>
				<h2><?php echo $row['title']; ?></h2>
				<p><?php echo $row['slogan']; ?></p>
			</div>
		</a>
		<div class="social clear">
		<?php
                    $sqlCommand = "SELECT * FROM tbl_social WHERE id = 1;";
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
			<div class="icon clear">
				<a href="<?php echo $row['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['ln']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row['google']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="keyword" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<li><a id="active" href="index.php">Home</a></li>
		<?php 
	            $sqlCommand = "SELECT * FROM tbl_page;";
	            $sqlResult = $db->select($sqlCommand);
	            if ($sqlResult) {
	              while ($row = $sqlResult->fetch_assoc()) {       
	         ?>
	         <li><a href="page.php?pid=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a> </li>
	     <?php } } ?>	
		<li><a href="contact.php">Contact</a></li>
	</ul>
</div>
