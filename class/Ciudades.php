<?php
    require_once("../connection/Conexion.php");
    class Ciudades extends Conexion{
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM ciudades";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $result;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Insertar(Object $post){
            try {
                $sql = "INSERT INTO ciudades(des_ciudad, f_registro_ciudad, h_registro_ciudad, alter_ciudad) VALUES (?,NOW(),NOW(),NOW())";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->des_ciudad, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../view/Ciudades.php");
            }catch(PDOException $th) {
                echo $th;
            }
        }
        public static function Buscar_id(int $id){
            try {
                $sql = "SELECT * FROM ciudades WHERE id_ciudad = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_OBJ);
                return $result;
            } catch (PDOException $th) {
                echo $th;
            }
        }
    }
?>