<?php

session_start();
$exception = null;

loadModel('Model');
loadModel("Login");
loadModel("WorkingHours");

if (count($_POST) > 0){

    $login = new Login($_POST);
    
    try {
        $user = $login->check_login();
        
        foreach (User::$columns as $column) {
            $_SESSION[$column] = $user->$column;
            echo $column;
        }

        $timezone = new DateTimeZone('America/Sao_Paulo');
        $date = (new DateTime('now', $timezone))->getTimestamp();
        $today = date("d \d\\e M \d\\e Y");
        $_SESSION['today']   = $today;

        //header("Location: day_records.php");
        
        //header("Location: src/controllers/day_records.php");
        
        $workingHours = WorkingHours::loadFromUserAndDate($user->id, date("Y-m-d"));
        $workedInterval = $workingHours->getWorkedInterval()->format("%H:%I:%S");
        $exitTime = $workingHours->getExitTime()->format("H:i:s");
        $activeClock = $workingHours->getActiveClock();

        $_SESSION['time1']   = $workingHours -> time1; 
        $_SESSION['time2']   = $workingHours -> time2;        
        $_SESSION['time3']   = $workingHours -> time3;
        $_SESSION['time4']   = $workingHours -> time4;
        $_SESSION['workI']   = $workedInterval;
        $_SESSION['exitT']   = $exitTime;
        $_SESSION['activeC'] = $activeClock;
        //print_r($_SESSION);
        $_GLOBALS['c'] = 0;
        header("Location: src/views/day_records.php");
        
    } catch(Exception $e) {
        $exception = $e;
    }
}


loadView('login', ($_POST + ['exception' => $exception]));
