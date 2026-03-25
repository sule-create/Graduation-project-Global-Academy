<?php

    include('../../config/config.php');

    $password1 = MD5($_POST['password1']);
    $userid = $_POST['userid'];
    $usertype = $_POST['usertype'];

    $date = date('Y-m-d');


    $sqlGet_users_tbl_insert = "UPDATE `users_tbl` SET `password`='$password1' WHERE `sn` = '$userid'";
    $result_users_tbl_insert = mysqli_query($link, $sqlGet_users_tbl_insert);

    echo 1;
?>
