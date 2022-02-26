<?php
include '../init.php';
if (!$_SESSION['role']) {
echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';}else{

$m=new messages();

$num_of_messages = 8;

$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

$v1 = ($current_page - 1) * $num_of_messages;

$mesazhet = $m->getMessagesPage($v1, $num_of_messages);
$total_messages = $m->totalRowsM();

$total_messages = ceil($total_messages / $num_of_messages);

if (isset($_GET['delpro'])) {
    $id = $_GET['delpro'];
    $delPro = $m->deleteMessages($id);
    header('Location: messages.php');
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
    <title>TECHSHOP - Produktet</title>
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
            <li class="active">
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

        <div class="details">
            <div class="recentProducts">
                <div class="cardHeader">
                    <h2>Te Gjitha mesazhet</h2>

                </div>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Emri</th>
                        <th>Email</th>
                        <th>mesazhi</th>
                        <th>tel</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($mesazhet as $messages) : ?>
                        <tr>
                            <td><?= $messages->ID ?></td>
                            <td><?= $messages->emri ?></td>
                            <td><?= $messages->email ?></td>
                            <td><?= $messages->mesazhi ?></td>
                            <td><?= $messages->tel ?></td>
                            <td>
                                <a onclick="return confirm('A jeni te sigurt?')" href="?delpro=<?= $messages->ID ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </div>
        <div class="page-btn">
            <?php if ($current_page > 1) : ?>
                <a href="messages.php?p=<?= $current_page - 1 ?>">&#8249;</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_messages; $i++) {
                if ($i == $current_page) {
                    echo "<a class='active'>" . $current_page . "</a>";
                } else {
                    echo "<a href='messages.php?p=" . $i . "'>" . $i . "</a>";
                }
            }
            ?>
            <?php if ($total_messages > ($current_page * $num_of_messages) - $num_of_messages + count($mesazhet)) : ?>
                <a href="messages.php?p=<?= $current_page + 1 ?>">&#8250;</a>
            <?php endif; ?>
        </div>
    </div>
</div>


<script src="js/script.js"></script>
</body>

</html><?php }?>