<?php
    require_once 'model.php';

    class View{
        function generate($base_template, $view){
            $model = new Model();
            $data = $model->get_data("SELECT * FROM `list`");
            include $base_template;
        }
    }
?>