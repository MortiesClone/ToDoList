<?php 
    $server     = "localhost";
    $user       = "root";
    $password   = "";
    $db_name    = "list_data";

    $db_connect = mysql_connect($server, $user, $password);
    if(!$db_connect){
        echo '<p id="eror">Database eror</p>';
    }
    mysql_select_db($db_name);
    $sql = mysql_query("SELECT * FROM `list`");
     {
        echo ''.$Row['text'].'<br>';
        echo ''.$Row['Done'].'<br>';
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>ToDoList</title>
    </head>
    <body>
        <form action="test.php">
            <input type="text">
            <input type="checkbox">
            <input type="submit">
        </form>
        <div id="content">
        <?php while($row=mysql_fetch_array($sql)):?>
            <p><?=$row['id']?>. <?=$row['text']?> <input type="checkbox" 
            <?php if($row['done'] == true):?>
                    <?='checked'?>
            <?endif?>></p>
        <?php endwhile?>
        </div>
        <script>
            
        </script>
    </body>
</html>
<?php
    mysql_close($db_connect);
?>