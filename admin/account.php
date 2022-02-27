<?php
include_once("../init.php");
if ($_SESSION['role'] == 0) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';
} else {

    $u = new User();
    $email = $_SESSION['email'];
    $user = '';
    $name = '';
    $surname = '';
    $pass = '';
    $user = $u->getUserbyEmail($email);

    if (isset($_POST['acc'])) {
        $id = $user->id;
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $u->userUpdate($name, $surname, $pass, $email, $id);
    }

    if (isset($_GET['delacc'])) {
        $id = $_GET['delacc'];
        $delacc = $u->deleleteUserById($id);
        Session::end();
        header('Location:../index.php');
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
    <title>TECHSHOP - Account</title>
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
            <li class="active">
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
                        <h2>Perditeso llogarine</h2>
                    </div>

                    <div>
                        <label class="desc" for="Field1">Emri </label>
                        <div>
                            <input name="name" type="text" class="field text fn" value="<?= $user->emri ?>" size="8"
                                   tabindex="1">
                        </div>
                    </div>
                    <div>
                        <label class="desc" for="Field1">Mbiemri</label>
                        <div>
                            <input name="surname" type="text" class="field text fn" value="<?= $user->mbiemri ?>"
                                   size="8" tabindex="1">
                        </div>
                    </div>
                    <div>
                        <label class="desc" for="Field1">Email</label>
                        <div>
                            <input name="email" type="text" class="field text fn" value="<?= $user->email ?>" size="8"
                                   tabindex="1">
                        </div>
                    </div>
                    <div>
                        <label class="desc">Ndrysho Passwordin</label>
                        <div>
                            <input name="pass" type="text" class="field text fn" value="" size="8" tabindex="1">
                        </div>
                    </div>
                    <div>

                        <div>
                            <div>
                                <input class="addProd" name="acc" type="submit" value="Ndrysho">
                            </div>

                        </div>
                        
                        <div>
                      

                        </div>

                </form>
            </div>
                           <a style="float:right;margin-top:160px;" onclick="return confirm('A jeni te sigurt?')" href="?delacc=<?= $user->id ?>" class="btn"><span   class="icon"><i class="fa fa-message" aria-hidden="true"></i></span> Shlyej Llogarine</a>

        </div>
    </div>

    <script src="js/script.js"></script>
</body>

    </html><?php } ?>
