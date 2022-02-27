<?php

include_once 'init.php';
if(!isset($_GET['id'])){
    header("Location: 404.php");
}
$pd=new Product();
$product = $pd->getProduct($_GET['id']);
if(empty($product)){
    header("Location: 404.php");
}
$recommended = $pd->getRecommended($_GET['id']);
$u = new User();
$user = $u->getUser($product->userID);



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

                    <div class="prodimg-div" id="prodarea"><img src="uploads/product_images/<?= $product->image ?>"
                            id="ProductImg" alt="<?=$product->name?>" /></div>

                    <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="uploads/product_images/<?= $product->image ?>"
                                class="small-img selected-prodImg" alt="<?=$product->name?>-1" />
                        </div>
                        <div class="small-img-col">
                            <img src="images/products/<?=$product->id?>-2.jpg" class="small-img"
                                alt="<?=$product->name?>-2">
                        </div>
                        <div class="small-img-col">
                            <img src="images/products/<?=$product->id?>-3.jpg" class="small-img"
                                alt="<?=$product->name?>-3">
                        </div>

                    </div>
                </div>
                <div class="col-2">
                    <h5>Autor: <?=$user->emri?></h5>
                    <h4><?=$product->price?>€</h4>

                    <label for="sasia" id="lblsasia">Sasia: </label><input id="input-sasia" type="number" value="1"
                        min="1" max="<?=$product->quantity?>" />
                    <a href="" class="btn">BLEJ</a>
                    <h3>Përshkrimi i produktit
                    </h3>
                    <br />
                    <p>
                        <?=$product->desc?> </p>
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
                    <a href="product.php?id=<?=$r->id?>" class="product-link">
                        <img src="uploads/product_images/<?= $r->image ?>" alt="<?=$r->name?>" />
                        <h4><?=$r->name?></h4>
                    </a>
                    <p><?=$r->price?>€</p>
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