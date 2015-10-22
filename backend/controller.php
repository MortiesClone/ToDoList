<?php
    require_once 'view.php';
    require_once 'model.php';
    require_once 'application.php';

$application = new Application();

$application->connect_to_db();

    if(isset($_GET['action'])){
        $model = new Model();

        switch($_GET['action']){
            case 'write':
                $result = $model->new_task($_GET['text'], 0, NULL);
                break;
            case 'rewrite':
                $result =$model->update_task($_GET['id'], $_GET['text']);
                break;
            case 'delete':
                $result = $model->delete_task($_GET['id']);
                break;
        }
        echo $result;
    }
    else{
        $view = new View();
        $model = new Model();
        
        $data = $model->get_tasks();
        $view->generate('views/base_view.php','views/list_view.php', $data);
    }
$application->close_connect();
?>