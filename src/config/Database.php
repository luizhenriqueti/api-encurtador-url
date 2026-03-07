<?php

namespace encurtador\config;

use PDO;

class Database{

    public static function getConnection(){
        $host = 'localhost';
        $db_name = 'db_encurtador';
        $username = 'root';
        $password = '';

        $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    }


}
?>