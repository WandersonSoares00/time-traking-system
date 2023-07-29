<?php

date_default_timezone_set("America/Fortaleza");

// Folders
define("MODEL_PATH",      realpath(dirname(__FILE__) . "/../models"));
define("VIEW_PATH",       realpath(dirname(__FILE__) . "/../views"));
define("ASSETS_PATH",     realpath(dirname(__FILE__) . "/../assets"));
define("CONTROLLER_PATH", realpath(dirname(__FILE__) . "/../controllers"));
define("TEMPLATE_PATH",   realpath(dirname(__FILE__) . "/../views/template"));
define("EXCEPTION_PATH",  realpath(dirname(__FILE__) . "/../exceptions"));

// Files
require_once(realpath(dirname(__FILE__) . '/Database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . "/date_utils.php"));
require_once(realpath(MODEL_PATH        . '/Model.php'));
require_once(realpath(MODEL_PATH        . '/User.php'));
require_once(realpath(MODEL_PATH        . '/Login.php'));
require_once(realpath(MODEL_PATH        . '/WorkingHours.php'));
require_once(realpath(EXCEPTION_PATH    . '/AppException.php'));


//require_once (realpath(MODEL_PATH . "/Login.php"));
