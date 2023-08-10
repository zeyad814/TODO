<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="page-header text-center">PHP Project Todo list</h1>
        <div class="row">
            <div class="col-12">
                <a href="add.php" class="btn btn-primary">add task</a>
                <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>ID</th>
                    <th>Tasks</th>
                    
                
                </thead>
                <tbody>
                    <?php
                       
                        $data = file_get_contents('todo.json');
                        
                        $data = json_decode($data);
 
                        $index = 0;
                        foreach($data as $row){
                            echo "
                                <tr>
                                    <td>".$row->id."</td>
                                    <td>".$row->task."</td>
                                    <td>
                                        <a href='edit.php?index=".$index."' class='btn btn-success btn-sm'>Edit</a>
                                        <a href='delete.php?index=".$index."' class='btn btn-danger btn-sm'>Delete</a>
                                    </td>
                                </tr>
                            ";
 
                            $index++;
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>

</html>