<?php 
    include "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>IMAGE CRUD - CodingBender</title>
</head>
<body>
<div class="container">
        <div class="content mt-5">
            <div class="">
                <div class="buttons d-flex justify-content-between"><h3>ALL USERS</h3><button type="button" class="btn btn-success"><a href="add.php" class="text-light text-decoration-none">Qo'shish</a></button></div>
                <?php
                    if (isset($_SESSION['status']))
                    {
                        echo $_SESSION['status'];
                        unset($_SESSION['status']);
                    }
                ?>
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Avatar</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            $view_users = mysqli_query($db, "SELECT * FROM users");
                            $i=1;
                            foreach ($view_users as $user):
                        ?>
                        <tr>
                            <td><?= $i++;?></td>
                            <td><?= $user['firstname'];?></td>
                            <td><?= $user['lastname'];?></td>
                            <td><?= $user['created_at'];?></td>
                            <td><img src="img/<?= $user['avatar'];?>" width="100"></td>
                            
                            <td><a href="edit.php?edit=<?= $user['id'];?>"><i class="bi bi-plus-square"></i></a> 
                            <a href="delete.php?deleteid=<?= $user['id'];?>"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>