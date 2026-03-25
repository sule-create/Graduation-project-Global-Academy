<?php

    include('../../config/config.php');
    
    $courseid = $_POST['courseid'];

    $sqlGet_assign_course_tbl_delete = "DELETE FROM `assign_course_tbl` WHERE `sn` = '$courseid'";
    $result_assign_course_tbl_delete = mysqli_query($link, $sqlGet_assign_course_tbl_delete);

    if($result_assign_course_tbl_delete === true)
    {
        $sqlGet_courses_tbl_delete = "DELETE FROM `courses_tbl` WHERE `sn` = '$courseid'";
        $result_courses_tbl_delete = mysqli_query($link, $sqlGet_courses_tbl_delete);

        echo 1;
    }
    else{
        echo 0;
    }

?>
