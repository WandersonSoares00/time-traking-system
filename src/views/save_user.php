<main class="content">
    <div class="content-title mb-4">
        <i class="icon icofont-user mr-2"></i>
        <div>
            <h1>Cadastro de usuário</h1>
            <h2>Crie e atualize o usuário</h2>
        </div>    
    </div>

    <?php
        require(TEMPLATE_PATH . "/messages.php");
    ?>

    <!-- Criação do formulário com os atributos recebidos do controller -->
    <form action="#" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Informe o nome"
                    class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>"
                    value="<?= $userData['name'] ?>">
                <div class="invalid-feedback">
                    <?= $errors['name'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="usuario">Usuário</label>
                <input type="text" id="user" name="user" placeholder="Informe o usuario"
                    class="form-control <?= $errors['user'] ? 'is-invalid' : '' ?>"
                    value="<?= $userData['user'] ?>">
                <div class="invalid-feedback">
                    <?= $errors['user'] ?>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Informe a senha"
                    class="form-control <?= $errors['password'] ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?= $errors['password'] ?>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="confirm_password">Confirmação de Senha</label>
                <input type="password" id="confirm_password" name="confirm_password"
                    placeholder="Confirme a senha"
                    class="form-control <?= $errors['confirm_password'] ? 'is-invalid' : '' ?>">
                <div class="invalid-feedback">
                    <?= $errors['confirm_password'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Data de Admissão</label>
                <input type="date" id="start_date" name="start_date"
                    class="form-control <?= $errors['start_date'] ? 'is-invalid' : '' ?>"
                    value="<?= $userData['start_date'] ?>">
                <div class="invalid-feedback">
                    <?= $errors['start_date'] ?>

                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="end_date">Data de Desligamento</label>
                <input type="date" id="end_date" name="end_date"
                    class="form-control <?= $errors['end_date'] ? 'is-invalid' : '' ?>"
                    value="<?= $userData['end_date'] ?>">
                <div class="invalid-feedback">
                    <?= $errors['end_date'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="is_admin">Administrador?</label>
                <input type="checkbox" id="is_admin" name="is_admin"
                    class="form-control <?= $errors['is_admin'] ? 'is-invalid' : '' ?>"
                    <?= $userData['is_admin'] ? 'checked' : '' ?>>
                <div class="invalid-feedback">
                    <?= $errors['is_admin'] ?>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary btn-lg">Salvar</button>
            <a href="users.php"
                class="btn btn-secondary btn-lg">Cancelar</a>
        </div>
    </form>
    
</main>
