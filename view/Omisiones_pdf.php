<?php
    // var_dump($_POST);
    // echo $_POST['busqueda'];
    $post = (object) $_POST;
    ob_start();
?>
<style>
    .new-page{
        page-break-after: always;
    }
</style>
<title>
    <?= date('Y-m-d_H:i') ?>
</title>
<h1>Detalles de busqueda</h1>
<!-- <div> -->
    Hola border-box
    <br>
    <!-- <div class="new-page"> -->
        <?= $post->busqueda; ?>
    <!-- </div> -->
    <div class="new-page">
        <?= $post->desde; ?>
        <?= $post->hasta; ?>
    </div>
<!-- </div> -->
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