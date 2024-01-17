<?php
    require_once("../connection/Conexion.php");
    date_default_timezone_set('America/Caracas');
    class Omisiones extends Conexion{
        public static function Insertar(object $post){
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
                $stmt->bindParam(7, $post->id_empleado, PDO::PARAM_INT);
                $stmt->bindParam(8, $post->ciudad, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Omisiones.php");
            } catch (PDOException $th) {
                header("Location: ../view/Omisiones_insertar.php");
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_omisiones ORDER BY f_registro_omision DESC, h_registro_omision DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Mostrar_Area($post){
            try {
                $sql = "SELECT * FROM vista_omisiones WHERE id_fk_area = ? ORDER BY f_registro_omision DESC, h_registro_omision DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post, PDO::PARAM_INT);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
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
        public static function pdf(object $post){
            try {
                $sql = "SELECT * FROM vista_omisiones WHERE ";
                $params = array();
                $conditionAdded = false;
        
                $conditions = array();

                if (!empty($post->carnet)) {
                    $conditions[] = "ci LIKE ?";
                    $params[] = "%" . $post->carnet . "%";
                }

                if (!empty($post->nombres)) {
                    $conditions[] = "nombres LIKE ?";
                    $params[] = "%" . $post->nombres . "%";
                }

                if (!empty($post->apellidos)) {
                    $conditions[] = "apellidos LIKE ?";
                    $params[] = "%" . $post->apellidos . "%";
                }

                if (!empty($post->area)) {
                    $conditions[] = "id_fk_area = ?";
                    $params[] = $post->area;
                }

                if (!empty($post->Ingreso)) {
                    $conditions[] = "ingreso = ?";
                    $params[] = $post->Ingreso;
                }
                if (!empty($post->Salida)) {
                    $conditions[] = "Salida = ?";
                    $params[] = $post->Salida;
                }
                if (!empty($post->Marcacion)) {
                    $conditions[] = "Marcacion = ?";
                    $params[] = $post->Marcacion;
                }
                if (!empty($post->tiempo)) {
                    $conditions[] = "tiempo_omision = ?";
                    $params[] = $post->tiempo;
                }
                if (!empty($post->medida)) {
                    $conditions[] = "medida = ?";
                    $params[] = $post->medida;
                }

                if (!empty($post->inicio) && !empty($post->fin)) {
                    $conditions[] = "f_registro_omision >= ? AND f_registro_omision <= ?";
                    $params[] = $post->inicio;
                    $params[] = $post->fin;
                }

                $sql = "SELECT * FROM vista_omisiones";
                if (!empty($conditions)) {
                    $sql .= " WHERE " . implode(" AND ", $conditions);
                }

                $sql .= " ORDER BY f_registro_omision DESC, h_registro_omision DESC";
                $stmt = Conexion::Conectar()->prepare($sql);

                if (!empty($params)) {
                    // Bind parameters
                    for ($i = 0; $i < count($params); $i++) {
                        $stmt->bindParam($i + 1, $params[$i]);
                    }
                }

        
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                return self::Mostrar();
            }
        }
        
        public static function Detalles_De_Busqueda(object $post){
            if(!empty((array) $post)) {
                foreach($post as $key => $value) {
                    if(strlen($value) <= 0) {
                        $value = "Sin datos";
                    }
                    echo '<br>';
                    echo $key . ': <strong>' . $value . '</strong><br>';
                }
            } else {
                echo 'Sin datos de búsqueda';
            }
        }
    }
?>