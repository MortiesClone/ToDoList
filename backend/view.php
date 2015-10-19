<?php
    require_once 'config.php';
    class View{
        function generate($base_template, $view, $data = null){
            $model = new Model();
            include $base_template;
        }
    }
?>