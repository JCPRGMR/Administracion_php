<?php
    // var_dump($_POST);
    // echo $_POST['busqueda'];
    session_start();
    $post = (object) $_POST;
    ob_start();
?>
<?php include("../class/Controles.php")?>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        border-collapse: collapse;
    }
    table{
        border-collapse: collapse;
    }
    th{
        padding: 5px;
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
    h1{
        font-size: 35px;
        text-align: center;
    }
    img:nth-child(1){
        position: absolute;
        left: 0px;
    }
    img:nth-child(2){
        position: absolute;
        right: 0px;
    }
    .otra-hoja{
        page-break-before: always;
    }
    .obs{
        text-align: justify;
    }
</style>
<h1>
    <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/administracion_php/img/rtp_icono.png" alt="" width="50" height="50">
    INGRESOS Y SALIDAS
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
        <th>AREA</th>
        <th>INGRESO</th>
        <th class="obs">OBS. INGRESO</th>
        <th>SALIDA</th>
        <th class="obs">OBS. SALIDA</th>
        <th>FECHA DE REGISTRO</th>
        <!-- <th>REGISTRO</th> -->
    </thead>
    <tbody>
        <?php foreach(Controles::pdf($post) as $item):?>
        <tr>
            <td ><?= $item->ci ?></td>
            <td ><?= $item->nombres . ' ' . $item->apellidos ?></td>
            <td ><?= $item->des_area ?></td>
            <td ><?= $item->ingreso ?></td>
            <td class="obs"><?= $item->obs_ingreso ?></td>
            <td ><?= $item->salida ?></td>
            <td class="obs"><?= $item->obs_salida ?></td>
            <td ><?= $item->f_registro_control ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

<div class="otra-hoja">
    <h1>
        Detalles de busqueda
    </h1>
    <pre>
        <?php Controles::Detalles_De_Busqueda($post)?>
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