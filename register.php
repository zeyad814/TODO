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
    
    if (!requiredval($name)) {
        $erorrs['name'] = "name is required";
    }elseif(!minval($name,3)) {
        $erorrs['name'] = "the name must be greater than 3 chars";
    }elseif (!maxval($name,20)) {
        $erorrs['name']= "the name must be less than 20 chars <br>";
        
    }
    if (!requiredval($email)) {
        $erorrs['email']= "the email is required";
    }else{
       if(filter_var($email,FILTER_VALIDATE_EMAIL)){
       }else {
        $erorrs['email']= "not valid email";
       }
    }
    if (!requiredval($password)) {
        $erorrs['password']= "the password is required";
    }elseif (!minval($password,3)) {
        $erorrs['password']= "the password is too short";
    }elseif (!maxval($password,20)) {
        $erorrs['password']= "the password is too longer";
    }

}
else {
    echo"not supported method";
}
$filename = './users.json';
$users = json_decode(file_get_contents($filename),true);
foreach ($users as $value) {
 if ($value["email"] == $email ) {
$erorrs["email"]= "email is already registered";
 }
}
if (count($erorrs)) {
    $erorrs = http_build_query($erorrs);
    header("location:registerform.php?$erorrs");
}
    
$users[]= [
    'id' => !count($users) ? 1 : ++end($users)["id"],
    'name' => $name,
    'email' => $email,
    'password' =>$password
];
file_put_contents($filename,json_encode($users));
if (count($erorrs) == 0) {
    header("location:loginform.php");
}