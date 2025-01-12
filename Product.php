<?php

require_once "Models/Database.php";
require_once "header.php";



$idProizvoda = $_GET["id"];
$db = new Database();

$result = $db->conn->query("SELECT * FROM proizvodi WHERE id = '$idProizvoda'");
$product = mysqli_fetch_assoc($result);
$slike = explode(", ", $product["slika"]);




?>

<div class="productSingle">
    <div class="productMain">
        <div class="productImages">
            <?php foreach($slike as $slika): ?>
            <div>
                <img src="Assets/Images/<?= $slika ?>" alt="picture">
            </div>
            <?php endforeach; ?>
        </div>
        <div class="productInfo">
            <div class="slider">
                <div class="slides">

                    <img class="slide" src="Assets/Images/<?= $slike[0]; ?>" alt="picture.jpg">
                    <img class="slide" src="Assets/Images/<?= $slike[1]; ?>" alt="picture.jpg">
                    <img class="slide" src="Assets/Images/<?= $slike[2]; ?>" alt="picture.jpg">
                    <img class="slide" src="Assets/Images/<?= $slike[3]; ?>" alt="picture.jpg">
                    <img class="slide" src="Assets/Images/<?= $slike[4]; ?>" alt="picture.jpg">
                    
                </div>
                <button class="prev" onclick="prevSlide()">&#10094</button>
                <button class="next" onclick="nextSlide()">&#10095</button>
            </div>
            <h2><?= $product["ime"]; ?></h2>
            <p><?= $product["opis"]; ?></p>
        </div>
        <div class="addToCartSection">
            <h4 name="cena" value=<?= $product["cena"]; ?>>Price : <?= $product["cena"]; ?> €</h4>
            <p>Available : <?= $product["kolicina"]; ?> items</p>
            <?php if(isset($_SESSION["ime"])): ?>
            <form class="productForm" action="addToCart.php" method="GET">
                <input type="hidden" value="<?= $product["ime"];  ?>" name="ime_proizvoda">
                <input type="hidden" value=<?= $idProizvoda; ?> name="id_proizvoda">
                <div>
                <label for="quantity"><b>Quantity :</b></label>
                <input id="quantity" type="number" name="kolicina" value="1" min="1" max="<?= $product["kolicina"]; ?>" required>
                </div>
                <button name="add">Add to Cart</button>
            </form>
                <?php else: ?>
            <form action="Login.php" method="POST">
                <input name="id_proizvoda" type="hidden" value="<?= $idProizvoda; ?>">
                <button class="loginToSee" name="loginToSee"  href="Login.php">Login to add to cart.</button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>


<?php

require_once "footer.php";
