<?php
    require_once("../connection/Conexion.php");
    class Omisiones extends Conexion{
        public static function Insertar(object $post){
            $sql = "INSERT INTO (
                justificacion, 
                tiempo_omision, 
                medida, 

                id_fk_empleado, 
                id_fk_ciudad,

                f_registro_omision,
                h_registro_omision,
                alter_omision
                ) VALUES(
                    ?,?,?, ?,?, NOW(),NOW(),NOW()
                )";
            $stmt = Conexion::Conectar()->prepare($sql);
            $stmt->bindParam(1, $post->justificacion, PDO::PARAM_STR);
            $stmt->bindParam(2, $post->tiempo, PDO::PARAM_STR);
            $stmt->bindParam(3, $post->medida, PDO::PARAM_STR);
            $stmt->bindParam(4, $post->id_empleado, PDO::PARAM_STR);
            $stmt->bindParam(5, $post->id_ciudad, PDO::PARAM_STR);
            $stmt->execute();
        }
    }
?>