<?php
	require_once 'db.php';
	$db->query("DELETE FROM `gallery` WHERE `id` = '$_REQUEST[id]'") or die("mysql_error()");
	header("location:gallery.php?success2");
?>