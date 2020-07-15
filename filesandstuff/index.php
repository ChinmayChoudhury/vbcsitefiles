<?php
    session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.ico" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="css_2020/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Muli:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/kkb7kdd.css">
    <title>Visual Bloggers' Club</title>
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-md">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-navicon" style="color:#333333; font-size:28px;"></i>
                    
                </span>
            </button>
            <div class="d-md-none header2">
                Visual Bloggers' Club &nbsp;
                <img src="img_2020/logo.png" height="30" width="30" alt="VBC Logo">
            </div>
            
            <a class="navbar-brand mr-auto" href="#"></a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link navbar-heading" href="#">
                            <img src="img/logo.png" height="30" width="30" alt="VBC Logo">
                            &nbsp;
                            Visual Bloggers' Club
                        </a>
                    </li>
                </ul>

                <span class="nav-item">
                    <ul class="navbar-nav mr-auto">
                        <?php if(!isset($_SESSION['user'])){?>
                        <li class="nav-item"><a class="nav-link" href="/signinv2.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="/registerv2.php">Register</a></li>
                        <?php } else{?>
                        <li class="nav-item"><a class="nav-link" href="/dashboardv2.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logoutv2.php">Logout</a></li>
                        <?php }?>
                    </ul>
                </span>
            </div>
        </div>
    </nav>
    
    <!--BLOGGER (left)-->
    <div class="blogger d-none d-md-block fadeIn a1">
        <div class="container custom2">
            <div class="row">
                <div class="col-12 col-md-5 offset-md-1">
                    <p class="grey-pretext">FIND LIKE MINDED INDIVIDUALS</p>
                    <p class="merri">For the blogger in you.</p>
                    <p>
                        <a href="#">
                            <button type="submit" class="btn text-white black-bg">
                                &nbsp;Join us&nbsp;
                            </button>
                        </a>
                    </p>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <img src="img/index/1.jpeg" alt="blogger" height="500" class="img-fluid d-block">
                </div>
            </div>
            
        </div>
    </div>
    <div class="blogger-small d-md-none">
        <div class="container custom2">
            <div class="row">
                <div class="col-10 offset-1">
                    <p class="grey-pretext">FIND LIKE MINDED INDIVIDUALS</p>
                    <p class="merri-small">For the blogger in you.</p>
                    <p>
                        <a href="#">
                            <button type="submit" class="btn text-white black-bg">
                                &nbsp;Join us&nbsp;
                            </button>
                        </a>
                    </p>
                </div>
                <div class="col-10 offset-1">
                    <img src="img/index/1.jpeg" alt="blogger" height="500" class="img-fluid d-block">
                </div>
            </div> 
        </div>
    </div>

    <!--EVENTS (right)-->
    <div class="events d-none d-md-block fadeIn a1">
        <div class="container custom2">
            <div class="row">
                <div class="col-12 col-md-5 offset-md-1">
                    <img src="img/index/2.jpeg" alt="events" height="500" class="img-fluid d-block">
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <p class="grey-pretext">LEARN THE SKILL THAT'S HIGH IN DEMAND</p>
                    <p class="merri">A to Z of blogging, we know it all.</p>
                    <p>
                        <a href="#">
                            <button type="submit" class="btn text-white black-bg">
                                &nbsp;Our events&nbsp;
                            </button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="events-small d-md-none">
        <div class="container custom2">
            <div class="row">
                <div class="col-10 offset-1">
                    <p class="grey-pretext">LEARN THE SKILL THAT'S HIGH IN DEMAND</p>
                    <p class="merri-small">A to Z of blogging, we know it all.</p>
                    <p>
                        <a href="#">
                            <button type="submit" class="btn text-white black-bg">
                                &nbsp;Our events&nbsp;
                            </button>
                        </a>
                    </p>
                </div>
                <div class="col-10 offset-1">
                    <img src="img/index/2.jpeg" alt="events" height="500" class="img-fluid d-block">
                </div>
            </div>
        </div>
    </div>

    <!--EXPLORE (left)-->
    <div class="explore d-none d-md-block fadeIn a1">
        <div class="container custom2">
            <div class="row">
                <div class="col-12 col-md-5 offset-md-1">
                    <p class="grey-pretext">100% ORIGINAL BLOGS</p>
                    <p class="merri">Creatively curated content.</p>
                    <p>
                        <a href="/blogpagev2.php">
                            <button type="submit" class="btn text-white black-bg">
                                &nbsp;Explore&nbsp;
                            </button>
                        </a>
                    </p>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <img src="img/index/3.jpeg" alt="explore" height="500" class="img-fluid d-block">
                </div>
            </div>
            
        </div>
    </div>
    <div class="explore-small d-md-none">
        <div class="container custom2">
            <div class="row">
                <div class="col-10 offset-1">
                    <p class="grey-pretext">100% ORIGINAL BLOGS</p>
                    <p class="merri-small">Creatively curated content.</p>
                    <p>
                        <a href="/blogpagev2.php">
                            <button type="submit" class="btn text-white black-bg">
                                &nbsp;Explore&nbsp;
                            </button>
                        </a>
                    </p>
                </div>
                <div class="col-10 offset-1">
                    <img src="img/index/3.jpeg" alt="explore" height="500" class="img-fluid d-block">
                </div>
            </div> 
        </div>
    </div>

    <!--TEAM (right)-->
    <div class="team d-none d-md-block fadeIn a1">
        <div class="container custom2">
            <div class="row">
                <div class="col-12 col-md-5 offset-md-1">
                    <img src="img/index/4.png" alt="team" height="500" class="img-fluid d-block">
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <p class="grey-pretext">VARIOUS DOMAINS</p>
                    <p class="merri">Coalesce for the end product.</p>
                    <p>
                        <a href="#">
                            <button type="submit" class="btn text-white black-bg">
                                &nbsp;About us&nbsp;
                            </button>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="team-small d-md-none">
        <div class="container custom2">
            <div class="row">
                <div class="col-10 offset-1">
                    <p class="grey-pretext">VARIOUS DOMAINS</p>
                    <p class="merri-small">Coalesce for the end product.</p>
                    <p>
                        <a href="#">
                            <button type="submit" class="btn text-white black-bg">
                                &nbsp;About us&nbsp;
                            </button>
                        </a>
                    </p>
                </div>
                <div class="col-10 offset-1">
                    <img src="img/index/4.png" alt="team" height="500" class="img-fluid d-block">
                </div>
            </div>
        </div>
    </div>

    <footer class="footer1">
        <div class="row">
            <div class="col-12 col-md-3 m-5 d-none d-md-block text-center">
                <img src="img_2020/logo.png" height="160" width="150" alt="VBC" class="float-right img-fluid d-block">
            </div>
            <div class="col-12 col-md-4 my-auto text-center">
                <h1>
                    <big><big>Visual Bloggers' Club</big></big>
                </h1>
            </div>
            <div class="col-12 col-md-4 my-auto custom1 d-none d-md-block">
                <h3>Connect with us</h3><br>
                    <a href="https://www.facebook.com/vbcvit" target="_blank"><i class="fa fa-facebook fa-lg fa2"></i></a>
                    <a href="https://twitter.com/vbcvit" target="_blank"><i class="fa fa-twitter fa-lg fa2"></i></a>
                    <a href="https://www.linkedin.com/company/visual-bloggers-club-vbc-vit/" target="_blank"><i class="fa fa-linkedin fa-lg fa2"></i></a>
                    <a href="http://instagram.com/vbc_vit" target="_blank"><i class="fa fa-instagram fa-lg fa2"></i></a>
            </div>
            <div class="col-12 col-md-4 my-auto custom1 d-md-none text-center">
                    <a href="https://www.facebook.com/vbcvit" target="_blank"><i class="fa fa-facebook fa-lg fa2"></i></a>
                    <a href="https://twitter.com/vbcvit" target="_blank"><i class="fa fa-twitter fa-lg fa2"></i></a>
                    <a href="https://www.linkedin.com/company/visual-bloggers-club-vbc-vit/" target="_blank"><i class="fa fa-linkedin fa-lg fa2"></i></a>
                    <a href="http://instagram.com/vbc_vit" target="_blank"><i class="fa fa-instagram fa-lg fa2"></i></a>
            </div>

        </div>
        <div class="row row-content custom1 text-center pb-3">
            <div class="col-12 text-center">
                Made with <i class="fa fa-heart"></i> in VIT
            </div>
        </div> 
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>