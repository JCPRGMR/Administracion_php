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
            <th class="uper-bold bg-black-blue">Empleado</th>
            <th class="uper-bold bg-black-blue">Usuario</th>
            <th class="uper-bold bg-black-blue">Contraseña</th>
            <th class="uper-bold bg-black-blue">Rol</th>
            <!-- <th class="uper-bold bg-black-blue">Acciones</th> -->
        </thead>
        <tbody>
            <?php foreach(Usuarios::Mostrar() as $item): ?>
            <tr>
                <td align="center" class="p10"><?= $item->nombres ?></td>
                <td align="center" class="p10"><?= $item->usuario ?></td>
                <td align="center" class="p10"><?= $item->contrasena ?></td>
                <td align="center" class="p10"><?= $item->des_rol ?></td>
                <td>
                    <!-- <form action="" method="post" class="">
                        <button type="submit" class="btn-small bg-black-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-exclamation" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5m0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                            </svg>
                        </button>
                        <button type="submit" class="btn-small bg-black-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                            </svg>
                        </button>
                    </form> -->
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