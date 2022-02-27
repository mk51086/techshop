<?php
include_once("init.php");
if(!isset($_SESSION['id'])){
    echo '<script>alert("Duhet te jeni login per te blere!");
            location.href = "index.php";
</script>';
}
$u = new User();
$emri = '';
$mbiemri = '';
$email = '';
$address = '';
$u_id = $_SESSION['id'];
$u = $u->getUser($u_id);
$p_id = $_GET['id'];
$p = new Product();
$p = $p->getProduct($p_id);
$o = new Order();
if(isset($_POST['order'])) {

    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $email = $_POST['email'];
    $address = $_POST['email'];
    $product = $_POST['prodname'];
    $price = $_POST['price'];

   $checkout =  $o->addOrder($p_id, $u_id, $email, $address, $product, $price);
   if(isset($checkout)){
       header('Location: sukses.php');
   }
}

?>

<!DOCTYPE html>
<html lang="sq" translate="no">

<head>
    <title>TECHSHOP - Blej </title>
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
            Blej Produktin
        </div>
        <form id="register" class="form" action="#" method="POST">
            <div class="inputfield">
                <label for="prodname">Emri Produktit</label>
                <input type="text" name="prodname" class="input" id="mbiemri" value="<?=$p->name ?>" required>
                <small>

                </small>
            </div>
            <div class="inputfield">
                <label for="price">Cmimi</label>
                <input type="text" name="price" class="input" id="mbiemri" value="<?=$p->price ?>" readonly>
                <small>

                </small>
            </div>

            <div class="inputfield">
                <label for="email">Email Adresa</label>
                <input type="text" name="email" class="input" id="email" value="<?= $u->email ?>">
                <small>
                </small>
            </div>

            <div class="inputfield">
                <label for="emri">Emri</label>
                <input type="text" name="emri" class="input" id="emri" value="<?= $u->emri ?>" required>
                <small>
                </small>
            </div>
            <div class="inputfield">
                <label for="mbiemri">Mbiemri</label>
                <input type="text" name="mbiemri" class="input" id="mbiemri" value="<?= $u->mbiemri ?>" required>
                <small>

                </small>
            </div>
            <div class="inputfield">
                <label for="adresa">Adresa</label>
                <input type="text" name="address" class="input" id="mbiemri" value="<?=$o->address ?>" required>
                <small>

                </small>
            </div>



            <div class="inputfield">
                <input type="submit" value="BLEJ" id="submit" name="order" class="btn">
            </div>
            <div class="success-div">
                <?php
                if(isset($sukses)){ ?>
                    <span class="success" style="color: green;"><?=$sukses?></span>
                <?php } ?>
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