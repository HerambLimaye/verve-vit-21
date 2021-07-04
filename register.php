<?php
    require_once "config.php";
     
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
     
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } else{
            $sql = "SELECT id FROM users WHERE username = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = trim($_POST["username"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                mysqli_stmt_close($stmt);
            }
        }
        
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }
    
        if(empty($_POST['council'])) {
            $council_err = "Please select Council.";   
            } else {
            $council = trim($_POST["council"]);
            }
    
        if(empty($_POST['name'])) {
            $name_err = "Please enter name.";   
            } else {
            $name = trim($_POST["name"]);
            }
        if(empty($_POST['email'])) {
            $email_err = "Please enter email.";   
            } else {
            $email = trim($_POST["email"]);
            }
        
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($council_err) && empty($name_err)){
            
            $sql = "INSERT INTO users (name, email, username, password, council) VALUES (?, ?, ?, ?, ?)";
             
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_email, $param_username, $param_password, $param_council);
                
                $param_name = $name;
                $param_email = $email;
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                $param_council = $council;
                
                if(mysqli_stmt_execute($stmt)){
                    header("location: login");
                } else{
                    echo "Something went wrong. Please try again later.";
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
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <h2>Sign Up</h2>
            <p>Please fill this form to create an account.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                    <span class="help-block"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($council_err)) ? 'has-error' : ''; ?>">
                    <label>Council</label>
                    <select name="council">
                        <option value="" disabled selected>Choose option</option>
                        <option value="General Secretary">General Secretary</option>
                        <option value="Joint General Secretary">Joint General Secretary</option>
                        <option value="Treasurer">Treasurer</option>
                        <option value="Cultural Council">Cultural Council</option>
                        <option value="Technical Council">Technical Council</option>
                        <option value="Sports Council">Sports Council</option>
                        <option value="Literary Council">Literary Council</option>
                        <option value="VCC Council">VCC Council</option>
                        <option value="Documentation Council">Documentation Council</option>
                        <option value="Sponsorship Council">Sponsorship Council</option>
                        <option value="Publicity Council">Publicity Council</option>
                        <option value="Creative Council">Creative Council</option>
                    </select>
                    <span class="help-block"><?php echo $council_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Already have an account? <a href="login">Login here</a>.</p>
            </form>
        </div>
    </body>
</html>