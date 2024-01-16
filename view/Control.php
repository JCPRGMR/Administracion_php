<?php include("../templates/header.php") ?>
<?php include("../class/Controles.php") ?>
<?php include("../response/Omisiones.php") ?>
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
    .header {
        background-color: rgb(43, 43, 43);
        width: 100%;
        padding: 10px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;
    }

    .filtros {
        display: flex;
        align-items: center;
    }

    .date-filter {
        cursor: pointer;
    }

    td {
        text-align: center;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: auto;
        max-width: 120px;
    }
    td > button{
        cursor: pointer;
    }

    td::-webkit-scrollbar-thumb {
        background-color: purple;
        border-radius: 10px;
    }

    td::-webkit-scrollbar {
        height: 5px;
    }

    a:nth-child(2) .item-list {
        background-color: white;
        color: black;
    }

    th {
        padding: 10px;
        top: 0px;
        background-color: white;
    }


    .pdf {
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
    }
    .option:hover{
        visibility: visible;
    }
    .itemxd{
        accent-color: purple;
    }
    .select{
        position: relative;
        background-color: yellow;
    }
</style>
<a href="Control_pdf_filtro.php" class="pdf">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
    </svg>
</a>

<form action="../request/Controles.php" method="post">
    <div class="container-camps">
        <div class="select-w-btn" style="visibility: hidden; position: absolute;">
            <select name="id_ciudad" id="ciudad" class="campo" required>
                <?php foreach (Ciudades::Mostrar() as $item) : ?>
                    <option value="<?= $item->id_ciudad ?>">
                        <?= $item->des_ciudad ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <a href="Ciudades.php" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
        </div>
        <div class="select" style="background-color: red; width: 100%;">
            <input type="search" id="id_empleado" placeholder="Buscar empleados" class="campo" list="false" style="width: 100%;">
            <div class="option" >
                <?php foreach (Empleados::Mostrar() as $item) : ?>
                <label>
                <input type="radio" name="id_empleado" class="itemxd" id="opcion" value="<?= $item->id_empleado ?>">
                <?= $item->nombres . ' ' . $item->apellidos . ' | ' . $item->des_area . ' | ' . $item->des_cargo?>
                </label>
                <?php endforeach ?>
            </div>
        </div>
        <a href="Empleados_insertar.php?back=control" class="w-btn bg-black-blue" style="white-space: nowrap;">+</a>
        <button type="submit" name="insertar_ingreso" value="<?= $item->id_control ?>" onclick="localStorage.clear()">
            Registrar Ingreso
        </button>
        <button type="submit" name="insertar_salida" value="<?= $item->id_control ?>" onclick="localStorage.clear()">
            Registrar Salida
        </button>
        
    </div>
</form>
<div class="tabla">
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
            <?php foreach (Controles::Mostrar() as $item) : ?>
                <tr>
                    <td><?= $item->des_ciudad ?></td>
                    <td><?= $item->nombres . ' ' . $item->apellidos ?></td>
                    <td><?= $item->des_area ?></td>
                    <td>
                        <?php if (is_null($item->ingreso)) : ?>
                            <form action="../request/Controles.php" method="post">
                                <button type="submit" name="id_ingreso" value="<?= $item->id_control ?>">
                                    Agregar ingreso
                                </button>
                            </form>
                        <?php else : ?>
                            <?= $item->ingreso ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $item->obs_ingreso ?></td>
                    <td>
                        <?php if (is_null($item->salida)) : ?>
                            <form action="../request/Controles.php" method="post">
                                <button type="submit" name="id_salida" value="<?= $item->id_control ?>">
                                    Agregar salida
                                </button>
                            </form>
                        <?php else : ?>
                            <?= $item->salida ?>
                        <?php endif; ?>
                    </td>
                    <td><?= $item->obs_salida ?></td>
                    <td><?= $item->f_registro_control ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    function filterTable() {
        var input, filter, tbody, tr, td, i, txtValue;
        input = document.getElementById("id_empleado");
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

  <script>
    const radios = document.querySelectorAll('input[name="id_empleado"]');
    const busquedaInput = document.getElementById('id_empleado');

    radios.forEach(radio => {
    radio.addEventListener('change', (event) => {
        const label = event.target.parentElement;
        const labelText = label.textContent.trim();
        busquedaInput.value = labelText;
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
    });
  </script>