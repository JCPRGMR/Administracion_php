<?php
    require_once("../connection/Conexion.php");
    class Controles extends Conexion{
        public static function Insertar(object $post){
            try {
                $sql = "INSERT INTO controles(
                    ingreso,
                    registro_ingreso,

                    id_fk_empleado,
                    id_fk_ciudad,

                    f_registro_control,
                    h_registro_control,
                    alter_control,

                    observaciones 
                ) VALUES(
                    NOW(),NOW(), ?,?, NOW(),NOW(),NOW(), ?
                )";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->id_empleado, PDO::PARAM_INT);
                $stmt->bindParam(2, $post->id_ciudad, PDO::PARAM_INT);
                $stmt->bindParam(3, $post->Observaciones, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../view/Controles.php");
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_controles ORDER BY f_registro_control DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Modificar(object $post){
            try {
                $sql = "UPDATE controles WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Eliminar(object $post){
            try {
                $sql = "DELETE FROM controles WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->id_control, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th;
            }
        }
    }
?>