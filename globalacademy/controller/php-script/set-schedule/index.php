<?php

    include('../../config/config.php');

    $day = $_POST['day'];
    $course = $_POST['course'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $sqlGet_course_schedule_tbl = "INSERT INTO `course_schedule_tbl`(`sn`, `day_of_week`, `course_id`, `start_time`, `end_time`) 
    VALUES (NULL,'$day','$course','$start_time','$end_time')";
    $result_course_schedule_tbl = mysqli_query($link, $sqlGet_course_schedule_tbl);

    echo 1;
        
?>
