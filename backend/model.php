<?php
    class Model{
        function get_data($sql){
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
            return $data;
        }
        
        function set_data($text, $done, $parent){
            $result = mysql_query("INSERT INTO `list_data`.`list` (`id`, `text`, `done`, `parent`) VALUES (NULL, '".$text."', '".$done."', ".$parent.")");
            
            if($result == false)
                return "Ошибка записи";
            else
                return mysql_insert_id();
        }
        
        function update_data(){
                
        }
    }
?>