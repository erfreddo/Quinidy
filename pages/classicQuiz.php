<?php // Quinidy Classic Quiz
	include '../php/connection.php';
	session_start();
	define("TITLE","Gioca a Quinidy: Classic Quiz");
	if (!isset($_SESSION['nickname'])){header("Location: ../index.php");}

	if (isset($_POST['submit'])) {
		
		include '../php/pointsManager.php';
		
		header("Location: mainpage.php");
	}
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<?php include 'layouts/headTags.php'; ?>
		<link rel="stylesheet" type="text/css" href="../src/css/quizStyle.css">
	</head>
	<body class="all-bg blue-bg d-flex flex-column min-vh-100 text-center">
	
		<?php include("../pages/layouts/navbar.php") ?>
		
		<h3 class="text-white margin-main" style="text-align:center;">Classic Quiz <i id="categoryLogo" class="bi bi-book-half" style="color:white;"></i></h3>
		
		<!-- Start Screen -->
		<div class="layer start-screen">
			<h1>Regole</h1><br>
			<h5>Una risposta <span style="color:green;">corretta</span> = +2 <i class="star-green bi bi-star-fill"></i></h5>
			<h5>Una risposta <span style="color:red;">errata</span> = -1<i class="star-red bi bi-star-fill"></i></h5><hr>
			<table class="">
				<tr>
					<td><i class="bi bi-book-half"></i> Categoria</td>
					<td>
						<select class="form-select form-select-lg" aria-label=".form-select-lg example" id="category">
							<option value="questionsArt">Arte</option>
							<option value="questionsCinema">Cinema</option>
							<option value="questionsWorld">Mondo</option>
							<option value="questionsMusic">Musica</option>
							<option value="questionsScience">Scienze</option>
							<option value="questionsHistory">Storia</option>
							<option value="questionsSport">Sport</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><i class="bi bi-question-diamond-fill"></i> Domande</td>
					<td>
						<select class="form-select form-select-lg" aria-label=".form-select-lg example" id="q">
							<option value="3">3</option>
							<option value="15">15</option>
							<option value="20">20</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><i class="bi bi-clock-fill"></i> Timer</td>
					<td>
						<select class="form-select form-select-lg" aria-label=".form-select-lg example" id="seconds">
							<option value="10">10</option>
							<option value="15">15</option>
						</select>
					</td>
				</tr>
			</table>
			<button type="button" class="btn-hover color-3 rounded-pill submit pe-4 ps-4 mt-5" onclick="startQuiz()">Inizia</button>
		</div>
		
		<!-- Quiz Screen -->
		<div class="quiz-screen hide">
			<div class="counter-bar"></div>
			<div class="row mt-3"></div>
			<div class="timer">--</div>
			<div class="row mt-3"></div>
			<div class="question"></div>
			<div class="row mt-4"></div>
			<div class="options"></div>
			<div class="row mt-3"></div>
			<div class="next-button">
				<button type="button" class="btn btn-next submit" onclick="nextQuestion()" id="next"><i class="bi bi-caret-right-fill"></i></button>
			</div>
		</div>
		
		<!-- End Screen -->
		<div class="layer end-screen hide">
			<h1>Risultati</h1>
			<form method="POST">
				<table>
					<tr>
						<td class="al">Punteggio</td>
						<td class="ar"><i class="star bi bi-star-fill"></i><span class="score"></span></td>
					</tr>
					<tr>
						<td class="al">Risposte</td>
						<td class="ar"><span class="answered-num"></span>/<span class="questions-num"></span></td>
					</tr>
					<tr>
						<td class="al"><i class="bi bi-check-circle-fill text-success"> </i><span class="correct-num"></span></td>
						<td class="ar"><i class="bi bi-x-circle-fill text-danger"></i> <span class="wrong-num"></span></td>
					</tr>
				</table>
				<input type="hidden" name="answered" id="a"><input type="hidden" name="correct" id="c">
				<input type="hidden" name="art_points" id="ap"><input type="hidden" name="world_points" id="wp"><input type="hidden" name="cinema_points" id="cp"><input type="hidden" name="history_points" id="hp">
				<input type="hidden" name="science_points" id="sp"><input type="hidden" name="sport_points" id="spp"><input type="hidden" name="music_points" id="mp">
				<button type="submit" class="btn btn-hover color-8 rounded-pill px-2" onclick="quit()" name="submit">Salva ed esci</button>
			</form>
		</div>
		
		<script src="../src/js/questions.js"></script>
		<script src="../src/js/classicQuizScript.js"></script>
		
		<?php include("../pages/layouts/footer.php") ?>
		
	</body>
</html>