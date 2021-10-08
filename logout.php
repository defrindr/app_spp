<?php
	session_start();
	include_once"lib/class_db.php";
	unset($_SESSION['username']);
	unset($_SESSION['id_petugas']);
	$fg->redir("login.php");

?>