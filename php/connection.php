<?php //Quinidy

$conn = mysqli_connect("localhost", "root", "", "quinidy");

/*if($conn->connect_errno){
    $detail = array("detail" => "Errore nella connessione del server");
    echo json_encode($detail);
    die();
}*/
if (!$conn) {
    die("<script>alert('Connessione fallita.')</script>");
}

?>