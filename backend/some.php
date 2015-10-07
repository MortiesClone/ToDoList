<?php
    include 'database.php';
    $db = new Database();
    $text = $_GET['text'];
    $done = done($_GET['done']);
    echo ' '.$text.' '.$done;
    function done ($result){
        if($result == "on")
            return 1;
        else
            return 0;
    }
?>