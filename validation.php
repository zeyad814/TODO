<?php

function requiredval($input){
    if (empty($input)) {
        return false;
    }
    return true;
}
function minval($input,$lenthe){
    if(strlen($input) < $lenthe) {
        return false;
    }
    return true;
}
function maxval($input,$lenthe){
    if (strlen($input) > $lenthe) {
        return false;
    }
    return true;
}
function emailval($input){
    if (strlen($input) == 0) {
        return true;
    }else {
        return false;
    }
    
}