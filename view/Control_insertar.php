<?php include("../templates/header.php")?>
<?php include("../response/Omisiones.php")?>
<link rel="stylesheet" href="../css/styles2.css">
<style>
    a:nth-child(2) .item-list{
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
<form action="../request/Controles.php" method="post" class="form">
    <div class="p20 uper-bold">
        Registro de control
    </div>
    <div class="container-camps">
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">
                Empleado
            </label>
            <select name="id_empleado" id="empleados" class="campo" required>
                <?php foreach(Empleados::Mostrar() as $item): ?>
                    <option value="<?= $item->id_empleado ?>">
                        <?= $item->nombres . ' | ' . $item->des_area . ' | ' . $item->des_cargo?>
                    </option>
                <?php endforeach ?>
            </select>
            <a href="Empleados_insertar.php?back=omision" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
        </div>
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">
                Ciudad
            </label>
            <select name="id_ciudad" id="ciudad" class="campo" required>
                <?php foreach(Ciudades::Mostrar() as $item): ?>
                <option value="<?= $item->id_ciudad ?>">
                    <?= $item->des_ciudad ?>
                </option>
                <?php endforeach; ?>
            </select>
            <a href="Ciudades.php" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
        </div>
    </div>
    <div class="container-camps">
        <textarea name="Observaciones" id="Observaciones" cols="30" rows="10" placeholder="Observaciones..." class="input-w-t campo" required></textarea>
    </div>
    <div class="container-camps">
        <button type="submit" class="btn bg-black-blue" name="nuevo_control">Regsitrar</button>
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
    function oldRadio(radioId) {
        const radio = document.getElementById(radioId);
        const storedValue = localStorage.getItem(radioId + 'Value');

        if (storedValue) {
            radio.checked = JSON.parse(storedValue);
        }

        radio.addEventListener('change', function () {
            const radioValue = radio.checked;
            localStorage.setItem(radioId + 'Value', JSON.stringify(radioValue));
        });
    }
    oldinput('Observaciones')
    oldinput('tiempo')

    oldselect('empleados');
    oldselect('ciudad');
</script>