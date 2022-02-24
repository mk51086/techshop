<?php
include_once('../init.php');
$product = new Product();
$user = new User();
$db = Database::instance();

$num_users = $user->getTotalNumofUsers();
$num_products = $product->totalRows();
$total_msg = $db->totalMessages();
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
                <a href="index.html">
                    <span class="icon"><i class="fa fa-laptop"></i></span>
                    <span class="title"><h2>TECHSHOP</h2></span>
                </a>
            </li>
            <li class="active">
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
                <a href="accoumt.php">

                    <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    <span class="title">Password</span>
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

        <div class="cardbox">
            <div class="card">
                <div>
                    <div class="numbers"><?= $num_products ?></div>
                    <div class="cardName">Produkte</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-shopping-cart" area-hidden="true"></i>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers"><?= $total_msg ?></div>
                    <div class="cardName">Mesazhe</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-comment" area-hidden="true"></i>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers"><?= $num_users ?></div>
                    <div class="cardName">Perdorues</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-users" area-hidden="true"></i>
                </div>
            </div>
        </div>

        <div class="details">
            <div class="recentProducts">
                <div class="cardHeader">
                    <h2>Produktet e fundit</h2>
                    <a href="/products.php" class="btn">Te gjitha</a>
                </div>
                <table>
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Emri</td>
                        <td>Cmimi</td>
                        <td>Data</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $products = $product->getNumProducts(10);

                    foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $product->id ?></td>
                            <td><?= $product->name ?></td>
                            <td><?= $product->price ?>€</td>
                            <td><?= $product->data ?></td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>

            </div>
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Klientet e fundit</h2>
                </div>
                <table>
                    <tbody>
                    <?php $users = $user->getNumofUsers(10);
                    foreach ($users

                    as $user) : ?>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="img/1.jpg"></div>
                        </td>
                        <td><h4><?= $user->emri ?><br/><span><?= $user->data ?></span></h4></td>
                    </tr>
                    <tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="js/script.js"></script>
</body>

</html>