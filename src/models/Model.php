<?php

// Aponta para uma tabela no banco de dados
class Model {
    protected static $tableName = "";
    protected static $columns = [];
    protected $values = [];

    function __construct($arr) {
        $this -> load_from_array($arr);
    }

    public function load_from_array($arr, $sanitize = true) {
        if($arr) {
            foreach($arr as $key => $value) {
                
                $cleanValue = $value;

                if($sanitize && isset($cleanValue)) {                    
                    $cleanValue = strip_tags(trim($cleanValue));
                    $cleanValue = htmlentities($cleanValue, ENT_NOQUOTES);                    
                }
                $this->$key = $cleanValue;
            }
        }
    }

    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    public static function get($filters = [], $columns = "*") {
        $objects = [];
        $result = static::get_result_set_from_select($filters, $columns);

        if ($result) {
            $class = get_called_class();
            while ($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }

        return $objects;
    }

    public function getValues() {
        return $this->values;
    }

    public static function get_one($filters = [], $columns = "*") {
        $result = static::get_result_set_from_select($filters, $columns);
        
        if ($result) {
            $class = get_called_class();
            return new $class($result -> fetch_assoc());
        }

        return null;
    }

    public static function get_result_set_from_select($filters = [], $columns = "*") {
        $sql =
            "SELECT {$columns} FROM " . static::$tableName . static::get_filters($filters);
        
        
        $result = Database::get_result_from_query($sql);

        if ($result->num_rows === 0) {
            return null;
        }

        return $result;
    }

    
    public function insert() {
        $sql =
            "INSERT INTO " . static::$tableName . " (" .
            implode(",", static::$columns) . ") VALUES (";
        
        foreach (static::$columns as $col) {
            $sql .= static::get_formated_value($this->$col) . ",";
        }
        
        $sql[strlen($sql) - 1] = ")";
        $id = Database::executeSQL($sql);
        $this->id = $id;
    }

    public function update() {
        $sql = "UPDATE " . static::$tableName . " SET ";
        
        foreach (static::$columns as $column) {
            $sql .= " {$column} = " . static::get_formated_value($this->$column) . ",";
        }

        $sql[strlen($sql) - 1] = " ";
        $sql .= " WHERE id = {$this->id}";
        
        Database::executeSQL($sql);
    }

    public static function getCount($filters = []) {
        $result = static::get_result_set_from_select(
            $filters, 'count(*) as count');
        return $result->fetch_assoc()['count'];
    }

    public function delete() {
        static::deleteById($this->id);
    }

    public static function deleteById($id) {
        
        $sql = "DELETE FROM " . static::$tableName . " WHERE id = {$id}";
        
        Database::executeSQL($sql);
    }

    private static function get_filters($filters) {
        $sql = "";
        if (count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $column => $value) {
                if ($column == "raw") {
                    $sql .= " AND {$value}";
                } else {
                    $sql .= " AND {$column} = " . static::get_formated_value($value);
                }
            }
        }

        return $sql;
    }

    private static function get_formated_value($value) {
        if (is_null($value)) {
            return "null";
        } elseif (gettype($value) == "string") {
            return "'{$value}'";
        } else {
            return $value;
        }
    }

}
