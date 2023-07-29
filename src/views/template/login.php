
    <form class="form-login" action="#" method="post">
        <div class="login-card card">
            
            <div class="card-header">
                <h3>Marcador de ponto eletrônico</h3>
            </div>

            <div class="card-body">

                <!--?php include(TEMPLATE_PATH . '/messages.php') ?-->

                <div class="form-group">
                    <label for="user">Usuário</label>
                    <input type="user" id="user" name="user"
                        class="form-control"
                        
                        value="<?= (isset($user) ? $user : '') ?>"

                        placeholder="Informe o usuário" autofocus>
                    <div class="invalid-feedback">
                        <!--?= $errors['user'] ?-->
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password"

                        class="form-control"
                    
                        placeholder="Informe a senha">
                    <div class="invalid-feedback">
                        <!--?= $errors['password'] ?-->
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Entrar</button>
            </div>
        </div>
    </form>
