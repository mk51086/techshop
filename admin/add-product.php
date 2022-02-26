<?php
include_once '../init.php';
if (!$_SESSION['role']) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';}else{
    $p= new Product();
    $emri = '';
    $desc = '';
    $cmimi = '';
    $sasia = '';
    $file = '';
    
    if(isset($_POST['shtoProdukt'])){
        $emri = $_POST['emri'];
        $desc = $_POST['desc'];
        $cmimi  = $_POST['cmimi'];
        $sasia = $_POST['sasia'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image = $_FILES['image']['name'];
        $div = explode('.', $image);
        $file_ext = strtolower(end($div));
        $unique_img = File::makeImageUnique($file_ext);

        $res = File::uploadProductImage($image_tmp, $unique_img);
        if (!$res) {
           echo 'error';
        } else {
            echo 'sukses';
        }
        $p->addProduct($emri, $desc, $cmimi, $sasia,$unique_img);
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"
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
                    <form action="#" method="POST" enctype="multipart/form-data">

                        <div class="cardHeader">
                            <h2>Shto produkt te ri</h2>

                            <a href="products.php" class="btn"><span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span> Te gjitha produktet</a>
                        </div>

                        <div>
                            <label class="desc" for="Field1">Emri Produktit</label>
                            <div>
                                <input name="emri" type="text" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                        <div>
                            <label class="desc" for="Field1">Pershkrimi</label>
                            <div>
                                <input name="desc" type="text" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                        <div>
                            <label class="desc" for="Field1">Cmimi</label>
                            <div>
                                <input name="cmimi" type="text" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                        <div>
                            <label class="desc">Sasia</label>
                            <div>
                                <input name="sasia" type="text" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                        <div>
                            <label class="desc">Foto e produktit</label>
                            <div>
                                <input name="image" type="file" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                        <div>
                            <div>
                                <input class="addProd" name="shtoProdukt" type="submit" value="Shto Produktin">
                            </div>

                        </div>

                        
                    </form>
                </div>

            </div>
        </div>

        <script src="js/script.js"></script>
</body>

</html><?php }?>