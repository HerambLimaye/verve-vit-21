<?php
    session_start();
    
    require_once "config.php";
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login");
        exit;
    }
    $user_id = $_SESSION["id"];
    
    $query="SELECT * FROM events WHERE user_id = $user_id ORDER BY event_id DESC";
    $result=mysqli_query($link,$query) or die(mysqli_error($link));
    $i=1;  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/about.css">
        <link rel="stylesheet" href="css/events.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <style>
            *{
            font-family:Gotham Pro,sans-serif;
            }
        </style>
        <title>My Events - <?php echo $_SESSION["username"]; ?></title>
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
                    <div class="about_container " style="overflow: hidden scroll;">
                        <div class="about_content">
                            <div class="about_header main_container">
                                <div class="about_header main_container">
                                    <h2 class="title" style="text-align: center;">My Events</h2>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Event Id</th>
                                                    <th scope="col">Event Name</th>
                                                    <th scope="col">Responses</th>
                                                    <th scope="col">Registration form status</th>
                                                    <th scope="col">Registrations</th>
                                                    <th scope="col">Update</th>
                                                    <th scope="col">Delete/Restore</th>
                                                    <th scope="col">Delete Permanently</th>
                                                </tr>
                                            </thead>
                                            <?php while($row = mysqli_fetch_array($result)){ 
                                                if($row["registrations"] == "Yes"){
                                                      $url_id = "No";
                                                      $status = "Accepting";
                                                      $btn_value = "Stop Accepting";
                                                  }
                                                  elseif($row["registrations"] == "No"){
                                                      $url_id = "Yes";
                                                      $status = "Not Accepting";
                                                      $btn_value = "Start Accepting";
                                                  }
                                                
                                                  if($row["delete_e"] == "Yes"){
                                                      $urlD = "No";
                                                      $btn_value_D = "Restore";
                                                  }
                                                  elseif($row["delete_e"] == "No"){
                                                      $urlD = "Yes";
                                                      $btn_value_D = "Delete";
                                                  }
                                                  ?>
                                            <tbody>
                                                <th scope="row"><?php echo $row["event_id"]; ?></th>
                                                <td><?php echo $row["event_name"]; ?></td>
                                                <td>
                                                    <a class="white" href="view-registrations?id=<?php echo ($row["event_id"]); ?>">
                                                        <p><span class="bg"></span><span class="base"></span><span class="text">View</span></p>
                                                    </a>
                                                </td>
                                                <td><?php echo $status; ?></td>
                                                <td>
                                                    <a class="white" href="close-registrations?id=<?php echo ($row["event_id"]); ?>&value=<?php echo ($url_id); ?>">
                                                        <p><span class="bg"></span><span class="base"></span><span class="text"><?php echo ($btn_value); ?></span></p>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="white" href="update-event?id=<?php echo ($row["event_id"]); ?>">
                                                        <p><span class="bg"></span><span class="base"></span><span class="text">Update</span></p>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="white" href="delete-event?id=<?php echo ($row["event_id"]); ?>&valued=<?php echo ($urlD); ?>">
                                                        <p><span class="bg"></span><span class="base"></span><span class="text"><?php echo ($btn_value_D); ?></span></p>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="white" href="delete-permanently?id=<?php echo ($row["event_id"]); ?>">
                                                        <p><span class="bg"></span><span class="base"></span><span class="text">Delete Permanently</span></p>
                                                    </a>
                                                </td>
                                            </tbody>
                                            <?php $i++; } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cursor"></div>
        <?php include 'loader.php' ?>
        <?php 
            if(isset($_SESSION['message'])){
                $message = $_SESSION["message"];
                echo "<script>alert('$message');</script>";
                unset($_SESSION['message']);
            }
            ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>