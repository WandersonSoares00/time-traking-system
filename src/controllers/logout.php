<?php

session_start();
session_unset();
session_destroy();

//$rootDirectory = dirname(__DIR__);

header("Location: /");
