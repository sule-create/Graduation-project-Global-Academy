<?php

    include('../../config/config.php');
    
    $instructor = $_POST['instructor'];

    $sqlGet_assign_course_tbl_delete = "DELETE FROM `assign_course_tbl` WHERE `user_id` = '$instructor'";
    $result_assign_course_tbl_delete = mysqli_query($link, $sqlGet_assign_course_tbl_delete);

    if($result_assign_course_tbl_delete === true)
    {
        $sqlGet_users_tbl_delete = "DELETE FROM `users_tbl` WHERE `sn` = '$instructor'";
        $result_users_tbl_delete = mysqli_query($link, $sqlGet_users_tbl_delete);

        echo 1;
    }
    else{
        echo 0;
    }

?>
