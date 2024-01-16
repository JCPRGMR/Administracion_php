<?php
    require_once("../connection/Conexion.php");
    class Cargos extends Conexion{
        public static function Insertar(Object $datos){
            if(strlen($datos->des_cargo) <= 0 || is_null($datos->des_cargo)){
                header('Location: ../view/Cargo.php');
            }else{
                $des_cargo = strtoupper($datos->des_cargo);
                try {
                    $sql = "INSERT INTO cargos (des_cargo, f_registro_cargo, h_registro_cargo, alter_cargo) VALUES(?,NOW(),NOW(),NOW())";
                    $stmt = Conexion::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $des_cargo, PDO::PARAM_STR);
                    $stmt->execute();
                    header('Location: ../view/Cargos.php');
                } catch (PDOException $th) {
                    echo $th->getMessage();
                }
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
    }
?>