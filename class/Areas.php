<?php
    require_once("../connection/Conexion.php");
    class Areas extends Conexion{
        public static function Insertar(Object $datos){
            if(strlen($datos->des_area) <= 0 || is_null($datos->des_area)){
                if($datos->insertar_area == 'usuarios'){
                    header('Location: ../view/Usuarios_insertar.php?back=usuarios');
                }
                if($datos->insertar_area == 'omision'){
                    header('Location: ../view/Empleados_insertar.php?back=omision');
                }
                if($datos->insertar_area == 'control'){
                    header('Location: ../view/Empleados_insertar.php?back=control');
                }
                if($datos->insertar_area == ''){
                    header('Location: ../view/Empleados_insertar.php');
                }
            }else{
                $des_area = strtoupper($datos->des_area);
                try {
                    $sql = "INSERT INTO areas (des_area, f_registro_area, h_registro_area, alter_area) VALUES(?,NOW(),NOW(),NOW())";
                    $stmt = Conexion::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $des_area, PDO::PARAM_STR);
                    $stmt->execute();
                    if($datos->insertar_area == 'usuarios'){
                        header('Location: ../view/Usuarios_insertar.php?back=usuarios');
                    }
                    if($datos->insertar_area == 'omision'){
                        header('Location: ../view/Empleados_insertar.php?back=omision');
                    }
                    if($datos->insertar_area == 'control'){
                        header('Location: ../view/Empleados_insertar.php?back=control');
                    }
                    if($datos->insertar_area == ''){
                        header('Location: ../view/Empleados_insertar.php');
                    }
                    header('Location: ../view/Empleados_modificar.php');
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
                if($datos->insertar_area == 'usuarios'){
                    header('Location: ../view/Usuarios_insertar.php?back=usuarios');
                }
                if($datos->insertar_area == 'omision'){
                    header('Location: ../view/Empleados_insertar.php?back=omision');
                }
                if($datos->insertar_area == 'control'){
                    header('Location: ../view/Empleados_insertar.php?back=control');
                }
                if($datos->insertar_area == ''){
                    header('Location: ../view/Empleados_insertar.php');
                }
                
            }
            if($datos->insertar_area == 'usuarios'){
                header('Location: ../view/Usuarios_insertar.php?back=usuarios');
            }
            if($datos->insertar_area == 'omision'){
                header('Location: ../view/Empleados_insertar.php?back=omision');
            }
            if($datos->insertar_area == 'control'){
                header('Location: ../view/Empleados_insertar.php?back=control');
            }
            if($datos->insertar_area == ''){
                header('Location: ../view/Empleados.php');
            }
        }
        public static function Modificar(object $datos){
            try {
                $sql = "UPDATE areas SET des_area = ?, alter_area = NOW() WHERE id_area = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, strtoupper($datos->des_area), PDO::PARAM_STR);
                $stmt->bindParam(2, $datos->id_area, PDO::PARAM_INT);
                $stmt->execute();
                header('Location: ../view/Areas.php');
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }        
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM areas ORDER BY f_registro_area DESC, h_registro_area DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
    }
?>