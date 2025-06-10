<!DOCTYPE html>
<?php
    
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {



        $conn = mysqli_connect("localhost", "root", "", "bgg") or die("Connection failed: " . mysqli_connect_error());
        
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        $query_existing_username = "SELECT * FROM user WHERE username = '". $username . "'";
        $query_existing_email = "SELECT * FROM user WHERE email = '" . $email . "'";

        $res_username = mysqli_query($conn, $query_existing_username) or die("Query failed: " . mysqli_error($conn));
        $res_email = mysqli_query($conn, $query_existing_email) or die("Query failed: " . mysqli_error($conn));

        if (mysqli_num_rows($res_username) > 0) {
            $username_error = TRUE;
        } elseif (mysqli_num_rows($res_email) > 0) {
            $email_error = TRUE;
        } else {
            $query_insert = "INSERT INTO user (username, password, email) VALUES ('" . $username . "', '" . $password . "', '" . $email . "')";
            if (mysqli_query($conn, $query_insert)) {

                header("Location: login.php");
                exit;
            } else {
                $generic_error = mysqli_error($conn);
            }
        }
    }

?>
<html>
    <head>
        <title>BoadGameGeek</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/nav-style.css">
        <link rel="stylesheet" href="styles/registration-style.css">
        <link rel="stylesheet" href="styles/footer-style.css">
        <script src="scripts/nav-script.js" defer></script>
        <script src="scripts/validate_credentials.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
        <link rel="icon" href="https://cf.geekdo-static.com/icons/favicon2.ico" type="image/ico">
    </head>
    <body>
        <nav>
            <div class="nav-side-container">
                <div id="nav-menu-container">
                    <div class="nav-item item">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <div id="nav-logo-container">
                    <a class="nav-user-links" href="index.php">
                        <img src="https://cf.geekdo-static.com/images/logos/navbar-logo-bgg-b2.svg" alt="Board Game Geek Logo">
                    </a>    
                </div>
                <div id="nav-links-container">
                    <div class="nav-item nav-links-item">Browse
                        <div class="nav-submenu">
                            <div class="nav-submenu-content">
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">All BoardGames</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Categories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Artists</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Publishers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Honors</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Gone Cardboard</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Recent Additions</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Previews</a></div>
                                </div>
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Families</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Mechanics</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Designers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Accessories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Random Game</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Podcasts</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Wiki</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Hall of Fame</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item nav-links-item">Forums
                        <div class="nav-submenu">
                            <div class="nav-submenu-content">
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">All BoardGames</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Categories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Artists</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Publishers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Honors</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Gone Cardboard</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Recent Additions</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Previews</a></div>
                                </div>
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Families</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Mechanics</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Designers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Accessories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Random Game</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Podcasts</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Wiki</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Hall of Fame</a></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="nav-item nav-links-item">Geeklists
                        <div class="nav-submenu">
                            <div class="nav-submenu-content">
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">All BoardGames</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Categories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Artists</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Publishers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Honors</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Gone Cardboard</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Recent Additions</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Previews</a></div>
                                </div>
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Families</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Mechanics</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Designers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Accessories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Random Game</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Podcasts</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Wiki</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Hall of Fame</a></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="nav-item nav-links-item">Shopping
                        <div class="nav-submenu">
                            <div class="nav-submenu-content">
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">All BoardGames</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Categories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Artists</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Publishers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Honors</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Gone Cardboard</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Recent Additions</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Previews</a></div>
                                </div>
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Families</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Mechanics</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Designers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Accessories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Random Game</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Podcasts</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Wiki</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Hall of Fame</a></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="nav-item nav-links-item">Community
                        <div class="nav-submenu">
                            <div class="nav-submenu-content">
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">All BoardGames</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Categories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Artists</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Publishers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Honors</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Gone Cardboard</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Recent Additions</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Previews</a></div>
                                </div>
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Families</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Mechanics</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Designers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Accessories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Random Game</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Podcasts</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Wiki</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Hall of Fame</a></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="nav-item nav-links-item">Help
                        <div class="nav-submenu">
                            <div class="nav-submenu-content">
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">All BoardGames</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Categories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Artists</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Publishers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Honors</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Gone Cardboard</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Recent Additions</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Previews</a></div>
                                </div>
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Families</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Mechanics</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Designers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Accessories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Random Game</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Podcasts</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Wiki</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Hall of Fame</a></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>

            <div class="nav-side-container">
                <div id="nav-user-container">
                    <a class="nav-user-links" href="#"><i class="fa-solid fa-envelope nav-icon"></i></a>
                    <a class="nav-user-links" href="#"><i class="fa-solid fa-bullhorn nav-icon"></i></a>
                    <div id="nav-username-container" class="nav-item nav-links-item" data-user-id="0" data-username="Sign In">
                        <div id="nav-username-content"></div>
                        <div class="nav-submenu">
                            <div class="nav-submenu-content">
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">All BoardGames</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Categories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Artists</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Publishers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Honors</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Gone Cardboard</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Recent Additions</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Previews</a></div>
                                </div>
                                <div class="nav-submenu-column">
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Families</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Mechanics</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Designers</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Accessories</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Random Game</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Podcasts</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Wiki</a></div>
                                    <div class="nav-submenu-item"><a class="nav-submenu-item-link" href="#">Hall of Fame</a></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                
                <div id="nav-search-container">
                    <input type="text" id="search" placeholder="Search">     
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </nav>
 
        <article>
            <div id="form-container">
                <img src="https://cf.geekdo-static.com/images/logos/bgg-primary-logo-b1.svg" alt="Board Game Geek Logo">
                <h1>Join the Geek!</h1>
                <p>Welcome to BoardGameGeek! Please fill out the form below to create your account.</p>
                <?php
                    if (isset($username_error)) {
                        echo "<p class='error'>Username already exists. Please choose a different username.</p>";
                    }
                    if (isset($email_error)) {
                        echo "<p class='error'>Email already exists. Please use a different email address.</p>";
                    }
                    if (isset($generic_error)) {
                        echo "<p class='error'>An error occurred: $generic_error</p>";
                    }
                ?>
                <form id="form" method="post">
                    
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    

                    <button type="submit">Create an Account</button>
                </form>
                <a href="login.php" id="outer-link">Already have an account? Sign In!</a>
            </div>
        </article> 

        <div id="footer-wrapper">
            <footer id="footer-bigScreen">
                <div id="footer-main">
                    <div id="footer-logo" class="footer-container">
                        <div id="footer-image">
                            <img src="https://cf.geekdo-static.com/images/logos/bgg-primary-logo-reverse.svg" alt="Board Game Geek">
                        </div>
                    </div>
                    <div id="footer-company" class="footer-container">
                        <div class="footer-title">COMPANY</div>
                        <div class="footer-content">
                            <a href="#">About</a>
                            <a href="#">Contact</a>
                            <a href="#">Advertise</a>
                            <a href="#">Support BGG</a>
                        </div>
                    </div>

                    <div id="footer-policies" class="footer-container">
                        <div class="footer-title">POLICIES</div>
                        <div class="footer-content">
                            <a href="#">Community Guidelines</a>
                            <a href="#">Privacy</a>
                            <a href="#">Terms</a>
                            <a href="#">Manage Cookies</a>
                        </div>
                    </div>
                    
                    <div id="footer-connect" class="footer-container">
                        <div class="footer-title">CONNECT</div>
                        <div class="footer-content">
                            <div id="footer-connect-social">
                                <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-bluesky"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                <a href="#"><i class="fa-brands fa-twitch"></i></a>
                                <a href="#"><i class="fa-brands fa-discord"></i></a>
                            </div>
                            <div id="footer-connect-downloads">
                                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/1200px-Download_on_the_App_Store_Badge.svg.png" alt="App Store"></a>
                                <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/1280px-Google_Play_Store_badge_EN.svg.png" alt="Google Play"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="footer-legalNotice">
                    Geekdo, BoardGameGeek, the Geekdo logo, and the BoardGameGeek logo are trademarks of BoardGameGeek, LLC.
                </div>
            </footer>

            <footer id="footer-mediumScreen">
                <div id="footer-main">
                    <div class="footer-wrapper" id="footer-wrapper1">
                        <div id="footer-logo" class="footer-container">
                            <div id="footer-image">
                                <img src="https://cf.geekdo-static.com/images/logos/bgg-primary-logo-reverse.svg" alt="Board Game Geek">
                            </div>
                        </div>
                        <div id="footer-company" class="footer-container">
                            <div class="footer-title">COMPANY</div>
                            <div class="footer-content">
                                <a href="#">About</a>
                                <a href="#">Contact</a>
                                <a href="#">Advertise</a>
                                <a href="#">Support BGG</a>
                            </div>
                        </div>

                        <div id="footer-policies" class="footer-container">
                            <div class="footer-title">POLICIES</div>
                            <div class="footer-content">
                                <a href="#">Community Guidelines</a>
                                <a href="#">Privacy</a>
                                <a href="#">Terms</a>
                                <a href="#">Manage Cookies</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="footer-wrapper" id="footer-wrapper2">
                        <div id="footer-connect" class="footer-container">
                            <div class="footer-title">CONNECT</div>
                            <div class="footer-content">
                                <div id="footer-connect-social">
                                    <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                                    <a href="#"><i class="fa-brands fa-bluesky"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitch"></i></a>
                                    <a href="#"><i class="fa-brands fa-discord"></i></a>
                                </div>
                                <div id="footer-connect-downloads">
                                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/1200px-Download_on_the_App_Store_Badge.svg.png" alt="App Store"></a>
                                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/1280px-Google_Play_Store_badge_EN.svg.png" alt="Google Play"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="footer-legalNotice">
                    Geekdo, BoardGameGeek, the Geekdo logo, and the BoardGameGeek logo are trademarks of BoardGameGeek, LLC.
                </div>
            </footer>

            <footer id="footer-smallScreen">
                <div id="footer-main">
                    
                    <div class="footer-wrapper" id="footer-wrapper1">
                        <div id="footer-logo" class="footer-container">
                            <div id="footer-image">
                                <img src="https://cf.geekdo-static.com/images/logos/bgg-primary-logo-reverse.svg" alt="Board Game Geek">
                            </div>
                        </div>
                    </div>
                    
                    <div class="footer-wrapper" id="footer-wrapper2">
                        <div id="footer-company" class="footer-container">
                            <div class="footer-title">COMPANY</div>
                            <div class="footer-content">
                                <a href="#">About</a>
                                <a href="#">Contact</a>
                                <a href="#">Advertise</a>
                                <a href="#">Support BGG</a>
                            </div>
                        </div>

                        <div id="footer-policies" class="footer-container">
                            <div class="footer-title">POLICIES</div>
                            <div class="footer-content">
                                <a href="#">Community Guidelines</a>
                                <a href="#">Privacy</a>
                                <a href="#">Terms</a>
                                <a href="#">Manage Cookies</a>
                            </div>
                        </div>
                    </div>
                    <div class="footer-wrapper" id="footer-wrapper3">
                    
                        <div id="footer-connect" class="footer-container">
                            <div class="footer-title">CONNECT</div>
                            <div class="footer-content">
                                <div id="footer-connect-social">
                                    <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                                    <a href="#"><i class="fa-brands fa-bluesky"></i></a>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                    <a href="#"><i class="fa-brands fa-twitch"></i></a>
                                    <a href="#"><i class="fa-brands fa-discord"></i></a>
                                </div>
                                <div id="footer-connect-downloads">
                                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/1200px-Download_on_the_App_Store_Badge.svg.png" alt="App Store"></a>
                                    <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/1280px-Google_Play_Store_badge_EN.svg.png" alt="Google Play"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="footer-legalNotice">
                    Geekdo, BoardGameGeek, the Geekdo logo, and the BoardGameGeek logo are trademarks of BoardGameGeek, LLC.
                </div>
            </footer>
        </div>
    </body>
</html>