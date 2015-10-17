<?php
    require_once 'view.php';
    require_once 'model.php';

    $view = new View();
    $view->generate('views/base_view.php','views/list_view.php');
    
    if(isset($_GET['text'])){
        $model = new Model();
        $text = $_GET['text'];
        $id = $model->set_data($text, "0", "NULL");
        echo json_encode(array("id" => $id, "text" => $text));
    }
?>