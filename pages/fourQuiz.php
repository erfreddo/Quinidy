<?php // Quinidy 4 Foto 1 Parola Quiz
	include '../php/connection.php';
	session_start();
	define("TITLE","Gioca a Quinidy: 4 Foto 1 Parola");
	if (!isset($_SESSION['nickname'])){header("Location: ../index.php");}
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<?php include 'layouts/headTags.php'; ?>
		<link rel="stylesheet" type="text/css" href="../src/css/quizStyle.css">
		<script src="jquery-3.6.4.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<style>.quiz-screen img { width:500px; height:auto; }</style>
	</head>
	<body class="all-bg green-bg d-flex flex-column min-vh-100 text-center" onload="showReset()">
		<?php include("../pages/layouts/navbar.php") ?>
		<div class="four-title d-flex justify-content-center">
			<h3 class="text-white" style="margin-top:110px;">4 Foto 1 Parola</h3>
		</div>
		<!-- Start Screen -->
		<div class="layer start-screen">
			<h2>Seleziona un livello</h2><br><p id="selected-level" hidden></p>
			<div class="level-box"></div>
			<button type="button" class="btn btn-hover color-3 rounded-pill submit pe-4 ps-4 mt-5 disabled" onclick="startQuiz()" id="start-four">Inizia</button>
			<form action="../php/saveLevel.php" method="post" target="content" id="reset-start" class="hiding">
				<button type="submit" class="btn btn-hover color-8 rounded-pill px-2" onclick="resetQuiz();" id="reset" name="submit">Resetta</button>
			</form>
		</div>
		<!-- Quiz Screen -->
		<?php
			$sql = "SELECT four_levels FROM utenti WHERE nickname = '".$_SESSION['nickname']."'";
			$result = $conn->query($sql);
			if($result){
				while($row = $result->fetch_assoc()) {
					if ($result->num_rows > 0) { echo "<p id='fl' hidden>".$row['four_levels']."</p>"; } 
					else {echo "<p id='fl' hidden>0</p>";}
				}
			}
		?>
		<!-- Quiz Screen -->
		<div class="quiz-screen hide">
			<!--Image-->
			<div class="question-box">
				<img class="question-img"></img>
				<!--Your answer-->
				<p class="your-word" id="your-word"></p>
			</div>
			<!--Input field-->
			<form id="info" class="info d-flex justify-content-center" autocomplete="off" autofocus>
				<input id="input-word" type="text" size="20" minlength="1" class="input-bar">
				<a id="apply" type="button" class="apply"><i class="bi bi-vector-pen"></i></a>
			</form>
			<!--Submit button-->
			<iframe name="content" hidden></iframe>
			<form action="../php/saveLevel.php" method="post" target="content" id="next-form">
				<input type="" name="four_levels" id="four_levels" hidden>
				<div class="next-button">
					<button type="submit" class="btn btn-next submit hiding" onclick="nextQuestion();" id="next" name="submit"><i class="bi bi-caret-right-fill"></i></button>
				</div>
			</form>
		</div>
		<!-- End Screen -->
		<div class="layer end-screen hide">
			<h1>Congratulazioni, hai concluso questo quiz!</h1>
			<h5>Se vuoi ricominciare, puoi resettare i livelli</h5>
			<iframe name="content" hidden></iframe>
			<form action="../php/saveLevel.php" method="post" target="content">
				<button type="submit" class="btn btn-hover color-8 rounded-pill px-2" onclick="resetQuiz();" id="reset" name="submit">Resetta</button>
			</form>
		</div>
		<script src="../src/js/questions.js"></script>
		<script src="../src/js/fourQuizScript.js"></script>
		<script>
			$('input').on('keypress', function (event) {
				var regex = new RegExp("^[a-zA-Z0-9]+$");
				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
				if (!regex.test(key)) {
				   event.preventDefault();
				   return false;
				}
			});

			var input = document.getElementById("input-word");
			input.addEventListener("keypress", function(event) {
			  if (event.key === "Enter") {
				event.preventDefault();
				document.getElementById("apply").click();
			  }
			});
		</script>
		<?php include("../pages/layouts/footer.php") ?>
	</body>
</html>