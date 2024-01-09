<?php
    require_once("../connection/Conexion.php");
    class Usuarios extends Conexion{
        public static function Insertar(object $datos){

        }
        public static function Modificar(object $datos){}
        public static function Mostrar(){}
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
                        echo 'El usuarios que ustede ingreso no existe comuniquese con sistemas';
                    }
                }else{
                    echo 'Envio datos vacios';
                }
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
    }
?>