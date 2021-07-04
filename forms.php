<?php 
    session_start();
    
    require_once "config.php";
    
    if(isset($_SESSION['get_id'])){
        $get_id = $_SESSION["get_id"];
        $id = $get_id;
    }
    else{
        $_SESSION["get_id"] = $_GET['id'];
        $id = $_SESSION["get_id"];
    }
    
    $query="SELECT * from events where event_id='$id' AND delete_e ='No';";
    $result=mysqli_query($link,$query) or die(mysqli_error($link));
    $row = mysqli_fetch_array($result);
    
    if($row["registrations"] == "No"){
        header("location: events");
    }
    
    $questions = explode(",",$row["questions"]);
    $questions_count = count($questions);
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $form_name = $row["form_name"];
    
        $i = 0;
        foreach ($_POST as $key => $value) {
    
            if($i == 0){
    
                $insert_query="INSERT INTO $form_name (q$i) VALUES ('$value')";
                
                if (mysqli_query($link, $insert_query)) {
                    $insert_success = "yes";
                } else {
                    echo "Error: " . $sql . "" . mysqli_error($link);
                    $insert_success = "no";
                }
                
                $my_submit_id = mysqli_insert_id($link);
            }
            else{
    
                $update_query="UPDATE $form_name SET q$i='$value' WHERE form_id=$my_submit_id;";
                
                if (mysqli_query($link, $update_query)) {
                    echo "";
                    $insert_success = "yes";
                } else {
                    echo "Error: " . $sql . "" . mysqli_error($link);
                    $insert_success = "no";
                }
            }
            $i++;
        }
        
        if($insert_success == "yes"){
            $_SESSION['message'] = "Registered for the event successfully";
            unset($_SESSION['get_id']);
            header("location: events");
        }
        elseif($insert_success == "no"){
            $_SESSION['message'] = "We are facing some issues. Try again later.";
            unset($_SESSION['get_id']);
            header("location: events");
        }
    
    }  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <link rel="stylesheet" href="css/about.css">
        <link rel="stylesheet" href="css/events.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/forms.css">
        <title><?php echo $row["event_name"]; ?> - Form</title>
    </head>
    <body>
        <div id="start">
            <div id="layout">
                <div>
                    <?php include 'navbar.php' ?>
                    <div class="about_container " style="overflow: hidden scroll;">
                        <div class="about_content">
                            <div class="about_header main_container">
                                <h2 class="title" style="text-align: center; padding-top: 13px"><?php echo $row['event_name']; ?></h2>
                                <div class="about_description">
                                    <p>Date: <?php echo $row['time']; ?></p>
                                    <p>TIme: <?php echo $row['time']; ?></p>
                                    <p>Venue: <?php echo $row['venue']; ?></p>
                                    <p></p>
                                    <br>
                                    <p>All the questions below are compulsory. Strict action will be taken for any kind of abuse.</p>
                                </div>
                            </div>
                            <div class="about_header main_container">
                                <div class="about_description">
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                                        <?php for($i=0;$i<$questions_count;$i++) {?>
                                        <div class="form_item">
                                            <label class="form_input">
                                                <p class="label-helper" for="name">Q<?php echo $i+1; ?>) <?php echo $questions[$i]; ?></p>
                                                <input required name="q<?php echo $i; ?>" autocomplete="off" type="text" class="form_input_field"/>
                                            </label>
                                        </div>
                                        <?php } ?>
                                        <div class="form_item" style="display: none">
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