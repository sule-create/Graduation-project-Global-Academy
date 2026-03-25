<?php 
    session_start();
    include('../../controller/session/user_session.php');

    $sqlGet_users_tbl_update = "UPDATE `users_tbl` SET `active_status`='0' WHERE `sn` = '$userid'";
    $result_users_tbl_update = mysqli_query($link, $sqlGet_users_tbl_update);

    if(session_destroy())
    {
      header("Location: ../../sign-in/");
    }
?>
