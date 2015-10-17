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
            $data = "";
            if($result == null){
                $data .= "<p>Список пуст</p>";
            }
            else{
                while($row = mysql_fetch_array($result)){
                    $data .= '<p>'.$row['text'].'</p>';
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