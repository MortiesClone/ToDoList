<?php
    include 'database.php';
    $database = new Database();
    $result = $database->get_data("SELECT * FROM `list`", 'get_all');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <script src="js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <input type="text" name="text" id="text">
        <input type="checkbox" id="check">
        <input type="button" onclick="send();" value="OK">
        <div id="content">
        <?php while($row=mysql_fetch_array($result)):?>
            <p><?=$row['id']?>. <?=$row['text']?> 
            <input type="checkbox" 
            <?php if($row['done'] == true):?>
                    <?='checked'?>
            <?endif?>></p>
        <?php endwhile?>
        </div>
    </body>
</html>