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
    label{
        white-space: nowrap;
    }
    .div{
        display: flex;
        flex-direction: row;
    }
    .btn{
        background-color: red;
        color: white;
    }
</style>
<form action="Control_pdf.php" method="post" class="form" target="_blank">
    <div class="p20 uper-bold">
        Filtrar datos para el pdf de control
    </div>
    <div class="contenedor p20">
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">Por Documento de identidad</label>
            <input type="number" name="carnet" id="carnet" class="campo" placeholder="Documento de identidad">
        </div>
        <br>
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">Por Nombres</label>
            <input type="text" name="nombres" id="nombres" class="campo" placeholder="Nombres">
        </div>
        <br>
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">Por Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="campo" placeholder="Apellidos">
        </div>
        <br>
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">Por Areas</label>
            <select name="area" id="areas" class="campo">
                <option value="" hidden>Seleccionar Area...</option>
                <option value="">Buscar en todo...</option>
                <?php foreach(Areas::Mostrar() as $item): ?>
                    <option value="<?= $item->id_area ?>"><?= $item->des_area ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <br>
        <div class="select-w-btn">
            <label for="" class="w-t bg-black-blue">Por Fecha de registro</label>
            <label for="" class="w-t bg-black-blue">Desde</label>
            <input type="date" name="inicio" id="inicio" class="campo">
            <label for="" class="w-t bg-black-blue">Hasta</label>
            <input type="date" name="fin" id="fin" class="campo">
        </div>
        <br>
        <button type="submit" class="btn" onclick="window.history.back()">
            VISTA PREVIA DEL PDF
        </button>
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
    // oldinput('carnet');
    // oldinput('nombres');
    // oldinput('apellidos');
    // oldinput('tiempo');
    // oldinput('inicio');
    // oldinput('fin');

    // oldCheckBox('Ingreso');
    // oldCheckBox('Salida');
    // oldCheckBox('Marcacion');
</script>