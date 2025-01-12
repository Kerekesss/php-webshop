<?php

require_once "Models/Database.php";

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET["delete"]) AND isset($_GET["id"]) AND isset($_GET["id_proizvoda"])) {
    $id= $_GET["id"];
    $idProizvoda= $_GET["id_proizvoda"];
    $db = new Database();

    $rezultatKorpa = $db->conn->query("SELECT * FROM korpa WHERE id ='$id'");
    $korpa = mysqli_fetch_assoc($rezultatKorpa);

    $rezultatProizvod = $db->conn->query("SELECT * FROM proizvodi WHERE id = '$idProizvoda'");
    $proizvod = mysqli_fetch_assoc($rezultatProizvod);
    $kolicinaProizvod = $proizvod["kolicina"];
    $kolicinaKorpa = $korpa["kolicina"];
    $novaKolicina = $kolicinaProizvod + $kolicinaKorpa;
    
    // var_dump($novaKolicina);die();
    $db->conn->query("UPDATE proizvodi SET kolicina= '$novaKolicina' WHERE id= '$idProizvoda'");
    $db->conn->query("DELETE FROM korpa WHERE id = '$id'");
    header("Location: ShoppingCart.php");
}