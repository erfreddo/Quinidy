<?php // Quinidy login page
	include '../php/connection.php';
	define("TITLE","Accedi a Quinidy");
	session_start();
	error_reporting(0);

	#if (isset($_SESSION['nickname'])) { header("Location: ../index.php");}
	if (isset($_SESSION['nickname'])) { header("Location: mainpage.php");}

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$propic = $_POST['propic'];
		$answered = $_POST['answered'];
		$correct = $_POST['correct'];
		$sql = "SELECT * FROM utenti WHERE email='$email' AND password='$password'";
		
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['nickname'] = $row['nickname'];
			$_SESSION['propic'] = $row['propic'];
			$_SESSION['answered'] = $row['answered'];
			$_SESSION['correct'] = $row['correct'];
			header("Location: mainpage.php");
		} else { echo "<script>alert('Email o password errate.')</script>"; }
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo TITLE?></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../src/font/font.css"/>
		<link rel="stylesheet" type="text/css" href="../src/css/extra.css"/>
    </head>
    <body class="all-bg purple-bg d-flex flex-column min-vh-100">
		<?php include("../pages/layouts/navbar.php") ?>
		
		<section class="margin-main text-center py-5">
			<div class="container text-white">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-5 shadow-lg p-4 mb-4 bg-black bg-opacity-50 rounded">
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex align-items-center justify-content-center">
								<span class="fa fa-user-o"></span>
							</div>
							<h3 class="text-center mb-4 mt-3" id="title">Accedi con il tuo account</h3>
							<form action="" method="POST" class="login-form">
								<div class="form-group mb-3">
									<input type="email" class="form-control rounded-left" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
								</div>
								<div class="form-group mb-3">
									<input type="password" class="form-control rounded-left" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
								</div>
								<div class="text-md-right"> <p>Non hai un account? <a href="register.php" id="button">Registrati</a>.</p></div>
								<div class="form-group d-flex justify-content-center">
									<button type="submit" class="btn btn-hover color-3 rounded-pill submit" name="submit" id="button">Accedi</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include("../pages/layouts/footer.php") ?>
	</body>
</html>