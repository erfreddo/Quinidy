<?php // Quinidy main page
	session_start();
	define("TITLE", "Gioca a Quinidy");
	if (!isset($_SESSION['nickname'])) { header("Location: ../index.php"); }
?>
<!DOCTYPE html>
<html lang="it">
	<head><?php include 'layouts/headTags.php'; ?></head>

	<body class="all-bg purple-bg d-flex flex-column min-vh-100 text-center">
	
		<?php include("../pages/layouts/navbar.php") ?>
		
		<main class="margin-main">
			<!-- Title text -->
			<section class="jumbotron text-center">
				<div class="container">
					<?php echo "<h1 class='hello text-white' style='font-weight:bold; text-shadow: 1px 1px 4px black;' >" . ucfirst(strtolower($_SESSION['nickname'])) . ", seleziona una modalità</h1>"; ?>
					<p class="lead text-white text-shadow">Mettiti alla prova con un quiz</p>
				</div>
			</section>
			<!-- Cards -->
			<div class="album py-4">
				<div class="container" style="align-items: center">
					<div class="row"> 
						<div class="col-md-4">
							<div class="card mb-4">
								<img class="card-img-top" src="../src/img/mode1.png" alt="4 Images 1 Word Image">
								<div class="card-body">
									<h5 class="card-text">Molto semplice: Hai di fronte a te <b>quattro immagini</b> diverse, riesci a capire la parola che le lega?</h5>
									<div class="d-flex justify-content-center">
										<a class="btn btn-hover color-5 rounded-pill" href="fourQuiz.php" role="button" id="button">Gioca</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card mb-4">
								<img class="card-img-top" src="../src/img/mode2.png" alt="Classic Quiz Image">
								<div class="card-body">
									<h5 class="card-text">L'immortale <b>quiz testuale</b> con <b>quattro opzioni</b>. Puoi personalizzare la categoria, il timer e altro!</h5>
									<div class="d-flex justify-content-center">
										<a class="btn btn-hover color-9 rounded-pill" href="classicQuiz.php" role="button" id="button">Gioca</a>
									</div>
									<div class="d-flex justify-content-center"></div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card mb-4">
								<img class="card-img-top" src="../src/img/mode3.png" alt="Discover Quiz Image">
								<div class="card-body">
									<h5 class="card-text">
										Un'<b>immagine</b>, una frase di contesto, una sola risposta da dare... puoi utilizzare una ricerca.
									</h5>
									<div class="d-flex justify-content-center">
										<a class="btn btn-hover color-11 rounded-pill" href="discoveryQuiz.php" role="button" id="button">Gioca</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		<?php include("../pages/layouts/footer.php") ?>

	</body>
</html>