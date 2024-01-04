<?php
    require_once("../connection/Conexion.php");
    class Roles extends Conexion{
        public static function Insertar(Object $datos){
            try {
                $sql = "INSERT INTO roles (des_rol, f_registro_rol, h_registrol_rol, alter_rol) VALUES(?,NOW(),NOW(),NOW())";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $datos->des_rol, PDO::PARAM_STR);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }
?>