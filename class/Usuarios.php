<?php
    require_once("../connection/Conexion.php");
    class Usuarios extends Conexion{
        public static function Insertar(object $datos){

        }
        public static function Modificar(object $datos){}
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_usuarios";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Eliminar(object $datos){}
        public static function Verificar(object $datos){
            try {
                if(strlen($datos->username) > 0 && strlen($datos->password) > 0){
                    $sql = "SELECT * FROM vista_usuarios WHERE usuario = ? AND contrasena = ? LIMIT 1";
                    $stmt = Conexion::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $datos->username, PDO::PARAM_STR);
                    $stmt->bindParam(2, $datos->password, PDO::PARAM_STR);
                    $stmt->execute();
                    $resultado = $stmt->fetchObject();
                    if($resultado != false && $resultado != null){
                        session_start();
                        $_SESSION["usuario"] = $resultado;
                        $hola = 'Hola';
                        header("Location: ../view/Control.php");
                    }else{
                        $msg =  'El usuario no existe';
                        header('Location: ../' . urlencode($msg));
                    }
                }else{
                    $msg =  'llene los campos';
                    header('Location: ../?msg=' . urlencode($msg));
                }
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }


        public static function Cerrar_sesion(){
            session_start();
            $_SESSION = array();
            session_destroy();
        }
    }
?>