<?php
	if (!isset($_GET['delid']) || $_GET['delid']==null) {
		header("location:postlist.php");
		return;
	}
	include "../config/config.php";
	include "../lib/Database.php";
	$db = new Database();
	$id = $_GET['delid'];
	$sqlCommand = "SELECT * FROM tbl_post WHERE id = $id";
	$sqlResult = $db->select($sqlCommand);
	if (!$sqlResult) {
		echo "<script>alert('DATA DOESNT EXIST ');</script>";
		//header("location:postlist.php?msg=success");
		echo "<script>window.location = 'postlist.php';</script>";
	}
	$row = $sqlResult->fetch_assoc();
	$img = $row['image'];
	unlink($img);
	$sqlCommand = "DELETE FROM tbl_post WHERE id = $id";
	$sqlResult = $db->delete($sqlCommand);
	if ($sqlResult) {
		echo "<script>alert('DATA DELETED SUCCESSFULLY')</script>";
		//header("location:postlist.php?msg=success");
		echo "<script>window.location = 'postlist.php';</script>";
	}
	else
	{
		echo "<script>alert('DATA could not be DELETED!!!');</script>";
		//header("location:postlist.php?msg=fail");
		echo "<script>window.location = 'postlist.php';</script>";
	}
?>
