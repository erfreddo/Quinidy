<?php
include("contactUsModal.php");
if (TITLE == "Benvenuto su Quinidy") {
	echo '<script src="bootstrap/js/jquery-3.2.1.slim.js"></script><script src="bootstrap/js/bootstrap.js"></script>';
	echo '<link rel="stylesheet" href="./src/css/animate.css"/>';
} else {
	echo '<script src="../bootstrap/js/jquery-3.2.1.slim.js"></script><script src="../bootstrap/js/bootstrap.js"></script>';
}
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark mt-2 mb-5 ms-2 me-2 px-1 bg-black bg-opacity-50 rounded fixed-top " style="box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;">
	<?php /* Logo image */
	if (TITLE == "Benvenuto su Quinidy") {
		echo '<a class="navbar-brand ms-2" href="index.php" style="max-width: 50%;"><img src="src/img/logo.png" class="img-fluid d-inline-block align-top" style="align-middle; height:55px;" alt="Logo"></a>';
	} elseif (TITLE == "Accedi a Quinidy" or TITLE == "Registrati a Quinidy") {
		echo '<a class="navbar-brand ms-2" href="../index.php" style="max-width: 50%;"><img src="../src/img/logo.png" class="img-fluid d-inline-block align-top" style="align-middle; height:55px;" alt="logo"></a>';
	} else {
		echo '<a class="navbar-brand ms-2" href="mainpage.php" style="max-width: 50%;"><img src="../src/img/logo.png" class="img-fluid d-inline-block align-top" style="align-middle; height:55px;" alt="logo"></a>';
	}
	?>
	<!-- Navbar collapse (+) button -->
	<button class="navbar-toggler ms-2 mb-2 me-2 rounded-pill" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Navbar buttons -->
	<div class="collapse navbar-collapse w-250" id="navbarSupportedContent">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<div>
					<?php
					if (TITLE == "Benvenuto su Quinidy") {
						echo '<a role="button" class="btn btn-nav nav-link ms-4" href="#main">Home</a>';
						echo '<a role="button" class="btn btn-nav nav-link ms-4" data-toggle="modal" data-target="#contactUsModal">Contatto</a>';
						echo '<a role="button" class="btn btn-nav nav-link ms-4" href="#classicQuiz">Cos’è</a>';
					} elseif (TITLE == "Accedi a Quinidy" or TITLE == "Registrati a Quinidy") {
						echo '<a role="button" class="btn btn-nav nav-link ms-4" href="../index.php">Home</a>';
						echo '<a role="button" class="btn btn-nav nav-link ms-4" data-toggle="modal" data-target="#contactUsModal">Contatto</a>';
						echo '<a role="button" class="btn btn-nav nav-link ms-4" href="../index.php#classicQuiz">Cos’è</a>';
					} elseif (TITLE == "Il tuo Quinidy") {
						echo '<a role="button" class="btn btn-nav nav-link ms-4" href="mainpage.php">Home</a>';
						echo '<a role="button" class="btn btn-nav nav-link ms-4" data-toggle="modal" data-target="#contactUsModal">Contatto</a>';
					} elseif (TITLE == "Gioca a Quinidy") {
						echo '<a role="button" class="btn btn-nav nav-link ms-4" href="mainpage.php">Home</a>';
						echo '<a role="button" class="btn btn-nav nav-link ms-4" data-toggle="modal" data-target="#contactUsModal">Contatto</a>';
					} else {
						echo '<a role="button" class="btn btn-nav nav-link ms-4" href="mainpage.php">Home</a>';
						echo '<a role="button" class="btn btn-nav nav-link ms-4" data-toggle="modal" data-target="#contactUsModal">Contatto</a>';
						echo '<a class="btn btn-nav nav-link ms-4" role="button" id="back-button" style="display: none;" href=""><i class="bi bi-arrow-return-left"></i> Indietro</a>';
					}
					?>
				</div>
			</li>
		</ul>
		<!-- Login/user button and search bar -->
		<ul class="navbar-nav ms-auto d-flex" style="align-items: center;">
			<li class="nav-item active">
				<?php
				if (TITLE == "Benvenuto su Quinidy") {
					echo '<a class="btn btn-login rounded-pill px-3 ms-2 me-2 animate__animated animate__bounce animate__delay-5s animate__repeat-3" href="pages/login.php" role="button" id="button"><i class="bi bi-key-fill"></i> Accedi</a>';
				} elseif (TITLE == "Gioca a Quinidy") {
					echo '<a class="btn btn-profile rounded-pill px-3 ms-2 me-2" href="user.php" role="button" id="button"><i class="bi bi-person-fill"></i> Profilo</a>';
				}
				?>
			</li>
			<li class="nav-item active">
				<?php
				if (TITLE=="Benvenuto su Quinidy"){ $link = "'pages/userPublic.php?nickname='+document.getElementById('searchbar').value;"; }
				else { $link = "'userPublic.php?nickname='+document.getElementById('searchbar').value.toUpperCase();"; }
				?>
				<form class='d-flex' onSubmit='return submitForm()' method='GET'>
					<input class="form-control rounded-pill me-2 mt-2 mb-2 ms-2" type="search" placeholder="Cerca utenti" aria-label="Cerca" id="searchbar">
					<button class="btn btn-success rounded-pill my-2 me-3 px-3" type="submit" id="button" role="button" ><i class="bi bi-search"></i></button>
				</form>
				<?php
				echo "
				<script>
				function submitForm() {
					location.href=".$link."
					return false;
				}
				</script>"
				?>
			</li>
		</ul>
	</div>
</nav>