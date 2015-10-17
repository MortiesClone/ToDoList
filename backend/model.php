<?php
    include 'database.php';
    class Model{
        function get_data($sql){
            $db_connect = mysql_connect(SERVER, USER, PASSWORD);
            if(!$db_connect){
                echo '<p>Database eror</p>';
            }
            mysql_select_db(DB_NAME);
            $result = mysql_query($sql);
            $data = array();
            if($result == null){
                $data = $result;
            }
            else{
                while($row = mysql_fetch_array($result)){
                    $data[$row['id']] = $row['text'];
                }
            }
            mysql_close($db_connect);
            
            return $data;
        }
        function set_data($text, $done, $parent){
            $db_connect = mysql_connect(SERVER, USER, PASSWORD);
            if(!$db_connect){
                echo '<p id="eror">Database eror</p>';
            }
            mysql_select_db(DB_NAME);
            $result = mysql_query("INSERT INTO `list_data`.`list` (`id`, `text`, `done`, `parent`) VALUES (NULL, '".$text."', '".$done."', ".$parent.")");
            
            if($result == false)
                return "Ошибка записи";
            else
                return mysql_insert_id();
            
            mysql_close($db_connect);
        }
    }
?>