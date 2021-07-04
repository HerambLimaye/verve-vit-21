<?php
    session_start();
    $id=$_GET['id'];
    
    unset($_SESSION['get_id']);
    
    require_once "config.php";
    
    $query="SELECT * from events where event_id='$id' AND delete_e='No';";
    $result=mysqli_query($link,$query) or die(mysqli_error($link));
    $row = mysqli_fetch_array($result);
    
    if($row["registrations"] == "Yes"){
    
        $url = "forms?id=".$row['event_id'];
        $btn = '<a  style="cursor: pointer;" class="white" onclick=location.href="'.$url.'"><p><span class="bg"></span><span class="base"></span><span class="text">Register</span></p></a>';
    }
    elseif($row["registrations"] == "No"){
        
        $url = "#";
        $register_err = "Registrations Closed.";
        $btn = '<a style="cursor: pointer;" class="white" href='.$url.'><p><span class="bg"></span><span class="base"></span><span class="text">Register</span></p></a>';
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/about.css">
        <link rel="stylesheet" href="css/events.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/contact.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <title><?php echo $row["event_name"]; ?></title>
    </head>
    <body>
        <div id="start">
            <div id="layout">
                <div>
                    <?php include 'navbar.php' ?>
                    <div class="about_container " style="overflow: hidden scroll;">
                        <div class="about_content">
                            <div class="about_header main_container" style="display: flex; align-items: center; justify-content: center;">
                                <img class="banner" style="width: 500px; height: 700px;" src="images/event_posters/<?php echo $row['event_poster'];?>">
                            </div>
                            <div class="about_header main_container">
                                <h1 class="about_title"><?php echo $row["event_name"]; ?></h1>
                                <div class="about_description">
                                    <p>Date: <?php echo $row["date_of_event"]; ?></p>
                                    <p>Time: <?php echo $row["time"]; ?></p>
                                    <p>Venue: <?php echo $row["venue"]; ?></p>
                                </div>
                            </div>
                            <div class="about_header main_container">
                                <div class="about_description">
                                    <p style="font-size: 40px; font-weight: 800; margin: 10px 0;">Description</p>
                                </div>
                                <div class="about_description">
                                    <p><?php echo $row["description"]; ?></p>
                                </div>
                            </div>
                            <div class="about_header main_container">
                                <div class="about_description">
                                    <p style="font-size: 40px; font-weight: 800; margin: 10px 0;">Contact</p>
                                </div>
                                <div class="about_description">
                                    <?php
                                        $contact_numbers=explode(",",$row["contact_numbers"]);
                                        for($i=0;$i<count($contact_numbers);$i++){
                                        ?>
                                    <p><?php echo $contact_numbers[$i]; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="about_header main_container">
                                <div class="contentFooter__likeTitle" style="display: flex; align-items: center; justify-content: center;">Interested?</div>
                                <div class="contentFooter__buttons" style="display: flex; align-items: center; justify-content: center;">
                                    <div class="form_item " <?php echo (!empty($register_err)) ? 'has-error' : ''; ?>>
                                        <?php echo $btn; ?>
                                        <p class="form_input_field--error"><?php echo $register_err; ?></p>
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
        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>