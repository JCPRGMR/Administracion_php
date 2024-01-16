<?php include("../templates/header.php")?>
<?php include("../class/Ciudades.php")?>
<style>
    main{
        overflow: auto;
    }
</style>

<link rel="stylesheet" href="../css/styles2.css">
<link rel="stylesheet" href="../css/escalables0.css">
<form action="../request/Ciudades.php" method="post">
    <div class="container-camps">
        <div class="select-w-btn">
            <label for="ciudad" class="w-t">Ciudad</label>
            <input type="text" name="des_ciudad" id="ciudad" class="campo" autofocus required>
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
            <?php foreach(Ciudades::Mostrar() as $item): ?>
            <tr>
                <td>
                    <form action="../request/Ciudades.php" method="post">
                        <div class="input-w-btn p10">    
                            <input type="text" name="des_ciudad" id="" value="<?= $item->des_ciudad ?>" class="campo" required>
                            <button type="submit" name="id_ciudad" class="btn bg-black-blue" value="<?=  $item->id_ciudad ?>">Editar</button>
                        </div>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>