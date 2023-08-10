<?php 
 $index = $_GET['index'];
$data =file_get_contents('todo.json');
$data = json_decode($data, true);

unset($data[$index]);


file_put_contents('todo.json',json_encode($data));
header('location:todo.php');
?>