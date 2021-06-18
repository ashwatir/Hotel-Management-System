<?php
	require_once 'db.php';
	$time = date("H:i:s", strtotime("+8 HOURS"));
	$db->query("UPDATE `transaction` SET `checkout_time` = '$time', `status` = 'Check Out' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die("mysqli_error()");
	header("location:checkout.php?success2");
?>