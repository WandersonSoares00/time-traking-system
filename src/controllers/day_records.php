<?php

require_once ('../config/config.php');

session_start();

if (!isset($_SESSION["name"])){
    header('Location: /');
    exit();
}

$user_id = $_SESSION['id'];
$records = WorkingHours::loadFromUserAndDate($user_id, date('Y-m-d'));
$workedInterval = $records->getWorkedInterval()->format("%H:%I:%S");
$activeClock = $records->getActiveClock();

$_SESSION['time1']   = $records -> time1 ? substr($records -> time1, 0, 5) : '---';
$_SESSION['time2']   = $records -> time2 ? substr($records -> time2, 0, 5) : '---';
$_SESSION['time3']   = $records -> time3 ? substr($records -> time3, 0, 5) : '---';
$_SESSION['time4']   = $records -> time4 ? substr($records -> time4, 0, 5) : '---';

require ('../views/template/header.php');
require ('../views/template/left.php');
require ('../views/template/content.php');
require ('../views/template/footer.php');
