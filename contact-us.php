<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Kontakti </title>
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
                Na Kontaktoni
            </div>
            <form id="contact" class="form">
                <div class="inputfield">
                    <label for="email">Email Adresa</label>
                    <input type="text" class="input" id="email">
                    <small>Error Message</small>
                </div>
                <div class="inputfield">
                    <label for="emri">Emri</label>
                    <input type="text" class="input" id="emri">
                    <small>Error Message</small>
                </div>
                <div class="inputfield">
                    <label for="tel">Nr. telefonit</label>
                    <input type="text" class="input" id="tel">
                    <small>Error Message</small>
                </div>
                <div class="inputfield">
                    <label for="mesazhi">Mesazhi</label>
                    <textarea class="input" id="mesazhi" placeholder="Mesazhi juaj..."></textarea>
                    <small>Error Message</small>
                </div>
                <div id="robot-div" class="inputfield">
                    <label for="robot" class="label-robot" style="font-size: 12pt;" id="n1"></label>
                    <input id="robot" type="text" />
                    <small>Error Message</small>
                </div>
                <div class="inputfield">
                    <input type="submit" value="Dergo" id="submit" class="btn">
                </div>
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