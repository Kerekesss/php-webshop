<?php

require_once "Models/Korisnik.php";


if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET["buy"]) AND isset($_GET["ime"]) AND isset($_GET["kolicina"]) AND isset($_GET["cena"]) AND isset($_GET["id_proizvoda"])) {

    $ime = $_GET['ime'];
    $kolicina = $_GET['kolicina'];
    $cena = $_GET['cena'];
    $id_proizvoda = $_GET['id_proizvoda'];
    $idKorisnika = $_SESSION['user_id'];
    $danNabavke = date('Y/m/d');
    $db = new Database();

    

    for ($i = 0; $i < count($ime); $i++) {
        $imeProizvoda = $db->conn->real_escape_string($ime[$i]);
        $kolicinaProizvoda = (int)$kolicina[$i];
        $cenaProizvoda = (float)$cena[$i];
        $idProizvoda = (int)$id_proizvoda[$i];

        
        if ($kolicinaProizvoda > 0) {
            $db->conn->query("INSERT INTO narudzbine (ime, id_proizvoda, id_korisnika, kolicina, cena, dan_nabavke) VALUES ('$imeProizvoda', '$idProizvoda', '$idKorisnika', '$kolicinaProizvoda', '$cenaProizvoda', '$danNabavke')");
        }

        
        $rezultatProizvodi = $db->conn->query("SELECT * FROM proizvodi WHERE ime='$imeProizvoda'");
        $proizvodBaza = mysqli_fetch_assoc($rezultatProizvodi);
        $proizvodiBazaKolicina = $proizvodBaza["kolicina"];

        
        $db->conn->query("DELETE FROM korpa WHERE id_korisnika = '$idKorisnika'");

        if($proizvodiBazaKolicina < 1) {
            $db->conn->query("UPDATE proizvodi SET kolicina=50");
            
        }
    }
    header('Location: OrdersPage.php');
    exit;


} else {
    die("Error");
}

?>


