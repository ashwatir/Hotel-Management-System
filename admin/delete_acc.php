<?php
	 require_once 'db.php';
	 $db->query("DELETE FROM `login` WHERE `id` = '$_REQUEST[id]'") or die("mysqli_error()");
	 header("location: accounts.php?del_success");
?>