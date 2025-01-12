<?php

require_once "Models/Korisnik.php";


if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET["add"]) AND isset($_GET["id_proizvoda"]) AND isset($_GET["ime_proizvoda"]) AND isset($_GET["kolicina"])) {
    $kolicina = $_GET["kolicina"];
    $idProizvoda = $_GET["id_proizvoda"];


    if($kolicina < 1) {
        header("Location: Product.php?id=$idProizvoda");die();
    }


    $db = new Korisnik();
    $idKorisnika = $db->getId();
    $imeProizvoda = $_GET["ime_proizvoda"];
    $rezultatProizvod = $db->conn->query("SELECT * FROM proizvodi WHERE id = '$idProizvoda'");
    $proizvod = mysqli_fetch_assoc($rezultatProizvod);
    $proizvodKolicina = $proizvod["kolicina"];
    $novaKolicina = $proizvodKolicina - $kolicina;

    if($kolicina > $proizvodKolicina) {
        header("Location: Product.php?id=$idProizvoda");die();
    }

    $cenaProizvoda = $proizvod["cena"];
    $ukupnaCena = $cenaProizvoda * $kolicina;
    
    $rezultatKorpa = $db->conn->query("SELECT * FROM korpa WHERE id_proizvoda = '$idProizvoda' AND id_korisnika = '$idKorisnika'");
    $korpa = mysqli_fetch_assoc($rezultatKorpa);
    // var_dump($korpa);die();

    if($rezultatKorpa->num_rows < 1) {
    $db->conn->query("INSERT INTO korpa (ime, id_proizvoda, id_korisnika, kolicina, cena) VALUES ('$imeProizvoda', '$idProizvoda', '$idKorisnika', '$kolicina',  '$ukupnaCena')");
    $db->conn->query("UPDATE proizvodi SET kolicina='$novaKolicina' WHERE id='$idProizvoda'");
    header("Location: ShoppingCart.php");    
    

    } else {
        $bazaKolicina = $korpa["kolicina"];
        $bazaCena = $korpa["cena"];

        $kolicina = $bazaKolicina + $kolicina;
        $cena = $bazaCena + $ukupnaCena;

        $db->conn->query("UPDATE korpa SET kolicina = '$kolicina', cena = '$cena' WHERE id_proizvoda = '$idProizvoda' AND id_korisnika = '$idKorisnika'");  
        $db->conn->query("UPDATE proizvodi SET kolicina='$novaKolicina' WHERE id='$idProizvoda'"); 
        header("Location: ShoppingCart.php");

        // var_dump($kolicina);die();
    }
} else {
    header("Location: Products.php");
}
