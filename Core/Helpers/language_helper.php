<?php

function lang($params = ''){
    
    require CONFIG_PATH . "Config.php";
    
    $languange = $config['language'];
    $param = explode(".", $params);

    require APP_LANGUAGE_PATH.$languange."\\".$param[0].".php";

    return $lang[$param[1]];
    
}