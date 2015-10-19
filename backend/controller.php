<?php
    require_once 'view.php';
    require_once 'model.php';
    require_once 'application.php';

$application = new Application();

$application->connect_to_db();

    if(isset($_GET['text'])){
        $model = new Model();
        $text = $_GET['text'];
        $id = $model->set_data($text, "0", "NULL");
        if($id == true)
            echo json_encode(array("id" => $id, "text" => $text));
        else
            echo 'Ошибка записи';
    }
    else{
        $view = new View();
        $model = new Model();
        
        $data = $model->get_data("SELECT * FROM `list`");
        $view->generate('views/base_view.php','views/list_view.php', $data);
    }
$application->close_connect();
?>