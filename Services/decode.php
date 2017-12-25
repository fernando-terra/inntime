<?php 
	include ("../Services/main.php");

	$btn = explode("_", @$_GET['btn'])[1];
	$status = @$_GET['status'];
	$GUESTADDR = $_SERVER['REMOTE_ADDR'];

	$obj = new main();
	$_return = $obj->SetStatusFromMobile((string)$btn, (string)$status, (string)$GUESTADDR);
	echo $_return;
?>
