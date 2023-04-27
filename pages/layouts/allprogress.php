<!-- All progress bars displayed in user page -->
<div class="progress-stacked">
	<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
		style="width: <?php if($art_points <= 0) {echo 0;} else {echo ($art_points*100)/$total_points;} ?>%; background-color:red;"><i class="bi bi-palette-fill"></i>
	</div>
	<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
		style="width: <?php if($cinema_points <= 0) {echo 0;} else {echo ($cinema_points*100)/$total_points;} ?>%; background-color:violet;"><i class="bi bi-film"></i>
	</div>
	<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
		style="width: <?php if($world_points <= 0) {echo 0;} else {echo ($world_points*100)/$total_points;} ?>%; background-color:blue;"><i class="bi bi-globe-europe-africa"></i>
	</div>
	<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
		style="width: <?php if($music_points <= 0) {echo 0;} else {echo ($music_points*100)/$total_points;} ?>%; background-color:orange;"><i class="bi bi-music-note-beamed"></i>
	</div>			
	<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
		style="width: <?php if($science_points <= 0) {echo 0;} else {echo ($science_points*100)/$total_points;} ?>%; background-color:green;"><i class="bi bi-gear-fill"></i>
	</div>
	<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
		style="width: <?php if($history_points <= 0) {echo 0;} else {echo ($history_points*100)/$total_points;} ?>%; background-color:purple;"><i class="bi bi-hourglass-split"></i>
	</div>
	<div class="progress-bar overflow-visible progress-bar-striped progress-bar-animated" role="progressbar"
		style="width: <?php if($sport_points <= 0) {echo 0;} else {echo ($sport_points*100)/$total_points;} ?>%; background-color:brown;"><i class="bi bi-bicycle"></i>
	</div>										
</div>
