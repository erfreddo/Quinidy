<?php // Quinidy register page
include '../php/connection.php';
define("TITLE", "Registrati a Quinidy");
session_start();
error_reporting(0);

if (isset($_SESSION['nickname'])) {
	header("Location: mainpage.php");
}

$still = false;
$error_message = "Email già registrata";

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
			$still=false;
			if ($result) {
				//echo "<script>alert('Registrazione completata.')</script>";
				$nickname = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['password2'] = "";
				header("Location: login.php");
			} else {
				echo "<script>alert('Errore, qualcosa non va.')</script>";
			}
		} else {
			$still=true;
		}
	} else {
		echo "<script>alert('La password non corrisponde.')</script>";
	}
}


?>
<!DOCTYPE html>
<html lang="it">

<head>
	<?php include 'layouts/headTags.php'; ?>
	<script src="jquery-3.6.4.min.js"></script>
</head>

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
								<input type="text" class="form-control rounded-left" id="nickname" name="nickname" placeholder="Nickname" value="<?php echo $nickname; ?>" required>
							</div>
							<div class="form-group mb-3">
								<input type="email" class="form-control rounded-left" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
							</div>
							<div class="form-group mb-3">
								<input type="password" class="form-control rounded-left" id="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
							</div>
							<div class="form-group mb-3">
								<input type="password" class="form-control rounded-left mb-2" id="password2" name="password2" placeholder="Conferma password" value="<?php echo $_POST['password2']; ?>" required>
								<p id="not-found" style='color:red;'><?php if ($still) {echo $error_message;} else {echo "";} ?></p>
							</div>
							<div class="text-md-right">
								<p>Hai un account? <a href="login.php" id="button">Accedi</a></p>
							</div>
							<div class="form-group d-flex justify-content-center">
								<button type="submit" class="btn btn-hover color-3 rounded-pill submit" name="submit" id="register-btn">Registrati</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		let valid = [];
		for (let i = 0; i < 4; i += 1) {
			valid.push(false);
		}
		document.getElementById("register-btn").classList.add("disabled");
		// Check nickname field
		$(document).ready(function() {
			$('#nickname').on('input', function() {
				var regex = new RegExp("^[a-zA-Z0-9_-]+$");
				var input = document.getElementById("nickname").value;
				if (regex.test(input)) {
					$('#nickname').css("color", "green");
					valid[0] = true;
				} else {
					$('#nickname').css("color", "red");
					valid[0] = false;
				}
				btnActive();
			})
		});
		// Check email field
		$(document).ready(function() {
			$('#email').on('input', function() {
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				var input = document.getElementById("email").value;
				if (regex.test(input)) {
					$('#email').css("color", "green");
					valid[1] = true;
					document.getElementById("register-btn").disable = false;
				} else {
					$('#email').css("color", "red");
					valid[1] = false;
				}
				btnActive();
			})
		});
		// Check password field
		$(document).ready(function() {
			$('#password').on('input', function() {
				var regex = /^(?=.*[0-9])(?=.*[-_ ?!@#$%^&*\/\\])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9-_ ?!@#$%^&*\/\\]{8,30}$/;
				var input = document.getElementById("password").value;
				if (regex.test(input)) {
					$('#password').css("color", "green");
					valid[2] = true;
				} else {
					$('#password').css("color", "red");
					valid[2] = false;
				}
				btnActive();
			})
		});
		// Check password 2 field
		$(document).ready(function() {
			$('#password2').on('input', function() {
				var input = document.getElementById("password2").value;
				var regex = /^(?=.*[0-9])(?=.*[-_ ?!@#$%^&*\/\\])(?=.*[A-Z])(?=.*[a-z])[a-zA-Z0-9-_ ?!@#$%^&*\/\\]{8,30}$/;
				if (input == document.getElementById("password").value && regex.test(input)) {
					$('#password2').css("color", "green");
					valid[3] = true;
				} else {
					$('#password2').css("color", "red");
					valid[3] = false;
				}
				btnActive();
			})
		});

		function btnActive() {
			if (valid.every(element => element === true)) {
				document.getElementById("register-btn").classList.remove("disabled");
			} else {
				document.getElementById("register-btn").classList.add("disabled");
			}
		}
	</script>
	<?php include("../pages/layouts/footer.php") ?>
</body>

</html>