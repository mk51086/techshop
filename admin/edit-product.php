<?php
include_once("../init.php");
if (!$_SESSION['role']) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';
} else {
    $pd= new Product();
    $product = $pd->getProduct($_GET['id']);
    $emri = '';
    $desc = '';
    $cmimi = '';
    $sasia = '';
    $file = '';
    $u = new User();
    $user = $u->getUserbyEmail($_SESSION['email']);
    $userID = '';
    if(isset($_POST['submit'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price  = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image = $_FILES['image']['name'];
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_img = File::makeImageUnique($file_ext);

        $res = File::uploadProductImage($image_tmp, $unique_img);
        if (!$res) {
            echo 'error';
            $unique_img=$product->image;
        } else {
            File::deleteProductImage($product->image);
            echo 'sukses';
        }
        $product = $pd->productUpdate($name, $desc, $price, $quantity, $unique_img,$userID, $id);
        header("Location: edit-product.php?id=$id");
    }

    ?>


    <!DOCTYPE html>
    <html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>TECHSHOP - Dashboard</title>
</head>

<body>
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a href="index.php">
                    <span class="icon"><i class="fa fa-laptop"></i></span>
                    <span class="title"><h2>TECHSHOP</h2></span>
                </a>
            </li>
            <li>
                <a href="index.php">

                    <span class="icon"><i class="fa fa-home"></i></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="users.php">

                    <span class="icon"><i class="fa fa-users"></i></span>
                    <span class="title">Klientet</span>
                </a>
            </li>
            <li>
                <a href="messages.php">

                    <span class="icon"><i class="fa fa-comment"></i></span>
                    <span class="title">Mesazhet</span>
                </a>
            </li>
            <li>
                <a href="products.php">

                    <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                    <span class="title">Produktet</span>
                </a>
            </li>
            <li>
                <a href="sliders.php">

                    <span class="icon"><i class="fa fa-eye"></i></span>
                    <span class="title">Sliders</span>
                </a>
            </li>
            <li>
                <a href="account.php">

                    <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <span class="title">Account</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">

                    <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle" onclick="toggleMenu()"></div>
            <div class="search">
                <label>
                </label>
            </div>
            <div class="user">
            </div>
        </div>


        <div class="details">
            <div class="recentProducts">
                <form action="#" method="post" enctype="multipart/form-data">

                    <div class="cardHeader">
                        <h2>Ndrysho Produktin</h2>

                        <a href="products.php" class="btn"><span class="icon"><i class="fa fa-shopping-cart"
                                                                                 aria-hidden="true"></i></span> Te
                            gjitha produktet</a>
                    </div>

                    <div>
                        <label class="desc" for="Field1">Emri Produktit</label>
                        <div>
                            <input name="name" type="text" class="field text fn" value="<?= $product->name ?>" size="8"
                                   tabindex="1">
                        </div>
                    </div>
                    <div>
                        <label class="desc" for="Field1">Pershkrimi</label>
                        <div>
                            <input name="desc" type="text" class="field text fn" value="<?= $product->desc ?>" size="8"
                                   tabindex="1">
                        </div>
                    </div>
                    <div>
                        <label class="desc" for="Field1">Cmimi</label>
                        <div>
                            <input name="price" type="text" class="field text fn" value="<?= $product->price ?>"
                                   size="8" tabindex="1">
                        </div>
                    </div>
                    <div>
                        <label class="desc">Sasia</label>
                        <div>
                            <input name="quantity" type="text" class="field text fn" value="<?= $product->quantity ?>"
                                   size="8" tabindex="1">
                        </div>
                    </div>
                    <div>

                        <label class="desc">Foto e produktit</label>
                        <div>
                            <div class="form-group">
                                <label for="product-title">Product Image</label>
                                <input type="file" name="image">
                                <hr>
                            </div>
                        </div>
                        <img src="../uploads/product_images/<?= $product->image; ?>"
                             alt="<?php echo $product->name ?>" width="50px;">
                    </div>
                    <div>
                        <div>
                            <input class="addProd" name="submit" type="submit" value="Ndrysho">
                        </div>

                    </div>


                </form>
            </div>

        </div>
    </div>

    <script src="js/script.js"></script>
</body>

    </html><?php } ?>
