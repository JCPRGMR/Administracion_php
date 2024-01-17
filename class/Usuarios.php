<?php
    require_once("../connection/Conexion.php");
    class Usuarios extends Conexion{
        public static function Insertar(object $datos){
            try {
                $sql = "INSERT INTO usuarios(
                usuario,
                contrasena,
                id_fk_rol,
                id_fk_empleado,
                f_registro_usuario,
                h_registro_usuario,
                alter_usuario
                ) VALUES(
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?);";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $datos->nombres, PDO::PARAM_STR);
                $stmt->bindParam(2, $datos->Contrasena, PDO::PARAM_STR);
                $stmt->bindParam(4, $datos->rol, PDO::PARAM_INT);
                $stmt->bindParam(3, $datos->empleado, PDO::PARAM_INT);
                $stmt->bindParam(5, date('Y-m-d'), PDO::PARAM_STR);
                $stmt->bindParam(6, date('H:i:s'), PDO::PARAM_STR);
                $stmt->bindParam(7, date('Y-m-d H:i:s'), PDO::PARAM_STR);
                $stmt->execute();
                header('Location: ../view/Usuarios.php');
            } catch (PDOException $th) {
                echo $th;
                // header('Location: ../view/Usuarios.php');
            }
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
                        header('Location: ../index.php');
                    }
                }else{
                    $msg =  'llene los campos';
                    header('Location: ../index.php');
                }
            } catch (PDOException $th) {
                echo 'Ocurrio un error con la base de datos: ' . $th->getMessage();
                echo '<br>Comuniquese con el area de sistemas';
            }
        }


        public static function Cerrar_sesion(){
            session_start();
            $_SESSION = array();
            session_destroy();
        }
    }
?>