<?php
    $errors = include 'errors.php';
    class Errors{
        public static function get_error($status, $type){
            if(!$status) {
                global $errors;
                return "<meta charset=\"utf-8\">Ошибка: " . $errors[$type];
            }
            else{
                return null;
            }
        }
    }