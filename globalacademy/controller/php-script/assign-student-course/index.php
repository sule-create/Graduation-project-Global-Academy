<?php

    include('../../config/config.php');
    
    $instructor = $_POST['instructor'];
    $courses = $_POST['courses'];

    $sqlGet_assign_course_tbl_delete = "DELETE FROM `assign_course_tbl` WHERE `user_id` = '$instructor'";
    $result_assign_course_tbl_delete = mysqli_query($link, $sqlGet_assign_course_tbl_delete);

    if($result_assign_course_tbl_delete == true)
    {
        foreach($courses as $courses_new){

            $courses_new;

            $sqlGet_assign_course_tbl_update = "INSERT INTO `assign_course_tbl`(`sn`, `user_id`, `course_id`) 
            VALUES (NULL,'$instructor','$courses_new')";
            $result_assign_course_tbl_update = mysqli_query($link, $sqlGet_assign_course_tbl_update);

        }

        echo 1;
    }
    else{
        echo 0;
    }

?>
