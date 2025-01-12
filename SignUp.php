<?php

require_once "Models/Database.php";
require_once "Models/Korisnik.php";
require_once "header.php";

if(isset($_SESSION["ime"])) {
    header("Location: index.php");die();
}


?>

<div class="sign_up">
    
    <div class="sign_up_main">
        <h1>Sign Up</h1>
        
    <?php

        if(isset($_POST["submit"])) {
            if(!isset($_POST["email"]) OR empty($_POST["email"])) {
                die("Email is not present!");
            }
            
            if(!isset($_POST["sifra"]) OR empty($_POST["sifra"])) {
                die("Password is not present!");
            }

            if(!isset($_POST["ime"]) OR empty($_POST["ime"])) {
                die("Name is not present!");
            }

            $email = $_POST["email"];
            $sifra = $_POST["sifra"];
            $ime = $_POST["ime"];
            $korisnik = new Korisnik();
            $korisnik->register($ime, $email, $sifra);

    

        }
    ?>

        <form action="SignUp.php" method="POST">
            <input name="ime" type="text" placeholder="Name" required>
            <input name="email" type="email" placeholder="Email" required>
            <input name="sifra" type="password" placeholder="Password" required>
            <button name="submit">Sign Up</button>
        </form>
        <a href="Login.php">Already have an account?</a>
    </div>
</div>
    
<?php

require_once "footer.php";?>