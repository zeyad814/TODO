<?php
function checkrequest($method){
    if ($_SERVER['REQUEST_METHOD'] == $method ) {
       return true;
    }
    return false;
}
function issetpost($input){
if (isset($_POST[$input])) {
  return true;
}
return false;
}

function sanitizeinput($input){
return trim(htmlspecialchars(htmlentities($input)));
}
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
  
  $erorrs=[];  
if (checkrequest('POST') && issetpost('email')) {
    
    foreach ($_POST as $key => $value) {
         $$key = sanitizeinput($value) ;
    }

if (!requiredval($email)){
    $erorrs['email'] = "Email is required";
}else {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    }else {
        $erorrs['email'] = "Invalid email"; 
    }
}
if(!requiredval($password)){
    $erorrs['password'] = "Password is required";
}elseif (!minval($password,3)) {
    $erorrs['password'] = "Password must be at least greater than 3 characters";   
}elseif (!maxval($password,20)) {
    $erorrs['password'] = "Password must be less than 20 characters";
}

}else{
    echo "not supported method";
}
if (count($erorrs) > 0) {
    $erorrs = http_build_query($erorrs);
    header("location:loginform.php?$erorrs");
}
$filename = './users.json';
$users = json_decode(file_get_contents($filename),true);
foreach ($users as $value) {
    if ($value['email'] == $email && $value['password'] == $password) {
        header("Location:todo.php");
        die;
    }else {
    echo "Error";
    }
}

