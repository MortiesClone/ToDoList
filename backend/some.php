<?php
    include 'database.php';
    $db = new Database();
    $text = $_GET['text'];
    $id = $db->set_data($text, "0", "NULL");
    echo $id.'. '.$text.' ';
?>