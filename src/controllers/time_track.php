<?php

require_once ('../config/config.php');

session_start();

if (!isset($_SESSION["name"])){
    header('Location: /');
    exit();
}

$user_id = $_SESSION['id'];
$records = WorkingHours::loadFromUserAndDate($user_id, date('Y-m-d'));

try{
    $currentDateTime = new DateTime(); // Cria um objeto DateTime com a data e hora atuais

    $currentTime = $currentDateTime->format('H:i:s'); // Formata a hora como 'HH:ii:ss'
    
    $records -> register_time($currentTime);
    
    $_SESSION["message"] = [
        "type" => "success", "message" => "Adicionado com sucesso."
    ];
}
catch (AppException $event) {
    $_SESSION["message"] = [
        "type" => "error", "message" => $event->getMessage()
    ];
}


header('Location: day_records.php');
