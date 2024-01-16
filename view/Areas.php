<?php include("../templates/header.php")?>
<?php include("../class/Areas.php")?>
<style>
    main{
        overflow: auto;
    }
</style>
<link rel="stylesheet" href="../css/styles2.css">
<link rel="stylesheet" href="../css/escalables0.css">
<form action="../request/Areas.php" method="post">
    <div class="container-camps">
        <div class="select-w-btn">
            <label for="area" class="w-t">Area</label>
            <input type="text" name="des_area" id="area" class="campo" autofocus>
        </div>
        <button type="submit" class="btn bg-black-blue" name="insertar_area" value="<?= $_GET['ruta'] ?>">Registrar area</button>
    </div>
</form>
<div class="p20">
    <table border="1">
        <thead>
            <th class="p10">
                Descripcion
            </th>
        </thead>
        <tbody>
            <?php foreach(Areas::Mostrar() as $item): ?>
            <tr>
                <td>
                    <form action="../request/Areas.php" method="post">
                        <div class="input-w-btn p10">    
                            <input type="text" name="des_area" id="" value="<?= $item->des_area ?>" class="campo" required>
                            <button type="submit" name="id_area" class="btn bg-black-blue" value="<?=  $item->id_area ?>">Editar</button>
                        </div>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>