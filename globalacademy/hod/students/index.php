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
    <title>Global Academy | Students</title>
    <!-- Favicon icon -->
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
                <div class="main-title">
                    <span class="font-weight-bold">Students(<span class="tot_student">0</span>)</span>
                </div>
                
                <div class="row display_students">

                </div>
           </main>
           <!-- End Main -->
            
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdropcoursedetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropcoursedetailsLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="color:#3C4748;border-radius:20px;border:2px solid #008080;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Course Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12 display_course_details">
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

                $(".display_students").html("<i class=\"fas fa-spinner fa-spin\"></i>");

                $.ajax({
                    type: 'POST',
                    url:"../../controller/php-script/get-students/",
                    data: {
                        email:email,
                        usertype:usertype
                    },
                    success: function (output) {

                        $(".display_students").html(output);

                        $(".tot_student").html($('.tot_student_val').val());
                        
                    }

                });
            });


            $('body').on('click', '.save_btn', function(){

                $(".save_btn").html("<i class=\"fas fa-spinner fa-spin\"></i>");

                var data_id = $(this).data('id');

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


            $('body').on('click', '.delete_instructor', function(){

                $(".delete_instructor").html("<i class=\"fas fa-spinner fa-spin\"></i>");

                var data_id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url:"../../controller/php-script/delete-student/",
                    data: {
                        instructor:data_id
                    },
                    success: function (output) {

                        $(".delete_instructor").html("<i class=\"fas fa-trash\"></i> Delete");

                        if(output == 1)
                        {
                            $.wnoty({
                                type: 'success',
                                message: "Instructor deleted successfully.",
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


            $('body').on('click', '.view_course_student', function(){

                $(".display_course_details").html("<center><i class=\"fas fa-spinner fa-spin\"></i></center>");

                var data_id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url:"../../controller/php-script/student-course-details/",
                    data: {
                        courseid:data_id
                    },
                    success: function (output) {

                        $(".display_course_details").html(output);
                        
                    }
                });
                
            });

        </script>
   </body>

   </html>