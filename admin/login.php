<?php
	include "../lib/Session.php";
	Session::init();
?>
<?php	
	include "../config/config.php";
	include "../lib/Database.php";
	include "../helpers/Format.php";
	$db = new Database();
	$f = new Format();
 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
			
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$username=$f->validate($_POST['username']);
				$password=$f->validate($_POST['password']);
				$username=$db->escapeString($username);
				$password=$db->escapeString($password);
				$sqlCommand= "SELECT * FROM  tbl_user WHERE username = '$username' AND password = '$password';";
				$sqlResult= $db->select($sqlCommand);
				if($sqlResult == true){
					$value = mysqli_fetch_array($sqlResult);
					$rows = mysqli_num_rows($sqlResult);
					if ($rows>0) {
						Session::set("login",true);
						Session::set("username",$value['username']);
						Session::set("userid",$value['userid']);
						header("location:index.php");
					}
					else
					{
						echo "<span style='color:red;'>ID OR PASS INVALID</span>";
					}
				}else{
					
					echo "<span style='color:red;'>ID OR PASS INVALID</span>";
				}
			}
		?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>