<?php

session_start();

if (!isset($_SESSION["name"]) or !$_SESSION["is_admin"]){
    header('Location: /');
    exit();
}

require_once ('../config/config.php');

$exception = null;

$userData = [];

if(count($_POST) === 0 && isset($_GET['update'])) {    
    $user = User::get_one(['id' => $_GET['update']]);
    
    $userData = $user->getValues();
    $userData['password'] = null;
}

elseif(count($_POST) > 0) {
    try {
        if (isset($_GET['update']))
            $_POST['id'] = $_GET['update'];

        $dbUser = new User($_POST);

        if($dbUser->id) {
            
            $dbUser->update();
            
            $_SESSION["message"] = [
                "type" => "success", "message" => "Usuário alterado com sucesso!"
            ];

            header('Location: users.php');
            exit();
        }
        else {            
            $dbUser->insert();
            
            $_SESSION["message"] = [
                "type" => "success", "message" => 'Usuário cadastrado com sucesso!'
            ];
        }
        
        $_POST = [];
        
    }
    catch(ValidationException $e) {
        $erros = $e -> getErrors();
        $exception = $e;
    }
    catch(Exception $e) {        
        $exception = $e;
    }
    finally {        
       $userData = $_POST;
    }
}

$records = WorkingHours::loadFromUserAndDate($_SESSION['id'] , date('Y-m-d'));
$workedInterval = $records->getWorkedInterval()->format("%H:%I:%S");
$activeClock = $records->getActiveClock();

$userData + ['exception' => $exception];

require ('../views/template/header.php');
require ('../views/template/left.php');
require ('../views/save_user.php');
require ('../views/template/footer.php');

