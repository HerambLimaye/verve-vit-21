<?php
    define('DB_SERVER', 'sql205.epizy.com');
    define('DB_USERNAME', 'epiz_27577864');
    define('DB_PASSWORD', 'wmYpo4M6sIyN');
    define('DB_NAME', 'epiz_27577864_verve_vit');
    
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>