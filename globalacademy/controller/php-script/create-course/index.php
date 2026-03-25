<?php

    include('../../config/config.php');

    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $instructor = $_POST['instructor'];
    $img = $_POST['img'];

    $date = date('Y-m-d');

    $sqlGet_courses_tbl = "SELECT * FROM `courses_tbl` WHERE `course_name` = '$title'";
    $result_courses_tbl = mysqli_query($link, $sqlGet_courses_tbl);
    $row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl);
    $row_cnt_courses_tbl = mysqli_num_rows($result_courses_tbl);

    if($row_cnt_courses_tbl > 0)
    {
        
        echo 0;
    }
    else
    {
        $sqlGet_courses_tbl_insert = "INSERT INTO `courses_tbl`(`sn`, `course_name`, `course_description`, `course_image`, `date`) 
        VALUES (NULL,'$title','$description','$img','$date')";
        $result_courses_tbl_insert = mysqli_query($link, $sqlGet_courses_tbl_insert);

        if($instructor != '' && $instructor != '0')
        {
            
        }
        else{
            $last_inserted_id = mysqli_insert_id($link);

            $sqlGet_courses_tbl_insert_sec = "INSERT INTO `assign_course_tbl`(`sn`, `user_id`, `course_id`) 
            VALUES (NULL,'$instructor','$last_inserted_id')";
            $result_courses_tbl_insert_sec = mysqli_query($link, $sqlGet_courses_tbl_insert_sec);
        }
        echo 1;
    }
        
?>
