<?php //Quinidy user page

	session_start();
	include '../php/connection.php';
	define("TITLE","Il tuo Quinidy");
	$nickname = $_GET['nickname'];
	$GLOBALS['set']=false;
	
	// If user is logged and he searches himself redirect to personal user page
	if (isset($_SESSION['nickname']) and $_SESSION['nickname']==$_GET['nickname']){ header("Location: user.php"); }
	
	// Save points from database
	$sql = "SELECT art_points,cinema_points,world_points,music_points,science_points,history_points,sport_points,four_levels,discovery_levels
	FROM utenti WHERE nickname = '$nickname'";
	$result = $conn->query($sql);
	
	if($result){
		while($row = $result->fetch_assoc()) {
			if ($result->num_rows > 0) {
				$set=true;
				$GLOBALS['art_points'] = $row['art_points'];
				$GLOBALS['cinema_points'] = $row['cinema_points'];
				$GLOBALS['world_points'] = $row['world_points'];
				$GLOBALS['music_points'] = $row['music_points'];
				$GLOBALS['science_points'] = $row['science_points'];
				$GLOBALS['history_points'] = $row['history_points'];
				$GLOBALS['sport_points'] = $row['sport_points'];
				$GLOBALS['four_levels'] = $row['four_levels'];
				$GLOBALS['discovery_levels'] = $row['discovery_levels'];
				$list = array();
				array_push($list,$art_points, $cinema_points, $world_points, $music_points, $science_points, $history_points, $sport_points);
				$total_points = 0;
				for ($i=0; $i<7; $i++){ if ($list[$i]>0){ $total_points = $total_points + $list[$i]; }}
				if($total_points==0){$total_points=1;}
			}
			else {$set=false;}
		}
	}
	$propic = "https://i.imgur.com/V4RclNb.png";
	// Load profile picture from database
	$sql = "SELECT propic FROM utenti WHERE nickname = '$nickname'";
	$result = $conn->query($sql);
	if($result){
		// Save the link
		while($row = $result->fetch_assoc()) {
			if ($result->num_rows > 0) { 
				$GLOBALS['propic'] = $row['propic']; 
			}
		}
		// If the link is not an image set the default profile picture
		if (substr($propic, -4)!==".png" and substr($propic, -4)!==".jpg" and substr($propic, -5)!==".jpeg") {
			$propic = "https://i.imgur.com/V4RclNb.png";
		}
	}
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<?php include 'layouts/headTags.php'; ?>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../src/js/questions.js"></script>
		<style>.hide{display:none;}</style>
	</head>
	<body class="all-bg teal-bg d-flex flex-column min-vh-100">
	
		<?php include("../pages/layouts/navbar.php") ?>
		
		<section class=<?php if ($set) {echo '"py-1 margin-main"';} else {echo '"hide"';} ?> >
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<!-- Riquadro foto prolio a sx -->
						<div class="card mb-4 bg-black bg-opacity-50 rounded text-white">
						  <div class="card-body text-center">

							<div style="position: relative;">
								<img src=<?php echo $propic ?> class="rounded-circle img-fluid shadow-sm" style="width: 150px; height:150px;" alt="Propic" >
							</div>
							<h5 class="h2 mt-4" id="title"><?php echo ucfirst(strtolower($nickname)) ?></h5>
						</div>
					</div>
					<div class="card mb-4 bg-black bg-opacity-50 rounded text-white">
						<div class="card-body p-0 me-3 ms-3">
							<li class="list-group-item">
								<p class="mb-3 mt-3" id="title" style="font-size:18px;">Classic Quiz</p>
								<?php include("../pages/layouts/allprogress.php") ?>
							</li>
							<hr>
							<p class="mb-0" id="title" style="font-size:18px;">Livelli risolti</p>
							<li class="list-group-item d-flex justify-content-between align-items-center mb-3 mt-3">
								<p class="mb-0">4 Foto 1 Parola</p>
								<p class="mb-0" id="n4"></p>
								<script>document.getElementById("n4").innerHTML='<?php echo $four_levels;?>/'+questionsFour.length</script>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center mb-3 mt-3">
								<p class="mb-0">Discovery Quiz</p>
								<p class="mb-0" id="nD"></p>
								<script>document.getElementById("nD").innerHTML='<?php echo $discovery_levels;?>/'+questionsDiscovery.length</script>
							</li>
						</div>
					</div>
				</div>
				<!-- Parte dx -->
				<div class="col-lg-8">
					<!-- Riquadro stats a dx sopra -->
					<div class="card mb-4 bg-black bg-opacity-50 rounded text-white">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-5">
									<p class="mb-0" style="font-size:20px;">Domande a cui ha risposto</p>
								</div>
								<div class="col-sm-7 text-end">
								<?php
									$sql = "SELECT answered FROM utenti WHERE nickname = '".$nickname."'";
									$result = $conn->query($sql);
									if($result){
										while($row = $result->fetch_assoc()) {
											if ($result->num_rows > 0) { echo "<p class='mb-0' style='font-size:20px;'>".$row['answered']."</p>"; } 
											else {echo "<p class='mb-0' style='font-size:20px;'>0</p>";}
										}
									}
								?>	
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-5">
									<p class="mb-0" style="font-size:20px;">Risposte corrette</p>
								</div>
								<div class="col-sm-7 text-end">
									<?php
											$sql = "SELECT correct FROM utenti WHERE nickname = '".$nickname."'";
											$result = $conn->query($sql);
											while($row = $result->fetch_assoc()) {
												if ($result->num_rows > 0) {
													echo "<p class='mb-0' style='font-size:20px;'>".$row['correct']."</p>";
												} 
												else {echo "<p class='mb-0' style='font-size:20px;'>0</p>";}
											}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- Riquadro grafico a dx sotto -->
							<div class="card mb-4 mb-md-0 bg-black bg-opacity-50 rounded text-white">
								<div class="card-body">
									<p class="mb-2" id="title" style="font-size:25px;"><i class="star bi bi-star-fill"></i> Stelle raccolte</p>
									<!-- Bars -->
									<p class="mb-1" style="font-size: 18px;"><i class="bi bi-palette-fill"></i> Arte</p>
									<div class="progress rounded">
										<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
											style="width: <?php if($art_points <= 0) {echo 1;} else {echo ($art_points*100)/$total_points;} ?>%; background-color:red;">
											<?php echo $art_points; ?> ★
										</div>
									</div>
									<p class="mt-4 mb-1" style="font-size: 18px;"><i class="bi bi-film"></i> Cinema</p>
									<div class="progress rounded">
										<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
											style="width: <?php if($cinema_points <= 0) {echo 1;} else {echo ($cinema_points*100)/$total_points;} ?>%; background-color:violet;">
											<?php echo $cinema_points; ?> ★
										</div>
									</div>
									<p class="mt-4 mb-1" style="font-size: 18px;"><i class="bi bi-globe-europe-africa"></i> Mondo</p>
									<div class="progress rounded">
										<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
											style="width: <?php if($world_points <= 0) {echo 1;} else {echo ($world_points*100)/$total_points;} ?>%; background-color:blue;">
											<?php echo $world_points; ?> ★
										</div>
									</div>
									<p class="mt-4 mb-1" style="font-size: 18px;"><i class="bi bi-music-note-beamed"></i> Musica</p>
									<div class="progress rounded">
										<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
											style="width: <?php if($music_points <= 0) {echo 1;} else {echo ($music_points*100)/$total_points;} ?>%; background-color:orange;">
											<?php echo $music_points; ?> ★
										</div>
									</div>
									<p class="mt-4 mb-1" style="font-size: 18px;"><i class="bi bi-gear-fill"></i> Scienze</p>
									<div class="progress rounded">
										<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
											style="width: <?php if($science_points <= 0) {echo 1;} else {echo ($science_points*100)/$total_points;} ?>%; background-color:green;">
											<?php echo $science_points; ?> ★
										</div>
									</div>
									<p class="mt-4 mb-1" style="font-size: 18px;"><i class="bi bi-hourglass-split"></i> Storia</p>
									<div class="progress rounded">
										<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
											style="width: <?php if($history_points <= 0) {echo 1;} else {echo ($history_points*100)/$total_points;} ?>%; background-color:purple;">
											<?php echo $history_points; ?> ★
										</div>
									</div>
									<p class="mt-4 mb-1" style="font-size: 18px;"><i class="bi bi-bicycle"></i> Sport</p>
									<div class="progress rounded mb-2">
										<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
											style="width: <?php if($sport_points <= 0) {echo 1;} else {echo ($sport_points*100)/$total_points;} ?>%; background-color:brown;">
											<?php echo $sport_points; ?> ★
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Section displayed when user not found -->
		<section class=<?php if (!$set) {echo '"py-1 margin-main text-center"';} else {echo '"hide"';} ?> >
			<?php if(TITLE=="Benvenuto su Quinidy") { echo "<img class='img-fluid' style='width: 100%; height:auto;' src='src/img/notfound.png'>"; } else { echo "<img src='../src/img/notfound.png'>"; } ?>
			<div class="d-flex justify-content-center">
				<h1 class="text-white text-center">L'utente <span style="color:yellow;"><?php echo ucfirst(strtolower($nickname))?></span> non esiste...</h1>
			</div>
		</section>
		
		<?php include("../pages/layouts/footer.php") ?>
		
	</body>
</html>