<?php

date_default_timezone_set("America/Fortaleza");

// Folders
define("MODEL_PATH",      realpath(dirname(__FILE__) . "/../models"));
define("VIEW_PATH",       realpath(dirname(__FILE__) . "/../views"));
define("CONTROLLER_PATH", realpath(dirname(__FILE__) . "/../controllers"));
define("TEMPLATE_PATH",   realpath(dirname(__FILE__) . "/../views/template"));
define("EXCEPTION_PATH",  realpath(dirname(__FILE__) . "/../exceptions"));

// Files
require_once(realpath(dirname(__FILE__) . "/Database.php"));

