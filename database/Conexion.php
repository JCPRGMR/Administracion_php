<?php
    class Conexion{
        private static $localhost = "localhost";
        private static $database = "adiminstracion";
        private static $user = "root";
        private static $pass = "";

        public static function conectar() {
            try {
                $dsn = "mysql:host=" . self::$localhost . ";dbname=" . self::$database;
                $pdo = new PDO($dsn, self::$user, self::$pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
    }