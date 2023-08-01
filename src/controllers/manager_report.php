<?php

session_start();

if (!isset($_SESSION["name"]) or !$_SESSION["is_admin"]){
    header('Location: /');
    exit();
}

require_once ('../config/config.php');

$activeUsersCount = User::getActiveUsersCount();

$absentUsers = WorkingHours::getAbsentUsers();

//obtendo o mês e ano atuais
$yearAndMonth = (new DateTime())->format('Y-m');

//obtendo a quantidade total de segundos trabalhados no mês atual
$seconds = WorkingHours::getWorkedTimeInMonth($yearAndMonth);

//obtendo a quantidade de horas trabalhadas no mês atual
$hoursInMonth = explode(':', getTimeStringFromSeconds($seconds))[0];



$records = WorkingHours::loadFromUserAndDate($_SESSION['id'] , date('Y-m-d'));
$workedInterval = $records->getWorkedInterval()->format("%H:%I:%S");
$activeClock = $records->getActiveClock();

require ('../views/template/header.php');
require ('../views/template/left.php');
require ('../views/manager_report.php');
require ('../views/template/footer.php');
