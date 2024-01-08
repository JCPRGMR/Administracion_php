<?php
    // var_dump($_POST);
    // echo $_POST['busqueda'];
    $post = (object) $_POST;
    ob_start();
?>
<?php include("../response/Omisiones.php")?>
<style>
    table{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        border-collapse: collapse;
    }
    th{
        padding: 5px;
        white-space: nowrap;
    }
    td{
        padding: 0px 5px;
        white-space: nowrap;
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
</style>
<table id="myTable" border="1">
    <thead>
        <th>C.I.</th>
        <th>NOMBRES</th>
        <th>AREAS</th>
        <th>OMISION</th>
        <th>INGRESO</th>
        <th>SALIDA</th>
        <th>MARCACION</th>
        <th>JUST.</th>
        <th>REGISTRO</th>
    </thead>
    <tbody>
        <?php foreach(Omisiones::Mostrar() as $item):?>
        <tr>
            <td><?= $item->ci ?></td>
            <td><?= $item->nombres ?></td>
            <td><?= $item->des_area ?></td>
            <td><?= $item->tiempo_omision . ' ' . $item->medida ?></td>
            <td><?= ($item->ingreso == 0)? "Si": "No"; ?></td>
            <td><?= ($item->salida == 0)? "Si": "No"; ?></td>
            <td><?= ($item->marcacion == 0)? "Si": "No"; ?></td>
            <td><?= $item->justificacion ?></td>
            <td><?= $item->f_registro_omision ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php
    require("../vendor/autoload.php");
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $html = ob_get_clean();
    $options = $dompdf->getOptions();
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);

    $dompdf->setPaper("letter");
    $dompdf->render();
    $dompdf->stream(date('Y-m-d_H:i') . ".pdf", array("Attachment" => false));

?>