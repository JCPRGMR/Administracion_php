<?php

use FontLib\Table\Type\post;

    require_once("../connection/Conexion.php");
    class Empleados extends Conexion{
        public static function Insertar(object $datos){
            try {
                if(self::Buscar_carnet($datos->carnet)){
                    header("Location: ../view/Empleados.php");
                }else{
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
                    $defaultPage = 'Empleados.php';

                    $redirectPage = isset($datos->insertar_usuario) ? (
                        $datos->insertar_usuario == 'control' ? 'Control.php' : (
                            $datos->insertar_usuario == 'omision' ? 'Omisiones_insertar.php' : $defaultPage
                        )
                    ) : $defaultPage;

                    header("Location: ../view/" . $redirectPage);
                    exit();
                }
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
                $sql = "DELETE FROM empleados WHERE id_empleado = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $datos->eliminar, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../view/Empleados.php");
            } catch (PDOException $th) {
                echo '<style>
                body{
                    font-family: Arial;
                    color: yellow;
                    background-color: red;
                    font-size: 20px;
                }
                </style>';
                echo 'No se puede eliminar al empleado:';
                echo '<br><br>';
                echo '<strong>Por que?</strong>';
                echo '<br>';
                echo '- El empleado tiene una cuenta de usuario';
                echo '<br>';
                echo '- El empleado tiene registro en omision o controles';
                echo '<br>';
                echo '<br>';
                echo '<strong>Por favor comuniquese con sistemas</strong>';
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_empleados ORDER BY f_registro_empleado DESC, h_registro_empleado DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Buscar_carnet($carnet){
            try {
                $sql = "SELECT * FROM empleados WHERE ci = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $carnet, PDO::PARAM_STR);
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_OBJ);
                return $res;
            } catch (PDOException $th) {
                return null;
            }
        }
    }
?>