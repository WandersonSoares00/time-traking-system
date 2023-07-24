<?php

loadModel('Login');
$exception = null;

$login = new Login($_POST);

// print_r($_POST); echo "\n";

if (count($_POST) > 0){
    try {
        $user = $login->check_login();
        // pressupondo que a requisição atual está em public
        loadTemplateView('day_records');
        //header("Location: src/controllers/day_records.php");
        
        //$_SESSION["user"] = $user;
        //header("Location: day_records.php");
    } catch(Exception $e) {
        $exception = $e;
    }
}

loadView('login', ($_POST + ['exception' => $exception]));
