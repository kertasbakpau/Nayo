<?php

function base_url($params = ''){
    
    require CONFIG_PATH . "Config.php";

    return $config['base_url'].$params;
    
}

function redirect($newUrl = ""){
    header('Location: '.base_url($newUrl));
}