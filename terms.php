<?php
require_once('init.php');
$p = new Page();
$page = $p->getPage(2);

?>
<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - <?=$page->title?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
          rel="stylesheet"/>
</head>

<body>
<?php
include("header.php");
?>
<div class="main">
    <h2 class="title"><?=$page->title?></h2>
    <div class="about">
        <p>
            <?=$page->content?>
        </p>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
<script src="js/menu.js"></script>
</body>

</html>