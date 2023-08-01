<main class="content">
    <div class="content-title mb-4">
        <i class="icon icofont-users mr-2"></i>
        <div>
            <h1>Cadastro de usuários</h1>
            <h2>Mantenha os dados dos usuários atualizados</h2>
        </div>    
    </div>

    <?php
        require("../views/template/messages.php");
    ?>
    
    <!-- link para a ação de cadastrar -->
    <!-- redireciona para a página save_user -->
    <a class="btn btn-lg btn-primary mb-3"
        href="save_user.php">Novo Usuário</a>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Data de Admissão</th>
            <th>Data de Desligamento</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php
                //iterando sobre o array
                //o array $users vem do controller
                foreach($users as $user):
            ?>
                <tr>
                    <!-- Preenchendo os dados na tabela -->
                    <td><?= $user->name ?></td>
                    <td><?= $user->user ?></td>
                    <td><?= $user->start_date ?></td>
                    <td><?= $user->end_date ?></td>
                    <td>
                        <!-- link para a ação de editar -->
                        <!-- redireciona para a página save_user passando o id do usuário pelo atributo update -->
                        <a href="save_user.php?update=<?= $user->id ?>" 
                            class="btn btn-warning rounded-circle mr-2">
                            <i class="icofont-edit"></i>
                        </a>
                        <!-- link para a ação de excluir -->
                        <!-- redireciona para a página atual(users) passando o id do usuário pelo atributo delete -->
                        <a href="?delete=<?= $user->id ?>"
                            class="btn btn-danger rounded-circle">
                            <i class="icofont-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
                endforeach
            ?>
        </tbody>
    </table>
</main>
