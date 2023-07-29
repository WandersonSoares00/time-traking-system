<main class="content">
    <div class="content-title mb-4">
        <i class="icon icofont-check-alt mr-2"></i>
        <div>
            <h1>Registrar ponto</h1>
        </div>

        <?php include("template/messages.php"); ?>
    </div>

    <div class="card">
        <div class="card-header">
            <h3><?= $_SESSION['today'] ?></h3>
            <p class="mb-0">Batimentos efetuados hoje:</p>
        </div>
        <div class="card-body">
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 1: <?= $_GLOBALS['time1'] ?? '---' ?></span>
                <span class="record">Saída 1:   <?= $_GLOBALS['time2'] ?? '---' ?></span>
            </div>
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 2: <?= $_GLOBALS['time3'] ?? '---' ?></span>
                <span class="record">Saída 2:   <?= $_GLOBALS['time4'] ?? '---' ?></span>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="../controllers/time_track.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Bater Ponto
            </a>
        </div>
    </div>


            <!--Retire -->
    <form class="mt-5" action="innout.php" method="post">
        <div class="input-group no-border">
            <input type="text" name="forcedTime" class="form-control"
                placeholder="Informe a hora para simular o batimento">
            <button class="btn btn-danger ml-3">
                Simular Ponto
            </button>
        </div>
    </form>



</main>