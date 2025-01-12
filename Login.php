<?php

require_once "Models/Database.php";
require_once "Models/Korisnik.php";
require_once "header.php";

?>




<div class="sign_up">
    
    <div class="sign_up_main">
        <h1>Login</h1>

    <?php

        if(isset($_POST["submit"])) {
            if(!isset($_POST["email"]) OR empty($_POST["email"])) {
                die("Email is not present!");
            }
            
            if(!isset($_POST["sifra"]) OR empty($_POST["sifra"])) {
                die("Password is not present!");
            }

            $email = $_POST["email"];
            $sifra = $_POST["sifra"];
            
            $korisnik = new Korisnik();
            
            $korisnik->login($email, $sifra);
        
            
        }
        
    ?>
        <form action="Login.php" method="POST">

            <input id="email" name="email" type="email" placeholder="Email" required>

            
            <input id="sifra" name="sifra" type="password" placeholder="Password" required>
            <?php if(isset($_POST["loginToSee"]) AND isset($_POST["id_proizvoda"])):
                $idProizvoda = $_POST["id_proizvoda"];
                ?>
            <input type="hidden" name="id_proizvoda" value="<?= $idProizvoda; ?>">
            <?php endif; ?>

            <button name="submit">Login</button>
        </form>
        <a href="SignUp.php">Don't have an account?</a>
    </div>
</div>

    
<?php

require_once "footer.php";?>