<?php include("../templates/header.php")?>
<?php include("../response/Usuarios.php")?>
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
    .option > label {
      display: flex;
      cursor: pointer;
      background-color: rgb(43, 43, 43);
      width: 100%;
      color: white;
      padding: 5px;
    }
    .option > label:hover{
        background-color: gray;
    }
    #id_empleado{
        padding: 5px;
        border: none;
    }
    #id_empleado:focus + div{
        visibility: visible;
    }
    .option{
        visibility: hidden;
        flex-direction: column;
        position: absolute;
        right: 0px;
        top: 30px;
        max-height: 300px;
        overflow: auto;
    }
    .option:hover{
        visibility: visible;
    }
    .itemxd{
        accent-color: purple;
    }
    .select{
        position: relative;
        background-color: white;
        align-items: center;
    }
    .form{
        overflow: hidden;
    }
</style>
<form action="../request/Usuarios.php" method="post" class="form">
    <div class="p20 uper-bold">
        Asignar usuario a personal
    </div>
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
        <div class="select" style="width: 100%; display: flex; flex-direction: row; box-shadow: 0 0 5px 1px black;">
            <input type="search" id="id_empleado" placeholder="Buscar empleados" class="campo" list="false" style="width: 100%;" autocomplete="off">
            <div class="option" id="select">
                <?php foreach (Empleados::Mostrar() as $item) : ?>
                <label>
                    <input type="radio" name="id_empleado" class="itemxd" id="opcion" value="<?= $item->id_empleado ?>">
                    <?= $item->nombres . ' ' . $item->apellidos . ' | ' . $item->des_area . ' | ' . $item->des_cargo?>
                </label>
                <?php endforeach ?>
            </div>
            <a href="Empleados_insertar.php?back=usuarios" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
        </div>
    </div>
    <div class="container-camps">
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">
                Rol
            </label>
            <select name="rol" id="ciudad" class="campo" required>
                <?php foreach(Roles::Mostrar() as $item): ?>
                <option value="<?= $item->id_rol ?>">
                    <?= $item->des_rol ?>
                </option>
                <?php endforeach; ?>
            </select>
            <!-- <a href="Ciudades.php" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a> -->
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

<script>
    const radios = document.querySelectorAll('input[name="id_empleado"]');
    const busquedaInput = document.getElementById('id_empleado');
    const gs = document.getElementById('select');

    radios.forEach(radio => {
        radio.addEventListener('change', (event) => {
            const label = event.target.parentElement;
            const labelText = label.textContent.trim();
            busquedaInput.value = labelText;

            // Cambiar el estilo del elemento con id "group_s" a "visible: hidden"
            gs.style.visibility = 'hidden';
        });
    });

    busquedaInput.addEventListener('input', () => {
        const searchTerm = busquedaInput.value.toLowerCase();

        radios.forEach(radio => {
            const label = radio.parentElement;
            const optionText = label.textContent.toLowerCase();

            if (optionText.includes(searchTerm)) {
                label.style.display = 'block';
            } else {
                label.style.display = 'none';
            }
        });

        // Restaurar la visibilidad al elemento con id "group_s" cuando se modifica la entrada
        gs.style.visibility = 'visible';
    });
</script>