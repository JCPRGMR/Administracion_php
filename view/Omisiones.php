<?php include("../templates/header.php")?>
<?php include("../response/Omisiones.php")?>

<link rel="stylesheet" href="../css/styles2.css">
<style>
    
    main {
        flex-direction: column;
        overflow: auto;
    }
    table {
        width: 100%;
        overflow: scroll;
        border-collapse: collapse;
    }
    .tabla{
        overflow: auto;
    }
    .tabla{
        overflow: auto;
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
    a:nth-child(1) .item-list{
        background-color: white;
        color: black;
    }
    th{
        padding: 10px;
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
    button{
        border: none;
        cursor: pointer;
        font-weight: bold;
    }
    .btn-editar{
        background-color: greenyellow;
    }
    .btn-eliminar{
        background-color: red;
        color: white;
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
<a href="Omisiones_pdf_filtro.php" class="pdf">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
    </svg>
</a>
<div class="header">
    <a href="Omisiones_insertar.php" class="btn bg-black-blue">
        Nuevo registro
    </a>
    <form action="" method="post">
        <div class="filtros">
            <label for="date-f" class="date-filter">
                🔍
            </label>
            <input type="search" autofocus class="campo" name="buscador" id="buscador" placeholder="Buscador" onkeyup="filterTable()">
        </div>
    </form>
</div>
<div class="tabla">
    <table id="myTable" border="1">
        <thead>
            <th>CIUDAD</th>
            <th>NOMBRES</th>
            <th>AREAS</th>
            <th>OMISION</th>
            <th>INGRESO</th>
            <th>SALIDA</th>
            <th>MARCACION</th>
            <th>JUSTIFICACION</th>
            <th>REGISTRO</th>
            <!-- <th>ACCIONES</th> -->
        </thead>
        <tbody>
            <?php foreach(Omisiones::Mostrar() as $item):?>
            <tr>
                <td><?= $item->des_ciudad ?></td>
                <td><?= $item->nombres ?></td>
                <td><?= $item->des_area ?></td>
                <td><?= $item->tiempo_omision . ' ' . $item->medida ?></td>
                <td><?= ($item->ingreso)? '✔️' : '' ; ?></td>
                <td><?= ($item->salida)? '✔️' : '' ; ?></td>
                <td><?= ($item->marcacion)? '✔️' : '' ; ?></td>
                <td><?= $item->justificacion ?></td>
                <td><?= $item->f_registro_omision ?></td>
                <!-- <td>
                    <form action="../request/Omisiones.php" method="post">
                        <button type="submit" class="btn-editar" name="editar" value="<?= $item->id_omision ?>">Editar</button>
                        <button type="submit" class="btn-eliminar" name="eliminar" value="<?= $item->id_omision ?>">Eliminar</button>
                    </form>
                </td> -->
            </tr>
            <?php endforeach;?>
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