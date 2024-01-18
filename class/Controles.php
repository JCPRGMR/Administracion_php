<?php
    require_once("../connection/Conexion.php");
    date_default_timezone_set('America/Caracas');
    class Controles extends Conexion{
        public static function Insertar_Ingreso(object $post){
            // echo (self::Validar_control($post->id_empleado))? 'si' :'no';
            try {
                $sql = "INSERT INTO controles(
                    ingreso,
                    registro_ingreso,

                    id_fk_empleado,
                    id_fk_ciudad,

                    f_registro_control,
                    h_registro_control,
                    alter_control
                ) VALUES(
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                )";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, date('H:i:s'), PDO::PARAM_STR);
                $stmt->bindParam(2, date('Y-m-d'), PDO::PARAM_STR);

                $stmt->bindParam(3, $post->id_empleado, PDO::PARAM_INT);
                $stmt->bindParam(4, $post->id_ciudad, PDO::PARAM_INT);
                
                $stmt->bindParam(5, date('Y-m-d'), PDO::PARAM_STR);
                $stmt->bindParam(6, date('H:i:s'), PDO::PARAM_STR);
                $stmt->bindParam(7, date('Y-m-d H:i:s'), PDO::PARAM_STR);
                $stmt->execute();
                $sql = "SELECT id_control FROM controles ORDER BY id_control DESC LIMIT 1";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $post = $stmt->fetchObject();
                header("Location: ../view/Control_ingreso.php?id=". $post->id_control);
            } catch (PDOException $th) {
                header("Location: ../view/Control.php");
            }
        }
        public static function Insertar_Salida(object $post){
            //self::Validar_control($post->id_empleado);
            try {
                $sql = "INSERT INTO controles(
                    salida,
                    registro_salida,

                    id_fk_empleado,
                    id_fk_ciudad,

                    f_registro_control,
                    h_registro_control,
                    alter_control
                ) VALUES(
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                )";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, date('H:i:s'), PDO::PARAM_STR);
                $stmt->bindParam(2, date('Y-m-d'), PDO::PARAM_STR);

                $stmt->bindParam(3, $post->id_empleado, PDO::PARAM_INT);
                $stmt->bindParam(4, $post->id_ciudad, PDO::PARAM_INT);
                
                $stmt->bindParam(5, date('Y-m-d'), PDO::PARAM_STR);
                $stmt->bindParam(6, date('H:i:s'), PDO::PARAM_STR);
                $stmt->bindParam(7, date('Y-m-d H:i:s'), PDO::PARAM_STR);
                $stmt->execute();
                $sql = "SELECT id_control FROM controles ORDER BY id_control DESC LIMIT 1";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $post = $stmt->fetchObject();
                header("Location: ../view/Control_salida.php?id=". $post->id_control);
            } catch (PDOException $th) {
                header("Location: ../view/Control.php");
            }
        }
        public static function Agregar_Ingreso(object $post){
            try {
                $sql = "UPDATE controles SET ingreso = ?, registro_ingreso = ?, alter_control = ? WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, date('H:i:s'), PDO::PARAM_STR);
                $stmt->bindParam(2, date('Y-m-d'), PDO::PARAM_STR);
                $stmt->bindParam(3, date('Y-m-d H:i:s'), PDO::PARAM_STR);

                $stmt->bindParam(4, $post->id_ingreso, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Control_ingreso.php?id=". $post->id_ingreso);
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Agregar_Salida(object $post){
            try {
                $sql = "UPDATE controles SET salida = ?, registro_salida = ?, alter_control = ? WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, date('H:i:s'), PDO::PARAM_STR);
                $stmt->bindParam(2, date('Y-m-d'), PDO::PARAM_STR);
                $stmt->bindParam(3, date('Y-m-d H:i:s'), PDO::PARAM_STR);

                $stmt->bindParam(4, $post->id_salida, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Control_salida.php?id=". $post->id_salida);
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_controles WHERE f_registro_control = '". date('Y-m-d') ."' ORDER BY f_registro_control DESC, h_registro_control DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                return $th;
            }
        }
        public static function MostrarElAlto(){
            try {
                $sql = "SELECT * FROM vista_controles WHERE f_registro_control = '". date('Y-m-d') ."' AND id_fk_ciudad = 2 ORDER BY f_registro_control DESC, h_registro_control DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                return $th;
            }
        }
        public static function MostrarLaPaz(){
            try {
                $sql = "SELECT * FROM vista_controles WHERE f_registro_control = '". date('Y-m-d') ."' AND id_fk_ciudad = 1 ORDER BY f_registro_control DESC, h_registro_control DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                return $th;
            }
        }
        public static function Modificar(object $post){
            try {
                $sql = "UPDATE controles WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Eliminar(object $post){
            try {
                $sql = "DELETE FROM controles WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->id_control, PDO::PARAM_INT);
                $stmt->execute();
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function obs_ingreso(object $post){
            try {
                $sql = "UPDATE controles SET obs_ingreso = ?, alter_control = NOW() WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->obs_ingreso, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->id_ingreso_obs, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Control.php");
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function obs_salida(object $post){
            try {
                $sql = "UPDATE controles SET obs_salida = ?, alter_control = NOW() WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->obs_salida, PDO::PARAM_STR);
                $stmt->bindParam(2, $post->id_salida_obs, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Control.php");
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        
        public static function obs_ingreso_empty(object $post){
            try {
                $sql = "UPDATE controles SET obs_ingreso = ' ', alter_control = NOW() WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->sin_obs_ingreso, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Control.php");
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function obs_salida_empty(object $post){
            try {
                $sql = "UPDATE controles SET obs_salida = ' ', alter_control = NOW() WHERE id_control = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post->sin_obs_salida, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: ../view/Control.php");
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        }
        public static function Validar_control($post){
            try {
                $sql = "SELECT * FROM vista_controles WHERE id_empleado = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $post, PDO::PARAM_INT);  // Asumiendo que $post contiene la clave 'id_empleado'
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        
                if ($resultados) {
                    foreach ($resultados as $resultado) {
                        $horabdd = $resultado->h_registro_control;
                        $diabdd = $resultado->f_registro_control;
                        $hora = (new DateTime($horabdd))->modify('+1 hour')->format('Y-m-d H:i:s');
        
                        if ($hora <= date('H:i:s') && $diabdd == date('Y-m-d')) {
                            return false;
                        }
                    }
                    echo 'Ninguna fila cumpe la condicion';
                    return true;
                } else {
                    echo 'No se encontro el registro al empleado registrado';
                    return true;
                }
            } catch (PDOException $th) {
                // Manejar la excepción según tus necesidades
                echo $th;
                return false;
            }
        }        
        public static function pdf(object $post){
            try {
                $sql = "SELECT * FROM vista_controles WHERE ";
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

                if (!empty($post->ciudad)) {
                    $conditions[] = "id_fk_ciudad = ?";
                    $params[] = $post->ciudad;
                }

                if (!empty($post->inicio) && !empty($post->fin)) {
                    $conditions[] = "f_registro_control >= ? AND f_registro_control <= ?";
                    $params[] = $post->inicio;
                    $params[] = $post->fin;
                }

                $sql = "SELECT * FROM vista_controles";
                if (!empty($conditions)) {
                    $sql .= " WHERE " . implode(" AND ", $conditions);
                }

                $sql .= " ORDER BY f_registro_control DESC, h_registro_control DESC";
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