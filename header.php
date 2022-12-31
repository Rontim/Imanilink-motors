<body>
    <div id="header-content">
        <nav class="navbar">
            <a href="about.php" class="nav-branding">
                <div>
                    <srtong><span id="imani">Imanilink</span> <span id="mm">motors</span></srtong>
                </div>
            </a>
            <ul class="menu">
                <li class="nav-item">
                    <a href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a href="cars.php">Cars</a>
                </li> <?php if (isset($_SESSION["username"])){
                    echo <<< log
                        <li class="nav-item">
                            <a href="logout.php">Log out</a>
                        </li>
                    log;
                }
                 else {
                    echo <<< account
                            <li class="nav-item action">
                                <a href="#">Account</a>
                            </li>
                            <div class="drop-down">
                                <li class="nav-item">
                                    <a href="login.php">Log in</a>
                                </li><li class="nav-item">
                                    <a href="reg.php">Sign up</a>
                                </li>
                            </div>
                    account;

                }

                ?> <?php
                        if ($_SESSION["username"] == "Test1") {
                           echo <<< html
                                <li class="nav-item">
                                   <a href="admin.php">Admin</a>
                                </li>
                                html;
                            }
                    ?>
            </ul>
            <div class="menu-bars hamberger-bars">
                <p>Menu</p>
                <div class="hamberger-bars">
                    <span class="bars" id="t"></span>
                    <span class="bars" id="m"></span>
                    <span class="bars"> </span>
                </div>
            </div>
        </nav>
    </div>
</body>