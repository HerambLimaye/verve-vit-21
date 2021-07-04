<?php
    session_start();
    
    require_once "config.php";
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login");
        exit;
    }
    
    $id=$_GET['id'];
    
    $output = '';
    
    $query1="SELECT * from events where event_id=$id";
    $result=mysqli_query($link,$query1) or die(mysqli_error($link));
    $row = mysqli_fetch_array($result);
    $filename = $row['event_name'];
    
    $questions = explode(",",$row["questions"]);
    $questions_count = count($questions);
    
    $table = $row["form_name"];
    
    
    $myArrray = array();
    for($i=0;$i<$questions_count;$i++) {
        array_push($myArrray, $questions[$i]);
    } 
    
    $filename = $row['event_name'];
         
    header('Content-Type: text/csv; charset=utf-8');  
    header("Content-Disposition: attachment; filename=$filename.csv");  
    
    $output = fopen("php://output", "w");  
    fputcsv($output, $myArrray); 
    
    $form_query = "SELECT * FROM $table;";
    $form_result = mysqli_query($link, $form_query) or die(mysqli_error($link));
    
    while($row = mysqli_fetch_assoc($form_result))  
    {  
        $row = array_slice($row,2);
        fputcsv($output, $row);
    }  
    fclose($output);    
?>