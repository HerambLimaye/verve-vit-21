<?php
    session_start();
     
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login");
        exit;
    }
     
    require_once "config.php";
     
    $new_password = $confirm_password = "";
    $new_password_err = $confirm_password_err = "";
     
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
        if(empty(trim($_POST["new_password"]))){
            $new_password_err = "Please enter the new password.";     
        } elseif(strlen(trim($_POST["new_password"])) < 6){
            $new_password_err = "Password must have atleast 6 characters.";
        } else{
            $new_password = trim($_POST["new_password"]);
        }
        
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm the password.";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($new_password_err) && ($new_password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }
            
        if(empty($new_password_err) && empty($confirm_password_err)){
            $sql = "UPDATE users SET password = ? WHERE id = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
                
                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                $param_id = $_SESSION["id"];
                
                if(mysqli_stmt_execute($stmt)){
                    session_destroy();
                    header("location: login");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                mysqli_stmt_close($stmt);
            }
        }
        
        mysqli_close($link);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/contact.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <title>Reset Password - <?php echo $_SESSION['username']; ?></title>
    </head>
    <body>
        <div id="start">
            <div id="layout">
                <div>
                    <nav class="Nav Nav--shadow Nav--fixed">
                    </nav>
                    <button class="hamburger" id="hamburger-open" style="display: block; z-index: 9999;">
                    <span class="hamburger_icon">
                    <span class="hamburger_line" style="background-color: #000;"></span>
                    <span class="hamburger_line" style="background-color: #000;"></span>
                    <span class="hamburger_line" style="background-color: #000;"></span>
                    </span>
                    </button>
                    <button class="hamburger" id="hamburger-close" style="display: none;  z-index: 99999999;">
                    <span class="hamburger_icon">
                    <span class="hamburger_line" style="top: 50%; background-color: #000; transform: translate(0%, -50%) matrix(0.7071, -0.7071, 0.7071, 0.7071, 0, 0);"></span>
                    <span class="hamburger_line" style="background-color: #000; opacity: 0;"></span>
                    <span class="hamburger_line" style="bottom: 50%; background-color: #000; transform: translate(0%, 50%) matrix(0.7071, 0.7071, -0.7071, 0.7071, 0, 0);"></span>
                    </span>
                    </button>
                    <input type="checkbox" id="main-navigation-toggle" class="btn btn--close" title="Toggle main navigation" />
                    <label for="main-navigation-toggle" style="display: none;"><span></span></label>
                    <nav id="main-navigation" class="nav-main">
                        <ul class="menu">
                            <li class="menu__item">
                                <a class="menu__link active" href="index">Home</a>
                            </li>
                            <li class="menu__item">
                                <a class="menu__link" href="events">Events</a>
                                <!-- <ul class="submenu">
                                    <li class="menu__item">
                                        <a class="menu__link" href="#0">E1</a>
                                    </li>
                                    <li class="menu__item">
                                        <a class="menu__link" href="#0">E2</a>
                                    </li>
                                    <li class="menu__item">
                                        <a class="menu__link" href="#0">E3</a>
                                    </li>
                                    </ul>
                                    </li> -->
                            <li class="menu__item">
                                <a class="menu__link" href="welcome">Add an Event</a>
                            </li>
                            <li class="menu__item">
                                <a class="menu__link" href="my-events">My Events</a>
                            </li>
                            <li class="menu__item">
                                <a class="menu__link" href="reset-password">Reset Your Password</a>
                            </li>
                            <li class="menu__item">
                                <a class="menu__link" href="logout">Logout</a>
                            </li>
                        </ul>
                    </nav>
                    <a class="logo" href="index">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2445.000000 493.000000">
                            <g transform="translate(0.000000,493.000000) scale(0.100000,-0.100000)"
                                fill="#000" stroke="none">
                                <path d="M112 4811 c-23 -33 -42 -63 -42 -68 0 -4 425 -1065 944 -2358 l943
                                    -2350 510 -3 c403 -2 512 0 516 10 3 7 428 1068 946 2357 l941 2344 -41 64
                                    -41 63 -578 0 -578 0 -114 -307 c-63 -170 -321 -865 -573 -1545 -253 -680
                                    -462 -1235 -465 -1232 -3 3 -262 697 -576 1542 l-570 1537 -591 3 -590 2 -41
                                    -59z"/>
                                <path d="M5787 4822 l-47 -48 0 -2315 0 -2315 43 -42 43 -42 1760 0 1760 0 47
                                    48 47 48 0 450 0 450 -43 42 -43 42 -1214 2 -1215 3 0 395 0 395 1045 3 1044
                                    2 48 47 48 47 0 446 0 446 -48 47 -48 47 -1044 2 -1045 3 -3 378 -2 377 1197
                                    0 1197 0 43 42 43 42 0 462 0 461 -45 42 -45 41 -1738 0 -1738 0 -47 -48z"/>
                                <path d="M10538 4823 l-48 -49 0 -2315 0 -2315 43 -42 43 -42 509 0 509 0 43
                                    42 43 42 0 698 0 698 328 0 327 0 500 -738 500 -737 620 -3 621 -2 32 65 c18
                                    36 32 70 32 75 0 9 -808 1198 -1007 1482 l-54 77 83 42 c463 231 721 559 825
                                    1048 25 118 27 143 28 381 0 202 -4 275 -18 350 -133 719 -639 1158 -1460
                                    1267 -104 13 -290 16 -1287 20 l-1165 4 -47 -48z m2340 -1081 c159 -42 282
                                    -120 351 -222 118 -177 115 -472 -6 -648 -88 -129 -233 -212 -423 -242 -38 -6
                                    -281 -10 -592 -10 l-528 0 0 576 0 575 558 -4 c534 -3 560 -4 640 -25z"/>
                                <path d="M15112 4811 c-23 -33 -42 -63 -42 -68 0 -4 425 -1065 944 -2358 l943
                                    -2350 510 -3 c403 -2 512 0 516 10 3 7 428 1068 946 2357 l941 2344 -41 64
                                    -41 63 -578 0 -578 0 -114 -307 c-63 -170 -321 -865 -573 -1545 -253 -680
                                    -462 -1235 -465 -1232 -3 3 -262 697 -576 1542 l-570 1537 -591 3 -590 2 -41
                                    -59z"/>
                                <path d="M20797 4822 l-47 -48 0 -2315 0 -2315 43 -42 43 -42 1760 0 1760 0
                                    47 48 47 48 0 450 0 450 -43 42 -43 42 -1214 2 -1215 3 0 395 0 395 1045 3
                                    1044 2 48 47 48 47 0 446 0 446 -48 47 -48 47 -1044 2 -1045 3 -3 378 -2 377
                                    1197 0 1197 0 43 42 43 42 0 462 0 461 -45 42 -45 41 -1738 0 -1738 0 -47 -48z"/>
                            </g>
                        </svg>
                    </a>
                    <section class="container">
                        <div class="inner_container">
                            <div class="content">
                                <h2 class="title">Reset Your Password</h2>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                                    <div class="form_item" <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>>
                                        <label class="form_input">
                                            <input placeholder="Password" name="new_password" autocomplete="off" type="password" class="form_input_field"/>
                                            <p class="form_input_field--error"><?php echo $new_password_err; ?></p>
                                        </label>
                                    </div>
                                    <div class="form_item" <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>>
                                        <label class="form_input">
                                            <input placeholder="Confirm Password" name="confirm_password" autocomplete="off" type="password" class="form_input_field"/>
                                            <p class="form_input_field--error"><?php echo $confirm_password_err; ?></p>
                                        </label>
                                    </div>
                                    <div class="form_item" style="display:none">
                                        <label class="form_input">
                                        <input id="submit" type="submit" class="form_input_field"/>
                                        </label>
                                    </div>
                                    <div class="form_item ">
                                        <a class="white" href="#">
                                            <p><span class="bg"></span><span class="base"></span><span class="text">Submit</span></p>
                                        </a>
                                    </div>
                                </form>
                            </div>
                            <div class="contacts">
                                <div class="contact_item contact_item--email">
                                    <div class="contact_title">Write us</div>
                                    <a href="mailto:technicalcouncil.vit@gmail.com" class="contact_link"><span>technicalcouncil.vit@gmail.com</span></a>
                                </div>
                                <div class="contact_item">
                                    <h3 class="contact_title">Where find us:</h3>
                                    <a href="https://goo.gl/maps/zmsYgRTfS37cyx1r6" class="contact_link" target="_blank"><span>Vidyalankar Institute of Technology, Mumbai</span></a>
                                </div>
                                <div class="contact_socials">
                                    <a href="#" target="_blank" class="socialLink social_item">
                                        <svg class="icon">
                                            <path d="M23.44 4.5h-6.88a7.06 7.06 0 0 0-7.06 7.06v6.88a7.07 7.07 0 0 0 7.06 7.06h6.88a7.06 7.06 0 0 0 7.06-7.06v-6.88a7.07 7.07 0 0 0-7.06-7.06zm2.29 5.94a1.18 1.18 0 0 1 0-2.35 1.18 1.18 0 0 1 1.18 1.18 1.17 1.17 0 0 1-1.18 1.17zM24.4 15a4.41 4.41 0 1 1-4.4-4.4 4.4 4.4 0 0 1 4.4 4.4z"/>
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" class="socialLink social_item">
                                        <svg class="icon" viewBox="-21 -117 682.66672 682" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m626.8125 64.035156c-7.375-27.417968-28.992188-49.03125-56.40625-56.414062-50.082031-13.703125-250.414062-13.703125-250.414062-13.703125s-200.324219 0-250.40625 13.183593c-26.886719 7.375-49.03125 29.519532-56.40625 56.933594-13.179688 50.078125-13.179688 153.933594-13.179688 153.933594s0 104.378906 13.179688 153.933594c7.382812 27.414062 28.992187 49.027344 56.410156 56.410156 50.605468 13.707031 250.410156 13.707031 250.410156 13.707031s200.324219 0 250.40625-13.183593c27.417969-7.378907 49.03125-28.992188 56.414062-56.40625 13.175782-50.082032 13.175782-153.933594 13.175782-153.933594s.527344-104.382813-13.183594-154.460938zm-370.601562 249.878906v-191.890624l166.585937 95.945312zm0 0"/>
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" class="socialLink social_item">
                                        <svg class="icon" id="Bold" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/>
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" class="socialLink social_item">
                                        <svg data-symbol="icon-twitter" class="icon">
                                            <path d="M33.5 7a10.1 10.1 0 0 1-2.94.84 5.39 5.39 0 0 0 2.25-2.93 10.34 10.34 0 0 1-3.26 1.29 5 5 0 0 0-3.74-1.7 5.22 5.22 0 0 0-5.13 5.3 5.47 5.47 0 0 0 .13 1.2 14.4 14.4 0 0 1-10.57-5.53 5.44 5.44 0 0 0 1.59 7.08 5 5 0 0 1-2.32-.67V12a5.27 5.27 0 0 0 4.11 5.2 5.16 5.16 0 0 1-1.35.18 4.5 4.5 0 0 1-1-.1 5.18 5.18 0 0 0 4.79 3.69 10.12 10.12 0 0 1-6.37 2.26 10 10 0 0 1-1.22-.07 14.11 14.11 0 0 0 7.86 2.39C25.8 25.5 31 17.42 31 10.41v-.69A10.16 10.16 0 0 0 33.5 7z"></path>
                                        </svg>
                                    </a>
                                    <a href="#" target="_blank" class="socialLink social_item">
                                        <svg id="Bold" class="icon" enable-background="new 0 0 24 24" viewBox="0 0 24 24"xmlns="http://www.w3.org/2000/svg">
                                            <path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"/>
                                            <path d="m.396 7.977h4.976v16.023h-4.976z"/>
                                            <path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="cursor"></div>
        <?php include 'loader.php' ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>