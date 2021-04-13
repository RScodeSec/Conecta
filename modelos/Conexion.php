<?php

class Conexion
{
    private static $host = 'localhost';
    private static $dbname = 'ghxumdmy_conectaperu';
    private static $user = 'root';
    private static $pwd = '';
    private static $cnx = null;
//ghxumdmy_conectaperu2
    public static function conectar($bool = true)
    {
        try {
            if($bool){
                self::$cnx = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$user, self::$pwd);
            } else {
                self::$cnx = null;
            }
            return self::$cnx;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}


?>