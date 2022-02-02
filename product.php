<?php
session_start();
include 'dbconnection.php';
$pdo = pdo_connect_mysql();
// Kontrollo nese parametri id gjendet ne URL
if (isset($_GET['id'])) {
    // Perdorim prepare per te mbrojtur faqen nga SQL Injection
    $stmt = $pdo->prepare('SELECT * FROM Products WHERE ProductID = ?');
    $stmt2 = $pdo->prepare('SELECT * FROM Products WHERE ProductID != ? ORDER BY RAND() LIMIT 4');
    $stmt->execute([$_GET['id']]);
    $stmt2->execute([$_GET['id']]);
    // Merr produktet nga databaza dhe ruaj rezultatin ne Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $recommended = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    // Kontrollo nese produkti ekziston
    if (!$product) {
        // Shfaq mesazhin nese produkti nuk ekziston
        exit('Produkti nuk ekziston!');
    }
} else {
    // Shfaq mesazhin nese id e produktit nuk eshte vendosur ne URL
    exit('Produkti nuk ekziston!');
}
$pdo = null;
?>
<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Detajet e produktit </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet" />
</head>

<body>
    <?php 
    include("header.php");
    ?>
    <div class="main">
        <!-- Detajet e Produktit -->
        <div class="small-container product-details">
            <div class="row">
                <div class="col-2">

                    <div class="prodimg-div" id="prodarea"><img src="images/products/<?=$product['ProductID']?>-1.jpg"
                            id="ProductImg" alt="<?=$product['Name']?>" /></div>

                    <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="images/products/<?=$product['ProductID']?>-1.jpg"
                                class="small-img selected-prodImg" alt="<?=$product['Name']?>" />
                        </div>
                        <div class="small-img-col">
                            <img src="images/products/<?=$product['ProductID']?>-2.jpg" class="small-img"
                                alt="<?=$product['Name']?>">
                        </div>
                        <div class="small-img-col">
                            <img src="images/products/<?=$product['ProductID']?>-3.jpg" class="small-img"
                                alt="<?=$product['Name']?>">
                        </div>

                    </div>
                </div>
                <div class="col-2">
                    <h2><?=$product['Name']?></h2>
                    <h4><?=$product['Price']?>€</h4>

                    <label for="sasia" id="lblsasia">Sasia: </label><input id="input-sasia" type="number" value="1"
                        min="1" max="<?=$product['quantity']?>" />
                    <a href="" class="btn">BLEJ</a>
                    <h3>Përshkrimi i produktit
                    </h3>
                    <br />
                    <p>
                        <?=$product['Description']?> </p>
                </div>
            </div>
        </div>

        <!-- Produkte te ngjashme -->
        <div class="small-container">
            <div class="row row-2">
                <h2>Produkte të ngjashme</h2>
                <a href="products.php">
                    <p>Më shumë</p>
                </a>
            </div>
            <div class="row">
                <?php foreach ($recommended as $r): ?>

                <div class="col-4">
                    <a href="product.php?id=<?=$r['ProductID']?>" class="product-link">
                        <img src="images/products/<?=$r['ProductID']?>-1.jpg" alt="<?=$r['Name']?>" />
                        <h4><?=$r['Name']?></h4>
                    </a>
                    <p><?=$r['Price']?>€</p>
                </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
    </div>
    <!-- Brendet -->
    <div class="brands">
        <div class="brands-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo-samsung.png" alt="Logo e Samsung" />
                </div>
                <div class="col-5">
                    <img src="images/logo-apple.png" alt="" />
                </div>
                <div class="col-5">
                    <img src="images/logo-lenovo.png" alt="" />
                </div>
                <div class="col-5">
                    <img src="images/logo-msi.png" alt="" />
                </div>
                <div class="col-5">
                    <img src="images/logo-hp.png" alt="" />
                </div>
            </div>
        </div>
    </div>

    <?php
   include("footer.php");
   ?>

    <script src="js/menu.js"></script>
    <script src="js/product.js"></script>
</body>



</html>