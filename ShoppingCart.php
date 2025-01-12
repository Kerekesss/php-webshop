<?php

require_once "Models/Database.php";
require_once "header.php";

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<div class="shoppingCart">
    <div class="shoppingCartMain">
        <h1>Shopping Cart</h1>
        <div class="shoppingCartItems">


            <?php if(!isset($_SESSION["ime"])): ?>
                <div class="shoppingCartEmpty">
                    <a href="Login.php">Login to see your items</a>
                </div>
            <?php else:

            
            $db = new Database();
            $ime = $_SESSION["ime"];
            $idKorisnika = $_SESSION["user_id"];
            
            $rezultatKorpa = $db->conn->query("SELECT * FROM korpa WHERE id_korisnika = '$idKorisnika'");
            $korpaKorisnika = mysqli_fetch_all($rezultatKorpa, MYSQLI_ASSOC);
            // var_dump($korpaKorisnika);die();

            if($rezultatKorpa->num_rows < 1): ?>
                <div class="shoppingCartEmpty">
                    <p>Your Cart is empty</p>
                    <a href="Products.php">Go check out Products</a>
                </div>
            <?php else: ?>

            <div class="shoppingCartProducts">
                <?php
                foreach($korpaKorisnika as $item): 
                    $imeProizvoda = $item['ime'];
                    $rezultatProizvod = $db->conn->query("SELECT * FROM proizvodi WHERE ime = '$imeProizvoda'");
                    $proizvod = mysqli_fetch_assoc($rezultatProizvod);#
                    $slike = explode(", ", $proizvod["slika"]);
                
                ?>
                    <div class="shoppingCartProductSingle">
                        <div class="shoppingCartProductImg">
                            <img src="Assets/Images/<?= $slike[0];?>" alt="productPicture.jpg">
                        </div>
                        <div class="shoppingCartProductInfo">
                            <div>
                                <h3><a href="Product.php?id=<?= $item["id_proizvoda"];?>"><?= $item["ime"]; ?></a></h3>
                                <form class="updateQuantityForm" action="updateQuantityCart.php" method="GET">
                                        <input name="id_narudzbine" type="hidden" value="<?= $item["id"]; ?>">
                                        <label for="quantitySelect">Quantity</label>
                                        <select id="quantitySelect" name="kolicina" >
                                        <?php 
                                        $proizvodIKorpaKolicina = $proizvod["kolicina"] + $item["kolicina"];
                                        
                                        for ($i = 0; $i <= $proizvodIKorpaKolicina; $i++): ?>
                                            <option value="<?= $i; ?>" <?= $i == $item["kolicina"] ? 'selected' : ''; ?>>
                                                <?= $i; ?>
                                            </option>
                                            <?php endfor; ?>
                                        </select>   
                                        <button class="updateButton" id="updateButton" name="update">Update</button>
                                </form>
                                    
                            </div>
                            <div>
                                <p><b><?= $item["cena"]; ?> €</b></p>
                                    
                                <form action="deleteFromCart.php" method="GET">
                                    <input type="hidden" name="id" value=<?= $item["id"] ?>>
                                    <input type="hidden" name="id_proizvoda" value=<?= $item["id_proizvoda"] ?>>
                                    <button name="delete">Remove</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <?php endforeach; ?>
            </div>

            <div class="shoppingCartBuy">
            <form action="buyFromCart.php" method="GET">
                <?php 
                foreach($korpaKorisnika as $item): 

                    ?>


                <input type="hidden" name="ime[]" value="<?= $item['ime']; ?>">


                <input type="hidden" name="kolicina[]" value=<?= $item["kolicina"]; ?>>
                <input type="hidden" name="cena[]" value=<?= $item["cena"]; ?>>
                <input type="hidden" name="id_proizvoda[]" value=<?= $item["id"]; ?>>
                <?php
                $ceneKorpa = $db->conn->query("SELECT SUM(cena) AS total_price FROM korpa WHERE id_korisnika = '$idKorisnika'");
                $ukupnaCena = $ceneKorpa->fetch_assoc();
                
                $kolicineKorpa = $db->conn->query("SELECT SUM(kolicina) AS total_quantity FROM korpa WHERE id_korisnika = '$idKorisnika'");
                $ukupnaKolicina = $kolicineKorpa->fetch_assoc();
                
                ?>
                <?php endforeach;  ?>
                <p>Total (<?= $ukupnaKolicina["total_quantity"];?> items): <?= $ukupnaCena["total_price"]; ?> €</p>
                <button name="buy">Order now</button>

            </form>
            <?php
            endif;
            
            endif;
            ?>
            </div>
        </div>
   </div>
</div>

    
<?php
    require_once "footer.php"; ?>
