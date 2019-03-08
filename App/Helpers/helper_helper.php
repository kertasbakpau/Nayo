<?php

function encryptMd5($string){
    $hash = md5($string);
    $lastestString = substr($hash, strlen($hash) - 5, 5);
    $newChar = strrev($lastestString);
    $newString = substr($hash, 0,strlen($hash) - 5).$newChar;
    return $newString;
}

function get_variable(){
    return "accountingumkm";
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