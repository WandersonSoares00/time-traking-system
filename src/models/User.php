<?php

class User extends Model {
    protected static $tableName = "users";
    public static $columns = [
        "id",
        "name",
        "password",
        "user",
        "start_date",
        "end_date",
        "is_admin",
    ];

    public static function getActiveUsersCount() {
        return static::getCount(['raw' => 'end_date IS NULL']);
    }

    public function insert() {
        $this->validate();
        
        $this->is_admin = $this->is_admin ? 1 : 0;
        
        if(!$this->id) $this->id = null;
        
        if(!$this->end_date) $this->end_date = null;
        
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
                
        return parent::insert();
    }

    public function update() {
        
        $this->validate();
        
        $this->is_admin = $this->is_admin ? 1 : 0;
        
        if(!$this->end_date) $this->end_date = null;
        
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        
        return parent::update();
    }

    private function validate() {
        
        $errors = [];

        if(!$this->name) {            
            $errors['name'] = 'Nome é um campo obrigatório.';
        }

        if(!$this->user) {            
            $errors['user'] = 'Usuário é um campo abrigatório.';
        }

        if(!$this->start_date) {            
            $errors['start_date'] = 'Data de Admissão é um campo abrigatório.';
        }
        
        elseif(!DateTime::createFromFormat('Y-m-d', $this->start_date)) {            
            $errors['start_date'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }

        if($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)) {            
            $errors['end_date'] = 'Data de Desligamento deve seguir o padrão dd/mm/aaaa.';
        }

        if(!$this->password) {            
            $errors['password'] = 'Senha é um campo obrigatório.';
        }

        if(!$this->confirm_password) {            
            $errors['confirm_password'] = 'Confirmação de Senha é um campo abrigatório.';
        }

        if($this->password && $this->confirm_password && $this->password !== $this->confirm_password) {                
            $errors['password'] = 'As senhas não são iguais.';
            $errors['confirm_password'] = 'As senhas não são iguais.';
        }

        if(count($errors) > 0) {            
            throw new ValidationException($errors);
        }
    }
}
