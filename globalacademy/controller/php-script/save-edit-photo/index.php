<?php

    include('../../config/config.php');

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $base64Image = $_POST['base64Image'];
    $usertype = $_POST['usertype'];

    $sqlGet_users_tbl = "SELECT * FROM `users_tbl` WHERE `email` = '$email' AND user_type = '$usertype'";
    $result_users_tbl = mysqli_query($link, $sqlGet_users_tbl);
    $row_users_tbl = mysqli_fetch_assoc($result_users_tbl);
    $row_cnt_users_tbl = mysqli_num_rows($result_users_tbl);

    if($row_cnt_users_tbl > 0)
    {
        $sqlGet_users_tbl_update = "UPDATE `users_tbl` SET `photo`='$base64Image' WHERE `email` = '$email' AND `user_type` = '$usertype'";
        $result_users_tbl_update = mysqli_query($link, $sqlGet_users_tbl_update);

        echo 1;
    }
    else
    {
        echo 0;
    }
        
?>
