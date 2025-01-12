<?php

require_once "Database.php";

class Korisnik extends Database {
 
    public function register($ime, $email, $password) {
        $sifra = password_hash($password, PASSWORD_BCRYPT);
        $ime = $this->conn->real_escape_string($ime);
        $email = $this->conn->real_escape_string($email);
        $sifra = $this->conn->real_escape_string($sifra);
        // var_dump($email, $sifra);die();

        if($this->emailCheck($email)) {
            echo "<div class='error'>User with that email already exists!<br>
            Try different one.</div>";
        } else {
            $this->conn->query("INSERT INTO korisnici (ime, email, sifra) VALUES ('$ime', '$email', '$sifra')");

            $rezultat = $this->conn->query("SELECT * FROM korisnici WHERE email = '$email'");
            $user = mysqli_fetch_assoc($rezultat);
            $idKorisnika = $user["id"];
            
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["ime"] = $ime;
            $_SESSION["user_id"] = $idKorisnika;

            

            header("Location: index.php");

        }

    }

    public function emailCheck($email) {
        $rezultat = $this->conn->query("SELECT * FROM korisnici WHERE email = '$email'");

        if($rezultat->num_rows >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login($email, $password) {
        $email = $this->conn->real_escape_string($email);
        $sifra = $this->conn->real_escape_string($password);
        $rezultat = $this->conn->query("SELECT * FROM korisnici WHERE email = '$email'");
        // var_dump($proveraSifre);die();
        
        if($rezultat->num_rows >= 1) {
            $korisnik = mysqli_fetch_assoc($rezultat);
            $proveraSifre = password_verify($sifra, $korisnik["sifra"]);

            if($proveraSifre) {
                $rezultat = $this->conn->query("SELECT * FROM korisnici WHERE email = '$email'");

            $user = mysqli_fetch_assoc($rezultat);
            // var_dump($user["ime"]);die();
            $imeKorisnika = $user["ime"];
            $idKorisnika = $user["id"];

            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["ime"] = $imeKorisnika;
            $_SESSION["user_id"] = $idKorisnika;

            if(isset($_POST["id_proizvoda"]) AND $_POST["id_proizvoda"] != null) {
                $idProizvoda = $_POST["id_proizvoda"];
                header("Location: Product.php?id=$idProizvoda");die();
            }

            
            header("Location: index.php");die();
                
            } else {
                echo "<div class='error'>Email or password not correct!<br>
                Try Again.</div>";
            }
            
        } else {
            echo "<div class='error'>Email or password not correct!<br>
            Try Again.</div>";
            
        }
        
        
    }

    public function getId() {
        $ime = $_SESSION["ime"];
        $rezultat = $this->conn->query("SELECT id FROM korisnici WHERE ime = '$ime'");
        $korisnik = mysqli_fetch_assoc($rezultat);
        $idKorisnika = $korisnik["id"];
        return $idKorisnika;
    }
}