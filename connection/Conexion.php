<?php
class Conexion{
    private static $db = "administracion";
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "";

    public static function Conectar(){
        try {
            $con = "mysql:host=" . self::$host . ";dbname=" . self::$db;
            $stmt = new PDO($con, self::$user, self::$pass);
            $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $stmt;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
?>
