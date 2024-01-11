<?php
    session_start();
    (!isset($_SESSION['usuario'])) && header('Location: ../');
    $post = (object) $_POST;
    ob_start();
?>
<?php include("../response/Omisiones.php")?>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
    }
    table{
        border-collapse: collapse;
        width: 100%;
    }
    th{
        padding: 5px;
        white-space: nowrap;
    }
    td{
        padding: 0px 5px;
    }
    .header{
        background-color: rgb(43, 43, 43);
        width: 100%;
        padding: 10px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;
    }
    td{
        text-align: center;
    }
    .otra-hoja{
        page-break-before: always;
    }
    h1{
        font-size: 35px;
        text-align: center;
    }
    .obs{
        text-align: justify;
    }
</style>
<h1>
    <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/administracion_php/img/rtp_icono.png" alt="" width="50" height="50">
    REPORTE DE OMISIONES
    <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/administracion_php/img/rtp_icono.png" alt="" width="50" height="50">
</h1>
<br>
Ciudad: La Paz
<br>
<br>
<table id="myTable" border="1">
    <thead>
        <th>C.I.</th>
        <th>NOMBRES Y APELLIDOS</th>
        <th>AREAS</th>
        <th>OMISION</th>
        <th>INGRESO</th>
        <th>SALIDA</th>
        <th>MARCACION</th>
        <th>JUST.</th>
        <th>REGISTRO</th>
    </thead>
    <tbody>
        <?php foreach(Omisiones::Pdf($post) as $item):?>
        <tr>
            <td><?= $item->ci ?></td>
            <td style="white-space: nowrap;"><?= $item->nombres . ' ' . $item->apellidos ?></td>
            <td><?= $item->des_area ?></td>
            <td style="white-space: nowrap;"><?= $item->tiempo_omision . ' ' . $item->medida ?></td>
            <td><?= ($item->ingreso == 1)? "Si": "No"; ?></td>
            <td><?= ($item->salida == 1)? "Si": "No"; ?></td>
            <td><?= ($item->marcacion == 1)? "Si": "No"; ?></td>
            <td class="obs"><?= $item->justificacion ?></td>
            <td><?= $item->f_registro_omision ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div class="otra-hoja">
    <h1>
        Detalles de busqueda
    </h1>
    <pre>
        <?php Omisiones::Detalles_De_Busqueda($post)?>
    </pre>
    <br>
    <p>
    Busqueda realizada por: <strong><?= $_SESSION['usuario']->nombres . ' ' . $_SESSION['usuario']->apellidos?></strong>
    </p> 
</div>
<?php
    $html = ob_get_clean();
    
    require("../vendor/autoload.php");
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    
    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf->setOptions($options);


    $dompdf->loadHtml($html);

    $dompdf->setPaper("letter");
    $dompdf->render();
    $dompdf->stream(date('Y-m-d_H:i') . ".pdf", array("Attachment" => false));

?>