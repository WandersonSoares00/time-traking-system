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

$_GLOBALS['time1'] = $records->time1;
$_GLOBALS['time2'] = $records->time2;
$_GLOBALS['time3'] = $records->time3;
$_GLOBALS['time4'] = $records->time4;

//$workingHours = WorkingHours::loadFromUserAndDate($user->id, date("Y-m-d"));
//$workedInterval = $workingHours->getWorkedInterval()->format("%H:%I:%S");
//$exitTime = $workingHours->getExitTime()->format("H:i:s");
//$activeClock = $workingHours->getActiveClock();


header('Location: ../views/day_records.php');
