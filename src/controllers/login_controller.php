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
        
        $_SESSION['name']      = $user -> name;
        $_SESSION['id']        = $user -> id;
        $_SESSION['is_admin']  = $user -> is_admin;


        $timezone = new DateTimeZone('America/Fortaleza');
        $date = (new DateTime('now', $timezone))->getTimestamp();
        $_SESSION['today']  = date("d \d\\e M \d\\e Y");
        
        /*
        $workingHours = WorkingHours::loadFromUserAndDate($user->id, date("Y-m-d"));
        $workedInterval = $workingHours->getWorkedInterval()->format("%H:%I:%S");
        $exitTime = $workingHours->getExitTime()->format("H:i:s");
        $activeClock = $workingHours->getActiveClock();
        
        $_SESSION['time1']   = $workingHours -> time1 ? substr($workingHours -> time1, 0, 5) : '---';
        $_SESSION['time2']   = $workingHours -> time2 ? substr($workingHours -> time2, 0, 5) : '---';
        $_SESSION['time3']   = $workingHours -> time3 ? substr($workingHours -> time3, 0, 5) : '---';
        $_SESSION['time4']   = $workingHours -> time4 ? substr($workingHours -> time4, 0, 5) : '---';
        $_SESSION['workI']   = $workedInterval;
        $_SESSION['exitT']   = $exitTime;
        $_SESSION['activeC'] = $activeClock; */

        header('Location: ' . 'src/controllers/day_records.php');
                
    } catch(Exception $e) {
        $exception = $e;
    }
}


loadView('login', ($_POST + ['exception' => $exception]));
