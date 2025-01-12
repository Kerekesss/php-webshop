<?php

require_once "Models/Database.php";
require_once "Models/Korisnik.php";

$db = new Database();

?>

<div class="homeHeader">
    <?php
    require_once  "header.php";
    ?>
</div>
<main >
        <div class="homeLink">
            <div class="mainH1">
                <h1>Best Place to look for smartphone</h1>
                <h1 id="typeAn"> Easy Smartphones</h1>
            </div>
            <a href="Products.php">
                <i class="fa-solid fa-up-long up-hidden"></i>
                Check out the Latest Models 
                <i class="fa-solid fa-up-long up-hidden"></i></a>
        </div>
</main>


<?php
require_once  "footer.php";