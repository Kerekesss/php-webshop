<?php


require_once "Models/Database.php";


require_once "header.php";






$brandoviFilter = [
    "1" => "Samsung", 
    "2" => "Iphone", 
    "3" => "Huawei"
];

$ceneFilter = [
    "1" => ["0", "599.99"], 
    "2" => ["600", "999.99"],
    "3" => ["1000", "1499.99"],
    "4" => ["1500", "1999.99"]
];

$pageLinks = [ 
    "1" => "0",
    "2" => "9",
    "3" => "18",
    "4" => "27",
    "5" => "36",
    "6" => "45",
    "7" => "54",
    "8" => "63",
    "9" => "72",
    "10" => "81"
];



$db = new Database();
$result = $db->conn->query("SELECT * FROM proizvodi");
$num_rows = $result->num_rows;

$result = $db->conn->query("SELECT * FROM proizvodi LIMIT $num_rows");


if(isset($_GET["page"])) {
    $page = $_GET["page"];
    $page = $pageLinks[$page];
    $result = $db->conn->query("SELECT * FROM proizvodi  LIMIT $page,9");
}

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);


// var_dump($result);die();

?>

<div class="products">
    <div class="productsMain">
        
        <div class="productList">
            <div>
                

                    <div class="productFilter">
                        <div class="filterToggleMenu">
                            <div class="toggleFilter">
                                <i class="fa-solid fa-bars ">
                                    </i>
                                <p><b>Filter Products</b></p>
                            </div>
                            <div class="closeFilter">
                                <i class="fa-solid fa-x"></i>
                                <p><b>Close Filter</b></p>
                            </div>
                        </div>
                        <form action="Products.php" method="GET" class="filterHidden">
                        <h3>By Brand</h3>
                                    
                        <?php foreach($brandoviFilter as $id=>$brand): ?>
                            <div class="productBrand">
                                <label for=<?= $id; ?>><?= $brand; ?></label>
                                <input  
                                name="brandFilter" 
                                type="radio" 
                                id=<?= $id; ?> 
                                value=<?= $brand;

                                if(isset($_GET["brandFilter"]) AND $_GET['brandFilter'] == $brand) { 
                                    print ' checked="checked"'; 
                                } 
                                ?>>
                            </div>
                        <?php endforeach; ?>
                        <h3>By Price</h3>
                        <?php foreach($ceneFilter as $id=>$cena): ?>
                            <div class="productBrand">
                                <label for=<?= $id; ?>><?= $cena[0]; ?>-<?= $cena[1]; ?></label>
                                <input  
                                name="cenaFilter" 
                                type="radio" 
                                id=<?= $id; ?> 
                                value=<?= $cena[0].":".$cena[1];
                                if(isset($_GET["cenaFilter"]) AND 
                                $_GET['cenaFilter'] == $cena[0].":".$cena[1]) { 
                                    print ' checked="checked"'; 
                                } 
                                ?>
                                >
                                <br>
                            </div>
                        <?php endforeach; ?>

                        <button>Apply Filters</button>
                        </form>
                    </div>
                    <?php if(isset($_GET["brandFilter"]) OR isset($_GET["cenaFilter"])): ?>
                        <div class="clearFilters">

                          <a href="Products.php">
                            <i class="fa-solid fa-x"></i>
                                
                            Reset Filters</a>
                        </div>
                    <?php endif; ?>
                
                
            </div>


            <?php 
            if(isset($_GET["text"])){
                $productKeyword = $_GET["text"];
                $result = $db->conn->query("SELECT * FROM proizvodi WHERE ime LIKE '%$productKeyword%' OR opis LIKE '%$productKeyword%'");

                if(isset($_GET["page"])) {
                    $page = $_GET["page"];
                    $page = $pageLinks[$page];
                    $result = $db->conn->query("SELECT * FROM proizvodi WHERE ime LIKE '%$productKeyword%' OR opis LIKE '%$productKeyword%' LIMIT $page,9");
                
                }
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }

            if(isset($_GET["brandFilter"]) AND !isset($_GET["cenaFilter"])) {
                $brandFilter = $_GET["brandFilter"];
                $result = $db->conn->query("SELECT * FROM proizvodi WHERE ime LIKE '%$brandFilter%'");

                if(isset($_GET["page"])) {
                    $page = $_GET["page"];
                    $page = $pageLinks[$page];
                    $result = $db->conn->query("SELECT * FROM proizvodi WHERE ime LIKE '%$brandFilter%' LIMIT $page,9");
                
                }
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }

            if(isset($_GET["cenaFilter"]) AND !isset($_GET["brandFilter"])) {
                $cenaFilter = $_GET["cenaFilter"];
                $cenaFilter = explode(":", $_GET["cenaFilter"]);
                $result = $db->conn->query("SELECT * FROM proizvodi WHERE cena BETWEEN '$cenaFilter[0]' AND '$cenaFilter[1]'");

                if(isset($_GET["page"])) {
                    $page = $_GET["page"];
                    $page = $pageLinks[$page];
                    $result = $db->conn->query("SELECT * FROM proizvodi WHERE cena BETWEEN '$cenaFilter[0]' AND '$cenaFilter[1]' LIMIT $page,9");
                
                }

                $cenaFilter = $_GET["cenaFilter"];

                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }

            if(isset($_GET["cenaFilter"]) AND isset($_GET["brandFilter"])) {
                $cenaFilter = explode(":", $_GET["cenaFilter"]);
                $brandFilter = $_GET["brandFilter"];
                $result = $db->conn->query("SELECT * FROM proizvodi WHERE cena BETWEEN '$cenaFilter[0]' AND '$cenaFilter[1]' AND ime LIKE '%$brandFilter%'");

                if(isset($_GET["page"])) {
                    $page = $_GET["page"];
                    $page = $pageLinks[$page];
                    $result = $db->conn->query("SELECT * FROM proizvodi WHERE cena BETWEEN '$cenaFilter[0]' AND '$cenaFilter[1]' AND ime LIKE '%$brandFilter%' LIMIT $page,9");
                }
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }



            ?>
            <div class="productItems">
                
                <?php 
                $i = 0;
                foreach($products as $p): 
                    $idProizvoda = $p["id"];
                    $slika = explode(", ", $p["slika"]);
                    ?>
                    <div class="productItem">
                        <a href="Product.php?id=<?= $idProizvoda; ?>">
                            <img src="Assets/Images/<?= $slika[0]; ?>" alt="picture.jpg">
                            <div class="productItemInfo">
                                <h3><?= $p["ime"]; ?></h3>
                                <p name="cena"><span><?= $p["cena"]; ?> €</span></p>
                            </div>
                        </a>
                    </div>

                    <?php
                    $i++;

                    if($i == 9) {
                    break;
                }
                    endforeach; 


                

            
                if($result->num_rows < 1): ?>
                    <div class="noProductToShow">
                        <p>There is no product to show</p>
                    </div>
                <?php endif; ?>
                    
                    
            </div>

        </div>
            
            
            <?php

// ----------------------------  Products pages LINKS LOGIC ------------------------------------------>
            $num_rows = $result->num_rows;
            
            if($num_rows < 1): ?>
                    

            <?php else:
            
            if(isset($_GET["text"]) AND !isset($_GET["page"])):
                $text = $_GET["text"];
            ?>
                <div class="productPageSelect">
                    <?php
                        foreach($pageLinks as $p => $l):
                            if($num_rows <= $l):
                                break;
                            endif;
                    ?>
                        <a href="Products.php?text=<?= $text; ?>&page=<?= $p; ?>"><?= $p; ?></a>
                    <?php endforeach; ?>
                </div>


            <?php elseif(isset($_GET["brandFilter"]) AND !isset($_GET["cenaFilter"]) AND !isset($_GET["page"])):
                $brandFitler = $_GET["brandFilter"];
            ?>
                <div class="productPageSelect">
                    <?php
                        foreach($pageLinks as $p => $l):
                            if($num_rows <= $l):
                                break;
                            endif;
                    ?>
                        <a href="Products.php?brandFilter=<?= $brandFilter; ?>&page=<?= $p; ?>"><?= $p; ?></a>
                    <?php endforeach; ?>
                </div>

            <?php elseif(isset($_GET["cenaFilter"]) AND !isset($_GET["brandFilter"]) AND !isset($_GET["page"])):

            $cenaFilter = $_GET["cenaFilter"];
            ?>
                <div class="productPageSelect">
                    <?php
                        foreach($pageLinks as $p => $l):
                            if($num_rows <= $l):
                                break;
                            endif;
                    ?>
                        <a href="Products.php?cenaFilter=<?= $cenaFilter; ?>&page=<?= $p; ?>"><?= $p; ?></a>
                    <?php endforeach; ?>
                </div>


            <?php elseif(isset($_GET["cenaFilter"]) AND isset($_GET["brandFilter"]) AND !isset($_GET["page"])): 
                $brandFilter = $_GET["brandFilter"];
                // var_dump($result->num_rows);

                $cenaFilter = $_GET["cenaFilter"];
            ?>
                <div class="productPageSelect">
                    <?php
                        foreach($pageLinks as $p => $l):
                            if($num_rows <= $l):
                                break;
                            endif;
                        
                    ?>
                        
                        <a href="Products.php?brandFilter=<?= $brandFilter; ?>&cenaFilter=<?= $cenaFilter; ?>&page=<?= $p; ?>"><?= $p; ?></a>

                    <?php 
                     endforeach; ?>
                </div>


            

            <?php elseif(isset($_GET["page"])): 
                
                ?>
                <div class="productPageSelect">
                    <?php
                    $result = $db->conn->query("SELECT * FROM proizvodi");
                    
                    if(isset($_GET["cenaFilter"]) AND !isset($_GET["brandFilter"])) {
                        $cenaFilter = explode(":", $_GET["cenaFilter"]);
                        $result = $db->conn->query("SELECT * FROM proizvodi WHERE cena BETWEEN '$cenaFilter[0]' AND '$cenaFilter[1]'");
                    }
                    
                    if(isset($_GET["brandFilter"]) AND !isset($_GET["cenaFilter"])) {
                        $brandFilter = $_GET["brandFilter"];
                        $result = $db->conn->query("SELECT * FROM proizvodi WHERE ime LIKE '%$brandFilter%'");
                    }
                    
                    if(isset($_GET["cenaFilter"]) AND isset($_GET["brandFilter"])) {
                        $cenaFilter = explode(":", $_GET["cenaFilter"]);
                        $brandFilter = $_GET["brandFilter"];
                        $result = $db->conn->query("SELECT * FROM proizvodi WHERE cena BETWEEN '$cenaFilter[0]' AND '$cenaFilter[1]' AND ime LIKE '%$brandFilter%'");
                    }

                    if(isset($_GET["text"])){
                        $productKeyword = $_GET["text"];
                        $result = $db->conn->query("SELECT * FROM proizvodi WHERE ime LIKE '%$productKeyword%' OR opis LIKE '%$productKeyword%'");
                    }
                    
                    $num_rows = $result->num_rows;

                        foreach($pageLinks as $p => $l):
                            if($num_rows <= $l):
                                break;
                            endif;
                            ?>

                            


                    <?php 
                    if(isset($_GET["brandFilter"]) AND !isset($_GET["cenaFilter"])):
                                $brandFilter = $_GET["brandFilter"];
                    ?>
                        <a href="Products.php?brandFilter=<?= $brandFilter; ?>&page=<?= $p; ?>">
                        <?= $p; ?></a>



                        <?php
                         elseif(isset($_GET["cenaFilter"]) AND !isset($_GET["brandFilter"])):
                            $cenaFilter = $_GET["cenaFilter"];
                    ?>
                        <a href="Products.php?cenaFilter=<?= $cenaFilter; ?>&page=<?= $p; ?>">
                        <?= $p; ?></a>

                        <?php
                        elseif(isset($_GET["cenaFilter"]) AND isset($_GET["brandFilter"])):
                            $cenaFilter = $_GET["brandFilter"];
                            $cenaFilter = $_GET["cenaFilter"];
                    ?>
                        <a href="Products.php?brandFilter=<?= $brandFilter; ?>&cenaFilter=<?= $cenaFilter; ?>&page=<?= $p; ?>">
                        <?= $p; ?></a>



                    <?php elseif(isset($_GET["text"])):
                        $productKeyword = $_GET["text"];
                        $result = $db->conn->query("SELECT * FROM proizvodi WHERE ime LIKE '%$productKeyword%' OR opis LIKE '%$productKeyword%'");
                    ?>
                    <a href="Products.php?text=<?= $productKeyword; ?>&page=<?= $p; ?>">
                    <?= $p; ?></a>

                    <?php else: ?>
                            <a href="Products.php?page=<?= $p; ?>">
                        <?= $p; ?></a>
                        <?php
                        endif;
                    ?>




                    <?php 
                     endforeach; 
                    
                     ?>
                </div>

            <?php else: ?>


                <div class="productPageSelect">
                    <?php
                        foreach($pageLinks as $p => $l):
                            if($num_rows <= $l):
                                break;
                            endif;
                    ?>
                        
                        <a href="Products.php?page=<?= $p; ?>"

                        <?php
                        
                        ?>
                         ><?= $p; ?></a>
                    <?php 
                    
                     endforeach; 
                     

                     ?>
                     
            

            <?php endif; 
            endif;
            if(isset($_GET["brandFilter"]) OR isset($_GET["cenaFilter"]) OR isset($_GET["text"])): ?>

            <a class="showAll" href="Products.php">Show all products</a>

            <?php endif; 
            ?>

<!-- ------------------------------------- END OF PAGE LINK LOGIC -------------------------- -->

    </div>
</div>
</div>

<?php

require_once "footer.php";

