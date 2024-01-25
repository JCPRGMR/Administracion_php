<?php

    // use FontLib\Table\Type\post;
    require '../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    require_once("../connection/Conexion.php");
    require_once("../class/Cargos.php");
    class Empleados extends Conexion{
        public static function Insertar(object $datos){
            try {
                if(self::Buscar_carnet($datos->carnet)){
                    header("Location: ../view/Empleados.php");
                }else{
                    $expedido = strtoupper($datos->expedido);
                    $sql = "INSERT INTO empleados (
                    nombres, 
                    apellidos, 
                    ci, 
                    expedido,
    
                    celular,
                    id_fk_area,
                    id_fk_cargo,
    
                    f_registro_empleado,
                    h_registro_empleado,
                    alter_empleado) 
                    VALUES(?,?,?,?, ?,?,?, NOW(),NOW(),NOW())";
    
                    $stmt = Conexion::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $datos->nombres, PDO::PARAM_STR);
                    $stmt->bindParam(2, $datos->apellidos, PDO::PARAM_STR);
                    $stmt->bindParam(3, $datos->carnet, PDO::PARAM_STR);
                    $stmt->bindParam(4, $expedido, PDO::PARAM_STR);
    
                    $stmt->bindParam(5, $datos->celular, PDO::PARAM_STR);
                    $stmt->bindParam(6, $datos->area, PDO::PARAM_STR);
                    $stmt->bindParam(7, $datos->cargo, PDO::PARAM_STR);
                    $stmt->execute();
                    $defaultPage = 'Empleados.php';

                    $redirectPage = isset($datos->insertar_usuario) ? (
                        $datos->insertar_usuario == 'control' ? 'Control.php' : (
                            $datos->insertar_usuario == 'omision' ? 'Omisiones_insertar.php' : (
                                $datos->insertar_usuario == 'usuarios' ? 'Usuarios_insertar.php' : $defaultPage
                            )
                        )
                    ) : $defaultPage;

                    header("Location: ../view/" . $redirectPage);
                    exit();
                }
            } catch (PDOException $th) {
                $th->getMessage();
                $defaultPage = 'Empleados.php';

                $redirectPage = isset($datos->insertar_usuario) ? (
                    $datos->insertar_usuario == 'control' ? 'Control.php' : (
                        $datos->insertar_usuario == 'omision' ? 'Omisiones_insertar.php' : (
                            $datos->insertar_usuario == 'usuarios' ? 'Usuarios_insertar.php' : $defaultPage
                        )
                    )
                ) : $defaultPage;

                header("Location: ../view/" . $redirectPage);
            }
        }
        public static function Buscar_Empleado($id){
            try {
                $sql = "SELECT * FROM vista_empleados WHERE id_empleado = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $id, PDO::PARAM_INT);
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Modificar(object $datos){
            try {
                $expedido = strtoupper($datos->expedido);
                $sql = "UPDATE empleados SET

                nombres = ?,
                apellidos = ?,

                ci = ?,
                expedido = ?,
                celular = ?,

                id_fk_area = ?,
                id_fk_cargo = ?,
                alter_empleado = ? WHERE id_empleado = ?
                ";

                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $datos->nombres, PDO::PARAM_STR);
                $stmt->bindParam(2, $datos->apellidos, PDO::PARAM_STR);
                $stmt->bindParam(3, $datos->carnet, PDO::PARAM_STR);
                $stmt->bindParam(4, $expedido, PDO::PARAM_STR);
                $stmt->bindParam(5, $datos->celular, PDO::PARAM_INT);

                $stmt->bindParam(6, $datos->area, PDO::PARAM_INT);
                $stmt->bindParam(7, $datos->cargo, PDO::PARAM_INT);

                $stmt->bindParam(8, date('Y-m-d H:i:s'), PDO::PARAM_STR);
                $stmt->bindParam(9, $datos->modificar, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../view/Empleados.php");
            } catch (PDOException $th) {
                echo $th->getMessage();
                echo '<br>';
                echo '<pre>';
                var_dump($datos);
            }
        }
        public static function Eliminar(object $datos){
            try {
                $sql = "DELETE FROM empleados WHERE id_empleado = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $datos->eliminar, PDO::PARAM_STR);
                $stmt->execute();
                header("Location: ../view/Empleados.php");
            } catch (PDOException $th) {
                echo '<style>
                body{
                    font-family: Arial;
                    color: yellow;
                    background-color: red;
                    font-size: 20px;
                }
                </style>';
                echo 'No se puede eliminar al empleado:';
                echo '<br><br>';
                echo '<strong>Por que?</strong>';
                echo '<br>';
                echo '- El empleado tiene una cuenta de usuario';
                echo '<br>';
                echo '- El empleado tiene registros en omision o controles';
                echo '<br>';
                echo '<br>';
                echo '<strong>Por favor comuniquese con sistemas</strong>';
            }
        }
        public static function Mostrar(){
            try {
                $sql = "SELECT * FROM vista_empleados ORDER BY f_registro_empleado DESC, h_registro_empleado DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Mostrar_ID(){
            try {
                $sql = "SELECT * FROM vista_empleados ORDER BY id_empleado DESC";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
                return $resultado;
            } catch (PDOException $th) {
                echo $th;
            }
        }
        public static function Buscar_carnet($carnet){
            try {
                $sql = "SELECT * FROM empleados WHERE ci = ?";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->bindParam(1, $carnet, PDO::PARAM_STR);
                $stmt->execute();
                $res = $stmt->fetch(PDO::FETCH_OBJ);
                return $res;
            } catch (PDOException $th) {
                return null;
            }
        }
        public function UCFormat(){
            $rango = range('A', 'Z'); 
            $size_rango = count($rango);
            $rango[$size_rango] = 'ZZ';
            return $rango;
        }
        public static function Importar_Excel($file){
            $funcion = new self();
            $file = $file['tmp_name'];
            if (!empty($file) && is_uploaded_file($file)) {

                $hoja_de_trabajo = IOFactory::load($file)->getActiveSheet();

                $ColumnLetter = $funcion->UCFormat();

                $data = [];

                $heightRow = $hoja_de_trabajo->getHighestRow();

                for($row = 2; $row <= $heightRow; $row++){
                    $rowData = [];
                    foreach ($ColumnLetter as $column) {
                        $rowData[] = $hoja_de_trabajo->getCell($column . $row)->getValue();
                    }
                    $data[] = $rowData;
                }
                // foreach para importar los cargos
                foreach($data as $celda){
                    Cargos::Cargo_excel($celda[6]);
                }
                // foreach para importar los empleados
                foreach($data as $celda){
                    $carnet = $celda[1];
                    $apellidos = $celda[2] . ' ' . $celda[3];
                    $nombres = $celda[4] . ' ' . $celda[5];

                    $cargos = Cargos::buscar_cargo($celda[6]);

                    // echo '<pre>carnet:';
                    // echo $carnet;
                    // echo ' Apellidos:';
                    // echo $apellidos;
                    // echo ' Nombres:';
                    // echo $nombres;
                    self::Insertar_excel($carnet, $apellidos, $nombres, $cargos);
                }
            }else{
                echo 'Error al subir el archivo';
            }
        }
        public static function Insertar_excel($carnet, $apellidos, $nombres, $cargo){
            try {
                if(self::Buscar_carnet($carnet)){

                }else{
                    $sql = "INSERT INTO empleados (
                    nombres, 
                    apellidos, 
                    ci,
                    id_fk_cargo,
    
                    f_registro_empleado,
                    h_registro_empleado,
                    alter_empleado) 
                    VALUES(?,?,?, ?, NOW(),NOW(),NOW())";
    
                    $stmt = Conexion::Conectar()->prepare($sql);
                    $stmt->bindParam(1, $nombres, PDO::PARAM_STR);
                    $stmt->bindParam(2, $apellidos, PDO::PARAM_STR);
                    $stmt->bindParam(3, $carnet, PDO::PARAM_STR);
    
                    $stmt->bindParam(4, $cargo, PDO::PARAM_INT);
                    $stmt->execute();
                }
            } catch (PDOException $th) {
                $th->getMessage();
            }
        }
    }
?>