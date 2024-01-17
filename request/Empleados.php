<?php
    require("../class/Empleados.php");
    $post = (object)$_POST;
    isset($post->insertar_usuario) && Empleados::Insertar($post);
    isset($post->eliminar) && Empleados::Eliminar($post);
    isset($post->send_excel) && Empleados::Importar_Excel($_FILES['Subir']);

    # Eliminar base de datos
    if(isset($post->del_bdd)){
        try {
            $tablas = [
                'omisiones',
                'controles',
                'usuarios',
                'empleados',
                'areas',
                'cargos',
                'ciudades',
                'roles',
            ];
        
            foreach ($tablas as $tabla) {
                $sql = "DELETE FROM $tabla; ALTER TABLE $tabla AUTO_INCREMENT = 1";
                $stmt = Conexion::Conectar()->prepare($sql);
                $stmt->execute();
            }
            header('Location: ../html/tabla_activos.php');
        } catch (PDOException $th) {
            echo 'error: ' . $th->getMessage();
        }
    }
?>