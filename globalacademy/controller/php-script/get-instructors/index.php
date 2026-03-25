<?php

    include('../../config/config.php');

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $usertype = MD5($_POST['usertype']);

    $sqlGet_users_tbl = "SELECT * FROM `users_tbl` WHERE user_type = 'instructor'";
    $result_users_tbl = mysqli_query($link, $sqlGet_users_tbl);
    $row_users_tbl = mysqli_fetch_assoc($result_users_tbl);
    $row_cnt_users_tbl = mysqli_num_rows($result_users_tbl);

    echo '<input type="hidden" class="tot_instructor_val" value="'.number_format($row_cnt_users_tbl).'">';

    if($row_cnt_users_tbl > 0)
    {
        do{

            $instructor_id = $row_users_tbl['sn'];

            if($row_users_tbl['active_status'] == 1)
            {
                $onlinestat = 'online';
            }
            else{
                $onlinestat = 'offline';
            }
            
            echo '<div class="col-lg-3 col-md-12 mt-3">
            
                <div class="card-container_instructor">

                    <img class="round_instructor" src="'.$row_users_tbl['photo'].'" style="width:120px;height:120px;" alt="user"/><br>
                    <small>'.$onlinestat.'</small>
                    <h4 style="margin: 10px 0;text-transform: uppercase;">'.$row_users_tbl['first_name'].' '.$row_users_tbl['last_name'].'</h4>
                    <h6 style="margin: 2px 0;">'.$row_users_tbl['email'].'</h6>
                    <p style="font-size: 14px;line-height: 21px;">'.$row_users_tbl['phone_number'].'</p>

                    <div>
                        <button style="background-color: #fff;color:#008080;border:none;font-size:12px;" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop'.$instructor_id.'"> <i class="fas fa-sync"></i> Edit/Add Course</button>

                        <button style="background-color: #fff;color:red;border:none;font-size:12px;" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropdelete'.$instructor_id.'"> <i class="fas fa-trash"></i></button>
                    </div>
                    <div class="skills_instructor mt-2">
                        <h6>Courses</h6>
                        <ul>';
                            $sqlGet_assign_course_tbl = "SELECT DISTINCT course_name, courses_tbl.sn  FROM `assign_course_tbl` INNER JOIN courses_tbl ON assign_course_tbl.course_id=courses_tbl.sn WHERE user_id = '$instructor_id' ORDER BY course_name ASC LIMIT 2";
                            $result_assign_course_tbl = mysqli_query($link, $sqlGet_assign_course_tbl);
                            $row_assign_course_tbl = mysqli_fetch_assoc($result_assign_course_tbl);
                            $row_cnt_assign_course_tbl = mysqli_num_rows($result_assign_course_tbl);

                            if($row_cnt_assign_course_tbl > 0)
                            {
                                $assignidarray = array();

                                do{

                                    $course_id = $row_assign_course_tbl['sn'];

                                    $sqlGet_users_tbl_student = "SELECT * FROM `users_tbl` INNER JOIN assign_course_tbl ON users_tbl.sn=assign_course_tbl.user_id WHERE user_type = 'student' AND course_id='$course_id'";
                                    $result_users_tbl_student = mysqli_query($link, $sqlGet_users_tbl_student);
                                    $row_users_tbl_student = mysqli_fetch_assoc($result_users_tbl_student);
                                    $row_cnt_users_tbl_student = mysqli_num_rows($result_users_tbl_student);

                                    echo '<li style="cursor:pointer;" class="view_course_student" data-id="'.$row_assign_course_tbl['sn'].'" data-bs-toggle="modal" data-bs-target="#staticBackdropcoursedetails">'.$row_assign_course_tbl['course_name'].' ('.$row_cnt_users_tbl_student.')</li>';

                                    $assignidarray[] = $row_assign_course_tbl['sn'];

                                }while($row_assign_course_tbl = mysqli_fetch_assoc($result_assign_course_tbl));

                                $assignidstring = implode(',',$assignidarray);

                                $sqlGet_assign_course_tbl_sec = "SELECT DISTINCT course_name, courses_tbl.sn  FROM `assign_course_tbl` INNER JOIN courses_tbl ON assign_course_tbl.course_id=courses_tbl.sn WHERE user_id = '$instructor_id' AND courses_tbl.sn NOT IN ($assignidstring) ORDER BY course_name ASC";
                                $result_assign_course_tbl_sec = mysqli_query($link, $sqlGet_assign_course_tbl_sec);
                                $row_assign_course_tbl_sec = mysqli_fetch_assoc($result_assign_course_tbl_sec);
                                $row_cnt_assign_course_tbl_sec = mysqli_num_rows($result_assign_course_tbl_sec);
    
                                if($row_cnt_assign_course_tbl_sec > 0)
                                {

                                    echo '<br><span style="cursor:pointer;text:underlined;" data-bs-toggle="collapse" href="#collapseExample'.$instructor_id.'" role="button" aria-expanded="false" aria-controls="collapseExample'.$instructor_id.'"><i class="fas fa-eye"></i> View More</span>
                                    <div class="collapse" id="collapseExample'.$instructor_id.'">
                                        <ul>';
                                    
                                            do{
            
                                                $course_id_sec = $row_assign_course_tbl_sec['sn'];

                                                $sqlGet_users_tbl_student_sec = "SELECT * FROM `users_tbl` INNER JOIN assign_course_tbl ON users_tbl.sn=assign_course_tbl.user_id WHERE user_type = 'student' AND course_id='$course_id_sec'";
                                                $result_users_tbl_student_sec = mysqli_query($link, $sqlGet_users_tbl_student_sec);
                                                $row_users_tbl_student_sec = mysqli_fetch_assoc($result_users_tbl_student_sec);
                                                $row_cnt_users_tbl_student_sec = mysqli_num_rows($result_users_tbl_student_sec);
            
                                                echo '<li style="cursor:pointer;" class="view_course_student" data-id="'.$row_assign_course_tbl_sec['sn'].'" data-bs-toggle="modal" data-bs-target="#staticBackdropcoursedetails">'.$row_assign_course_tbl_sec['course_name'].' ('.$row_cnt_users_tbl_student_sec.')</li>';
            
                                            }while($row_assign_course_tbl_sec = mysqli_fetch_assoc($result_assign_course_tbl_sec));
    
                                        echo '</ul>
                                    </div>';
                                }
                                else{
                                    echo '<li>No Other Course Found.</li>';
                                }
                            }
                            else{
                                echo '<li>No Course Found.</li>';
                            }
                        echo '</ul>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop'.$instructor_id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop'.$instructor_id.'Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content" style="color:#3C4748;border-radius:20px;border:2px solid #008080;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add/Remove Courses for Instructor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img class="round_instructor" src="'.$row_users_tbl['photo'].'" style="width:200px;height:200px;" alt="user"/>
                                            <h4 style="margin: 10px 0;text-transform: uppercase;">'.$row_users_tbl['first_name'].' '.$row_users_tbl['last_name'].'</h4>
                                            <h6 style="margin: 2px 0;">'.$row_users_tbl['email'].'</h6>
                                            <p style="font-size: 14px;line-height: 21px;">'.$row_users_tbl['phone_number'].'</p>
                                        </div>
                                        <div class="col-lg-8" align="left">
                                            <div class="row">';
                                                
                                                $sqlGet_courses_tbl = "SELECT * FROM `courses_tbl`";
                                                $result_courses_tbl = mysqli_query($link, $sqlGet_courses_tbl);
                                                $row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl);
                                                $row_cnt_courses_tbl = mysqli_num_rows($result_courses_tbl);

                                                if($row_cnt_courses_tbl > 0)
                                                {
                                                    do{
                                                        $course_id = $row_courses_tbl['sn'];

                                                        $course_name = $row_courses_tbl['course_name'];

                                                        $sqlGet_assign_course_tbl_instr = "SELECT * FROM `assign_course_tbl` WHERE user_id = '$instructor_id' AND course_id = '$course_id'";
                                                        $result_assign_course_tbl_instr = mysqli_query($link, $sqlGet_assign_course_tbl_instr);
                                                        $row_assign_course_tbl_instr = mysqli_fetch_assoc($result_assign_course_tbl_instr);
                                                        $row_cnt_assign_course_tbl_instr = mysqli_num_rows($result_assign_course_tbl_instr);

                                                        if($row_cnt_assign_course_tbl_instr > 0)
                                                        {
                                                            $selected = 'checked';
                                                        }
                                                        else{
                                                            $selected = '';
                                                        }

                                                        echo '<div class="col-lg-4 col-md-6 col-sm-6">
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input course_checkbox'.$instructor_id.'" '.$selected.' type="checkbox" id="flexSwitchCheckDefault'.$course_id.'" value="'.$course_id.'">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault'.$course_id.'">'.$course_name.'</label>
                                                            </div>
                                                        </div>';

                                                    }while($row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl));
                                                }
                                                else{

                                                }
                                                
                                            echo '</div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn save_btn" data-id="'.$instructor_id.'" style="background-color:#008080;color:#fff;">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- delete Modal -->
                    <div class="modal fade" id="staticBackdropdelete'.$instructor_id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropdelete'.$instructor_id.'Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content" style="color:#3C4748;border-radius:20px;border:2px solid #008080;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Delete Instructor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <i class="fas fa-trash" style="color:red;font-size:30px;"></i><br>
                                            <span style="color:red;font-size:20px;">Are you sure you want to delete '.$row_users_tbl['first_name'].' '.$row_users_tbl['last_name'].'?</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger delete_instructor" data-id="'.$instructor_id.'"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </div>
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
        
?>
