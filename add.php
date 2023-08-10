<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <input type="text" placeholder="add the task" name="task"><br>
    <input type="submit" value="add" name="save">
    </form>
    <?php
    $data = file_get_contents('todo.json');
    $data = json_decode($data, true);
    
     if(isset($_POST['save'])){
        $todo=[
            "id"=> !count($data) ? 1 : ++end($data)['id'],
            "task" => $_POST['task']
            ] ;
            $data[] = $todo;
        $data=  json_encode($data);
        if(file_put_contents('todo.json', $data)){
        header('location:todo.php');
      
        }
        
        }

?>
</body>
</html>