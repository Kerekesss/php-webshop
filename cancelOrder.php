<?php

require_once "Models/Database.php";

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET["submit"]) AND isset($_GET["id"])) {
    $id= $_GET["id"];
    $db = new Database();
    $db->conn->query("DELETE FROM narudzbine WHERE id = '$id'");
    header("Location: OrdersPage.php");
}