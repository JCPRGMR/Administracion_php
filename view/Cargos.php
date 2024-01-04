<?php include("../templates/header.php")?>
<?php include("../class/Cargos.php")?>

<link rel="stylesheet" href="../css/styles2.css">
<style>
    a:nth-child(3) .item-list{
        background-color: white;
        color: black;
    }
</style>

<link rel="stylesheet" href="../css/styles2.css">
<link rel="stylesheet" href="../css/escalables0.css">
<form action="../request/Cargos.php" method="post">
    <div class="container-camps">
        <div class="select-w-btn">
            <label for="cargo" class="w-t">Cargo</label>
            <input type="text" name="des_cargo" id="cargo" class="campo" autofocus required>
        </div>
        <button type="submit" class="btn bg-black-blue" name="insertar_cargo">Registrar cargo</button>
        <a href="Empleados_insertar.php" class="btn bg-black-blue">Volver Atras</a>
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
            <?php foreach(Cargos::Mostrar() as $item): ?>
            <tr>
                <td>
                    <form action="../request/Cargos.php" method="post">
                        <div class="input-w-btn p10">    
                            <input type="text" name="des_cargo" id="" value="<?= $item->des_cargo ?>" class="campo" required>
                            <button type="submit" name="id_cargo" class="btn bg-black-blue" value="<?=  $item->id_cargo ?>">Editar</button>
                        </div>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>