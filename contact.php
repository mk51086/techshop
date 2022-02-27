<?php
include_once("init.php");
$u = new User();

$emri = '';
$email = '';
$tel = '';
$msg = '';

if (isset($_POST['contact'])) {
    $emri = $_POST['emri'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $msg = $_POST['msg'];

    $u->contact($email, $emri, $tel, $msg);
}


?>
<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Kontakti </title>
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
            Na Kontaktoni
        </div>
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="inputfield">
                <label for="email">Email Adresa</label>
                <input name="email" type="text" class="input" id="email" value="<?= $email ?>">
                <small> <?= $u->getNotification(Notification::$emailZbrazetmsg) ?>
                    <?= $u->getNotification(Notification::$emailJoValide) ?></small>
            </div>
            <div class="inputfield">
                <label for="emri">Emri</label>
                <input name="emri" type="text" class="input" id="emri" value="<?= $emri ?>">
                <small><?= $u->getNotification(Notification::$emriZbrazetmsg) ?></small>
            </div>
            <div class="inputfield">
                <label for="tel">Nr. telefonit</label>
                <input name="tel" type="text" class="input" id="tel" value="<?= $tel ?>">
                <small><?= $u->getNotification(Notification::$telZbrazet) ?>
                    <?= $u->getNotification(Notification::$telNrOnly) ?></small>
            </div>
            <div class="inputfield">
                <label for="mesazhi">Mesazhi</label>
                <textarea name="msg" class="input" id="mesazhi" placeholder="Mesazhi juaj..."
                        ><?= $msg ?></textarea>
                <small><?= $u->getNotification(Notification::$msgEmpty) ?>
                    <?= $u->getNotification(Notification::$msgSize) ?></small>
            </div>
            <div class="inputfield">
                <input name="contact" type="submit" value="Dergo" id="submit" class="btn">
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
<!-- <script src="js/validate.js"></script> -->
</body>


</html>