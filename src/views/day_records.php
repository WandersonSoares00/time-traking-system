<?php

$_GLOBALS['c']++;

session_start();

if ($_GLOBALS['c'] == 2 )
    print_r($records);
else{
    include_once ('template/header.php');
    include_once ('template/left.php');
    include_once ('template/content.php');
    include_once ('template/footer.php');
}
