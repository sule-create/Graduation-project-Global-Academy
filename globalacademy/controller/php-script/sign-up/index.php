<?php

    include('../../config/config.php');

    $usertype = $_POST['usertype'];
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $Phone = $_POST['Phone'];
    $password = MD5($_POST['password']);

    $date = date('Y-m-d');
    

    $sqlGet_users_tbl = "SELECT * FROM `users_tbl` WHERE `email` = '$email'";
    $result_users_tbl = mysqli_query($link, $sqlGet_users_tbl);
    $row_users_tbl = mysqli_fetch_assoc($result_users_tbl);
    $row_cnt_users_tbl = mysqli_num_rows($result_users_tbl);

    if($row_cnt_users_tbl > 0)
    {
        echo 0;
    }
    else
    {
        $sqlGet_users_tbl_update = "INSERT INTO `users_tbl`(`sn`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `user_type`, `active_status`, `date_added`) 
        VALUES (NULL,'$firstname','$lastname','$email','$Phone','$password','$usertype','0','$date')";
        $result_users_tbl_update = mysqli_query($link, $sqlGet_users_tbl_update);

        session_start();

        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = $usertype;

        echo 1;
    }
        
?>
