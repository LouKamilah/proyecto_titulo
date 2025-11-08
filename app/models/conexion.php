<?php
date_default_timezone_set('America/Santiago');
class Conectar {
    public $conexion = null;
    
    public function __construct() {
        $this->conexion = self::conexion();
    }

    public static function conexion() {
        try {            
            $host = '127.0.0.1';
            $db   = 'db_titulo';
            $user = 'root';
            $pass = '1234';

            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $conexion = new PDO($dsn, $user, $pass, $options);
            return $conexion;

        } catch(Exception $e) {
            echo "Línea del error: " . $e->getLine() . "<br>";
            die("Error de conexión: " . $e->getMessage());
        }
    }
}