<?php
    $db = mysqli_connect("localhost", "root", "","image_crud");

    if(!$db)
    {
        echo "Bazaga ulanishda xatolik".mysqli_error();
    }
?>