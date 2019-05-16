<?php

function escapeString(string $string){
    return str_replace("'", "''", $string);
}