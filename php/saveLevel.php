<?php
	include 'connection.php';
	session_start();
	if (!isset($_SESSION['nickname'])){header("Location: ../index.php");}
	$nickname = $_SESSION['nickname'];
	
	// Update value of solved levels in 4F1P quiz
	if (isset($_POST['submit'])) {
		$four_levels = intval($_POST['four_levels']);
		$queryf = "UPDATE utenti SET four_levels = $four_levels WHERE nickname = '$nickname'";
		$resultf = mysqli_query($conn, $queryf);
	}

?>