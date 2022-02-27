<?php
include_once("../init.php");
if (!$_SESSION['role']) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';
} else {
    $g=new Gallery();
    $img = '';
    $prod = '';
    $file = '';

    if(isset($_POST['submit'])){
        $prod = $_POST['prod'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $img = $_FILES['image']['name'];
        $div = explode('.', $img);
        $file_ext = strtolower(end($div));
        $unique_img = File::makeImageUnique($file_ext);

        $res = File::uploadGalleryImage($image_tmp, $unique_img);
        if (!$res) {
            echo 'error';
        } else {
            echo 'sukses';
        }
        $gallery = $g->addGallery($prod,$unique_img);
        header("Location: gallery.php");
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
        <title>TECHSHOP - Shto foto gallery</title>
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
                    <a href="gallery.php">

                        <span class="icon"><i class="fa fa-eye"></i></span>
                        <span class="title">Gallery</span>
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
                            <h2>Shto Foto</h2>

                            <a href="gallery.php" class="btn"><span class="icon"><i class="fa fa-eye"
                                                                                    aria-hidden="true"></i></span> Te
                                gjitha</a>
                        </div>

                        <div>
                            <label class="desc" for="Field1">Product ID</label>
                            <div>
                                <input name="prod" type="number" class="field text fn" value="" size="8"
                                       tabindex="1">
                            </div>
                        </div>
                        <div>

                            <label class="desc">Foto</label>
                            <div>
                                <div>
                                    <input type="file" name="image">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <input class="addProd" name="submit" type="submit" value="Shto">
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>

        <script src="js/script.js"></script>
    </body>

    </html><?php } ?>
