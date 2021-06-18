<?php
	require_once 'db.php';
	$db->query("DELETE FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die("mysql_error()");
	header("location:rooms.php?success3");
?>