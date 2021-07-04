<?php
    session_start();
    
    require_once "config.php";
    
    $name_err = $email_err = $phone_err = $message_err = "";
    $name = $email = $phone = $message = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(empty(trim($_POST["name"]))){
            $name_err = "Please enter your Name.";
        }else{
            $name = trim($_POST["name"]);
        }
    
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter your Email.";
        } else{
            $email = trim($_POST["email"]);
        }
    
        if(empty(trim($_POST["phone"]))){
            $phone_err = "Please enter your Phone Number.";
        }else{
            $phone = trim($_POST["phone"]);
        }
    
        if(empty(trim($_POST["message"]))){
            $message_err = "Please enter your Message.";
        } else{
            $message = trim($_POST["message"]);
        }
    
            
            $query="INSERT INTO `contact`(`name`, `email`, `phone`, `message`) VALUES ('$name', '$email' ,'$phone', '$message');";
    
            if(mysqli_query($link, $query)){
    
                $to = $email;
                $subject = "Thanks for contacting verve-vit.in" ;
    
                $txt = '<div style="background-color: #e6e6e6 margin: 0; padding: 0"> <div style=" background: #000000; background-color: #000000; margin: 0px auto; max-width: 600px; " > <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #000000; background-color: #000000; width: 100%" > <tbody> <tr> <td style=" direction: ltr; font-size: 0px; padding: 5px 0px 5px 0px; text-align: center; vertical-align: top; " > <div class="mj-column-per-100 outlook-group-fix" style=" font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; " > <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%" > <tr> <td align="center" style=" font-size: 0px; padding: 0px 0px 0px 0px; word-break: break-word; " > <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse: collapse; border-spacing: 0px" > <tbody> <tr> <td style="width: 180px"> <img height="auto" src="https://s3-eu-west-1.amazonaws.com/topolio/uploads/60252fb436b6d/1613049868.jpg" style=" border: 0; display: block; outline: none; text-decoration: none; height: auto; width: 100%; font-size: 13px; " width="180" /> </td> </tr> </tbody> </table> </td> </tr> </table> </div> </td> </tr> </tbody> </table> </div> <div style=" background: #000000; background-color: #000000; margin: 0px auto; max-width: 600px; " > <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #000000; background-color: #000000; width: 100%" > <tbody> <tr> <td style=" direction: ltr; font-size: 0px; padding: 9px 0px 9px 0px; text-align: center; vertical-align: top; " > <div class="mj-column-per-100 outlook-group-fix" style=" font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; " > <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%" > <tr> <td align="left" style=" font-size: 0px; padding: 15px 15px 15px 15px; word-break: break-word; " > <div style=" font-family: Ubuntu, Helvetica, Arial, sans-serif; font-size: 11px; line-height: 1.5; text-align: left; color: #000000; " > <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 22px; " >Hello '.$name.',</span > </p> <p> </p> <p> <span style=" font-family: Helvetica, sans-serif; font-size: 22px; color: #ecf0f1; " >We have got your query. We will get back to you soon 😊.</span > </p> <p> </p> <p> <span style=" font-family: Helvetica, sans-serif; font-size: 22px; color: #ecf0f1; " >Regards,</span > </p> <p> <span style=" font-family: Helvetica, sans-serif; font-size: 22px; color: #ecf0f1; " >Student Council 2020-21💥</span > </p> </div> </td> </tr> </table> </div> </td> </tr> </tbody> </table> </div> <div style=" background: #000000; background-color: #000000; margin: 0px auto; max-width: 600px; " > <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #000000; background-color: #000000; width: 100%" > <tbody> <tr> <td style=" direction: ltr; font-size: 0px; padding: 0px 0px 0px 0px; text-align: center; vertical-align: top; " > <div class="mj-column-per-100 outlook-group-fix" style=" font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; " > <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%" > <tr> <td style=" font-size: 0px; padding: 10px 25px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 25px; word-break: break-word; " > <p style=" border-top: solid 2px #757575; font-size: 1; margin: 0px auto; width: 100%; " ></p> </td> </tr> <tr> <td align="center" style=" font-size: 0px; padding: 12px 12px 12px 12px; word-break: break-word; " > <div style=" font-family: Helvetica, sans-serif; font-size: 11px; line-height: 1.5; text-align: center; color: #000000; " > <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 17px; " ><strong >Copyright &copy; 2021, All rights reserved.</strong ></span > </p> <p> <span style="text-decoration: underline; font-size: 17px" ><span style="background-color: #000000" ><a style="background-color: #000000" href="https://www.instagram.com/technical_council.vit/?igshid=rr60ek35zzjs" ><span style=" color: #ffffff; font-family: Helvetica, sans-serif; text-decoration: underline; " ><span style="background-color: #000000" ><strong >Technical Student Council</strong ></span ></span ></a ></span ></span > </p> </div> </td> </tr> </table> </div> </td> </tr> </tbody> </table> </div> </div>';
    
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
                $headers .= 'From: me@me.com'. "\r\n";
    
                $headers .= 'Cc: danish@example.com, harshika@example.com' . "\r\n";
                $headers .= 'Bcc: gravit@example.com, saamiya@example.com, soham@example.com'. "\r\n";
    
                mail($to, $subject, $txt, $headers);
    
                $to_council = "danish, harshika";
                $council_subject = "Query from ".$name;
    
                $council_txt = '<div style="background-color: #e6e6e6; margin: 0; padding: 0"> <div style=" background: #000000; background-color: #000000; margin: 0px auto; max-width: 600px; " > <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #000000; background-color: #000000; width: 100%" > <tbody> <tr> <td style=" direction: ltr; font-size: 0px; padding: 5px 0px 5px 0px; text-align: center; vertical-align: top; " > <div class="mj-column-per-100 outlook-group-fix" style=" font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; " > <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%" > <tr> <td align="center" style=" font-size: 0px; padding: 0px 0px 0px 0px; word-break: break-word; " > <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse: collapse; border-spacing: 0px" > <tbody> <tr> <td style="width: 180px"> <img height="auto" src="https://s3-eu-west-1.amazonaws.com/topolio/uploads/60252fb436b6d/1613049868.jpg" style=" border: 0; display: block; outline: none; text-decoration: none; height: auto; width: 100%; font-size: 13px; " width="180" /> </td> </tr> </tbody> </table> </td> </tr> </table> </div> </td> </tr> </tbody> </table> </div> <div style=" background: #000000; background-color: #000000; margin: 0px auto; max-width: 600px; " > <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #000000; background-color: #000000; width: 100%" > <tbody> <tr> <td style=" direction: ltr; font-size: 0px; padding: 9px 0px 9px 0px; text-align: center; vertical-align: top; " > <div class="mj-column-per-100 outlook-group-fix" style=" font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; " > <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%" > <tr> <td align="left" style=" font-size: 0px; padding: 15px 15px 15px 15px; word-break: break-word; " > <div style=" font-family: Ubuntu, Helvetica, Arial, sans-serif; font-size: 11px; line-height: 1.5; text-align: left; color: #000000; " > <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 22px; " >Hello Heads/Secretaries,</span > </p> <p> </p> <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 22px; " >We have recieved a query from </span > </p> <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 22px; " >Name: '.$name.'</span > </p> <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 22px; " >Message: '.$message.'</span > </p> <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 22px; " >Email: '.$email.'</span > </p> <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 22px; " >Phone Number: '.$phone.'</span > </p> <p> </p> <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 22px; " >Please get back to '.$name.' as soon as possible.</span > </p> <p> </p> <p> <span style=" font-family: Helvetica, sans-serif; font-size: 22px; color: #ecf0f1; " >Regards,</span > </p> <p> <span style=" font-family: Helvetica, sans-serif; font-size: 22px; color: #ecf0f1; " >Student Council 2020-21💥</span > </p> </div> </td> </tr> </table> </div> </td> </tr> </tbody> </table> </div> <div style=" background: #000000; background-color: #000000; margin: 0px auto; max-width: 600px; " > <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #000000; background-color: #000000; width: 100%" > <tbody> <tr> <td style=" direction: ltr; font-size: 0px; padding: 0px 0px 0px 0px; text-align: center; vertical-align: top; " > <div class="mj-column-per-100 outlook-group-fix" style=" font-size: 13px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; " > <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%" > <tr> <td style=" font-size: 0px; padding: 10px 25px; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 25px; word-break: break-word; " > <p style=" border-top: solid 2px #757575; font-size: 1; margin: 0px auto; width: 100%; " ></p> </td> </tr> <tr> <td align="center" style=" font-size: 0px; padding: 12px 12px 12px 12px; word-break: break-word; " > <div style=" font-family: Helvetica, sans-serif; font-size: 11px; line-height: 1.5; text-align: center; color: #000000; " > <p> <span style=" color: #ffffff; font-family: Helvetica, sans-serif; font-size: 17px; " ><strong >Copyright &copy; 2021, All rights reserved.</strong ></span > </p> <p> <span style="text-decoration: underline; font-size: 17px" ><span style="background-color: #000000" ><a style="background-color: #000000" href="https://www.instagram.com/technical_council.vit/?igshid=rr60ek35zzjs" ><span style=" color: #ffffff; font-family: Helvetica, sans-serif; text-decoration: underline; " ><span style="background-color: #000000" ><strong >Technical Student Council</strong ></span ></span ></a ></span ></span > </p> </div> </td> </tr> </table> </div> </td> </tr> </tbody> </table> </div> </div>';
    
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
                $headers .= 'From: me@me.com'. "\r\n";
    
                $headers .= 'Cc: gravit@example.com, saamiya@example.com' . "\r\n";
    
                mail($to_council, $council_subject, $council_txt, $headers);
    
                $_SESSION["contact_dtl"] = "We will contact you shortly :)";
                // header("location: contact-us");
    
            }
            else{
                $_SESSION["contact_dtl_no"] = "Query not registered, Please try again later :(";
                // header("location: contact-us");
    
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="css/contact.css">
        <title>Contact Us</title>
    </head>
    <body>
        <div id="start">
            <div id="layout">
                <div>
                    <?php include 'navbar.php' ?>
                    <section class="container">
                        <div class="inner_container">
                            <div class="content">
                                <h2 class="title">Contact Us</h2>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
                                    <div class="form_item">
                                        <label class="form_input"  <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>>
                                            <input placeholder="Name"  required name="name" autocomplete="off" type="text" class="form_input_field" />
                                            <p class="form_input_field--error"><?php echo $name_err; ?></p>
                                        </label>
                                    </div>
                                    <div class="form_item"  <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
                                        <label class="form_input">
                                            <input placeholder="E-mail"required  name="email" autocomplete="off" type="email" class="form_input_field" />
                                            <p class="form_input_field--error"><?php echo $email_err; ?></p>
                                        </label>
                                    </div>
                                    <div class="form_item"  <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>>
                                        <label class="form_input">
                                            <input placeholder="Phone"  required name="phone" autocomplete="off" type="tel" class="form_input_field" />
                                            <p class="form_input_field--error"><?php echo $phone_err; ?></p>
                                        </label>
                                    </div>
                                    <div class="form_item"  <?php echo (!empty($message_err)) ? 'has-error' : ''; ?>>
                                        <label class="form_input">
                                            <input placeholder="Message" required name="message" autocomplete="off" type="text" class="form_input_field" />
                                            <p class="form_input_field--error"><?php echo $message_err; ?></p>
                                        </label>
                                    </div>
                                    <div class="form_item" style="display: none">
                                        <label class="form_input">
                                        <input id="submit" type="submit" class="form_input_field"/>
                                        </label>
                                    </div>
                                    <div class="form_item ">
                                        <a class="white" href="#">
                                            <p><span class="bg"></span><span class="base"></span><span class="text">Contact</span></p>
                                        </a>
                                        <?php
                                            if(isset($_SESSION['contact_dtl_no'])){
                                                $message = $_SESSION["contact_dtl_no"];
                                                echo '<p class="form_input_field--error">'.$message.'</p>';
                                                unset($_SESSION['contact_dtl_no']);
                                            }
                                            elseif(isset($_SESSION['contact_dtl'])){
                                                $message = $_SESSION["contact_dtl"];
                                                echo '<p class="form_input_field--error" style="color: green">'.$message.'</p>';
                                                unset($_SESSION['contact_dtl']);
                                            }
                                            ?>
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
                                    <a href="https://www.instagram.com/verve.vit/?igshid=9et9i1rhywc7" target="_blank" class="socialLink social_item">
                                        <svg class="icon">
                                            <path d="M23.44 4.5h-6.88a7.06 7.06 0 0 0-7.06 7.06v6.88a7.07 7.07 0 0 0 7.06 7.06h6.88a7.06 7.06 0 0 0 7.06-7.06v-6.88a7.07 7.07 0 0 0-7.06-7.06zm2.29 5.94a1.18 1.18 0 0 1 0-2.35 1.18 1.18 0 0 1 1.18 1.18 1.17 1.17 0 0 1-1.18 1.17zM24.4 15a4.41 4.41 0 1 1-4.4-4.4 4.4 4.4 0 0 1 4.4 4.4z"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.youtube.com/channel/UCUYdb_OeX9BVRmk03XG9wVQ" target="_blank" class="socialLink social_item">
                                        <svg class="icon" viewBox="-21 -117 682.66672 682" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m626.8125 64.035156c-7.375-27.417968-28.992188-49.03125-56.40625-56.414062-50.082031-13.703125-250.414062-13.703125-250.414062-13.703125s-200.324219 0-250.40625 13.183593c-26.886719 7.375-49.03125 29.519532-56.40625 56.933594-13.179688 50.078125-13.179688 153.933594-13.179688 153.933594s0 104.378906 13.179688 153.933594c7.382812 27.414062 28.992187 49.027344 56.410156 56.410156 50.605468 13.707031 250.410156 13.707031 250.410156 13.707031s200.324219 0 250.40625-13.183593c27.417969-7.378907 49.03125-28.992188 56.414062-56.40625 13.175782-50.082032 13.175782-153.933594 13.175782-153.933594s.527344-104.382813-13.183594-154.460938zm-370.601562 249.878906v-191.890624l166.585937 95.945312zm0 0"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.facebook.com/Verve-Vidyalankar-Institute-Of-TechnologyMumbai-101505081981599/" target="_blank" class="socialLink social_item">
                                        <svg class="icon" id="Bold" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/>
                                        </svg>
                                    </a>
                                    <a href="https://twitter.com/vervevit" target="_blank" class="socialLink social_item">
                                        <svg data-symbol="icon-twitter" class="icon">
                                            <path d="M33.5 7a10.1 10.1 0 0 1-2.94.84 5.39 5.39 0 0 0 2.25-2.93 10.34 10.34 0 0 1-3.26 1.29 5 5 0 0 0-3.74-1.7 5.22 5.22 0 0 0-5.13 5.3 5.47 5.47 0 0 0 .13 1.2 14.4 14.4 0 0 1-10.57-5.53 5.44 5.44 0 0 0 1.59 7.08 5 5 0 0 1-2.32-.67V12a5.27 5.27 0 0 0 4.11 5.2 5.16 5.16 0 0 1-1.35.18 4.5 4.5 0 0 1-1-.1 5.18 5.18 0 0 0 4.79 3.69 10.12 10.12 0 0 1-6.37 2.26 10 10 0 0 1-1.22-.07 14.11 14.11 0 0 0 7.86 2.39C25.8 25.5 31 17.42 31 10.41v-.69A10.16 10.16 0 0 0 33.5 7z"></path>
                                        </svg>
                                    </a>
                                    <a href="https://www.linkedin.com/company/verve-vit/mycompany/" target="_blank" class="socialLink social_item">
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