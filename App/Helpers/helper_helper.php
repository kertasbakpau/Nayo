<?php

function get_variable(){
    return "UMKM";
}

function setisnull($data){
    if(empty($data))
        return null;
    else 
        return $data;
}

function setisdecimal($data){
    if(empty($data))
        return 0.00;
    else {
        $newvalue = str_replace(".","", $data);
        $newvalue = str_replace(",",".", $newvalue);
        return $newvalue;
    }
}

function setisnumber($data){
    if(empty($data))
        return 0;
    else 
        return $data;
}