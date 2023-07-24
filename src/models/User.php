<?php

class User extends Model {
    protected static $tableName = "users";
    protected static $columns = [
        "id",
        "name",
        "password",
        "user",
        "start_date",
        "end_date",
        "is_admin",
    ];

}
