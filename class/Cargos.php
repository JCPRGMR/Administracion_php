<?php
    require_once("../connection/Conexion.php");
    class Cargos extends Conexion{
        public static function Insertar(Object $datos){
            if(strlen($datos->des_cargo) <= 0 || is_null($datos->des_cargo)){
                if($datos->insertar_cargo == 'omision'){
                    header('Location: ../view/Empleados_insertar.php?back=omision');
                }
                if($datos->insertar_cargo == 'control'){
                    header('Location: ../view/Empleados_insertar.php?back=control');
                }
            }else{
                $des_cargo = strtoupper($datos->des_cargo);
                try {
                    $sql = "INSERT INTO cargos (des_cargo, f_registro_cargo, h_registro_cargo, alter_cargo) VALUES(?,NOW(),NOW(),NOW())";
                    $stmt = Conexion::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $des_cargo, PDO::PARAM_STR);
                    $stmt->execute();
                    if($datos->insertar_cargo == 'omision'){
                        header('Location: ../view/Empleados_insertar.php?back=omision');
                    }
                    if($datos->insertar_cargo == 'control'){
                        header('Location: ../view/Empleados_insertar.php?back=control');
                    }
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
            }
            if($datos->insertar_cargo == 'omision'){
                header('Location: ../view/Empleados_insertar.php?back=omision');
            }
            if($datos->insertar_cargo == 'control'){
                header('Location: ../view/Empleados_insertar.php?back=control');
            }
        }
        
        public static function Modificar(object $datos){
            try {
                $sql = "UPDATE cargos SET des_cargo = ?, alter_cargo = NOW() WHERE id_cargo = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, strtoupper($datos->des_cargo), PDO::PARAM_STR);
                $stmt->bindParam(2, $datos->id_cargo, PDO::PARAM_INT);
                $stmt->execute();
                header('Location: ../view/Cargos.php');
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM cargos ORDER BY f_registro_cargo DESC, h_registro_cargo DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Cargo_excel($des_cargo){
            try {
                if(strlen($des_cargo) != 0){
                    $sql = "SELECT id_cargo FROM cargos WHERE des_cargo LIKE ?";
                    $stmt = Conexion::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $des_cargo, PDO::PARAM_STR);
                    if($stmt->execute()){
                        $resultado = $stmt->fetchColumn();
                        if(!$resultado){
                            $cargo = strtoupper($des_cargo);
                            $sql = "INSERT INTO cargos (des_cargo, f_registro_cargo, h_registro_cargo, alter_cargo) VALUES(?,NOW(),NOW(),NOW())";
                            $stmt = Conexion::Conectar()->prepare($sql);
                            $stmt->bindParam(1, $cargo, PDO::PARAM_STR);
                            $stmt->execute();
                        }
                    }
                }
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function UltimoID(){
            try {
                $sql = "SELECT id_cargo FROM cargos ORDER BY id_cargo DESC LIMIT 1";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                return $stmt->fetchColumn();
            } catch (PDOException $th) {
                return $th->getMessage();
            }
        }
    }
?>