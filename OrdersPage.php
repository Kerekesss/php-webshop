<?php


require_once "Models/Database.php";
require_once "header.php";


if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$idKorisnika = $_SESSION["user_id"];

$db = new Database();

$rezultat = $db->conn->query("SELECT * FROM narudzbine WHERE 
id_korisnika = '$idKorisnika'");

$narudzbine = mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
?>


<div class="ordersPage">
    <div class="ordersPageMain">
        <h1>Your Orders</h1>
        <div class="ordersPageItems">

            
            <?php foreach($narudzbine as $n): 
            
                $imeProizvoda = $n['ime'];
                $rezultatProizvod = $db->conn->query("SELECT * FROM proizvodi WHERE ime = '$imeProizvoda'");
                $proizvod = mysqli_fetch_assoc($rezultatProizvod);#
                $slike = explode(", ", $proizvod["slika"]);
                $orderDate = $n["dan_nabavke"];
                $orderDate = strtotime($orderDate);
                $orderDate = date('d-m-Y', $orderDate);
                
                $arrivalDate = strtotime($orderDate);
                $arrivalDate = strtotime("+3 day", $arrivalDate);
                $arrivalDate = date('d-m-Y', $arrivalDate);
                ?>


                <div class="ordersPageProductSingle">
                    <div class="ordersPageLink">
                        <div class="ordersPageProductImg">
                            <a href=""><img src="Assets/Images/<?= $slike[0];?>" alt="productPicture.jpg"></a>
                        </div>

                        <div class="ordersPageProductInfo">
                            <div>
                                <h3><a href=""><?= $n["ime"]; ?></a></h3>
                                
                            </div>
                            <div class="dates">
                                <p><b><?= $n["kolicina"]; ?></b> item/s</p>
                                <p><b><?= $n["cena"]; ?> €</b></p>
                                <p>Order date : <?= $orderDate; ?></p>
                                <p>Est. Arrival : <?= $arrivalDate; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="cancelOrderForm">
                        <form action="cancelOrder.php" method="GET">
                            <input type="hidden" name="id" value=<?= $n["id"] ?>>
                            <button name="submit">Cancel order</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</div>

<?php
require_once "footer.php";?>
