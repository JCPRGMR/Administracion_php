<?php include("../templates/header.php")?>
<?php include("../class/Controles.php")?>
<?php include("../response/Omisiones.php")?>
<link rel="stylesheet" href="../css/styles2.css">
<style>
    main{
        flex-direction: column;
    }
    .header{
        background-color: rgb(43, 43, 43);
        width: 100%;
        padding: 10px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;
    }
    .filtros{
        display: flex;
        align-items: center;
    }
    .date-filter{
        cursor: pointer;
    }
    td{
        text-align: center;
        white-space: nowrap;
        overflow: auto;
        max-width: 100px;
    }
    td::-webkit-scrollbar-thumb{
        background-color: purple;
        border-radius: 10px;
    }
    td::-webkit-scrollbar{
        height: 5px;
    }
    a:nth-child(2) .item-list{
        background-color: white;
        color: black;
    }
    th{
        padding: 10px;
    }
    table{
        border-collapse: collapse;
    }
    .pdf{
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: red;
        border-radius: 50%;
        color: white;
        padding: 5px;
        bottom: 10px;
        right: 10px;
    }
</style>
<a href="Control_pdf_filtro.php" class="pdf">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
    </svg>
</a>
<!-- <div class="header">
    <a href="Control_insertar.php" class="btn bg-black-blue">
        Nuevo registro
    </a>
    <form action="" method="post">
        <div class="filtros">
            <input type="search" autofocus class="campo" name="buscador" id="buscador" placeholder="Buscador" onkeyup="filterTable()">
        </div>
    </form>
</div> -->
<table id="myTable" border="1">
    <thead>
        <th>CIUDAD</th>
        <th>NOMBRES</th>
        <th>AREAS</th>
        <th>INGRESO</th>
        <th>OBS. INGRESO</th>
        <th>SALIDA</th>
        <th>OBS. SALIDA</th>
        <th>REGISTRO</th>
    </thead>
    <tbody>
        <tr>
            <form action="../request/Controles.php" method="post">
                <td>
                    <div class="select-w-btn">
                        <select name="id_ciudad" id="ciudad" class="campo" required>
                            <?php foreach(Ciudades::Mostrar() as $item): ?>
                            <option value="<?= $item->id_ciudad ?>">
                                <?= $item->des_ciudad ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <a href="Ciudades.php" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
                    </div>
                </td>
                <td colspan="2">
                    <div class="select-w-btn">
                        <!-- <input list="empleados" name="id_empleado" class="campo" required placeholder="Empleado"> -->
                        <select name="id_empleado" id="" class="campo">
                            <option value="" hidden>Seleccionar empleado...</option>
                            <?php foreach(Empleados::Mostrar() as $item): ?>
                                <option value="<?= $item->id_empleado ?>">
                                <?= $item->nombres . ' ' . $item->apellidos . ' | ' . $item->des_area . ' | ' . $item->des_cargo?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <!-- <datalist id="empleados"> -->
                            <!-- <?php foreach(Empleados::Mostrar() as $item): ?>
                                <option value="<?= $item->nombres . ' | ' . $item->des_area . ' | ' . $item->des_cargo?>" data-id="<?= $item->id_empleado ?>">
                                </option>
                            <?php endforeach ?> -->
                        <!-- </datalist> -->
                        <a href="Empleados_insertar.php?back=omision" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
                    </div>
                </td>
                <td>
                    <form action="Control_salida.php" method="post">
                        <button type="submit" name="nuevo_control" value="<?= $item->id_control?>">
                            Agregar Ingreso
                        </button>
                    </form>
                </td>
            </form>
        </tr>
        <?php foreach(Controles::Mostrar() as $item):?>
        <tr>
            <td><?= $item->des_ciudad ?></td>
            <td><?= $item->nombres ?></td>
            <td><?= $item->des_area ?></td>
            <td><?= $item->ingreso ?></td>
            <td>
                <form action="../request/Controles.php" method="post">
                    <input type="text" name="observacion" id="" placeholder="Agregar observacion" value="<?= $item->obs_ingreso ?>">
                    <button type="submit" name="obs_ingreso" value="<?= $item->id_control?>" class="bg-black-blue">
                        📝
                    </button>
                </form>
            </td>
            <td>
                <?php if(is_null($item->salida)): ?>
                <form action="../request/Controles.php" method="post">
                    <button type="submit" name="id_salida" value="<?= $item->id_control?>">
                        Agregar salida
                    </button>
                </form>
                <?php else: ?>
                    <?= $item->salida ?>
                <?php endif; ?>
            </td>
            <td>
                <form action="../request/Controles.php" method="post">
                    <input type="text" name="observacion" id="" placeholder="Agregar observacion">
                    <button type="submit" name="obs_salida" value="<?= $item->id_control?>" class="bg-black-blue">
                        📝
                    </button>
                </form>
            </td>
            <td><?= $item->f_registro_control ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
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