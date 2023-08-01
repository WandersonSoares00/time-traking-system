<main class="content">
    <div class="content-title mb-4">
        <i class="icon icofont-chart-histogram mr-2"></i>
        <div>
            <h1>Relatório Gerencial</h1>
            <h2>Resumo das horas trabalhadas do dia pelos funcionários</h2>
        </div>
    </div>

    <div class="summary-boxes">
        <div class="summary-box bg-primary">
            <i class="icon icofont-users"></i>
            <p class="title">Qtde de Funcionários</p>
            <h3 class="value"><?=
                                //imprimindo a quantidade de usuários ativos
                                //a variável $activeUsersCount vem do controller
                                $activeUsersCount
                              ?></h3>
        </div>
        <div class="summary-box bg-danger">
            <i class="icon icofont-patient-bed"></i>
            <p class="title">Qtde de Ausentes</p>
            <h3 class="value"><?=
                                //imprimindo a quantidade de usuários ausente na data atual
                                //o array $absentUsers vem do controller
                                count($absentUsers)
                              ?></h3>
        </div>
        <div class="summary-box bg-success">
            <i class="icon icofont-sand-clock"></i>
            <p class="title">Somatório das Horas do Mês</p>
            <h3 class="value"><?=
                                //imprimindo o somatório de horas trabalhadas no mês
                                //a variável $hoursInMonth vem do controller
                                $hoursInMonth
                              ?></h3>
        </div>
    </div>

    <?php
        //imprimindo os nomes dos usuários ausentes no dia atual
        //o array $absentUsers vem do controller
        
        if(count($absentUsers) > 0): ?>
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Ausentes do Dia</h4>
                    <p class="card-category mb-0">Relação dos funcionários que não bateram ponto hoje</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <th>Nome</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($absentUsers as $name): ?>
                                <tr>
                                    <td>
                                        <?=$name?>
                                    </td>
                                </tr>
                            <?php
                                endforeach
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    <?php
        endif
    ?>
</main>