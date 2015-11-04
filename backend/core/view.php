<?php
    require_once 'data/config.php';
    class View{
        function generate($base_template, $view, $data = null){
            $model = new Model();
            include $base_template;
        }
    }
?>