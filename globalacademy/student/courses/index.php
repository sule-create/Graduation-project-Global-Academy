<?php
    include('../../controller/session/user_session.php');
?>
<!DOCTYPE html>
   <html lang="en">

   <head>
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Global Academy | Courses</title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../../assets/images/website_images/Global.png" type="image/x-icon">

    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- style sheet -->
    <link rel="stylesheet" href="../../css/app.css">

    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

	<link href="../../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
   </head>

   <body>

       <div class="grid-container">
            
            <?php
                include('../../includes/header_menu.php');
            ?>  
                
           <!----Main----->
           <main class="main-container mt-4">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="main-title">
                            <span class="font-weight-bold">My Courses(<span class="tot_course">0</span>)</span>
                                
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12" align="right">
                        <button type="button" class="btn btn-light btn-sm" style="border:2px solid #008080; color:#008080;" data-bs-toggle="modal" data-bs-target="#staticBackdropcreatecourse"><i class="fa fa-plus"></i> Register/Unregister Courses</button>
                    </div>
                </div>
                
                <div class="row display_courses">

                </div>
           </main>
           <!-- End Main -->
            
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdropcreatecourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropcreatecourseLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="color:#3C4748;border-radius:20px;border:2px solid #008080;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-plus"></i> Register/Unregister Courses</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="row">
                                <div class="col-lg-4" align="center">
                                    <img class="round_instructor_loner" src="<?php echo $userphoto; ?>" style="width:200px;height:200px;" alt="user"/>
                                    <h4 style="margin: 10px 0;text-transform: uppercase;"><?php echo $firstname.' '.$lastname ;?></h4>
                                </div>
                                <div class="col-lg-8" align="left">
                                    <div class="row mt-3">

                                        <?php
                                        
                                            $sqlGet_courses_tbl = "SELECT * FROM `courses_tbl`";
                                            $result_courses_tbl = mysqli_query($link, $sqlGet_courses_tbl);
                                            $row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl);
                                            $row_cnt_courses_tbl = mysqli_num_rows($result_courses_tbl);

                                            if($row_cnt_courses_tbl > 0)
                                            {
                                                do{
                                                    $course_id = $row_courses_tbl['sn'];

                                                    $course_name = $row_courses_tbl['course_name'];

                                                    $sqlGet_assign_course_tbl_instr = "SELECT * FROM `assign_course_tbl` WHERE user_id = '$userid' AND course_id = '$course_id'";
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
                                                            <input class="form-check-input course_checkbox'.$userid.'" '.$selected.' type="checkbox" id="flexSwitchCheckDefault'.$course_id.'" value="'.$course_id.'">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault'.$course_id.'">'.$course_name.'</label>
                                                        </div>
                                                    </div>';

                                                }while($row_courses_tbl = mysqli_fetch_assoc($result_courses_tbl));
                                            }
                                            else{

                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn save_btn" style="background-color:#008080;color:#fff;"> <i class="fas fa-save"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../js/app.js"></script>

        <script src="../../assets/plugins/notify/wnoty.js"></script>

        <script>

            $(document).ready(function() {

                var email = "<?php echo $email;?>";
                var usertype = "<?php echo $usertype;?>";

                $(".display_courses").html("<i class=\"fas fa-spinner fa-spin\"></i>");

                $.ajax({
                    type: 'POST',
                    url:"../../controller/php-script/get-courses/",
                    data: {
                        email:email,
                        usertype:usertype
                    },
                    success: function (output) {

                        $(".display_courses").html(output);

                        $(".tot_course").html($('.tot_course_val').val());
                        
                    }

                });
            });


            $('body').on('click', '.save_btn', function(){

                $(".save_btn").html("<i class=\"fas fa-spinner fa-spin\"></i>");

                var data_id = <?php echo $userid; ?>;

                var course_array = [];

                $.each($(".course_checkbox"+data_id+":checked"), function () {
                    course_array.push($(this).val());
                });

                $.ajax({
                    type: 'POST',
                    url:"../../controller/php-script/assign-student-course/",
                    data: {
                        instructor:data_id,
                        courses:course_array
                    },
                    success: function (output) {

                        $(".save_btn").html("Save");

                        if(output == 1)
                        {
                            $.wnoty({
                                type: 'success',
                                message: "Courses edited successfully.",
                                autohideDelay: 5000

                            });

                            
                            setTimeout(function() {
                                location.reload();
                            }, 2000);

                        }
                        else{
                            $.wnoty({
                                type: 'info',
                                message: "An error occurred, please reload your page and try again.",
                                autohideDelay: 5000

                            });
                        }
                        
                    }
                });
                
            });

        </script>
   </body>

   </html>