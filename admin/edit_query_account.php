<?php
	require_once 'db.php';
    session_start();
	if(ISSET($_POST['edit_account'])){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$pw = $_POST['pw'];
		$db->query("UPDATE `login` SET `name` = '$name', `username` = '$username', `pw` = '$pw' WHERE `id` = '$_REQUEST[id]'") or die("mysqli_error()");
		
		header("location:accounts.php?success");
		
	}	
?>