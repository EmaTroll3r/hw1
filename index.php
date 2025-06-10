
<!-- Emanuele Costanzo 1000046881 -->
<!-- Original website https://boardgamegeek.com -->

<!DOCTYPE html>

<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
?>

<html>
    <head>
        <title>BoadGameGeek</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/nav-style.css">
        <link rel="stylesheet" href="styles/home-style.css">
        <link rel="stylesheet" href="styles/footer-style.css">
        <script src="data/apikey.js"></script>
        <script src="scripts/nav-script.js" defer></script>
        <script src="scripts/home-script.js" defer></script>
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

            <div id="quickbar">QuickBar</div>

            <section id="home-explore-section">
                <div id="home-explore-title-container">
                    <div id="home-explore-title">Explore</div>
                    <hr id="home-explore-hr">
                </div>

                <div  id="home-explore-section-content">
                    <div id="home-explore-main-container">
                        <!-- <img src="https://cf.geekdo-images.com/JUAUWaVUzeBgzirhZNmHHw__opengraph/img/lnl-mnvbEge_7gtTD-sCxoI5NhY=/0x170:2048x1245/fit-in/1200x630/filters:strip_icc()/pic4254509.jpg" alt="Root"> -->
                        <img src="https://cf.geekdo-images.com/7k_nOxpO9OGIjhLq2BUZdA__opengraph/img/10P2KjknnofwYAqlJkBUXpz0I40=/0x0:4259x2236/fit-in/1200x630/filters:strip_icc()/pic3163924.jpg" alt="Scythe">
                        <div id="home-explore-main-text" class="item">
                            <div id="home-explore-main-title" class="item-title">Scythe: One of the best worker placement games ever</div>
                            <div id="home-explore-main-author" class="item-author">by&nbsp;<a class="home-author" href="#">EmaTroll3r</a></div>
                        </div>
                    </div>

                    <hr id="home-explore-sperator-hr">

                    <div id="home-explore-articles-container">

                        <div class="home-explore-articles-item item">
                            <img src="https://www.play-festival.it/media/play_f/Evolution_-_Sala_Ingellis.png" alt="Play Bologna 2025">
                            <div class="home-explore-articles-item-text">
                                <div class="home-explore-articles-item-title item-title">News about "Play Bologna 2025"</div>
                                <div class="home-explore-articles-item-author item-author">by&nbsp;<a class="home-author" href="#">EmaTroll3r</a></div>
                            </div>
                        </div>

                        <hr class="home-explore-articles-item-hr">
                        
                        <div class="home-explore-articles-item item">
                            <img src="https://cf.geekdo-images.com/WzNs1mA_o22ZWTR8fkLP2g__imagepage/img/G8mf2eXt4iRho5TL2N5207oQ5lI=/fit-in/900x600/filters:no_upscale():strip_icc()/pic3376065.jpg" alt="7 Wonders Duel">
                            <div class="home-explore-articles-item-text">
                                <div class="home-explore-articles-item-title item-title">7 Wonders Duel, the best 2 player game!</div>
                                <div class="home-explore-articles-item-author item-author">by&nbsp;<a class="home-author" href="#">EmaTroll3r</a></div>
                            </div>
                        </div>                        

                        <hr class="home-explore-articles-item-hr">

                        <div class="home-explore-articles-item item">
                            <img src="https://play-lh.googleusercontent.com/4wOMK4_-8uVCdSBaYjOZ4ZnUZVxICz_9ipaNaOQ17yO5EnS1WRpz0hGrBZHrbhcu_QuG" alt="Nemesis">
                            <div class="home-explore-articles-item-text">
                                <div class="home-explore-articles-item-title item-title">Nemesis makes 10 years!</div>
                                <div class="home-explore-articles-item-author item-author">by&nbsp;<a class="home-author" href="#">EmaTroll3r</a></div>
                            </div>
                        </div>

                        <hr class="home-explore-articles-item-hr">

                        <div class="home-explore-articles-item item">
                            <img src="https://martinfowler.com/articles/brass-brum/brum.png" alt="Brass Birmingham">
                            <div class="home-explore-articles-item-text">
                                <div class="home-explore-articles-item-title item-title">Brass: Birmingham reachs top of ranking!</div>
                                <div class="home-explore-articles-item-author item-author">by&nbsp;<a class="home-author" href="#">EmaTroll3r</a></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

            <hr class="home-section-hr">

            <section class="home-section" id="hot-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">THE HOTNESS</div>
                    <div class="home-section-description item-description">Top 50 trending games today</div>
                </div>

                <div class="home-section-content">
                    
                </div>
            </section>            

            <hr class="home-section-hr">

            <section class="home-section" id="crowdfunding-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">CROWDFUNDING COUNTDOWN</div>
                    <div class="home-section-description item-description">Projects ending soon</div>
                </div>

                <div class="home-section-content">

                </div>
            </section>            

            <hr class="home-section-hr">

            <section class="home-section" id="videos-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">FEATURED VIDEOS</div>
                </div>

                <div class="home-section-content">

                </div>
            </section>

            <hr class="home-section-hr">

            <section class="home-section" id="bestseller-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">BESTSELLER</div>
                    <div class="home-section-description item-description">Week of Mar 10-Mar 16</div>
                </div>

                <div class="home-section-content">
                </div>
            </section>
            
            <hr class="home-section-hr">
            
            <section class="home-split-screen">
                <div id="home-news-split" class="home-split-container">
                    <div class="home-split-title item-title">BOARD GAMING NEWS</div>
                    
                    <div class="home-split-content">

                    </div>
                </div>

                <hr class="home-split-vertical-hr">
                
                
                <div id="home-discussion-split" class="home-split-container">
                    <div class="home-split-title item-title">HOT DISCUSSION</div>

                    <div class="home-split-content">
                        
                    </div>
                </div>

            </section>
            
            <hr class="home-section-hr">

            <section class="home-section" id="giveway-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">GIVEWAY CONTEST</div>
                    <div class="home-section-description item-description">Answer questions for a chance to win - Sponsored</div>
                </div>

                <div class="home-section-content">

                </div>

            </section>
            
            <hr class="home-section-hr">

            <section class="home-section" id="mostPlayed-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">MOST PLAYED GAMES</div>
                    <div class="home-section-description item-description">Month of February</div>
                </div>

                <div class="home-section-content">

                </div>

            </section>
            
            <hr class="home-section-hr">

            <section class="home-section" id="deepReviews-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">HOT IN-DEEP REVIEWS</div>
                </div>

                <div class="home-section-content">

                </div>

            </section>
            
            <hr class="home-section-hr">

            <section class="home-section" id="geeklist-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">HOT GEEKLIST</div>
                </div>

                <div class="home-section-content">

                </div>

            </section>
            
            <hr class="home-section-hr">
            
            <section class="home-split-screen">
                <div id="home-blogs-split" class="home-split-container">
                    <div class="home-split-title item-title">BLOGS</div>
                    
                    <div class="home-split-content">                       

                    </div>
                </div>

                <hr class="home-split-vertical-hr">
                
                <div id="home-forums-split" class="home-split-container">
                    <div class="home-split-title item-title">GAME FORUMS</div>

                    <div class="home-split-content">
                        
                    </div>
                </div>

            </section>
            
            <hr class="home-section-hr">

            <section class="home-section" id="hotVideos-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">HOT VIDEOS</div>
                </div>

                <div class="home-section-content">


                </div>

            </section>

            
            <hr class="home-section-hr">

            <section class="home-section" id="hotBooks-section">
                <div class="home-section-header">
                    <div class="home-section-title item-title">HOT BOARDGAME BOOKS</div>
                </div>

                <div class="home-section-content">


                </div>

            </section>

        </article>

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
</html>
