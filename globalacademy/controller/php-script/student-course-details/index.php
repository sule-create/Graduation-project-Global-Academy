<?php

    include('../../config/config.php');

    $courseid = $_POST['courseid'];

    $sqlGet_courses_tbl = "SELECT * FROM `courses_tbl` WHERE sn = '$courseid'";
    $result_courses_tbl = mysqli_query($link, $sqlGet_courses_tbl);
    $row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl);
    $row_cnt_courses_tbl = mysqli_num_rows($result_courses_tbl);

    if($row_cnt_courses_tbl > 0)
    {

        $course_id = $row_courses_tbl['sn'];
        
        echo '<div class="row">
            <div class="col-lg-4" align="center">
                <img class="round_course_loner" src="'.$row_courses_tbl['course_image'].'" style="width:200px;height:200px;" alt="course" />
                <h4 style="margin: 10px 0;text-transform: uppercase;">'.$row_courses_tbl['course_name'].'</h4>
            </div>
            <div class="col-lg-8" align="left">
                <nav>';
                    $sqlGet_users_tbl = "SELECT * FROM `users_tbl` INNER JOIN assign_course_tbl ON users_tbl.sn=assign_course_tbl.user_id WHERE user_type = 'instructor' AND course_id='$course_id'";
                    $result_users_tbl = mysqli_query($link, $sqlGet_users_tbl);
                    $row_users_tbl = mysqli_fetch_assoc($result_users_tbl);
                    $row_cnt_users_tbl = mysqli_num_rows($result_users_tbl);
                        
                    echo '<div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-student-tab" data-bs-toggle="tab" data-bs-target="#nav-student" type="button" role="tab" aria-controls="nav-student" aria-selected="true">Instructor</button>
                        <button class="nav-link" id="nav-c-des-tab" data-bs-toggle="tab" data-bs-target="#nav-c-des" type="button" role="tab" aria-controls="nav-c-des" aria-selected="false">Course Description</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab">
                        <div class="row">';
                            
                            if($row_cnt_users_tbl > 0)
                            {
                                do{
                        
                                    $instructor_id = $row_users_tbl['sn'];
                                    
                                    echo '<div class="col-lg-6 col-md-12 mt-3">
                                        <div style="display: flex; align-items: center;">
                                            <img class="round_instructor_loner" src="'.$row_users_tbl['photo'].'" style="width: 80px; height: 80px;" alt="user" />
                                            <div style="margin-left: 10px;">
                                                <span style="text-transform: uppercase;font-weight:bold;">'.$row_users_tbl['first_name'].' '.$row_users_tbl['last_name'].'</span><br>
                                                <small style="">'.$row_users_tbl['email'].'</small><br>
                                                <small style="font-size: 14px;line-height: 21px;">'.$row_users_tbl['phone_number'].'</small>
                                            </div>
                                        </div>
                                    </div>';
                                }while($row_users_tbl = mysqli_fetch_assoc($result_users_tbl));
                            
                            }
                            else
                            {
                                echo '<div class="col-lg-12 col-md-12" align="center">
                                    No Records found
                                </div>';
                            }
                        echo '</div>
                    </div>
                    <div class="tab-pane fade" id="nav-c-des" role="tabpanel" aria-labelledby="nav-c-des-tab">
                        <span>'.$row_courses_tbl['course_description'].'</span>
                    </div>
                </div>
            </div>
        </div>';
    }
    else
    {
        echo '<div class="row col-lg-12 col-md-12 mt-5 pt-5" align="center">
            <No Records found
        </div>';
    }
?>
