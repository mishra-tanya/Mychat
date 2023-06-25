<?php
    session_start();
    include_once "config.php";
    if(isset($_SESSION['unique_id'])){
    $incoming_id=mysqli_real_escape_string($conn,$_POST['incoming_id']);
    $outgoing_id=mysqli_real_escape_string($conn,$_POST['outgoing_id']);
    $message=mysqli_real_escape_string($conn,$_POST['message']);
        
    if(!empty($message)){
        $sql=mysqli_query($conn,"INSERT INTO messages (in_msg_id, out_msg_id, msg)
        VALUES ({$incoming_id} ,{$outgoing_id}, '{$message}')") or die();
    }  
    }
    else{
        header("location: login_page.php");
    }
        
?>