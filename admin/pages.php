<?php
include '../init.php';
if (!$_SESSION['role']) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';
} else {
    $p = new Page();

    $num_of_pages = 8;

    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

    $v1 = ($current_page - 1) * $num_of_pages;

    $pages = $p->getPages($v1, $num_of_pages);
    $total_pages = $p->totalRows();

    $total_pages = ceil($total_pages / $num_of_pages);

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
    <title>TECHSHOP - Faqet</title>
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
            <li class="active">
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
                <div class="cardHeader">
                    <h2>Faqet</h2>

                </div>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulli</th>
                        <th>Permbajtja</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($pages as $page) :
                        $page->content = $page->shortDesc($page->content);

                        ?>
                        <tr>
                            <td><?= $page->id ?></td>
                            <td><?= $page->title ?></td>
                            <td><?= $page->content ?></td>
                            <td>
                                <a href="edit-page.php?id=<?= $page->id ?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </div>
        <div class="page-btn">
            <?php if ($current_page > 1) : ?>
                <a href="pages.php?p=<?= $current_page - 1 ?>">&#8249;</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $current_page) {
                    echo "<a class='active'>" . $current_page . "</a>";
                } else {
                    echo "<a href='pages.php?p=" . $i . "'>" . $i . "</a>";
                }
            }
            ?>
            <?php if ($total_pages > ($current_page * $num_of_pages) - $num_of_pages + count($pages)) : ?>
                <a href="pages.php?p=<?= $current_page + 1 ?>">&#8250;</a>
            <?php endif; ?>
        </div>
    </div>
</div>


<script src="js/script.js"></script>
</body>

    </html><?php } ?>