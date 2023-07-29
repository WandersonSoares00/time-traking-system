<?php

//require_once (realpath(MODEL_PATH . '/User.php'));

class Login extends Model {

    public function check_login() {

        if ($_POST['user'] == '')
            throw new AppException("Usuário não informado.");
        
        if ($_POST['password'] == '')
            throw new AppException("Senha não informada.");
        
        
        $user = User::get_one(["user" => $this->user]);

        if ($user) {

            if ($user->end_date) {
                throw new AppException("Usuário desligado do sistema.");
            }
            
            if(password_verify($this->password, $user->password))
                return $user;
            else
                throw new AppException("Senha inválida.");        
        }
        else
            throw new AppException("Usuário inválido.");
    }
}

