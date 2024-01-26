<?php include("../templates/header.php") ?>
<?php include("../class/Usuarios.php") ?>
<link rel="stylesheet" href="../css/styles2.css">
<style>
    a:nth-child(4) .item-list{
        background-color: white;
        color: black;
    }
    main{
        flex-direction: column;
        overflow: scroll;
    }
    th{
        padding: 10px;
        position: sticky;
        top: -5px;
    }
    table{
        width: 100%;
        border-collapse: collapse;
    }
    .tabla{
        overflow: scroll;
    }
    .head{
        padding: 0 10px;
        display: flex;
        justify-content: space-between;
        background-color: rgb(43, 43, 43);
        flex-wrap: wrap;
        align-items: center;
        align-content: center
    }
    .form-date-filter{
        display: flex;
        justify-content: end;
        gap: 10px;
        height: 0px;
        overflow: hidden;
        align-items: center;
    }
    .form-date-filter input{
        padding: 5px;
        border-radius: 5px;
        background-color: rgb(43, 43, 43);
        color: white;
        box-shadow: 0 0 2px .1px gray;
    }
    #date-f{
        visibility: hidden;
        position: absolute;
    }
    #date-f:checked + form{
        overflow: auto;
        padding: 0 15px;
        height: 100px;
    }
    .filtros{
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .float{
        position: fixed;
        padding: 20px;
        border-radius: 50%;
        bottom: 20px;
        right: 20px;
    }
    td:last-child{
        text-align: center;
        max-width: 40px;
    }
    .btn-small{
        cursor: pointer;
        border-radius: 50%;
    }
    @media (width < 470px) {
        .head{
            gap: 10px;
            justify-content: center;
        }
    }
</style>
<div class="head">
    <!-- <a href="" id="open-modal" onclick="localStorage.clear()">Agregar empleados</a> -->
    <div class="container-camps p10">
        <a href="Usuarios_insertar.php" class="btn bg-black-blue" onclick="localStorage.clear()">
            Agregar Usuarios
        </a>
    </div>
    <div class="filtros">
        <input type="search" class="campo input-w-btn" autofocus name="buscador" id="buscador" placeholder="Buscador" onkeyup="filterTable()">
    </div>
</div>

<input type="checkbox" name="" id="date-f">
<form action="" style="flex-wrap: wrap" method="post" class="form-date-filter">
    <div class="dato">
        <label for="">Desde</label>
        <input type="date" name="f_inicio" id="" required>
    </div>
    <div class="dato">
        <label for="">Hasta</label>
        <input type="date" name="f_fin" id="" value="" max="">
    </div>
    <button type="submit" value="" class="btn bg-black-blue">Filtrar</button>
</form>

<div class="tabla">
    <table border="1" id="myTable">
        <thead>
            <th class="uper-bold bg-black-blue">PERSONAL</th>
            <th class="uper-bold bg-black-blue">Usuario</th>
            <th class="uper-bold bg-black-blue">Contraseña</th>
            <th class="uper-bold bg-black-blue">Rol</th>
            <!-- <th class="uper-bold bg-black-blue">Acciones</th> -->
        </thead>
        <tbody>
            <?php foreach(Usuarios::Mostrar() as $item): ?>
            <tr>
                <td align="center" class="p10"><?= $item->nombres . ' ' . $item->apellidos ?></td>
                <td align="center" class="p10"><?= $item->usuario ?></td>
                <td align="center" class="p10"><?= $item->contrasena ?></td>
                <td align="center" class="p10"><?= $item->des_rol ?></td>
                <td>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function filterTable() {
        var input, filter, tbody, tr, td, i, txtValue;
        input = document.getElementById("buscador");
        filter = input.value.toUpperCase();
        tbody = document.querySelector("#myTable tbody");
        tr = tbody.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            var showRow = false;
            for (var j = 0; j < tr[i].cells.length; j++) {
            td = tr[i].cells[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
                break;
                }
            }
            }
            tr[i].style.display = showRow ? "" : "none";
        }
    }
</script>