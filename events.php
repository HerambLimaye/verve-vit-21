<?php
    session_start();
    
    require_once "config.php";
    
    $query1="SELECT * FROM events WHERE delete_e = 'No' ORDER BY event_id DESC;";
    $result=mysqli_query($link,$query1) or die(mysqli_error($link));
    
    $disquery="SELECT DISTINCT council FROM events WHERE delete_e = 'No';";
    $disresult=mysqli_query($link,$disquery) or die(mysqli_error($link));
    
    $rowcount=mysqli_num_rows($result);  
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/socials.css">
        <link rel="stylesheet" href="css/glimpses.css">
        <link rel="stylesheet" href="css/events.css">
        <title>Events</title>
    </head>
    <body>
        <div id="start">
            <div id="layout">
                <div>
                    <?php include 'navbar.php' ?>
                    <div class="events">
                        <div class="events_sort">
                            <div class="events_sort_head">
                                <div class="events_sort_title">Filter</div>
                                <button type="button" class="events_sort_close"></button>
                            </div>
                            <div class="events_sort_content">
                                <div>
                                    <div class="events_sort_inner" style="overflow: hidden;">
                                        <div class="events_sorter events_sorter--active">
                                            <a href="#all" data-filter="all" class="events_sorter_header">
                                                <div class="sort_title"><span>All Events</span></div>
                                                <div class="sort_plus"></div>
                                            </a>
                                        </div>
                                        <?php while($row = mysqli_fetch_array($disresult)){ ?>
                                        <?php
                                            if($row["council"] == "Technical Council"){
                                                $code = "tech";
                                            }
                                            elseif($row["council"] == "Literary Council") {
                                                $code = "lit";
                                            }
                                            elseif($row["council"] == "Cultural Council") {
                                                $code = "cult";
                                            }
                                            elseif($row["council"] == "Sports Council") {
                                                $code = "sports";
                                            }
                                            elseif($row["council"] == "Creative Council") {
                                                $code = "crtv";
                                            }
                                            elseif($row["council"] == "Sponsorship Council") {
                                                $code = "spons";
                                            }
                                            elseif($row["council"] == "VCC Council") {
                                                $code = "vcc";
                                            }
                                            elseif($row["council"] == "Publicity Council") {
                                                $code = "pub";
                                            }
                                            elseif($row["council"] == "Documentation Council") {
                                                $code = "docs";
                                            }
                                            ?>
                                        <div class="events_sorter">
                                            <a href="#<?php echo $code; ?>" data-filter="<?php echo $code; ?>" class="events_sorter_header">
                                                <div class="sort_title"><span><?php echo $row["council"]; ?> Events</span></div>
                                                <div class="sort_plus"></div>
                                            </a>
                                        </div>
                                        <?php } ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="events_list">
                            <div>
                                <?php if($rowcount == 0){ ?>
                                <div class="event_item" style="background-color: #ffffff; width: 100%; height:90vh;">
                                    <a onclick="#" class="event_item_link"></a>
                                    <div class="event_item_container" style="background-color: #ffffff; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url()">
                                        <div class="event_item_inner">
                                            <div class="event_item_head">
                                                <div class="event_item_subtitle"><span style="color: #000">It's empty in here for now :(<br>We will be back with some great events soon..</span></div>
                                            </div>
                                            <div class="event_item_float"></div>
                                            <div class="event_item_foot">
                                                <ul class="event_item_details" >
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                    ?>
                                <?php while($row = mysqli_fetch_array($result)){ ?>
                                <?php
                                    if($row["council"] == "Technical Council"){
                                                $code = "tech";
                                            }
                                            elseif($row["council"] == "Literary Council") {
                                                $code = "lit";
                                            }
                                            elseif($row["council"] == "Cultural Council") {
                                                $code = "cult";
                                            }
                                            elseif($row["council"] == "Sports Council") {
                                                $code = "sports";
                                            }
                                            elseif($row["council"] == "Creative Council") {
                                                $code = "crtv";
                                            }
                                            elseif($row["council"] == "Sponsorship Council") {
                                                $code = "spons";
                                            }
                                            elseif($row["council"] == "VCC Council") {
                                                $code = "vcc";
                                            }
                                            elseif($row["council"] == "Publicity Council") {
                                                $code = "pub";
                                            }
                                            elseif($row["council"] == "Documentation Council") {
                                                $code = "docs";
                                            }
                                    
                                            if($row["registrations"] == "Yes"){
                                                $value = "OPEN";
                                            }
                                            elseif($row["registrations"] == "No"){
                                                $value = "CLOSED";
                                            }
                                    ?>
                                <div class="event_item" data-color="<?php echo $code; ?>" style="background-color: #ffffff;">
                                    <?php $url = 'one?id='.$row['event_id']; ?> 
                                    <a onclick="location.href='<?php echo $url; ?>'" class="event_item_link"></a>
                                    <div class="event_item_container" style="background-color: #ffffff; height: 100%; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url(images/event_posters/<?php echo $row['event_poster']; ?>)">
                                        <div class="event_item_inner">
                                            <div class="event_item_head">
                                                <div class="event_item_title">An Event by <br><?php echo $row['council']; ?></div>
                                                <div class="event_item_subtitle"><span><?php echo $row['event_name']; ?></span></div>
                                            </div>
                                            <div class="event_item_float">REGISTRATIONS<br><?php echo $value; ?></div>
                                            <div class="event_item_foot">
                                                <ul class="event_item_details" >
                                                    <li><?php echo $row['date_of_event']; ?></li>
                                                    <br>
                                                    <li><?php echo $row['time']; ?></li>
                                                    <br>
                                                    <li><?php echo $row['venue']; ?></li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="overlay"></div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="events_sortbtn">
                            <div class="events_sortbtn_bg"></div>
                            <svg >
                                <path fill="#fff" d="M9.082 16.469l-1.818 1.734V9.471L.828.889h18.344L12.468 9.47v4.323l-1.818 1.629V8.8l4.705-6.022H4.611l4.471 6.031v7.66z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cursor"></div>
        <?php 
            if(isset($_SESSION['message'])){
                $message = $_SESSION["message"];
            
                echo "<script>alert('$message');</script>";
                unset($_SESSION['message']);
            }
            ?>
        <?php include 'loader.php' ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </body>
</html>