<?php 
session_start();
include 'dbconnection.php';
$pdo = pdo_connect_mysql();
$stmt = $pdo->prepare('SELECT * FROM Products ORDER BY data DESC LIMIT 8');
$stmt->execute();
$recent_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Faqja Kryesore </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
        rel="stylesheet" />
</head>

<body>
    <?php 
    include("header.php");
    ?>
    <div class="main">
        <div class="slide-container">
            <div class="slide fade">
                <a href="product.php" class="product-link"><img src="images/1.jpg" alt=""></a>
            </div>
            <div class="slide fade">
                <img src="images/2.jpg" alt="">
            </div>
            <div class="slide fade">
                <img src="images/3.jpg" alt="">
            </div>
            <div class="slide fade">
                <img src="images/4.jpg" alt="">
            </div>
            <a href="#" class="prev"><i class="las la-angle-left la-2x" aria-hidden="true"></i></a>
            <a href="#" class="next"><i class="las la-angle-right la-2x" aria-hidden="true"></i></a>
        </div>
        <div class="small-container">


            <div class="row">
                <?php foreach ($recent_products as $product): ?>

                <div class="col-4">
                    <a href="product.php?id=<?=$product['ProductID']?>" class="product-link">
                        <img src="images/products/<?=$product['ProductID']?>-1.jpg" alt="<?=$product['Name']?>" />
                        <h4><?=$product['Name']?></h4>
                    </a>
                    <p><?=$product['Price']?>€</p>
                </div>
                <?php endforeach ?>

            </div>
        </div>

        <div id="btndiv">
            <a href="products.php"> <button class="btn">Te gjitha Produktet </button></a>
        </div>

        <div class="testimonial">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <p>
                            Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Pellentesque eget posuere diam, at semper mauris. In.
                        </p>
                        <div class="rating">
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                        </div>
                        <img src="images/p1.jpg" alt="" />
                        <h3>Blerta Sejdiu </h3>
                    </div>

                    <div class="col-3">
                        <p>
                            Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Pellentesque eget posuere diam, at semper mauris. In.
                        </p>
                        <div class="rating">
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star-half-alt"></i>
                        </div>
                        <img src="images/p2.jpg" alt="" />
                        <h3>Agon Selmani </h3>
                    </div>

                    <div class="col-3">
                        <p>
                            Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Pellentesque eget posuere diam, at semper mauris. In.
                        </p>
                        <div class="rating">
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star"></i>
                            <i class="las la-star-half-alt"></i>
                        </div>
                        <img src="images/p3.jpg" alt="" />
                        <h3>Olsa Demaku</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brands">
        <div class="brands-container">
            <div class="row">
                <div class="col-5">
                    <img src="images/logo-samsung.png" alt="" />
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
    <script src="js/slider.js"></script>
</body>

</html>