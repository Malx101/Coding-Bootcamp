<?php 
    function connection() {
        $server_name = "localhost";
        $username = "root";
        $password = "";
        $database_name = "codebootcamp_db";

        $conn = new mysqli($server_name, $username, $password, $database_name);
        
        if ($conn->connect_error) {
            die("Connection faild " . $conn->connect_error);
        }

        return $conn;
    }
?>