<?php
require_once('init.php');
$p = new Page();
$page = $p->getPage(1);

?>
<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Rreth nesh </title>
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

        <h3 class="title">Ekipi ynë </h3>
        <div class="container-team">
            <div class="box-team">
                <div class="top-bar"></div>
                <div class="content">
                    <img src="images/t1.jpg" alt="">
                    <strong>Mirsad Krasniqi</strong>
                    <a href="mailto:mk51086@ubt-uni.net">
                        <p>mk51086@ubt-uni.net</p>
                    </a>
                </div>
                <ul class="socials">
                    <li class="social-icon">
                        <a href="" class="lab la-linkedin la-2x"></a>
                    </li>
                    <li class="social-icon">
                        <a href="" class="lab la-twitter-square la-2x"></a>
                    </li>
                    <li class="social-icon">
                        <a href="" class="lab la-facebook-square la-2x"></a>
                    </li>
                </ul>

            </div>
            <div class="box-team">
                <div class="top-bar"></div>
                <div class="content">
                    <img src="images/t1.jpg" alt="">
                    <strong>Muhamet Hajdini</strong>
                    <a href="mailto:mh51221@ubt-uni.net">
                        <p>mh51221@ubt-uni.net</p>
                    </a>
                </div>
                <ul class="socials">
                    <li class="social-icon">
                        <a href="" class="lab la-linkedin la-2x"></a>
                    </li>
                    <li class="social-icon">
                        <a href="" class="lab la-twitter-square la-2x"></a>
                    </li>
                    <li class="social-icon">
                        <a href="" class="lab la-facebook-square la-2x"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
<script src="js/menu.js"></script>
</body>

</html>