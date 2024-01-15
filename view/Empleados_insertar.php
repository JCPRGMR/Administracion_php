<?php include("../templates/header.php")?>
<?php include("../response/Empleados.php") ?>
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
        <header class="p20 uper-bold">
            Formulario para el registro de personal
        </header>
        <div class="container-camps">
            <div class="input-w-t">
                <label class="w-t">
                    Nombres
                </label>
                <input type="text" name="nombres" id="nombres" placeholder="Nombres" class="campo">
            </div>
            <div class="input-w-t">
                <label class="w-t">
                    Apellidos
                </label>
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="campo">
            </div>
        </div>
        <div class="container-camps">
            <div class="input-w-t">
                <label class="w-t">
                    Carnet de identidad
                </label>
                <input type="number" name="carnet" id="carnet" placeholder="Carnet de identidad" class="campo">
            </div>
            <div class="input-w-t">
                <label class="w-t">
                    Expedido
                </label>
                <input type="text" name="expedido" id="expedido" placeholder="Expedido" class="campo">
            </div>
            <div class="input-w-t">
                <label class="w-t">
                    Celular
                </label>
                <input type="number" name="celular" id="celular" placeholder="Celular" class="campo">
            </div>
        </div>
        <div class="container-camps">
            <div class="select-w-btn">
                <label for="" class="w-t">Area</label>
                <select name="area" id="area" class="campo">
                    <?php foreach(Areas::Mostrar() as $item): ?>
                    <option value="<?= $item->id_area ?>"><?= $item->des_area ?></option>
                    <?php endforeach; ?>
                </select>
                <a href="Areas.php" class="w-btn bg-black-blue">Anadir</a>
            </div>
            <div class="select-w-btn">
                <label for="" class="w-t">Cargo</label>
                <select name="cargo" id="cargo" class="campo">
                    <?php foreach(Cargos::Mostrar() as $item): ?>
                    <option value="<?= $item->id_cargo ?>"><?= $item->des_cargo ?></option>
                    <?php endforeach; ?>
                </select>
                <a href="Cargos.php" class="w-btn bg-black-blue">Anadir</a>
            </div>
        </div>
        <div class="container-cmaps p10">
            <button type="submit" name="insertar_usuario" class="btn bg-black-blue" value="<?= isset($_GET['back'])? $_GET['back']: ''; ?>">Registrar</button>
            <a href="<?= isset($_GET['back']) ? ($_GET['back'] == 'control' ? 'Control.php' : ($_GET['back'] == 'omision' ? 'Omisiones.php' : 'Empleados.php')) : 'Empleados.php'; ?>" class="btn bg-black-blue">Volver atras</a>
        </div>
    </form>
</main>
<!-- Insertar empleado -->
<script>
    function oldinput(inputId) {
        const input = document.getElementById(inputId);
        const storedValue = localStorage.getItem(inputId + 'Value');
        if (storedValue) {
            input.value = storedValue;
        }
        input.addEventListener('input', function () {
            const inputValue = input.value;
            localStorage.setItem(inputId + 'Value', inputValue);
        });
    }
    function oldselect(selectId) {
        const select = document.getElementById(selectId);
        const storedValue = localStorage.getItem(selectId + 'Value');
        if (storedValue) {
            select.value = storedValue;
        }
        select.addEventListener('change', function () {
            const selectValue = select.value;
            localStorage.setItem(selectId + 'Value', selectValue);
        });
    }
    oldinput('nombres');
    oldinput('apellidos');
    oldinput('carnet');
    oldinput('expedido');
    oldinput('celular');

    oldselect('area');
    oldselect('cargo');
</script>