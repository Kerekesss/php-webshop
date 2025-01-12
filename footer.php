<?php


require_once "Models/Database.php";
require_once "Models/Korisnik.php";

$brandoviFilter = [ 
    "Samsung" => "Products.php?text=samsung", 
    "Iphone" => "Products.php?text=iphone", 
    "Huawei" => "Products.php?text=huawei"
];

$socialMediaLinks = [ "Instagram", "Facebook", "Youtube", "Linkedin"];

$aboutLinks = [ 
    "About Us" => "About.php",
    "Careers" => "index.php",
    "Goals" => "index.php"
];


?>


    <footer>

        <div class="footerMain">
            <div class="footerContent">
            <div class="footerLogo">
                <p><a href="">Easy <br>Smarthphones</a></p>
            </div>

            <div class="footerList"> 
                <ul>
                    <h3>Our Products</h3>    
                <?php foreach($brandoviFilter as $b => $l): ?>        
                    <li><a href="<?= $l; ?>"><?= $b; ?></a></li>

                <?php endforeach; ?>
                </ul>

                <ul>
                    <h3>Social Media Links</h3>                       
                <?php foreach($socialMediaLinks as $s): ?>        

                    <li><a href=""><?= $s; ?></a></li>
                <?php endforeach; ?>

                </ul>

                <ul>
                    <h3>About</h3>                       
                <?php foreach($aboutLinks as $a=>$l): ?>        

                    <li><a href="<?= $l; ?>"><?= $a; ?></a></li>
                <?php endforeach; ?>

                </ul>
            </div>

        </div>
        <div class="footerCopyright">
            <p>Copyright 2024 by Easy Smartphones.</p>
        </div>

        </div>   

    </footer>
</body>
</html>