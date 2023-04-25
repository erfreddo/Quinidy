<?php
	include 'connection.php';
	session_start();
	if (!isset($_SESSION['nickname'])){header("Location: ../index.php");}
	$nickname = $_SESSION['nickname'];
	
	if (isset($_POST['submit'])) {
		$discovery_levels = intval($_POST['discovery_levels']);
		$queryd = "UPDATE utenti SET discovery_levels = $discovery_levels WHERE nickname = '$nickname'";
		$resultd = mysqli_query($conn, $queryd);
	}

?>