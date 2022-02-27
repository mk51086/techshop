<?php
include_once("../init.php");
if (!$_SESSION['role']) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';
} else {
    $g=new Gallery();
    $gallery = $g->getGallery($_GET['id']);
    $img = '';
    $prodID = '';

    if(isset($_POST['submit'])){
        $id = $_GET['id'];
        $img = $_POST['image'];
        $prodID = $_POST['prodID'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $img = $_FILES['image']['name'];
        $div = explode('.', $img);
        $file_ext = strtolower(end($div));
        $unique_img = File::makeImageUnique($file_ext);

        $res = File::uploadGalleryImage($image_tmp, $unique_img);
        if (!$res) {
            echo 'error';
            $unique_img=$gallery->image;
        } else {
            File::deleteGalleryImage($gallery->image);
            echo 'sukses';
        }
        $gallery = $g->galleryUpdate($prodID, $unique_img,$id);
//        header("Location: edit-Gallery.php?id=$id");
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
                <a href="Gallerys.php">

                    <span class="icon"><i class="fa fa-eye"></i></span>
                    <span class="title">Gallerys</span>
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
                        <h2>Ndrysho Galleryin</h2>

                        <a href="gallery.php" class="btn"><span class="icon"><i class="fa fa-shopping-cart"
                                                                                aria-hidden="true"></i></span> Te
                            gjitha Fotot</a>
                    </div>

                    <div>
                        <label class="desc" for="Field1">Product ID</label>
                        <div>
                            <input name="prodID" type="text" class="field text fn" value="<?= $gallery->prodID ?>" size="8"
                                   tabindex="1">
                        </div>
                    </div>
                    <div>

                        <label class="desc">Foto</label>
                        <div>
                            <div class="form-group">
                                <label for="product-title">Gallery Image</label>
                                <input type="file" name="image">
                                <hr>
                            </div>
                        </div>
                        <img src="../uploads/product_images/<?= $gallery->image ?>"
                             alt="<?php echo $gallery->id ?>" width="50px;">
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