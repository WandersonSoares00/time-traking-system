<main class="content">
    <div class="content-title mb-4">
        <i class="icon icofont-check-alt mr-2"></i>
        <div>
            <h1>Registrar ponto</h1>
        </div>

        <?php include("../views/template/messages.php"); ?>
        
    </div>

    <div class="card">
        <div class="card-header">
            <h3><?= $_SESSION['today'] ?></h3>
            <p class="mb-0">Batimentos efetuados hoje:</p>
        </div>
        <div class="card-body">
        <?php if($_SESSION['time1'] != '---'): ?>

            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 1: <?= $_SESSION['time1'] ?></span>
                <span class="record">Saída 1:   <?= $_SESSION['time2'] ?></span>
            </div>
        <?php endif ?>
        
        <?php if($_SESSION['time3'] != '---'): ?>
            <div class="d-flex m-5 justify-content-around">
                <span class="record">Entrada 2: <?= $_SESSION['time3'] ?></span>
                <span class="record">Saída 2:   <?= $_SESSION['time4'] ?></span>
            </div>
        <?php endif ?>

        </div>
        <div class="card-footer d-flex justify-content-center">
            <a href="../controllers/time_track.php" class="btn btn-success btn-lg">
                <i class="icofont-check mr-1"></i>
                Bater Ponto
            </a>
        </div>
    </div>
</main>