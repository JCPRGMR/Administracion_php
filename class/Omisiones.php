<?php
    require_once("../connection/Conexion.php");
    class Omisiones extends Conexion{
        public static function Insertar(object $post){
            // echo '<pre>';
            // var_dump($post);
            $Ingreso = (isset($post->Ingreso))? 1 : 0;
            $Salida = (isset($post->Salida))? 1 : 0;
            $Marcacion = (isset($post->Marcacion))? 1 : 0;
            try {
                $sql = "INSERT INTO omisiones(
                    justificacion, 
                    tiempo_omision, 
                    medida, 

                    ingreso,
                    salida,
                    marcacion,
    
                    id_fk_empleado, 
                    id_fk_ciudad,
    
                    f_registro_omision,
                    h_registro_omision,
                    alter_omision
                    ) VALUES(
                        ?,?,?, ?,?,?, ?,?, NOW(),NOW(),NOW()
                    )";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->justificacion, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->tiempo, PDO::PARAM_STR);
                $stmt->bindParam(3, $post->medida, PDO::PARAM_STR);
                $stmt->bindParam(4, $Ingreso, PDO::PARAM_STR);
                $stmt->bindParam(5, $Salida, PDO::PARAM_STR);
                $stmt->bindParam(6, $Marcacion, PDO::PARAM_STR);
                $stmt->bindParam(7, $post->empleado, PDO::PARAM_INT);
                $stmt->bindParam(8, $post->ciudad, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Omisiones.php");
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_omisiones";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Filtro_pdf(object $post){
            try{
                $sql = "SELECT * vista_omisiones WHERE nombres = '%?%' ";
            }catch(PDOException $th){
                echo $th->getMessage();
            }
        }
        public static function Eliminar(object $post){
            try {
                $sql = "DELETE FROM omisiones WHERE id_omision = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->eliminar, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Omisiones.php");
            } catch (PDOException $th) {
                echo $th;
            }
        }
    }
?>