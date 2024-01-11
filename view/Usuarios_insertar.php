<?php include("../templates/header.php")?>
<?php include("../response/Omisiones.php")?>
<link rel="stylesheet" href="../css/styles2.css">
<style>
    a:nth-child(4) .item-list{
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
<form action="../request/Usuarios.php" method="post" class="form">
    <header class="p20 uper-bold">
        Registro de omision
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
                Contraseña
            </label>
            <input type="text" name="Contrasena" id="Contrasena" placeholder="Contraseña" class="campo">
        </div>
    </div>
    <div class="container-camps">
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">
                Empleado
            </label>
            <select name="empleado" id="empleados" class="campo" required>
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
                Rol
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
    </div>
    <div class="container-camps">
        <button type="submit" class="btn bg-black-blue" name="nuevo_usuario">Regsitrar</button>
    </div>
</form>
<script>
    var btn_eye = document.getElementById("login_view_password");

    btn_eye.addEventListener('click', togglePassword);

    function togglePassword() {
        const passwordInput = document.getElementById("contrasena");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
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