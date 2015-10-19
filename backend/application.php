<?php 
    require_once 'config.php';
    class Application {
        function connect_to_db(){
            global $db_connect; 
            $db_connect = mysql_connect(SERVER, USER, PASSWORD);
            if(!$db_connect){
                die('Database eror');
            }
            mysql_select_db(DB_NAME);
        }
        function close_connect(){
            global $db_connect;
            mysql_close($db_connect);
        }
    }
?>