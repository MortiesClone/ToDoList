<?php
    require_once 'view.php';
    require_once 'model.php';
    require_once 'application.php';

$application = new Application();

$application->connect_to_db();

    if(isset($_GET['text'])){
        $model = new Model();
        
        if(isset($_GET['id'])){
            $result = $model->update_data($_GET['id'], $_GET['text']);
            if($result == false)
                echo null;
        }
        else{
            $result = $model->set_data($_GET['text'], "0", "NULL");
            return $result;
        }
    }
    else{
        $view = new View();
        $model = new Model();
        
        $data = $model->get_data("SELECT * FROM `list`");
        $view->generate('views/base_view.php','views/list_view.php', $data);
    }
$application->close_connect();
?>