<?php
  
function check_in_array($input, $str) {
    foreach($input as $imp){
        if (strpos($imp, $str) !== false) {
            return true;
        }
    }
    return false;
}

function check_saturday($str) {
    $jadays = array('日','月','火','水','木','金','土');
    if($jadays[date('N', strtotime($str))-1] == '金'){
        return true;
    }else{
        return false;
    }
}

function check_sunday($str) {
    $jadays = array('日','月','火','水','木','金','土');
    if($jadays[date('N', strtotime($str))-1] == '土'){
        return true;
    }else{
        return false;
    }
}


?>