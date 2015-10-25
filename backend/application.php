<?php
require_once 'config.php';
class Application {
    function connect_to_db(){
        global $connection;
        try{
            $connection = new PDO(DATABASE.':host='.HOST.';dbname='.DB_NAME, USER, PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            $connection = null;
        }
        return $connection;
    }
    function close_connect(){
        global $connection;
        $connection = null;
    }
}
?>