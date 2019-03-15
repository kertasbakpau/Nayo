<?php

require_once('core/Nayo.php');

define("DS", DIRECTORY_SEPARATOR);

define("ROOT", getcwd() . DS);

define("BASE_PATH", ROOT);

require BASE_PATH.'vendor/autoload.php';

Nayo::run();



