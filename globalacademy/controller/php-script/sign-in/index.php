<?php

    include('../../config/config.php');

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = MD5($_POST['password']);

    $sqlGet_users_tbl = "SELECT * FROM `users_tbl` WHERE `email` = '$email' AND password = '$password'";
    $result_users_tbl = mysqli_query($link, $sqlGet_users_tbl);
    $row_users_tbl = mysqli_fetch_assoc($result_users_tbl);
    $row_cnt_users_tbl = mysqli_num_rows($result_users_tbl);

    if($row_cnt_users_tbl > 0)
    {
        $usertype = $row_users_tbl['user_type'];

        $userid = $row_users_tbl['sn'];

        $sqlGet_users_tbl_update = "UPDATE `users_tbl` SET `active_status`='1' WHERE `sn` = '$userid'";
        $result_users_tbl_update = mysqli_query($link, $sqlGet_users_tbl_update);

        session_start();

        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = $usertype;

        echo $usertype;
    }
    else
    {
        echo 0;
    }
        
?>
