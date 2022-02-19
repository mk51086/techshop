<?php
include 'init.php';
$pd=new Product();

$num_products_on_each_page = 4;

$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

$v1 = ($current_page - 1) * $num_products_on_each_page;

$products = $pd->getProductsPage($v1, $num_products_on_each_page);
$total_products = $pd->totalRows();

$total_pages = ceil($total_products / $num_products_on_each_page);

?>
<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Produktet </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
          rel="stylesheet"/>
</head>

<body>
<?php
include("header.php");
?>
<div class="small-container">
    <div class="row row-2">
        <h2>Të gjitha produktet</h2>
    </div>
    <div class="row">
        <?php foreach ($products as $product) : ?>

            <div class="col-4">
                <a href="product.php?id=<?= $product->id ?>" class="product-link">
                    <img src="images/products/<?= $product->id ?>-1.jpg" alt="<?= $product->name ?>"/>
                    <h4><?= $product->name ?></h4>
                </a>
                <p><?= $product->price ?>€</p>
            </div>
        <?php endforeach ?>

    </div>
</div>
<div class="page-btn">
    <?php if ($current_page > 1) : ?>
        <a href="products.php?p=<?= $current_page - 1 ?>">&#8249;</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<a class='active'>" . $current_page . "</a>";
        } else {
            echo "<a href='products.php?p=" . $i . "'>" . $i . "</a>";
        }
    }
    ?>
    <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)) : ?>
        <a href="products.php?p=<?= $current_page + 1 ?>">&#8250;</a>
    <?php endif; ?>
</div>

<div class="brands">
    <div class="brands-container">
        <div class="row">
            <div class="col-5">
                <img src="images/logo-samsung.png" alt=""/>
            </div>
            <div class="col-5">
                <img src="images/logo-apple.png" alt=""/>
            </div>
            <div class="col-5">
                <img src="images/logo-lenovo.png" alt=""/>
            </div>
            <div class="col-5">
                <img src="images/logo-msi.png" alt=""/>
            </div>
            <div class="col-5">
                <img src="images/logo-hp.png" alt=""/>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>
<script src="js/menu.js"></script>
</body>


</html>