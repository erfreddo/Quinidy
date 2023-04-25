<?php
include 'php/connection.php';
define("TITLE", "Benvenuto su Quinidy");
session_start();
if (isset($_SESSION['nickname'])) {
	header("Location: pages/mainpage.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title><?php echo TITLE ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="src/font/font.css" />
	<link rel="stylesheet" href="src/css/extra.css">
	<script src="bootstrap/js/bootstrap.js"></script>
</head>

<body class="w-auto h-auto all-bg purple-bg d-flex flex-column min-vh-100 text-center">

	<?php include("pages/layouts/navbar.php") ?>

	<section id="main" class="text-center">
		<h1 class="text-white margin-main fw-bold text-shadow fs-big">Metti alla prova le tue abilità<br>e scopri la tua modalità preferita!</h1>
		<div id="generalCarousel" class="carousel slide mt-5 mb-5 mx-auto limited-max-width">
			<!-- <div class="carousel-indicators img-fluid">
				<a role="button" data-bs-target="#generalCarousel" href="#generalCarousel" data-slide-to="0" class="active"></a>
				<a role="button" data-bs-target="#generalCarousel" href="#generalCarousel" data-slide-to="1"></a>
				<a role="button" data-bs-target="#generalCarousel" href="#generalCarousel" data-slide-to="2"></a>
			</div> -->
			<div class="carousel-inner rounded-5">
				<div class="carousel-item active text-center" data-interval="2000">
					<a role="button" href="#classicQuiz"><img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/mode2.png"></a>
				</div>
				<div class="carousel-item text-center" data-interval="2000">
					<a role="button" href="#4i1p"><img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/mode1.png"></a>
				</div>
				<div class="carousel-item text-center" data-interval="2000">
					<a role="button" href="#discoveryQuiz"><img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/mode3.png"></a>
				</div>
			</div>
			<a role="button" class="carousel-control-prev" data-target="#generalCarousel" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a role="button" class="carousel-control-next" data-target="#generalCarousel" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
		<div class="d-flex justify-content-center">
			<a role="button" href="#classicQuiz" class="btn btn-hover color-12 rounded-pill shadow margin-bottom">Scopri di più</a>
		</div>
	</section>

	<!-- Classic Quiz -->
	<section id="classicQuiz" class="text-center">
		<div class="container px-5 text-white margin-main">
			<div class="row gx-5 align-items-center">
				<div class="col-lg-6 order-lg-2">
					<a role="button" href="#classicQuiz"> <img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/mode2.png"> </a>
				</div>
				<div class="col-lg-6 order-lg-1">
					<div class="p-5">
						<h1 class="subtitle text-shadow">Classic Quiz</h1>
						<h5 class="text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</h5>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 4 Immagini 1 Parola -->
	<section id="4i1p" class="text-center">
		<div class="container px-5 text-white margin-middle">
			<div class="row gx-5 align-items-center">
				<div class="col-lg-6 order-lg-1">
					<a role="button" href="#4i1p"> <img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/mode1.png"> </a>
				</div>
				<div class="col-lg-6 order-lg-2">
					<div class="p-5">
						<h1 class="subtitle text-shadow">4 Immagini 1 Parola</h1>
						<h5 class="text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</h5>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Discovery Quiz -->
	<section id="discoveryQuiz" class="text-center">
		<div class="container px-5 text-white margin-bottom">
			<div class="row gx-5 align-items-center">
				<div class="col-lg-6 order-lg-2">
					<a role="button" href="#discoveryQuiz"> <img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/mode3.png"> </a>
				</div>
				<div class="col-lg-6 order-lg-1">
					<div class="p-5">
						<h1 class="subtitle text-shadow">Discovery Quiz</h1>
						<h5 class="text-shadow">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</h5>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php include("pages/layouts/footer.php") ?>
</body>

</html>