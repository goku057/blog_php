<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
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
	  <p><?PHP echo $row['note']; ?></p>
	</div>
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
	<div class="fixedicon clear">
		<a href="<?php echo $row['fb']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $row['twitter']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $row['ln']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $row['google']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>