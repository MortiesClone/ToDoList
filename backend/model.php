<?php
    class Model{
        function get_tasks(){
            $result = mysql_query("SELECT * FROM `list`");
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
        
        function new_task($text){
            $result = mysql_query("INSERT INTO `list_data`.`list` (`id`, `text`, `done`, `parent`) VALUES (NULL, '".$text."', '0', 'NULL')");
            
            if($result == false)
                return $result;
            else
                return mysql_insert_id();
        }
        
        function update_task($id, $text){
            return mysql_query("UPDATE `list` SET `text`='".$text."' WHERE `id`='".$id."'");
        }
        
        function delete_data($id){
            return mysql_query("DELETE FROM `list` WHERE 'id'=".$id);
        }
    }
?>