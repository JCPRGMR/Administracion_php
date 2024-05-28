<?php 
    include("../class/Empleados.php");
    $hola = 'XD';
    ob_start();
?>
<title>
    <?= date('Y-m-d_H:i:s') ?>.pdf
</title>
<style>
    .tabla{
        font-family: Arial, Helvetica, sans-serif;
        text-align: center
    }
    th{
        background-color: black;
        color: white;
        padding: 5px;
    }
    td{
        padding: 2px 10px;
    }
    table{
        border-collapse: collapse;
        width: 100%;
    }
    h1{
        display: inline;
        margin: 0px 20px;
    }
</style>
<?php $html = ''?>
<div class="tabla p20">
    <header>
        <!-- <img src="http://<?= $_SERVER['HTTP_HOST']?>/pruebas/img/rtp_icono.png" alt=""> -->
        <h3>REPORTE DE EMPLEADOS</h3>
        <!-- <img src="http://<?= $_SERVER['HTTP_HOST']?>/pruebas/img/rtp_logo.png" alt=""> -->
    </header>
    <table border="1" id="myTable">
        <thead>
            <th>Nombres</th>
            <th>Carnet</th>
            <th>Area</th>
            <th>Cargo</th>
        </thead>
        <tbody>
            <?php foreach(Empleados::Mostrar() as $item): ?>
            <tr>
                <td align="center"><?= $item->nombres ?></td>
                <td align="center"><?= $item->ci ?></td>
                <td align="center"><?= $item->des_area ?></td>
                <td align="center"><?= $item->des_cargo ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
    $html = ob_get_clean();
    require '../vendor/autoload.php';
    use Dompdf\Dompdf;
    $pdf = new Dompdf();
    $options = $pdf->getOptions();
    $pdf = new Dompdf($options);
    $pdf->load_html($html);
    $pdf->setPaper('letter');
    $pdf->render();
    $pdf->stream(date('Y-m-d_H:i:s') . ".pdf", array("Attachment" => false));
?>