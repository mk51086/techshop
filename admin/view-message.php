<?php
include_once("../init.php");
if ($_SESSION['role'] == 0) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';
} else {

    $m=new Message();
    $emri = '';
    $email = '';
    $mesazhi = '';
    $tel = '';

    $mesazhet = $m->getMessages($_GET['id']);
     

    if(isset($_POST['submit'])){
        $id = $_GET['id'];
        $emri = $_POST['emri'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $mesazhi= $_POST['mesazhi'];
        
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
    <title>TECHSHOP - Mesazhi</title>
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
            <li >
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
                <a href="pages.php">

                    <span class="icon"><i class="fa fa-book"></i></span>
                    <span class="title">Faqet</span>
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
                        <h2>Lexo Mesazhin</h2>
                        <a href="messages.php" class="btn"><span class="icon"><i class="fa fa-message" aria-hidden="true"></i></span> Te gjitha</a>
                    </div>
                    <div>
                        <label class="desc" for="Field1">Emri </label>
                        <div>
                            <input name="emri" type="text" class="field text fn" value="<?= $mesazhet->emri ?>" size="8"  tabindex="1" readonly>
                        </div>
                    </div>
                    <div>
                        <label class="desc" for="Field1">Email </label>
                        <div>
                            <input name="email" type="text" class="field text fn" value="<?= $mesazhet->email ?>" size="8"  tabindex="1" readonly>
                        </div>
                    </div>
                    <div>
                        <label class="desc" for="Field1">Tel </label>
                        <div>
                            <input name="tel" type="text" class="field text fn" value="<?= $mesazhet->tel ?>" size="8"  tabindex="1" readonly>
                        </div>
                    </div>
                    <div>
                        <label class="desc" for="Field1">Mesazhi </label>
                        <div>
                            <textarea name="mesazhet" type="text" class="field text fn" size="8"  tabindex="1" style="width:500px;height:200px; resize: none;background:transparent;" disabled><?= $mesazhet->mesazhi ?></textarea>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

    <script src="js/script.js"></script>
</body>

    </html><?php } ?>
