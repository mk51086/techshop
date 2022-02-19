<?php
include_once("init.php");
$u = new User();

$emri = '';
$mbiemri = '';
$password1 = '';
$password2 = '';
$email = '';

if(isset($_POST['register'])){

$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$password1 = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];

$u->register($emri, $mbiemri, $email, $password1, $password2);
}



?>

<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Regjistrohu </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
          rel="stylesheet"/>
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
            <form id="register" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="inputfield">
                    <label for="email">Email Adresa</label>
                    <input type="text" name="email" class="input" id="email" value="<?= $email ?>">
                    <small>
                          <?php echo $u->getNotification(Notification::$emailZbrazetmsg) ?>
                                    <?php echo $u->getNotification(Notification::$emailJoValide) ?>
                                    <?php echo $u->getNotification(Notification::$emailEkziston) ?>

</small>
                </div>
 

                <div class="inputfield">
                    <label for="password">Fjalëkalimi</label>
                    <input type="password" name="password" class="input" id="password" value="<?= $password1 ?>">
                    <small>
                                <?php echo $u->getNotification(Notification::$passwordZbrazet) ?>
                                    <?php echo $u->getNotification(Notification::$passwordLength) ?>
                                    <?php echo $u->getNotification(Notification::$passwordPaNumer) ?>
                                    <?php echo $u->getNotification(Notification::$passwordPaShkronja) ?>
                                     <?php echo $u->getNotification(Notification::$passwordGabim) ?>
</small>
                </div>
                <div class="inputfield">
                    <label for="konfirmimi">Konfirmo Fjalëkalimin</label>
                    <input type="password" name="password2" class="input" id="konfirmimi" value="<?= $password2 ?>">
                    <small>
                    <?php echo $u->getNotification(Notification::$passwordZbrazet) ?>
                                    <?php echo $u->getNotification(Notification::$passwordLength) ?>
                                    <?php echo $u->getNotification(Notification::$passwordPaNumer) ?>
                                    <?php echo $u->getNotification(Notification::$passwordPaShkronja) ?>
                                    <?php echo $u->getNotification(Notification::$passwordGabim) ?>
                                
                    </small>
                </div>
                <div class="inputfield">
                    <label for="emri">Emri</label>
                    <input type="text" name="emri" class="input" id="emri" value="<?= $emri ?>">
                    <small>
                    <?php echo $u->getNotification(Notification::$emriZbrazetmsg) ?>
                    <?php echo $u->getNotification(Notification::$emriLettersOnly) ?>
                    </small>
                </div>
                <div class="inputfield">
                    <label for="mbiemri">Mbiemri</label>
                    <input type="text" name="mbiemri" class="input" id="mbiemri" value="<?= $mbiemri ?>">
                    <small>
                    <?php echo $u->getNotification(Notification::$MbiEmriZbrazetmsg) ?>
                    <?php echo $u->getNotification(Notification::$MbiemriLettersOnly) ?>
</small>
                </div>
                <!-- Ka mbet me i shtu ne databaz dhe pastaj me i validu pastaj ne php -->
                <!-- <div class="inputfield ">
                <label for="gjinia">Gjinia</label>
                <div class="custom_select">
                    <select name="gjinia" id="gjinia">
                        <option value="">Zgjidhni</option>
                        <option value="male">Mashkull</option>
                        <option value="female">Femër</option>
                    </select>
                    <small></small>
                </div>
            </div>
            <div class="inputfield terms">
                <input name="kushtet" type="checkbox" id="kushtet"/>
                <small></small>
                <label> Pajtohem me <a class="linkr" href="#">kushtet e perdorimit</a>
                </label>

            </div> -->
                <div class="inputfield">
                    <input type="submit" value="Regjistrohu" id="submit" name="register" class="btn">
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
<?php
require_once("footer.php");
?>

<script src="js/menu.js"></script>
</body>


</html>