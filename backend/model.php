<?php
    class Model{
        function get_tasks($connect){
            $result = $connect->query("SELECT * FROM `list`");
            $rows = $result->fetchAll(PDO::FETCH_OBJ);
            return $rows;
        }
        
        function new_task($connect, $text, $parent){
            if($parent == null)
                $result = mysql_query("INSERT INTO `list_data`.`list` (`id`, `text`, `done`, `parent`) VALUES (NULL, '".$text."', '0', NULL)");
            else
                $result = mysql_query("INSERT INTO `list_data`.`list` (`id`, `text`, `done`, `parent`) VALUES (NULL, '".$text."', '0', '".$parent."')");
            
            if($result == false)
                return $result;
            else
                return mysql_insert_id();
        }
        
        function update_task($connect, $id, $text){
            return mysql_query("UPDATE `list` SET `text`='".$text."' WHERE `id`='".$id."'");
        }
        
        function delete_task($id){
            return mysql_query("DELETE FROM `list` WHERE `id`=".$id);
        }
    }
?>