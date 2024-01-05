<?php include("../templates/header.php")?>
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
    a:nth-child(2) .item-list{
        background-color: white;
        color: black;
    }
    th{
        padding: 10px;
    }
</style>
<div class="header">
    <a href="Control_insertar.php" class="btn bg-black-blue">
        Nuevo registro
    </a>
    <form action="" method="post">
        <div class="filtros">
            <label for="date-f" class="date-filter">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#fff" class="bi bi-calendar-week" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                </svg>
            </label>
            <input type="search" autofocus class="campo" name="buscador" id="buscador" placeholder="Buscador" onkeyup="filterTable()">
        </div>
    </form>
</div>
<table id="myTable">
    <thead>
        <th>CIUDAD</th>
        <th>NOMBRES</th>
        <th>AREAS</th>
        <th>INGRESOS</th>
        <th>SALIDA</th>
        <th>OBSERVACIONES</th>
        <th>REGISTRO</th>
    </thead>
    <tbody></tbody>
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