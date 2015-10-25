<?php
    require_once 'view.php';
    require_once 'model.php';
    require_once 'application.php';

$application = new Application();

$connect = $application->connect_to_db();
if($connect == null) {
    echo 'Ошибка подключения к бд';
}
else {
    if (isset($_GET['action'])) {
        $model = new Model();

        switch ($_GET['action']) {
            case 'write':
                if (isset($_GET['parent']))
                    $result = $model->new_task($_GET['text'], $_GET['parent']);
                else
                    $result = $model->new_task($_GET['text'], null);
                break;
            case 'rewrite':
                $result = $model->update_task($_GET['id'], $_GET['text']);
                break;
            case 'delete':
                $result = $model->delete_task($_GET['id']);
                break;
        }
        echo $result;
    } else {
        $view = new View();
        $model = new Model();

        $data = $model->get_tasks($connect);
        $view->generate('views/base_view.php', 'views/list_view.php', $data);
    }
    $application->close_connect();
}
?>