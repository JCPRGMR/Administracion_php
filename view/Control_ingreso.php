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
</style>
<form action="../request/Controles.php" method="post" class="form">
    <header class="p20 uper-bold">
        Detalles de ingreso
    </header>
    <div class="container-camps">
        <textarea name="obs_ingreso" id="Observaciones" cols="30" rows="10" placeholder="Observaciones..." class="input-w-t campo" required></textarea>
    </div>
    <div class="container-camps">
        <button type="submit" class="btn bg-black-blue" name="id_ingreso_obs" value="<?= $_GET['id']?>">Registrar</button>
        <button type="submit" class="btn bg-black-blue" name="sin_obs_ingreso" value="<?= $_GET['id']?>">Sin Observaciones</button>
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