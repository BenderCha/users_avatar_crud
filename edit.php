<?php
    include "functions.php";
    $id = $_GET['edit'];
    // var_dump($id);
    $user = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM users WHERE id = '$id'"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>USER AVATAR CRUD  - CodingBender</title>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="forms bg-primary-subtle">
                <h3>Add users</h3>
                <?php
                    if (isset($_SESSION['status']))
                    {
                        echo $_SESSION['status'];
                        unset($_SESSION['status']);
                    }
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?= $user['firstname']?>">
                    </div>
                    <div class="mb-3">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?= $user['lastname']?>">
                    </div>
                    <div class="mb-3">
                        <label for="firstname">Avatar</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                    <div class="mt-5 d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="submit" value="edit">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>