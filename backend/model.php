<?php
    class Model{
        function get_tasks($connect){
            $result = $connect->query("SELECT * FROM `list`");
            $rows = $result->fetchAll(PDO::FETCH_OBJ);
            return $rows;
        }
        
        function new_task($connect, $text, $parent){
            $sql = $connect->prepare("INSERT INTO list VALUES (NULL, :text, '0', :parent)");
            $result = $sql->execute(array(
                ':text' => $text,
                ':parent' => $parent
            ));
            if($result == false)
                return $result;
            else
                return $connect->lastInsertId();
        }
        
        function update_task($connect, $id, $text){
            $sql = $connect->prepare("UPDATE list SET text = :text WHERE id = :id");
            $result = $sql->execute(array(
                ':text' => $text,
                ':id' => $id
            ));
            return $result;
        }
        
        function delete_task($connect, $id){
            $sql = $connect->prepare("DELETE FROM list WHERE id = :id");
            $result = $sql->execute(array(
                ':id' => $id
            ));
            return $result;
        }
    }
?>