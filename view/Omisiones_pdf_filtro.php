<link rel="stylesheet" href="../css/styles2.css">
<style>
    body{
        margin: 0px;
        width: 100%;
        height: 100vh;
        box-sizing: border-box;
        overflow: hidden;
    }
    iframe{
        width: 100%;
        height: 100%;
    }
    .container-camps{
        justify-content: space-between;
    }
    label{
        height: 100%;
        align-items: center;
    }
</style>
<header>
    <form action="Omisiones_pdf.php" method="post" class="form" target="ven">
        <div class="container-camps">
            <div class="select-w-btn">
                <label for="" class="w-t bg-black-blue">
                    Busqueda
                </label>
                <input type="search" name="busqueda" id="" class="campo" required value="Busqueda">
            </div>
            <div class="select-w-btn">
                <label for="" class="w-t bg-black-blue">
                    Fecha
                </label>
                <label for="" class="bg-black-blue p10" style="display: flex;align-items: center;">
                    Desde:
                </label>
                <input type="date" name="desde" id="" class="campo" value="<?= date('Y-m-d') ?>">
                <label for="" class="bg-black-blue p10" style="display: flex;align-items: center;">
                    hasta
                </label>
                <input type="date" name="hasta" id="" class="campo" value="<?= date('Y-m-d') ?>">
            </div>
            <button type="submit" class="btn bg-black-blue">
                Generar PDF
            </button>
        </div>
    </form>
</header>
<!-- <iframe src="Omisiones_pdf.php" frameborder="0" id="ven" class="ven" name="ven"></iframe> -->