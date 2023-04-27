<?php // Quinidy register page
	include '../php/connection.php';
	define("TITLE","Registrati a Quinidy");
	session_start();
	error_reporting(0);

	if (isset($_SESSION['nickname'])) { header("Location: mainpage.php"); }

	if (isset($_POST['submit'])) {
		$nickname = strtoupper($_POST['nickname']);
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$password2 = md5($_POST['password2']);

		if ($password == $password2) {
			$sql = "SELECT * FROM utenti WHERE email='$email'";
			$result = mysqli_query($conn, $sql);
			if (!$result->num_rows > 0) {
				$sql = "INSERT INTO utenti (nickname, email, password)
						VALUES ('$nickname', '$email', '$password')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('Registrazione completata.')</script>";
					$nickname = "";
					$email = "";
					$_POST['password'] = "";
					$_POST['password2'] = "";
					header("Location: login.php");
				} else { echo "<script>alert('Errore, qualcosa non va.')</script>"; }
			} else { echo "<script>alert('Email già registrata.')</script>"; }
		} else { echo "<script>alert('La password non corrisponde.')</script>"; }
	}
?>
<!DOCTYPE html>
<html lang="it">
    <head><?php include 'layouts/headTags.php'; ?></head>
	<body class="all-bg purple-bg d-flex flex-column min-vh-100">
	
		<?php include("../pages/layouts/navbar.php") ?>
		
		<section class="margin-main text-center py-4">
			<div class="container text-white">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-5 shadow-lg p-3 mb-4 bg-black bg-opacity-50 rounded">
						<div class="login-wrap p-4 p-md-5">
							<h3 class="text-center mb-4 mt-3" id="title">Registra un account</h3>
							<form action="" method="POST" class="login-form">
								<div class="form-group mb-3">
									<input type="text" class="form-control rounded-left" name="nickname" placeholder="Nickname" value="<?php echo $nickname; ?>" required>
								</div>
								<div class="form-group mb-3">
									<input type="email" class="form-control rounded-left" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
								</div>
								<div class="form-group d-flex mb-3">
									<input type="password" class="form-control rounded-left" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
								</div>
								<div class="form-group d-flex mb-3">
									<input type="password" class="form-control rounded-left" name="password2" placeholder="Conferma password" value="<?php echo $_POST['password2']; ?>" required>
								</div>
								<div class="text-md-right"> <p>Hai un account? <a href="login.php" id="button">Accedi</a>.</p> </div>
								<div class="form-group d-flex justify-content-center">
									<button type="submit" class="btn btn-hover color-3 rounded-pill submit" name="submit" id="button">Registrati</button>
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