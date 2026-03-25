<?php

    include('../../config/config.php');

    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $img = $_POST['img'];
    $course_id = $_POST['course_id'];

    $date = date('Y-m-d');

    $sqlGet_courses_tbl = "SELECT * FROM `courses_tbl` WHERE `course_name` = '$title' AND sn != '$course_id'";
    $result_courses_tbl = mysqli_query($link, $sqlGet_courses_tbl);
    $row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl);
    $row_cnt_courses_tbl = mysqli_num_rows($result_courses_tbl);

    if($row_cnt_courses_tbl > 0)
    {
        
        echo 0;
    }
    else
    {
        $sqlGet_courses_tbl_insert = "UPDATE `courses_tbl` SET `course_name`='$title',`course_description`='$description',`course_image`='$img' WHERE `sn` = '$course_id'";
        $result_courses_tbl_insert = mysqli_query($link, $sqlGet_courses_tbl_insert);

        echo 1;
    }
        
?>
