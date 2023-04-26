<?php // Quinidy landing page
	include 'php/connection.php';
	define("TITLE", "Benvenuto su Quinidy");
	session_start();
	if (isset($_SESSION['nickname'])){ header("Location: pages/mainpage.php"); }
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<title><?php echo TITLE ?></title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="src/font/font.css"/>
		<link rel="stylesheet" type="text/css" href="src/css/extra.css">
		<script src="bootstrap/js/bootstrap.js"></script>
	</head>

	<body class="w-auto h-auto all-bg purple-bg d-flex flex-column min-vh-100 text-center">

		<?php include("pages/layouts/navbar.php") ?>
		
		<!-- Title text and carousel -->
		<section id="main" class="text-center">
			<h1 class="index-title text-white margin-main text-shadow">Pronto per un quiz?</h1>
			<h3 class="text-white text-shadow">Metti alla prova le tue abilità e scopri la tua modalità preferita!</h3>
			<div id="generalCarousel" class="carousel slide mt-5 mb-5 mx-auto limited-max-width">
				<div class="carousel-inner rounded-5">
					<div class="carousel-item active text-center" data-interval="2000">
						<a role="button" href="#classicQuiz"><img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/mode2.png"></a>
					</div>
					<div class="carousel-item text-center" data-interval="2000">
						<a role="button" href="#4f1p"><img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/mode1.png"></a>
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
						<a role="button" href="#classicQuiz"> <img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/index2.png"> </a>
					</div>
					<div class="col-lg-6 order-lg-1">
						<div class="p-5">
							<h1 class="subtitle text-shadow">Classic Quiz</h1>
							<h5 class="text-shadow">L'immortale <b>quiz testuale</b> con <b>quattro opzioni</b> e una sola risposta giusta. Puoi scegliere tra <b>sette categorie</b> (Arte, Cinema, Mondo, Musica, Scienze, Storia, Sport) e personalizzare il timer e le domande.</h5>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- 4 Foto 1 Parola -->
		<section id="4f1p" class="text-center">
			<div class="container px-5 text-white margin-middle">
				<div class="row gx-5 align-items-center">
					<div class="col-lg-6 order-lg-1">
						<a role="button" href="#4f1p"> <img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/index1.png"> </a>
					</div>
					<div class="col-lg-6 order-lg-2">
						<div class="p-5">
							<h1 class="subtitle text-shadow">4 Foto 1 Parola</h1>
							<h5 class="text-shadow">È molto semplice, hai di fronte a te <b>quattro immagini</b> diverse, riesci a capire la parola che le lega?</h5>
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
						<a role="button" href="#discoveryQuiz"> <img class="img-fluid w-100 h-50 d-block mx-auto rounded-5 shadow" src="src/img/index3.png"> </a>
					</div>
					<div class="col-lg-6 order-lg-1">
						<div class="p-5">
							<h1 class="subtitle text-shadow">Discovery Quiz</h1>
							<h5 class="text-shadow">Un'<b>immagine</b> misteriosa accompagnata da una <b>frase</b> di contesto. Riuscirai a comprendere gli indizi? Cerca di interpretare ciò che vedi e utilizza pure un <b>motore di ricerca</b>, perché questa modalità vuole farti <b>imparare</b> cose nuove.</h5>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include("pages/layouts/footer.php") ?>
		
	</body>
</html>