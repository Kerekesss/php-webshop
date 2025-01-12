<?php

require_once "Models/Database.php";
require_once "Models/Korisnik.php";

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$db = new Database();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Smartphones</title>
    <link rel="stylesheet" type="text/css" href="Style.php" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <script src="JS/main.js"></script>
</head>
<body>

<nav>
    <div class="navMain">
        <ul>
            <li class="navLogo">
                <a href="index.php">
                    <h1>Easy Smartphones</h1>
                </a>
            </li>
        </ul>
        <ul>  
            <li><a href="Products.php"><b>Products</b></a></li>
            <li><a href="About.php"><b>About</b></a></li>
        </ul>
        <div class="navDropdown">
            <ul>
                <?php if(!isset($_SESSION["ime"])): ?>
                        <li><a href="Login.php"><b>Login</b></a></li>
                    <?php elseif(isset($_SESSION["ime"])): ?>
                        <li>Hello, <?= $_SESSION["ime"] ?><br> <b>Orders & more</b></li>
                    <?php endif; ?>
            </ul>
            <?php if(isset($_SESSION["ime"])): ?>
            <ul class="navHidden ">
                <li ><a href="OrdersPage.php">Your Orders</a></li>
                <li ><a href="deleteSession.php">Logout</a></li>
            </ul>
            <?php endif; ?>
        </div>
        <?php if(isset($_SESSION["ime"])): ?>
        <div class="navDark"></div>
        <?php endif; ?>
          
            <ul >
                <li class="navCart"><a href="ShoppingCart.php">
                <img src="Assets/Images/shoppingcart.png" width="50px" height="50px">
                <?php if(isset($_SESSION["user_id"])): ?>
                    
                    <?php 
                        $idKorisnika = $_SESSION["user_id"];
                        $kolicineKorpa = $db->conn->query("SELECT SUM(kolicina) AS total_quantity FROM korpa WHERE id_korisnika = '$idKorisnika'");
                        $ukupnaKolicina = $kolicineKorpa->fetch_assoc();
                        if($ukupnaKolicina["total_quantity"] !== NULL):
                    ?>
                        <span class="span1">
                        <?php echo $ukupnaKolicina["total_quantity"];?>
                        </span>

                        
                <?php 
                    endif;
                    endif;?>
                        
                </a></li>
                <li class="navInput">
                <form action="Products.php" method="GET" class="productSearch">
                <input type="text" name="text" placeholder="Search"
                value="<?php if (isset($_GET['text'])) echo $_GET['text']; ?>"
                >
                <div class="navDark"></div>
                </form>
                </li>
            </ul>
    </div>



    <div class="navMobile">
        <ul class="navLogoMobile">
            <li class="navLogo">
                <a href="index.php">
                    <h1>Easy Smartphones</h1>
                </a>
            </li>
        </ul>
        <ul class="mobileMenuToggle">
          <i class="fa-solid fa-bars toggleMenu"></i>
          <i class="fa-solid fa-x closeMenu"></i>
        </ul>
        <div class="mobileMenu">
        

            <ul>
            <li class="navInput">
                <form action="Products.php" method="GET" class="productSearch">
                <input type="text" name="text" placeholder="Search"
                value="<?php if (isset($_GET['text'])) echo $_GET['text']; ?>"
                >
                </form>
            </li>
            </ul>
            <ul >
                        <?php if(!isset($_SESSION["ime"])): ?>
                        <?php elseif(isset($_SESSION["ime"])): ?>
                        <li>Hello, <?= $_SESSION["ime"] ?></li>
                        <li ><a href="OrdersPage.php"><b>Your Orders</b></a></li>
                        <?php endif;?>
            </ul>
                
            <ul>  
            
            <li><a href="Products.php"><b>Products</b></a></li>
            <li><a href="About.php"><b>About</b></a></li>
            </ul>
            
            <ul>
                <li class="navCart"><a href="ShoppingCart.php">
                <img src="Assets/Images/shoppingcart.png" width="50px" height="50px">
                <?php if(isset($_SESSION["user_id"])): ?>
                    
                    <?php 
                        $idKorisnika = $_SESSION["user_id"];
                        $kolicineKorpa = $db->conn->query("SELECT SUM(kolicina) AS total_quantity FROM korpa WHERE id_korisnika = '$idKorisnika'");
                        $ukupnaKolicina = $kolicineKorpa->fetch_assoc();
                        if($ukupnaKolicina["total_quantity"] !== NULL):
                    ?>
                        <span class="span1">
                        <?php echo $ukupnaKolicina["total_quantity"];?>
                        </span>

                        
                <?php 
                    endif;
                    endif;?>
                        
                </a></li>
                

                
            </ul>
            <ul>
                <?php if(!isset($_SESSION["ime"])): ?>
                <li><a href="Login.php"><b>Login</b></a></li>
                <?php elseif(isset($_SESSION["ime"])): ?>

                <li ><a href="deleteSession.php"><b>Logout</b></a></li>
                <?php endif; ?>
             </ul>
            </div>
    </div>
</nav>