<?php
    include 'database.php';
    $db = new Database();
    $result = $db->get_data("SELECT * FROM `list`", 'get_all');
    $str_no_parent = "";
    $str_parents = "";
    while($row=mysql_fetch_array($result)){
        if($row['parent'] == null)
            $str_no_parent .= $row['id'].'. '.$row['text'].'/';
    }
    $explode_string = explode('/', $string);
    echo $explode_string[0];
    function go_next($position, $array, $str){
        $position -= 1;
        $array_size = count($array);
        for($i = $array_size; $i >= $position; $i--)
            $array[$i+1] = $array[$i];
        $array[$position] = $str;
        return $array;
    }
    while($row=mysql_fetch_array($result)){
        if($row['parent'] != null)
            $str_result = go_next($row['parent'], $explode_string, $row['text']);
    }
    echo $str_result;
?>