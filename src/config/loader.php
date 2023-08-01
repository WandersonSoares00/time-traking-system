<?php

function loadModel ($modelName) {
    require_once (MODEL_PATH . "/{$modelName}.php");
}


function loadView ($viewName, $params = array()){

    if (count($params) > 0){
        foreach ($params as $key => $value){
            if (strlen($key) > 0)
                ${$key} = $value;       // cria variáveis do nome da chave, vindas de $_POST
        }
    }

    require_once (VIEW_PATH . "/{$viewName}.php");

}


function loadTemplateView ($viewName, $params = array()){

    if (count($params) > 0){
        foreach ($params as $key => $value){
            if (strlen($key) > 0)
                ${$key} = $value;       // cria variáveis do nome da chave, vindas de $_POST
        }
    }

    session_start();

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
    require_once (VIEW_PATH . "/template/{$viewName}.php");
    require ('../views/template/footer.php');


}

