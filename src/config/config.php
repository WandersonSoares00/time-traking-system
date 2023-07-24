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
include_once(realpath(dirname(__FILE__) . '/loader.php'));
include_once(realpath(MODEL_PATH        . '/Model.php'));
include_once(realpath(EXCEPTION_PATH    . '/AppException.php'));

// includes
//echo realpath(MODEL_PATH . "/Login.php");
//require_once (realpath(MODEL_PATH . "/Login.php"));
