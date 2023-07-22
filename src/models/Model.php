<?php

// Aponta para uma tabela no banco de dados
class Model {
    protected static $tableName = "";
    protected static $columns = [];
    protected $values = [];

    function __construct($arr) {
        $this -> load_from_array($arr);
    }

    public function load_from_array($arr) {
        if ($arr) {
            foreach ($arr as $key => $value) {
                $this -> $key = $value; // i.e, $this -> set($key, $value);
            }
        }
    }

    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

}
