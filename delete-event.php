<?php
    session_start();
     
    require_once "config.php";
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login");
        exit;
    }
    
    $id=$_GET['id'];
    $value = $_GET['valued'];
    
    $query="UPDATE events SET delete_e='$value' WHERE event_id = $id";
    if(mysqli_query($link,$query)){
        header("location:my-events");
    }else{
        echo mysqli_error($link);
    }
?>