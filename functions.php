<?php 
    session_start();
    include "db.php";
    // $db = mysqli_connect("localhost", "root", "","image_crud");

    if (isset($_POST['submit']))
    {
       if($_POST['submit'] == "add")
       {
            add();
       } elseif ($_POST['submit'] == "edit")
       {
            edit();
       } else {
            delete();
       }
    }

    function add()
    {
        global $db;
        
        $firstname = $_POST['firstname'];
        $lastlname = $_POST['lastname'];
        $filename = $_FILES['file']['name'];
        $tmpname = $_FILES['file']['tmp_name'];

        $name_img_file = uniqid() ."-".$filename;

        move_uploaded_file($tmpname, "img/".$name_img_file);

        $add_users = "INSERT INTO users (firstname,lastname,avatar) VALUES('$firstname','$lastlname','$name_img_file')";
        $add_users_run = mysqli_query($db, $add_users);
        if ($add_users_run){
            echo "<script>alert('Fayl yuklandi'); document.location.href = 'index.php';</script>";
            $_SESSION['status'] = "Yangi foydalanuvchi qo'shildi";
            header("Location: index.php");
        } else {
            echo "<script>alert('Xatolik fayl yuklanmadi'); document.location.href = 'add.php';</script>";
            $_SESSION['status'] = "Xatolik Yangi foydalanuvchi qo'shilmadi";
            header("Location: add.php");
        }

    }
    function edit()
    {
        global $db;

        $id = $_GET['edit'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        if ($_FILES['file']['error'] != 4)
        {
            $filename = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];

            $name_img_file = uniqid() ."-".$filename;
            move_uploaded_file($tmpName, "img/".$name_img_file);
            $update_img = "UPDATE users SET avatar = '$name_img_file' WHERE id = '$id'";
            $update_img_run = mysqli_query($db, $update_img);
        }
        $update_firstname = "UPDATE users SET firstname = '$firstname' WHERE id = '$id'";
        $update_firstname_run = mysqli_query($db, $update_firstname);

        $update_lastname = "UPDATE users SET lastname = '$lastname' WHERE id = '$id'";
        $update_lastname_run = mysqli_query($db, $update_lastname);
        
        $_SESSION['status'] = "Foydalanuvchi muvofaqqiyatli o'zgartirildi";
        header("Location: index.php");
    }
    function delete()
    {
        global $db;

        $id = $_GET['deleteid'];

        if ($_FILES['file']['error'] != 4)
        {
            $filename = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];

            $name_img_file = uniqid() ."-".$filename;
            move_uploaded_file($tmpName, "img/".$name_img_file);

            $update_img = "DELETE FROM users SET avatar = '$name_img_file' WHERE id = '$id'";
            $update_img_run = mysqli_query($db, $update_img);
        }
        $delete_user = "DELETE FROM users WHERE id = '$id'";
        mysqli_query($db, $delete_user);
    }
?>