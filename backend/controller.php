<?php
    require_once 'view.php';
    require_once 'model.php';
    require_once 'application.php';
    require_once 'processing_errors.php';

$application = new Application();

$error = Errors::get_error($connect = $application->connect_to_db(), 'db_connection');
if($error)
    echo $error;

if (isset($_GET['action'])) {
        $model = new Model();
        $status = true;
        switch ($_GET['action']) {
            case 'write':
                if ($_GET['parent'] != null)
                    $error = Errors::get_error($result = $model->new_task($connect, $_GET['text'], $_GET['parent']), 'new_task');
                else
                    $error = Errors::get_error($result = $model->new_task($connect, $_GET['text'], null), 'new_task');
                break;
            case 'rewrite':
                $error = Errors::get_error($result = $model->update_task($connect, $_GET['id'], $_GET['text']), 'update_task');
                break;
            case 'delete':
                $error = Errors::get_error($result = $model->delete_task($connect, $_GET['id']), 'delete_task');
                break;
        }
        if($error != null)
            $status = false;
        echo json_encode(array(
            'status' => $status,
            'error' => $error,
            'data' => $result
            ));
    } else {
        $view = new View();
        $model = new Model();

        $data = $model->get_tasks($connect);
        $view->generate('views/base_view.php', 'views/list_view.php', $data);
    }
    $application->close_connect();
?>