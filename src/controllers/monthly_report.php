<?php

session_start();

require_once ('../config/config.php');

if (!isset($_SESSION["name"])){
    header('Location: /');
    exit();
}

$currentDate = new DateTime();

$user_id = $_SESSION['id'];
$selectedUserId = $user_id;


$users = null;

//se o usuário logado for administrador do sistema:
if($_SESSION['is_admin']) {
    
    //popula o array de usuários com todos os usuários do banco
    $users = User::get();
    
    //atribui o $selectedUserId para o usuário que estiver no array $_POST
    //se não existir, utiliza o id do usuário logado
    $selectedUserId = $_POST['user'] ? $_POST['user'] : $user_id;
}

//atribui o $selectedPeriod para o período que estiver no array $_POST
//se não existir, utiliza o mês e ano atuais
$selectedPeriod = $_POST['period'] ? $_POST['period'] : $currentDate->format('Y-m');

//iniciando o array de períodos
$periods = [];

//laço para coletar os nomes dos meses do mês atual
//iterando sobre os anos, pode-se adicionar mais anos ...
for($yearDiff = 0; $yearDiff <= 0; $yearDiff++) {
    
    //definindo o ano
    $year = date('Y') - $yearDiff;
    
    //iterando sobre os meses
    for($month = 12; $month >= 1; $month--) {
        
        //obtendo o DateTime do referido mes e ano
        $date = new DateTime("{$year}-{$month}-1");
        
        //populando o array de períodos com as Strings formatadas
        //$periods[$date->format('Y-m')] = strftime('%B de %Y', $date->getTimestamp());
        $periods[$date->format('Y-m')] = $date->format('d F Y');
    }
}



$registries = WorkingHours::getMonthlyReport($selectedUserId, $selectedPeriod);

$report = [];
$workDay = 0;
$sumOfWorkedTime = 0;
$lastDay = getLastDayOfMonth($selectedPeriod)->format("d");

for ($day = 1; $day <= $lastDay; $day++) {
    $date = $selectedPeriod . '-' . sprintf('%02d', $day);
    $registry = $registries[$date];

    if (isPastWorkDay($date)) $workDay++;

    if ($registry) {
        $sumOfWorkedTime += $registry->worked_time;
        array_push($report, $registry);
    } 
    //else {
    //    array_push($report, new WorkingHours([
    //        "work_date" => $date,
    //        "worked_time" => 0
    //    ]));    }
}

define('WEEKLY_TIME', 12 * 60 * 60);
define('DAILY_TIME', WEEKLY_TIME / 5);

$expectedTime = $workDay * DAILY_TIME;
$balance = getTimeStringFromSeconds(abs($sumOfWorkedTime - $expectedTime));
$sign = ($sumOfWorkedTime >= $expectedTime) ? "+" : "-";

$sumOfWorkedTime = getTimeStringFromSeconds($sumOfWorkedTime);
$balance = "{$sign}{$balance}";

$records = WorkingHours::loadFromUserAndDate($user_id, date('Y-m-d'));
$workedInterval = $records->getWorkedInterval()->format("%H:%I:%S");
$activeClock = $records->getActiveClock();


require ('../views/template/header.php');
require ('../views/template/left.php');
require ('../views/monthly_report.php');
require ('../views/template/footer.php');

