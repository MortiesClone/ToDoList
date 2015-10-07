<?php
    class Database{
        var $server     = "localhost";
        var $user       = "root";
        var $password   = "";
        var $db_name    = "list_data";
            
        function get_data($sql, $action){
            $db_connect = mysql_connect($this->server, $this->user, $this->password);
            if(!$db_connect){
                echo '<p id="eror">Database eror</p>';
            }
            mysql_select_db($this->db_name);
            if($action == 'get_all')
                $data = mysql_query($sql);
            else if($action == 'get_last')
                $data = mysql_insert_id();
            mysql_close($db_connect);
            return $data;
        }
        function set_data(){
        
        }
    }
?>