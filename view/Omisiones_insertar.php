<?php include("../templates/header.php")?>
<?php include("../response/Omisiones.php")?>
<link rel="stylesheet" href="../css/styles2.css">
<style>
    a:nth-child(1) .item-list{
        background-color: white;
        color: black;
    }
    form{
        margin: 5%;
        border-radius: 15px;
    }
    .radio{
        display: flex;
        flex: 1;
        justify-content: center;
    }
    .check{
        cursor: pointer;
        box-shadow: 0 0 5px 1px gray;
        padding: 10px 30px;
        font-weight: bold;
        text-transform: uppercase;
    }
    .b_chek{
        visibility: hidden;
        position: absolute;
    }
    .b_chek:checked + .check{
        color: white;
        background-color: royalblue;
    }
</style>
<form action="../request/Omisiones.php" method="post" class="form">
    <header class="p20 uper-bold">
        Registro de omision
    </header>
    <div class="container-camps">
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">
                Empleado
            </label>
            <select name="empleado" id="empleados" class="campo" required>
                <?php foreach(Empleados::Mostrar() as $item): ?>
                    <option value="<?= $item->id_empleado ?>">
                        <?= $item->nombres . ' ' . $item->apellidos . ' | ' . $item->des_area . ' | ' . $item->des_cargo?>
                    </option>
                <?php endforeach ?>
            </select>
            <a href="Empleados_insertar.php?back=omision" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
        </div>
        <div class="select-w-btn" style="visibility: hidden; position: absolute;">
            <label for="" class="w-t bg-black-blue">
                Ciudad
            </label>
            <select name="ciudad" id="ciudad" class="campo" required>
                <?php foreach(Ciudades::Mostrar() as $item): ?>
                <option value="<?= $item->id_ciudad ?>">
                    <?= $item->des_ciudad ?>
                </option>
                <?php endforeach; ?>
            </select>
            <a href="Ciudades.php" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
        </div>
        <div name="" id="" class="select-w-btn">
            <label for="" class="w-t bg-black-blue" style="white-space: nowrap;">
                Tiempo
            </label>
            <input type="number" name="tiempo" id="tiempo" class="campo" required max="59" maxlength="2">
            <select name="medida" id="" class="campo w-t bg-black-blue">
                <option value="minuto(s)">Minutos</option>
                <option value="hora(s)">Horas</option>
            </select>
        </div>
    </div>
    <div class="container-camps">
        <div class="radio">
            <input type="checkbox" name="Ingreso" class="b_chek" id="Ingreso" value="1">
            <label for="Ingreso" class="check">Ingreso</label>
        </div>
        <div class="radio">
            <input type="checkbox" name="Salida" class="b_chek" id="Salida" value="1">
            <label for="Salida" class="check">Salida</label>
        </div>
        <div class="radio">
            <input type="checkbox" name="Marcacion" class="b_chek" id="Marcacion" value="1">
            <label for="Marcacion" class="check">Marcacion</label>
        </div>
    </div>
    <div class="container-camps">
        <textarea name="justificacion" id="justificacion" cols="30" rows="10" placeholder="Justificacion" class="input-w-t campo"></textarea>
    </div>
    <div class="container-camps">
        <button type="submit" class="btn bg-black-blue" name="nueva_omision">Regsitrar</button>
    </div>
</form>
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
    function oldCheckBox(checkboxId) {
        const checkbox = document.getElementById(checkboxId);
        const storedValue = localStorage.getItem(checkboxId + 'Value');

        if (storedValue) {
            checkbox.checked = JSON.parse(storedValue);
        }

        checkbox.addEventListener('change', function () {
            const checkboxValue = checkbox.checked;
            localStorage.setItem(checkboxId + 'Value', JSON.stringify(checkboxValue));
        });
    }
    oldCheckBox('Ingreso');
    oldCheckBox('Salida');
    oldCheckBox('Marcacion');

    oldinput('justificacion')
    oldinput('tiempo')

    oldselect('empleados');
    oldselect('ciudad');
</script>