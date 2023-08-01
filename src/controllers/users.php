<?php

session_start();

if (!isset($_SESSION["name"]) or !$_SESSION["is_admin"]){
    header('Location: /');
    exit();
}

require_once ('../config/config.php');

$exception = null;

if(isset($_GET['delete'])) {
    try {
        
        User::deleteById($_GET['delete']);
        
        $_SESSION["message"] = [
            "type" => "success", "message" => 'Usuário excluído com sucesso.'
        ];
    }    
    catch(Exception $e) {
        
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {

            $_SESSION["message"] = [
                "type" => "error", "message" => 'Usuário ativo, desligue-o primeiro para ser possível apagá-lo do sistema.'
            ];
        }
        else {            
            $exception = $e;
        }
    }
}

$users = User::get();

foreach($users as $user) {
    
    $user->start_date = (new DateTime($user->start_date))->format('d/m/Y');    
    
    if($user->end_date) {        
        $user->end_date = (new DateTime($user->end_date))->format('d/m/Y');
    }
}


$records = WorkingHours::loadFromUserAndDate($_SESSION['id'] , date('Y-m-d'));
$workedInterval = $records->getWorkedInterval()->format("%H:%I:%S");
$activeClock = $records->getActiveClock();

require ('../views/template/header.php');
require ('../views/template/left.php');
require ('../views/users.php');
require ('../views/template/footer.php');

