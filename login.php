<?php

include_once 'init.php';
$u = new User();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($u->loginUser($email, $password)) {
         header("refresh:3;url=index.php");
    }
	$error = $u->getNotification(Notification::$loginError);
	$sukses = $u->getNotification(Notification::$loginSuccess);
}

?>
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
            <form id="login" class="form" name="login" method="POST">
                <div class="inputfield">
                    <label for="email">Email Adresa</label>
  				<input type="text" class="input" id="email" name="email" value="" ><br>                   
			  <?php 
					if(isset($error)){ ?>
                    <small><?=$error?></small>
<?php } ?>
                </div>
                <div class="inputfield">
                    <label for="password">Fjalëkalimi</label>
                    <input type="password" class="input" id="password" name="password" value="" ><br>
                        <?php 
					if(isset($error)){ ?>
                    <small><?=$error?></small>
<?php } ?>
                </div>

                <div class="inputfield">
                    <input type="submit" value="Kyçu" id="submit" name="login" class="btn">
                    <small style="padding-left:25%;"></small>
                </div>
                <p>Nuk Keni llogari?
                    <a class="form-bottom-link" href="register.php">Regjistrohu</a>
                </p>
                <div class="success-div">
	<?php 
					if(isset($sukses)){ ?>
                    <span id="success"><?=$sukses?></span>
<?php } ?>
                </div>
            </form>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>