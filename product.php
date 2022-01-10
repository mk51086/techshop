<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Detajet e produktit </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap" rel="stylesheet" />
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

                    <div class="prodimg-div" id="prodarea"><img src="images/gallery-1.jpg" id="ProductImg" /></div>

                    <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="images/gallery-1.jpg" class="small-img selected-prodImg" />
                        </div>
                        <div class="small-img-col">
                            <img src="images/gallery-2.jpg" class="small-img" />
                        </div>
                        <div class="small-img-col">
                            <img src="images/gallery-3.jpg" class="small-img" />
                        </div>

                    </div>
                </div>
                <div class="col-2">
                    <h2>Laptop Apple MacBook Pro 16</h2>
                    <h4>999.50 €</h4>

                    <label for="sasia" id="lblsasia">Sasia: </label><input id="input-sasia" type="number" value="1" min="1" />
                    <a href="" class="btn">BLEJ</a>
                    <h3>Përshkrimi i produktit
                    </h3>
                    <br />
                    <p>
                        Pamjet sigurohen nga një ekran 16.2 " Liquid Retina XDR me një rezolucion prej 3456 × 2234 px. Ka një gamë ekstreme dinamike dhe raport kontrasti, dhe e gjithë përmbajtja merr jetë me ngjyra të gjalla dhe me detaje të mahnitshme si në zonat e errëta ashtu
                        edhe në ato të lehta. </p>
                </div>
            </div>
        </div>

        <!-- Produkte te ngjashme -->
        <div class="small-container">
            <div class="row row-2">
                <h2>Produkte të ngjashme</h2>
                <a href="#">
                    <p>Më shumë</p>
                </a>
            </div>
            <div class="row">
                <div class="col-4">
                    <a class="product-link" href="#">
                        <img src="images/products/product-21.jpg" alt="" />
                        <h4> Samsung Galaxy A22, 6.4 ", 4GB RAM, 64GB</h4>
                    </a>
                    <p>500.00€</p>
                </div>

                <div class="col-4">
                    <a class="product-link" href="#">
                        <img src="images/products/product-23.jpg" alt="" />
                        <h4> Samsung Galaxy A22, 6.4 ", 4GB RAM, 64GB</h4>
                    </a>
                    <p>998.23€</p>
                </div>

                <div class="col-4">
                    <a class="product-link" href="#">
                        <img src="images/products/product-25.jpg" alt="" />
                        <h4>Laptop Apple MacBook Air13,256GB ssd, 8GB RAM </h4>
                    </a>
                    <p>3421.99€</p>
                </div>
                <div class="col-4">
                    <a class="product-link" href="#">
                        <img src="images/products/product-26.jpg" alt="" />
                        <h4>Laptop Apple MacBook Air15, 500GB ssd, 8GB RAM </h4>
                    </a>
                    <p>1293.50€</p>
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