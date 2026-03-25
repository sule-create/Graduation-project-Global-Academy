<?php

    include('../../config/config.php');

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $usertype = $_POST['usertype'];

    if($usertype == 'student' || $usertype == 'instructor')
    {
        $sqlGet_courses_tbl = "SELECT * FROM `users_tbl` INNER JOIN `assign_course_tbl` ON users_tbl.sn=assign_course_tbl.user_id INNER JOIN `courses_tbl` ON assign_course_tbl.course_id=courses_tbl.sn WHERE email = '$email'";
    }
    else{
        $sqlGet_courses_tbl = "SELECT * FROM `courses_tbl`";
    }
    $result_courses_tbl = mysqli_query($link, $sqlGet_courses_tbl);
    $row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl);
    $row_cnt_courses_tbl = mysqli_num_rows($result_courses_tbl);

    echo '<input type="hidden" class="tot_course_val" value="'.number_format($row_cnt_courses_tbl).'">';

    if($row_cnt_courses_tbl > 0)
    {
        do{

            $course_id = $row_courses_tbl['sn'];

            if($row_courses_tbl['course_image'] == '' || $row_courses_tbl['course_image'] == '0')
            {
                $course_image = '../../assets/images/website_images/def_course_img.png';
            }
            else{

                $course_image = $row_courses_tbl['course_image'];
            }
            
            echo '<div class="col-lg-3 col-md-12 mt-3">
                <div class="card-container_course">
                    
                    <img class="round_course" src="'.$course_image.'" style="width:200px;height:200px;" alt="course" />
                    <h4 style="margin: 10px 0;text-transform: uppercase;">'.$row_courses_tbl['course_name'].'</h4>';

                    if($usertype == 'student' || $usertype == 'instructor')
                    {

                    }
                    else{
                        echo '<div>
                                <button style="background-color: #fff;color:#008080;border:none;font-size:12px;" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropedit'.$course_id.'"> <i class="fas fa-pen"></i> Edit</button>

                                <button style="background-color: #fff;color:red;border:none;font-size:12px;" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropdelete'.$course_id.'"> <i class="fas fa-trash"></i> Delete</button>
                            </div>';
                    }
                    
                    echo '<div class="skills_course mt-4">
                        <h6>Description</h6>';

                        $length = strlen($row_courses_tbl['course_description']);

                        if($length > 90)
                        {
                            echo '<small>'.substr($row_courses_tbl['course_description'], 0, 90) . '...</small>

                            <span style="cursor:pointer;text:underlined;" data-bs-toggle="modal" data-bs-target="#staticBackdrop'.$course_id.'"><i class="fas fa-eye"></i> Read More</span>';
                        }
                        else{
                            echo '<small>'.$row_courses_tbl['course_description'].'</small>';
                        }
                    echo '</div>

                    <!-- course Modal -->
                    <div class="modal fade" id="staticBackdrop'.$course_id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop'.$course_id.'Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content" style="color:#3C4748;border-radius:20px;border:2px solid #008080;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Course Description</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img class="round_course" src="'.$course_image.'" style="width:200px;height:200px;" alt="course" />
                                            <h4 style="margin: 10px 0;text-transform: uppercase;">'.$row_courses_tbl['course_name'].'</h4>
                                        </div>
                                        <div class="col-lg-8" align="left">
                                            <span>'.$row_courses_tbl['course_description'].'</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" style="background-color:#008080;color:#fff;" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdropedit'.$course_id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropedit'.$course_id.'Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content" style="color:#3C4748;border-radius:20px;border:2px solid #008080;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Course Info.</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row" align="left">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Course Title</label>
                                                <input type="text" class="form-control form-control-sm title_edit'.$course_id.'" id="exampleFormControlInput1" placeholder="Course Title" value="'.$row_courses_tbl['course_name'].'">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Course Description</label>
                                                <textarea class="form-control description_edit'.$course_id.'" id="exampleFormControlTextarea1" rows="3" placeholder="Course Description">'.$row_courses_tbl['course_description'].'</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Course Image (Optional)</label>
                                                <input class="form-control form-control-sm course_img_edit" id="formFileSm" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn course_edit_btn" data-id="'.$course_id.'" style="background-color:#008080;color:#fff;">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- delete Modal -->
                    <div class="modal fade" id="staticBackdropdelete'.$course_id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropdelete'.$course_id.'Label" aria-hidden="true">
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
                                            <span style="color:red;font-size:20px;">Are you sure you want to delete this course '.$row_courses_tbl['course_name'].'?</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger delete_course" data-id="'.$course_id.'"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>';
        }while($row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl));
       
    }
    else
    {
        echo '<div class="col-lg-12 col-md-12" align="center">
            No Records found
        </div>';
    }
        
?>
