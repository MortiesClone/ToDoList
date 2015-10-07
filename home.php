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
?>
<!DOCTYPE HTML>
<html>
    <head>
        <script src="jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <input type="text" name="text" id="text">
        <input type="checkbox" id="check">
        <input type="button" onclick="send();" value="OK">
        <div id="content">
        <?php while($row=mysql_fetch_array($sql)):?>
            <p><?=$row['id']?>. <?=$row['text']?> <input type="checkbox" 
            <?php if($row['done'] == true):?>
                    <?='checked'?>
            <?endif?>></p>
        <?php endwhile?>
        </div>
        <script>
            function send(){
                var text = "text=" + $("#text").val() + "&done=" + $("#check").val();
                $.ajax({
                   type: "GET",
                   url: "some.php",
                   data: text,
                   success: function(msg){
                       alert( "Complete!" + msg);
                   }
                 });
            }
        </script>
    </body>
</html>
<?php
    mysql_close($db_connect);
?>