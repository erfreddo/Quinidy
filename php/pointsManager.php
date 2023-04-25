<?php		
$nickname = $_SESSION['nickname'];
$a = intval($_POST['answered']);
$c = intval($_POST['correct']);
$ap = intval($_POST['art_points']);
$wp = intval($_POST['world_points']);
$mp = intval($_POST['music_points']);
$hp = intval($_POST['history_points']);
$sp = intval($_POST['science_points']);
$spp = intval($_POST['sport_points']);
$cp = intval($_POST['cinema_points']);

$querya = "UPDATE utenti SET answered = answered+$a WHERE nickname = '$nickname'";
$resulta = mysqli_query($conn, $querya);
$queryc = "UPDATE utenti SET correct = correct+$c WHERE nickname = '$nickname'";
$resultc = mysqli_query($conn, $queryc);

$query1 = "UPDATE utenti SET art_points = art_points+$ap WHERE nickname = '$nickname'";
$result1 = mysqli_query($conn, $query1);

$query2 = "UPDATE utenti SET world_points = world_points+$wp WHERE nickname = '$nickname'";
$result2 = mysqli_query($conn, $query2);

$query3 = "UPDATE utenti SET music_points = music_points+$mp WHERE nickname = '$nickname'";
$result3 = mysqli_query($conn, $query3);

$query4 = "UPDATE utenti SET history_points = history_points+$hp WHERE nickname = '$nickname'";
$result4 = mysqli_query($conn, $query4);

$query5 = "UPDATE utenti SET science_points = science_points+$sp WHERE nickname = '$nickname'";
$result5 = mysqli_query($conn, $query5);

$query6 = "UPDATE utenti SET sport_points = sport_points+$spp WHERE nickname = '$nickname'";
$result6 = mysqli_query($conn, $query6);

$query7 = "UPDATE utenti SET cinema_points = cinema_points+$cp WHERE nickname = '$nickname'";
$result7 = mysqli_query($conn, $query7);
?>