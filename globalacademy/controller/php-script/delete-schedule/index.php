<?php

    include('../../config/config.php');
    
    $schedule_id = $_POST['schedule_id'];

    $sqlGet_course_schedule_tbl = "DELETE FROM `course_schedule_tbl` WHERE `sn` = '$schedule_id'";
    $result_course_schedule_tbl = mysqli_query($link, $sqlGet_course_schedule_tbl);
    
    echo 1;

?>
