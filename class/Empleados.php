<?php
    require_once("../connection/Conexion.php");
    class Empleados extends Conexion{
        public static function Insertar(object $datos){
            try {
                if(!is_null(self::Buscar_carnet($datos))){
                    header("Location: ../view/Empleados.php");
                }
                $expedido = strtoupper($datos->expedido);
                $sql = "INSERT INTO empleados (
                    nombres, 
                    apellidos, 
                    ci, 
                    expedido,

                    celular,
                    id_fk_area,
                    id_fk_cargo,

                    f_registro_empleado,
                    h_registro_empleado,
                    alter_empleado) 
                    VALUES(?,?,?,?, ?,?,?, NOW(),NOW(),NOW())";

                    $stmt = Conexion::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $datos->nombres, PDO::PARAM_STR);
                    $stmt->bindParam(2, $datos->apellidos, PDO::PARAM_STR);
                    $stmt->bindParam(3, $datos->carnet, PDO::PARAM_STR);
                    $stmt->bindParam(4, $expedido, PDO::PARAM_STR);

                    $stmt->bindParam(5, $datos->celular, PDO::PARAM_STR);
                    $stmt->bindParam(6, $datos->area, PDO::PARAM_STR);
                    $stmt->bindParam(7, $datos->cargo, PDO::PARAM_STR);
                    $stmt->execute();
                    header("Location: ../view/Empleados_insertar.php");
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Modificar(object $datos){
            try {
                $sql = "";
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        public static function Eliminar(object $datos){
            try {
                $sql = "";
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_empleados";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Buscar_carnet(object $post){
            try {
                $sql = "SELECT * FROM empleados WHERE ci = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->carnet, PDO::PARAM_STR);
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_OBJ);
                return $res;
            } catch (PDOException $th) {
                return null;
            }
        }
    }
?>