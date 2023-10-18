<?php
    session_start();
    include "db.php";
    $id = $_GET['deleteid'];
    if (isset($id))
    {
        $select_img = mysqli_query($db, "SELECT * FROM users WHERE id = '$id'");
        while ($row = mysqli_fetch_assoc($select_img))
        {
            $delete_img = $row["avatar"];
        }
        
        if (unlink('img/'.$delete_img))
        {
            mysqli_query($db, "DELETE FROM users WHERE id = '$id'");
            $_SESSION['status'] = "Foydalanuvchi muvofaqqiyatli o'chirildi";
            header("Location: index.php");
        }
    }
?>