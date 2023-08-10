<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<form method="post">
    <input type="text" placeholder="add the task" name="task"><br>
    <input type="submit" value="add" name="save">
    </form>
    <?php
    $data = file_get_contents('todo.json');
    $data = json_decode($data, true); 

    ?>
</body>
</html>