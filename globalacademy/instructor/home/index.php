<?php
    include('../../controller/session/user_session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/adminImg/favicon.png">
    <title>Global Academy | Dashboard</title>
    <link rel="shortcut icon" href="../../assets/images/website_images/Global.png" type="image/x-icon">

    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app.css">

    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <link href="../../css/website_css/signup.css" rel="stylesheet">	

    <script src="../../assets/plugins/jquery/jquery.min.js"></script>

    <script src="../../assets/plugins/chart/Chart.js"></script>
</head>

<body>
    <div class="grid-container">
        <?php
            include('../../includes/header_menu.php');
        ?>  

        <?php
            $sqlGet_courses_tbl = "SELECT * FROM `courses_tbl`";
            $result_courses_tbl = mysqli_query($link, $sqlGet_courses_tbl);
            $row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl);
            $row_cnt_courses_tbl = mysqli_num_rows($result_courses_tbl);

            $sqlGet_course_tbl_instruc = "SELECT DISTINCT course_id FROM `users_tbl` INNER JOIN `assign_course_tbl` ON users_tbl.sn=assign_course_tbl.user_id WHERE email = '$email'";
            $result_course_tbl_instruc = mysqli_query($link, $sqlGet_course_tbl_instruc);
            $row_course_tbl_instruc = mysqli_fetch_assoc($result_course_tbl_instruc);
            $row_cnt_course_tbl_instruc = mysqli_num_rows($result_course_tbl_instruc);

            if($row_cnt_course_tbl_instruc > 0)
            {
                $course_array_instruc = array();

                do{

                    $course_array_instruc[] = $row_course_tbl_instruc['course_id'];

                }while($row_course_tbl_instruc = mysqli_fetch_assoc($result_course_tbl_instruc));

                $course_string_instrc = implode(',', $course_array_instruc);

                $sqlGet_users_tbl = "SELECT DISTINCT users_tbl.sn, active_status, photo, first_name, last_name, email, phone_number  FROM `users_tbl` INNER JOIN `assign_course_tbl` ON users_tbl.sn=assign_course_tbl.user_id WHERE course_id IN ($course_string_instrc) AND user_type='student' ORDER BY first_name ASC";
                $result_users_tbl = mysqli_query($link, $sqlGet_users_tbl);
                $row_users_tbl = mysqli_fetch_assoc($result_users_tbl);
                $row_cnt_users_tbl = mysqli_num_rows($result_users_tbl);

            }
            else{
                $row_cnt_users_tbl = 0;
            }
        ?>
        <!----Main----->
        <main class="main-container">

            <div class="main-title">
                <span class="font-weight-bold">Hello <?php echo $firstname; ?> </span>
                <br>
                <small style="font-size: 12px;">Welcome Back !!!</small>
            </div>

            <div class="row mt-4 mb-2">
                <div class="col-sm-4 mt-2">
                    <div class="card" style="border:none; border-radius: 7px;background-color:#C8FBD9;padding:10px;">
                        <div class="row">
                            <div class="col-8">
                                <div>
                                    <small style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#26813E;font-weight:500;width:45px;">
                                    <i class="fas fa-chart-line"></i>
                                    </small>
                                </div>
                                <div style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                    <h6> My Students</h6>
                                </div>
                                <div class="d-flex" style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                    <h4><?php echo $row_cnt_users_tbl; ?></h4>
                                </div>
                            </div>
                            <div class="col-4" style="text-align: center; display: flex; justify-content: center; align-items: center; color: #595757;">
                                <div style="display: inline-block;">
                                    <i class="fas fa-user-graduate" style="font-size:50px;color:#007025;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-2">
                    <div class="card" style="border:none; border-radius: 7px;background-color:#FFCBC9;padding:10px;">
                        <div class="row">
                            <div class="col-8">
                                <div>
                                    <small style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#26813E;font-weight:500;width:45px;">
                                    <i class="fas fa-chart-line"></i>
                                    </small>
                                </div>
                                <div style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                    <h6> My Courses</h6>
                                </div>
                                <div class="d-flex" style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                    <h4><?php echo $row_cnt_course_tbl_instruc; ?></h4>
                                </div>
                            </div>
                            <div class="col-4" style="text-align: center; display: flex; justify-content: center; align-items: center; color: #595757;">
                                <div style="display: inline-block;">
                                    <i class="fas fa-user-tie" style="font-size:50px;color:#b80700;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-2">
                    <div class="card" style="border:none; border-radius: 7px;background-color:#D1E9F9;padding:10px;">
                        <div class="row">
                            <div class="col-8">
                                <div>
                                    <small style="border-radius: 10px;background-color:#fff;padding:2px;padding-left:5px;padding-right:5px;color:#26813E;font-weight:500;width:45px;">
                                    <i class="fas fa-chart-line"></i>
                                    </small>
                                </div>
                                <div style="padding-top:15px;padding-left:5px;padding-right:5px;color:#000000;font-weight:500;">
                                    <h6> Total Courses</h6>
                                </div>
                                <div class="d-flex" style="padding-left:5px;padding-right:5px;color:#000000;font-weight:600;">
                                    <h4><?php echo $row_cnt_courses_tbl; ?></h4>
                                </div>
                            </div>
                            <div class="col-4" style="text-align: center; display: flex; justify-content: center; align-items: center; color: #595757;">
                                <div style="display: inline-block;">
                                    <i class="fas fa-book" style="font-size:50px;color:#026db5;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 mt-5">
                    <div class="card" style="border:none; border-radius: 7px;padding:10px;">
                        <div class="row">

                            <?php 

                                $today = strtolower(date('l'));

                                if($today == 'monday')
                                {
                            ?>
                                    <div class="col-12">
                                        <div class="card mb-3" style="border:2px dashed #008080;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center" style="background-color:#1E90FF;font-weight:700;font-size:30px;color:#fff;">
                                                    Monday
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <?php

                                                                $sqlGet_course_schedule_tbl_monday = "SELECT course_schedule_tbl.sn, courses_tbl.course_name, courses_tbl.course_image, course_schedule_tbl.start_time, course_schedule_tbl.end_time FROM `course_schedule_tbl` INNER JOIN courses_tbl ON course_schedule_tbl.course_id=courses_tbl.sn WHERE `day_of_week` = 'monday' ORDER BY start_time, end_time";
                                                                $result_course_schedule_tbl_monday = mysqli_query($link, $sqlGet_course_schedule_tbl_monday);
                                                                $row_course_schedule_tbl_monday = mysqli_fetch_assoc($result_course_schedule_tbl_monday);
                                                                $row_cnt_course_schedule_tbl_monday = mysqli_num_rows($result_course_schedule_tbl_monday);

                                                                if($row_cnt_course_schedule_tbl_monday > 0)
                                                                {
                                                                    do{

                                                                        $sn_mon = $row_course_schedule_tbl_monday['sn'];
                                                                        $course_name_mon = $row_course_schedule_tbl_monday['course_name'];
                                                                        $course_image_mon = $row_course_schedule_tbl_monday['course_image'];
                                                                        $start_time_mon = $row_course_schedule_tbl_monday['start_time'];
                                                                        $end_time_mon = $row_course_schedule_tbl_monday['end_time'];

                                                                        $datetime1_mon = DateTime::createFromFormat('H:i', $start_time_mon);
                                                                        $datetime2_mon = DateTime::createFromFormat('H:i', $end_time_mon);

                                                                        $interval_mon = $datetime1_mon->diff($datetime2_mon);

                                                                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                                                            <div class="card shadow">
                                                                                <div class="card-body">
                                                                                    <div style="display: flex; align-items: center;">
                                                                                        <img class="round_course_loner" src="'.$course_image_mon.'" style="width: 80px; height: 80px;" alt="user" />
                                                                                        <div style="margin-left: 10px;">
                                                                                            <h6 style="text-transform: uppercase;font-weight:bold;">'.$course_name_mon.'</h6>
                                                                                            <small style="font-size: 12px">Time: '.$start_time_mon.' - '.$end_time_mon.'<br> ('.$interval_mon->format('%H hours %i minutes').') </small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';

                                                                    }while($row_course_schedule_tbl_monday = mysqli_fetch_assoc($result_course_schedule_tbl_monday));
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo '<div class="col-lg-12 mb-2" align="center" style="font-size:20px;">
                                                                        No schedule has been set yet.
                                                                    </div>';
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                                elseif($today == 'tuesday')
                                {
                            ?>
                                    <div class="col-12">
                                        <div class="card mb-3" style="border:2px dashed #008080;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center" style="background-color:#FF6347;font-weight:700;font-size:30px;color:#fff;">
                                                    Tuesday
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <?php

                                                                $sqlGet_course_schedule_tbl_tuesday = "SELECT course_schedule_tbl.sn, courses_tbl.course_name, courses_tbl.course_image, course_schedule_tbl.start_time, course_schedule_tbl.end_time FROM `course_schedule_tbl` INNER JOIN courses_tbl ON course_schedule_tbl.course_id=courses_tbl.sn WHERE `day_of_week` = 'tuesday' ORDER BY start_time, end_time";
                                                                $result_course_schedule_tbl_tuesday = mysqli_query($link, $sqlGet_course_schedule_tbl_tuesday);
                                                                $row_course_schedule_tbl_tuesday = mysqli_fetch_assoc($result_course_schedule_tbl_tuesday);
                                                                $row_cnt_course_schedule_tbl_tuesday = mysqli_num_rows($result_course_schedule_tbl_tuesday);

                                                                if($row_cnt_course_schedule_tbl_tuesday > 0)
                                                                {
                                                                    do{

                                                                        $sn_tues = $row_course_schedule_tbl_tuesday['sn'];
                                                                        $course_name_tues = $row_course_schedule_tbl_tuesday['course_name'];
                                                                        $course_image_tues = $row_course_schedule_tbl_tuesday['course_image'];
                                                                        $start_time_tues = $row_course_schedule_tbl_tuesday['start_time'];
                                                                        $end_time_tues = $row_course_schedule_tbl_tuesday['end_time'];

                                                                        $datetime1_tues = DateTime::createFromFormat('H:i', $start_time_tues);
                                                                        $datetime2_tues = DateTime::createFromFormat('H:i', $end_time_tues);

                                                                        $interval_tues = $datetime1_tues->diff($datetime2_tues);

                                                                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                                                            <div class="card shadow">
                                                                                <div class="card-body">
                                                                                    <div style="display: flex; align-items: center;">
                                                                                        <img class="round_course_loner" src="'.$course_image_tues.'" style="width: 80px; height: 80px;" alt="user" />
                                                                                        <div style="margin-left: 10px;">
                                                                                            <h6 style="text-transform: uppercase;font-weight:bold;">'.$course_name_tues.'</h6>
                                                                                            <small style="font-size: 12px">Time: '.$start_time_tues.' - '.$end_time_tues.'<br> ('.$interval_tues->format('%H hours %i minutes').') </small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';

                                                                    }while($row_course_schedule_tbl_tuesday = mysqli_fetch_assoc($result_course_schedule_tbl_tuesday));
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo '<div class="col-lg-12 mb-2" align="center" style="font-size:20px;">
                                                                        No schedule has been set yet.
                                                                    </div>';
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                                elseif($today == 'wednesday')
                                {
                            ?>
                                    <div class="col-12">
                                        <div class="card mb-3" style="border:2px dashed #008080;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center" style="background-color:#32CD32;font-weight:700;font-size:30px;color:#fff;">
                                                    Wednesday
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <?php

                                                                $sqlGet_course_schedule_tbl_wednesday = "SELECT course_schedule_tbl.sn, courses_tbl.course_name, courses_tbl.course_image, course_schedule_tbl.start_time, course_schedule_tbl.end_time FROM `course_schedule_tbl` INNER JOIN courses_tbl ON course_schedule_tbl.course_id=courses_tbl.sn WHERE `day_of_week` = 'wednesday' ORDER BY start_time, end_time";
                                                                $result_course_schedule_tbl_wednesday = mysqli_query($link, $sqlGet_course_schedule_tbl_wednesday);
                                                                $row_course_schedule_tbl_wednesday = mysqli_fetch_assoc($result_course_schedule_tbl_wednesday);
                                                                $row_cnt_course_schedule_tbl_wednesday = mysqli_num_rows($result_course_schedule_tbl_wednesday);

                                                                if($row_cnt_course_schedule_tbl_wednesday > 0)
                                                                {
                                                                    do{

                                                                        $sn_wed = $row_course_schedule_tbl_wednesday['sn'];
                                                                        $course_name_wed = $row_course_schedule_tbl_wednesday['course_name'];
                                                                        $course_image_wed = $row_course_schedule_tbl_wednesday['course_image'];
                                                                        $start_time_wed = $row_course_schedule_tbl_wednesday['start_time'];
                                                                        $end_time_wed = $row_course_schedule_tbl_wednesday['end_time'];

                                                                        $datetime1_wed = DateTime::createFromFormat('H:i', $start_time_wed);
                                                                        $datetime2_wed = DateTime::createFromFormat('H:i', $end_time_wed);

                                                                        $interval_wed = $datetime1_wed->diff($datetime2_wed);

                                                                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                                                            <div class="card shadow">
                                                                                <div class="card-body">
                                                                                    <div style="display: flex; align-items: center;">
                                                                                        <img class="round_course_loner" src="'.$course_image_wed.'" style="width: 80px; height: 80px;" alt="user" />
                                                                                        <div style="margin-left: 10px;">
                                                                                            <h6 style="text-transform: uppercase;font-weight:bold;">'.$course_name_wed.'</h6>
                                                                                            <small style="font-size: 12px">Time: '.$start_time_wed.' - '.$end_time_wed.'<br> ('.$interval_wed->format('%H hours %i minutes').') </small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';

                                                                    }while($row_course_schedule_tbl_wednesday = mysqli_fetch_assoc($result_course_schedule_tbl_wednesday));
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo '<div class="col-lg-12 mb-2" align="center" style="font-size:20px;">
                                                                        No schedule has been set yet.
                                                                    </div>';
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php    
                                }
                                elseif($today == 'thursday')
                                {
                            ?>
                                    <div class="col-12">
                                        <div class="card mb-3" style="border:2px dashed #008080;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center" style="background-color:#FFD700;font-weight:700;font-size:30px;color:#fff;">
                                                    Thursday
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <?php

                                                                $sqlGet_course_schedule_tbl_thursday = "SELECT course_schedule_tbl.sn, courses_tbl.course_name, courses_tbl.course_image, course_schedule_tbl.start_time, course_schedule_tbl.end_time FROM `course_schedule_tbl` INNER JOIN courses_tbl ON course_schedule_tbl.course_id=courses_tbl.sn WHERE `day_of_week` = 'thursday' ORDER BY start_time, end_time";
                                                                $result_course_schedule_tbl_thursday = mysqli_query($link, $sqlGet_course_schedule_tbl_thursday);
                                                                $row_course_schedule_tbl_thursday = mysqli_fetch_assoc($result_course_schedule_tbl_thursday);
                                                                $row_cnt_course_schedule_tbl_thursday = mysqli_num_rows($result_course_schedule_tbl_thursday);

                                                                if($row_cnt_course_schedule_tbl_thursday > 0)
                                                                {
                                                                    do{

                                                                        $sn_thur = $row_course_schedule_tbl_thursday['sn'];
                                                                        $course_name_thur = $row_course_schedule_tbl_thursday['course_name'];
                                                                        $course_image_thur = $row_course_schedule_tbl_thursday['course_image'];
                                                                        $start_time_thur = $row_course_schedule_tbl_thursday['start_time'];
                                                                        $end_time_thur = $row_course_schedule_tbl_thursday['end_time'];

                                                                        $datetime1_thur = DateTime::createFromFormat('H:i', $start_time_thur);
                                                                        $datetime2_thur = DateTime::createFromFormat('H:i', $end_time_thur);

                                                                        $interval_thur = $datetime1_thur->diff($datetime2_thur);

                                                                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                                                            <div class="card shadow">
                                                                                <div class="card-body">
                                                                                    <div style="display: flex; align-items: center;">
                                                                                        <img class="round_course_loner" src="'.$course_image_thur.'" style="width: 80px; height: 80px;" alt="user" />
                                                                                        <div style="margin-left: 10px;">
                                                                                            <h6 style="text-transform: uppercase;font-weight:bold;">'.$course_name_thur.'</h6>
                                                                                            <small style="font-size: 12px">Time: '.$start_time_thur.' - '.$end_time_thur.'<br> ('.$interval_thur->format('%H hours %i minutes').') </small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';

                                                                    }while($row_course_schedule_tbl_thursday = mysqli_fetch_assoc($result_course_schedule_tbl_thursday));
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo '<div class="col-lg-12 mb-2" align="center" style="font-size:20px;">
                                                                        No schedule has been set yet.
                                                                    </div>';
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                }
                                elseif($today == 'friday')
                                {
                            ?>
                                    <div class="col-12">
                                        <div class="card mb-3" style="border:2px dashed #008080;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center" style="background-color:#FFA500;font-weight:700;font-size:30px;color:#fff;">
                                                    Friday
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <?php

                                                                $sqlGet_course_schedule_tbl_friday = "SELECT course_schedule_tbl.sn, courses_tbl.course_name, courses_tbl.course_image, course_schedule_tbl.start_time, course_schedule_tbl.end_time FROM `course_schedule_tbl` INNER JOIN courses_tbl ON course_schedule_tbl.course_id=courses_tbl.sn WHERE `day_of_week` = 'friday' ORDER BY start_time, end_time";
                                                                $result_course_schedule_tbl_friday = mysqli_query($link, $sqlGet_course_schedule_tbl_friday);
                                                                $row_course_schedule_tbl_friday = mysqli_fetch_assoc($result_course_schedule_tbl_friday);
                                                                $row_cnt_course_schedule_tbl_friday = mysqli_num_rows($result_course_schedule_tbl_friday);

                                                                if($row_cnt_course_schedule_tbl_friday > 0)
                                                                {
                                                                    do{

                                                                        $sn_fri = $row_course_schedule_tbl_friday['sn'];
                                                                        $course_name_fri = $row_course_schedule_tbl_friday['course_name'];
                                                                        $course_image_fri = $row_course_schedule_tbl_friday['course_image'];
                                                                        $start_time_fri = $row_course_schedule_tbl_friday['start_time'];
                                                                        $end_time_fri = $row_course_schedule_tbl_friday['end_time'];

                                                                        $datetime1_fri = DateTime::createFromFormat('H:i', $start_time_fri);
                                                                        $datetime2_fri = DateTime::createFromFormat('H:i', $end_time_fri);

                                                                        $interval_fri = $datetime1_thur->diff($datetime2_fri);

                                                                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                                                            <div class="card shadow">
                                                                                <div class="card-body">
                                                                                    <div style="display: flex; align-items: center;">
                                                                                        <img class="round_course_loner" src="'.$course_image_fri.'" style="width: 80px; height: 80px;" alt="user" />
                                                                                        <div style="margin-left: 10px;">
                                                                                            <h6 style="text-transform: uppercase;font-weight:bold;">'.$course_name_fri.'</h6>
                                                                                            <small style="font-size: 12px">Time: '.$start_time_fri.' - '.$end_time_fri.'<br> ('.$interval_fri->format('%H hours %i minutes').') </small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';

                                                                    }while($row_course_schedule_tbl_friday = mysqli_fetch_assoc($result_course_schedule_tbl_friday));
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo '<div class="col-lg-12 mb-2" align="center" style="font-size:20px;">
                                                                        No schedule has been set yet.
                                                                    </div>';
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php 
                                }
                                elseif($today == 'saturday')
                                {
                            ?>
                                    <div class="col-12">
                                        <div class="card mb-3" style="border:2px dashed #008080;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center" style="background-color:#800080;font-weight:700;font-size:30px;color:#fff;">
                                                    Saturday
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <?php

                                                                $sqlGet_course_schedule_tbl_saturday = "SELECT course_schedule_tbl.sn, courses_tbl.course_name, courses_tbl.course_image, course_schedule_tbl.start_time, course_schedule_tbl.end_time FROM `course_schedule_tbl` INNER JOIN courses_tbl ON course_schedule_tbl.course_id=courses_tbl.sn WHERE `day_of_week` = 'saturday' ORDER BY start_time, end_time";
                                                                $result_course_schedule_tbl_saturday = mysqli_query($link, $sqlGet_course_schedule_tbl_saturday);
                                                                $row_course_schedule_tbl_saturday = mysqli_fetch_assoc($result_course_schedule_tbl_saturday);
                                                                $row_cnt_course_schedule_tbl_saturday = mysqli_num_rows($result_course_schedule_tbl_saturday);

                                                                if($row_cnt_course_schedule_tbl_saturday > 0)
                                                                {
                                                                    do{

                                                                        $sn_sat = $row_course_schedule_tbl_saturday['sn'];
                                                                        $course_name_sat = $row_course_schedule_tbl_saturday['course_name'];
                                                                        $course_image_sat = $row_course_schedule_tbl_saturday['course_image'];
                                                                        $start_time_sat = $row_course_schedule_tbl_saturday['start_time'];
                                                                        $end_time_sat = $row_course_schedule_tbl_saturday['end_time'];

                                                                        $datetime1_sat = DateTime::createFromFormat('H:i', $start_time_sat);
                                                                        $datetime2_sat = DateTime::createFromFormat('H:i', $end_time_sat);

                                                                        $interval_sat = $datetime1_tsat->diff($datetime2_sat);

                                                                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                                                            <div class="card shadow">
                                                                                <div class="card-body">
                                                                                    <div style="display: flex; align-items: center;">
                                                                                        <img class="round_course_loner" src="'.$course_image_sat.'" style="width: 80px; height: 80px;" alt="user" />
                                                                                        <div style="margin-left: 10px;">
                                                                                            <h6 style="text-transform: uppercase;font-weight:bold;">'.$course_name_sat.'</h6>
                                                                                            <small style="font-size: 12px">Time: '.$start_time_sat.' - '.$end_time_sat.'<br> ('.$interval_sat->format('%H hours %i minutes').') </small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';

                                                                    }while($row_course_schedule_tbl_saturday = mysqli_fetch_assoc($result_course_schedule_tbl_saturday));
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo '<div class="col-lg-12 mb-2" align="center" style="font-size:20px;">
                                                                        No schedule has been set yet.
                                                                    </div>';
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                                else{
                            ?>
                                    <div class="col-12">
                                        <div class="card mb-3" style="border:2px dashed #008080;">
                                            <div class="row g-0">
                                                <div class="col-md-3 d-flex justify-content-center align-items-center" style="background-color:#F5F5F5;font-weight:700;font-size:30px;color:#000000;">
                                                    Sunday
                                                </div>

                                                <div class="col-md-9">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <?php

                                                                $sqlGet_course_schedule_tbl_sunday = "SELECT course_schedule_tbl.sn, courses_tbl.course_name, courses_tbl.course_image, course_schedule_tbl.start_time, course_schedule_tbl.end_time FROM `course_schedule_tbl` INNER JOIN courses_tbl ON course_schedule_tbl.course_id=courses_tbl.sn WHERE `day_of_week` = 'sunday' ORDER BY start_time, end_time";
                                                                $result_course_schedule_tbl_sunday = mysqli_query($link, $sqlGet_course_schedule_tbl_sunday);
                                                                $row_course_schedule_tbl_sunday = mysqli_fetch_assoc($result_course_schedule_tbl_sunday);
                                                                $row_cnt_course_schedule_tbl_sunday = mysqli_num_rows($result_course_schedule_tbl_sunday);

                                                                if($row_cnt_course_schedule_tbl_sunday > 0)
                                                                {
                                                                    do{

                                                                        $sn_sun = $row_course_schedule_tbl_sunday['sn'];
                                                                        $course_name_sun = $row_course_schedule_tbl_sunday['course_name'];
                                                                        $course_image_sun = $row_course_schedule_tbl_sunday['course_image'];
                                                                        $start_time_sun = $row_course_schedule_tbl_sunday['start_time'];
                                                                        $end_time_sun = $row_course_schedule_tbl_sunday['end_time'];

                                                                        $datetime1_sun = DateTime::createFromFormat('H:i', $start_time_sun);
                                                                        $datetime2_sun = DateTime::createFromFormat('H:i', $end_time_sun);

                                                                        $interval_sun = $datetime1_sun->diff($datetime2_sun);

                                                                        echo '<div class="col-lg-4 col-md-6 mb-2">
                                                                            <div class="card shadow">
                                                                                <div class="card-body">
                                                                                    <div style="display: flex; align-items: center;">
                                                                                        <img class="round_course_loner" src="'.$course_image_sun.'" style="width: 80px; height: 80px;" alt="user" />
                                                                                        <div style="margin-left: 10px;">
                                                                                            <h6 style="text-transform: uppercase;font-weight:bold;">'.$course_name_sun.'</h6>
                                                                                            <small style="font-size: 12px">Time: '.$start_time_sun.' - '.$end_time_sun.'<br> ('.$interval_sun->format('%H hours %i minutes').') </small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';

                                                                    }while($row_course_schedule_tbl_sunday = mysqli_fetch_assoc($result_course_schedule_tbl_sunday));
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo '<div class="col-lg-12 mb-2" align="center" style="font-size:20px;">
                                                                        No schedule has been set yet.
                                                                    </div>';
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/app.js"></script>

</body>

</html>