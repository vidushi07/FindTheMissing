<?php
	session_start();
	
	$image = $_POST['img'];
	
	$_SESSION['image'] = $image;
	echo $_SESSION['image'];
?>