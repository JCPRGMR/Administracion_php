<?php include("../templates/header.php") ?>
<?php include("../class/Empleados.php") ?>
<link rel="stylesheet" href="../css/styles2.css">
<style>
    a:nth-child(3) .item-list{
        background-color: white;
        color: black;
    }
    main{
        flex-direction: column;
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
        <a href="Empleados_Insertar.php" class="btn bg-black-blue">
            Agregar Empleado
        </a>
    </div>
    <div class="filtros">
        <label for="date-f" class="date-filter">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#fff" class="bi bi-calendar-week" viewBox="0 0 16 16">
                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
            </svg>
        </label>
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
            <th class="uper-bold bg-black-blue">Nombres</th>
            <th class="uper-bold bg-black-blue">Carnet</th>
            <th class="uper-bold bg-black-blue">Area</th>
            <th class="uper-bold bg-black-blue">Cargo</th>
        </thead>
        <tbody>
            <?php foreach(Empleados::Mostrar() as $item): ?>
            <tr>
                <td align="center" class="p10"><?= $item->nombres ?></td>
                <td align="center" class="p10"><?= $item->ci ?></td>
                <td align="center" class="p10"><?= $item->des_area ?></td>
                <td align="center" class="p10"><?= $item->des_cargo ?></td>
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
            // Modifica el bucle para recorrer todas las celdas (td) en lugar de solo la primera
            var showRow = false;
            for (var j = 0; j < tr[i].cells.length; j++) {
            td = tr[i].cells[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                showRow = true;
                break; // Rompe el bucle si se encuentra una coincidencia en cualquier celda
                }
            }
            }
            tr[i].style.display = showRow ? "" : "none";
        }
    }
</script>