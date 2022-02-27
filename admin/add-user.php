<?php
include_once '../init.php';
if (!$_SESSION['role']) {
    echo '<script>alert("Nuk keni qasje ne kete faqe");
            location.href = "../index.php";
</script>';}else{
    $u = new User();
    $emri = '';
    $mbiemri = '';
    $password = '';
    $email = '';
    $gjinia = '';

    if(isset($_POST['addUser'])){
        $emri = $_POST['emri'];
        $mbiemri = $_POST['mbiemri'];
        $password  = $_POST['password'];
        $email = $_POST['email'];
		$gjinia = $_POST['gjinia'];
        $u->newUser($emri, $mbiemri, $email, $password,$gjinia);
  header("Location: users.php");
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>TECHSHOP - Dashboard</title>
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
             <li>
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
                    <form action="#" method="POST" enctype="multipart/form-data">

                        <header>
                            <h2>Shto user te ri</h2>
                        </header>


                        <div>
                            <label class="desc" >Emri</label>
                            <div>
                                <input required name="emri" id="emriU" type="text" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                        <div>
                            <label class="desc" >Mbiemri</label>
                            <div>
                                <input required name="mbiemri" type="text" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                        <div>
                            <label class="desc" >Password</label>
                            <div>
                                <input minlength="8" maxlength="25" required name="password" type="password" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                        <div>
                            <label class="desc">Email</label>
                            <div>
                                <input required name="email" type="text" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
 <div>
                            <label class="desc">Gjinia</label>
                            <div>
 						<select  name="gjinia" id="gjinia" required > 
                        <option value=""  <?php if($gjinia==''){ echo 'selected' ?> <?php }?>>Zgjidhni</option>
                        <option value="m"  <?php if($gjinia=='m'){ echo 'selected' ?> <?php }?>>Mashkull</option>
                        <option value="f" <?php if($gjinia=='f'){ echo 'selected' ?> <?php }?>>Femër</option>

                    </select>                            </div>
                        </div>
                     <!--   <div>
                            <label class="desc">Foto</label>
                            <div>
                                <input name="img" type="file" class="field text fn" value="" size="8" tabindex="1">
                            </div>
                        </div>
                                                -->

                        <div>
                            <div>
                                <input class="addProd" name="addUser" type="submit" value="Shto User">
                            </div>

                        </div>

                        
                    </form>
                </div>

            </div>
        </div>

        <script src="js/script.js"></script>
</body>

</html><?php }?>