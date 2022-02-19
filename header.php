<!-- Header -->
<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo.png" alt="" width="125px" /></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Produktet</a></li>
                        <li><a href="about-us.php">Rreth nesh</a></li>
                        <li><a href="contact-us.php">Kontakti</a></li>
						  <?php
                    if (isset($_SESSION['email'])) {
                        echo "<li><a href='logout.php' id='loginlink'>Dil</a></li>";
                   	 } else {
                        echo "
                                    <li><a href='login.php' id='loginlink'>Kyçu</a></li>
                                    <li><a href='register.php'>Regjistrohu</a></li>";
                    }
                    ?>
                    </ul>
                </nav>
                <img src="images/menu.png" alt="" class="menu-icon" id="menuBtn" />
            </div>
        </div>
    </div>