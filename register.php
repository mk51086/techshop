<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Regjistrohu </title>
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
                Regjistrohu
            </div>
            <form id="register" class="form">
                <div class="inputfield">
                    <label>Email Adresa</label>
                    <input type="text" class="input" id="email">
                    <small></small>
                </div>
                <div class="inputfield">
                    <label>Fjalëkalimi</label>
                    <input type="password" class="input" id="password"><br>
                    <small></small>
                </div>
                <div class="inputfield">
                    <label>Konfirmo Fjalëkalimin</label>
                    <input type="password" class="input" id="konfirmimi">
                    <small></small>
                </div>
                <div class="inputfield">
                    <label>Emri</label>
                    <input type="text" class="input" id="emri">
                    <small></small>
                </div>
                <div class="inputfield">
                    <label>Mbiemri</label>
                    <input type="text" class="input" id="mbiemri">
                    <small>Error Message</small>
                </div>
                <div class="inputfield ">
                    <label>Gjinia</label>
                    <div class="custom_select">
                        <select id="gjinia">
                            <option value="">Zgjidhni</option>
                            <option value="male">Mashkull</option>
                            <option value="female">Femër</option>
                        </select>
                        <small>Error Message</small>
                    </div>
                </div>
                <div class="inputfield terms">
                    <input type="checkbox" id="kushtet" />
                    <small>Error Message</small>
                    <label> Pajtohem me <a class="linkr" href="#">kushtet e perdorimit</a>
                    </label>

                </div>
                <div class="inputfield">
                    <input type="submit" value="Regjistrohu" id="submit" class="btn">
                </div>
                <p>Keni llogari?
                    <a class="form-bottom-link" href="login.php">Kyçuni</a>
                </p>
                <div class="success-div">
                    <span id="success"></span>
                </div>
            </form>
        </div>
    </div>


    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">

                    <h3>TECHSHOP</h3>
                    <p>
                        Blej produkte online nga brendet më të njohura të teknologjisë.
                    </p>
                    <div class="app-logo">

                    </div>
                </div>
                <div class="footer-col-2">

                </div>
                <div class="footer-col-3">
                    <h3>Llogaria</h3>
                    <ul>
                        <li><a href="login.php">Kyçu</a></li>
                        <li><a href="register.php">Regjistrohu</a></li>
                    </ul>
                </div>

                <div class="footer-col-4">
                    <h3>Rreth nesh</h3>
                    <ul>
                        <li><a href="contact-us.php">Kontakt</a></li>
                        <li><a href="about-us.php">Rreth Nesh </a></li>
                        <li><a href="#">Termet dhe kushtet</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
    <script src="js/validate.js"></script>
</body>






</html>