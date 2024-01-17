<?php include("../templates/header.php")?>
<?php include("../response/Empleados.php") ?>
<?php $empleado = Empleados::Buscar_Empleado($_POST['modificar'])?>
<link rel="stylesheet" href="../css/styles2.css">
<style>
    a:nth-child(<?= isset($_GET['back']) ? ($_GET['back'] == 'control' ? 2 : ($_GET['back'] == 'omision' ? 1 : 3)) : 3; ?>) .item-list{
        background-color: white;
        color: black;
    }
    form{
        margin: 5%;
        border-radius: 15px;
    }
</style>
<main>
    <form action="../request/Empleados.php" method="post" class="form">
        <div class="p20 uper-bold">
            MODIFICAR DATOS EMPLEADO
        </div>
        <div class="container-camps">
            <div class="input-w-t">
                <label class="w-t">
                    Nombres
                </label>
                <input type="text" name="nombres" id="nombres" placeholder="Nombres" class="campo" value="<?= $empleado->nombres ?>">
            </div>
            <div class="input-w-t">
                <label class="w-t">
                    Apellidos
                </label>
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="campo" value="<?= $empleado->apellidos ?>">
            </div>
        </div>
        <div class="container-camps">
            <div class="input-w-t">
                <label class="w-t">
                    Carnet de identidad
                </label>
                <input type="number" name="carnet" id="carnet" readonly placeholder="Carnet de identidad" class="campo" value="<?= $empleado->ci ?>">
            </div>
            <div class="input-w-t">
                <label class="w-t">
                    Expedido
                </label>
                <input type="text" name="expedido" id="expedido" placeholder="" class="campo" value="<?= $empleado->expedido ?>">
            </div>
            <div class="input-w-t">
                <label class="w-t">
                    Celular
                </label>
                <input type="number" name="celular" id="celular" placeholder="" class="campo" value="<?= $empleado->celular ?>">
            </div>
        </div>
        <div class="container-camps">
            <div class="select-w-btn">
                <label for="" class="w-t">Area</label>
                <select name="area" id="area" class="campo">
                    <option value="<?= $empleado->id_fk_area ?>" hidden><?= $empleado->id_fk_area ?><?= $empleado->des_area ?></option>
                    <?php foreach(Areas::Mostrar() as $item): ?>
                    <option value="<?= $item->id_area ?>"><?= $item->id_area ?><?= $item->des_area ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="select-w-btn">
                <label for="" class="w-t">Cargo</label>
                <select name="cargo" id="cargo" class="campo">
                    <option value="<?= $empleado->id_fk_cargo ?>" hidden><?= $empleado->des_cargo ?></option>
                    <?php foreach(Cargos::Mostrar() as $item): ?>
                    <option value="<?= $item->id_cargo ?>"><?= $item->des_cargo ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="container-cmaps p10">
            <button type="submit" name="modificar" class="btn bg-black-blue" value="<?= $empleado->id_empleado ?>">Guardar Cambios</button>
            <!-- <a href="<?= isset($_GET['back']) ? ($_GET['back'] == 'control' ? 'Control.php' : ($_GET['back'] == 'omision' ? 'Omisiones.php' : 'Empleados.php')) : 'Empleados.php'; ?>" class="btn bg-black-blue">Volver atras</a> -->
        </div>
    </form>
</main>