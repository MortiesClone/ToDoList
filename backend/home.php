<?php
    include 'database.php';
    $database = new Database();
    $result = $database->get_data("SELECT * FROM `list`", 'get_all');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <input type="text" name="text" id="text">
        <input type="button" id="btn-ok" onclick="send();" value="OK">
        <div id="content">
        <?php while($row=mysql_fetch_array($result)):?>
            <p <?php if($row['parent'] != null):?>
               <?='class="sub-tusk"'?>
               <?php endif?>
            ><?=$row['id']?>. <?=$row['text']?> 
            <input type="checkbox" 
            <?php if($row['done'] == true):?>
                    <?='checked'?>
            <?endif?>></p>
        <?php endwhile?>
        </div>
    </body>
</html>