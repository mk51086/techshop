<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Kyçu </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap" rel="stylesheet" />
</head>

<body>
    <?php 
    include("header.php");
    ?>
    <div class="main">

        <div class="wrapper">
            <div class="title">
                Kyçu
            </div>
            <form class="form" action="/index.php" id="login">
                <div class="inputfield">
                    <label>Email Adresa</label>
                    <input type="text" class="input" id="email">
                    <small>Error Message</small>
                </div>
                <div class="inputfield">
                    <label>Fjalëkalimi</label>
                    <input type="password" class="input" id="password">
                    <small>Error Message</small>
                </div>
                <div class="inputfield">
                    <input type="submit" value="Kyçu" class="btn">
                </div>
                <p>Nuk keni llogari?
                    <a class="form-bottom-link" href="register.php">Regjistrohu</a>
                </p>
                <div class="success-div">
                    <span id="success"></span>
                </div>
            </form>
        </div>
    </div>
    <?php
   include("footer.php");
   ?>
    <script src="js/menu.js"></script>
    <script src="js/validate.js"></script>
</body>






</html>