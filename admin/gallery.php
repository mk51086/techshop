<?php
include '../init.php';
if (!$_SESSION['role']) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';}else{
    $g=new Gallery();

    $num_of_items = 8;

    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

    $v1 = ($current_page - 1) * $num_of_items;

    $galleryItems = $g->getGallerysPage($v1, $num_of_items);
    $total_items = $g->totalRows();

    $total_pages = ceil($total_items / $num_of_items);

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $delItem = $g->delGallerysById($id);
        header('Location: gallery.php');
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
    <title>TECHSHOP - Gallery</title>
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
             <li class="active">
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
                    <h2>Gallery</h2>

                    <a href="add-gallery.php" class="btn"><span class="icon"><i class="fa fa-plus" aria-hidden="true"></i></span> Shto</a>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Product ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($galleryItems as $item) : ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td>  <img src="../uploads/gallery/<?= $item->image ?>"
                                       alt="<?php echo $item->id ?>" width="50px;"></td>
                            <td><?= $item->prodID ?></td>
                            <td>
                                <a href="edit-gallery.php?id=<?= $item->id ?>">Edit</a>
                                <a onclick="return confirm('A jeni te sigurt?')" href="?del=<?= $item->id ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </div>
        <div class="page-btn">
            <?php if ($current_page > 1) : ?>
                <a href="gallery.php?p=<?= $current_page - 1 ?>">&#8249;</a>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $current_page) {
                    echo "<a class='active'>" . $current_page . "</a>";
                } else {
                    echo "<a href='gallery.php?p=" . $i . "'>" . $i . "</a>";
                }
            }
            ?>
            <?php if ($total_items > ($current_page * $num_of_items) - $num_of_items + count($galleryItems)) : ?>
                <a href="gallery.php?p=<?= $current_page + 1 ?>">&#8250;</a>
            <?php endif; ?>
        </div>
    </div>
</div>


<script src="js/script.js"></script>
</body>

    </html><?php }?>