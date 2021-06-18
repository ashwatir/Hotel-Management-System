<?php
	require_once 'db.php';
	$db->query("DELETE FROM `transaction` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die("mysqli_error()");
	header("location:reservation.php?success2");
?>