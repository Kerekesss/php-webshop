<?php

require_once "Models/Database.php";

var_dump($_GET["kolicina"], $_GET["id_narudzbine"]);

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET["update"]) AND isset($_GET["id_narudzbine"]) and isset($_GET["kolicina"])) {
    $db = new Database();
    $idNarudzbine= $_GET["id_narudzbine"];
    $kolicina = $_GET["kolicina"];
    $rezultat = $db->conn->query("SELECT * FROM korpa WHERE id = '$idNarudzbine'");
    $narudzbina = $rezultat->fetch_assoc();

    $imeProizvoda = $narudzbina["ime"];
    $rezultatProizvod = $db->conn->query("SELECT * FROM proizvodi WHERE ime = '$imeProizvoda'");
    $proizvod = mysqli_fetch_assoc($rezultatProizvod);

    $staraKolicinaKorpa = $narudzbina["kolicina"];
    $kolicinaProizvod = $proizvod["kolicina"];
    $novaKolicinaProizvod = $kolicinaProizvod + $staraKolicinaKorpa - $kolicina;
    
    $cenaProizvoda = $proizvod["cena"];
    $novaCena = $kolicina * $cenaProizvoda;

    
    if($kolicina < 1) {

        $db->conn->query("DELETE FROM korpa WHERE id = '$idNarudzbine'");
        $db->conn->query("UPDATE proizvodi SET kolicina='$novaKolicinaProizvod' WHERE ime= '$imeProizvoda'");
        header("Location: ShoppingCart.php");

    }
    
    $db->conn->query("UPDATE korpa SET kolicina='$kolicina',cena='$novaCena' WHERE id = '$idNarudzbine'");
    $db->conn->query("UPDATE proizvodi SET kolicina='$novaKolicinaProizvod' WHERE ime= '$imeProizvoda'");

    header("Location: ShoppingCart.php");die();
}