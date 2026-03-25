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
                            <span class="font-weight-bold">Courses(<span class="tot_course">0</span>)</span>
                                
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12" align="right">
                        <button type="button" class="btn btn-light btn-sm" style="border:2px solid #008080; color:#008080;" data-bs-toggle="modal" data-bs-target="#staticBackdropcreatecourse"><i class="fa fa-plus"></i> Create Course</button>
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
                        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-plus"></i> Create Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Course Title</label>
                                    <input type="text" class="form-control form-control-sm title" id="exampleFormControlInput1" placeholder="Course Title">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Course Description</label>
                                    <textarea class="form-control description" id="exampleFormControlTextarea1" rows="3" placeholder="Course Description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Course Image (Optional)</label>
                                    <input class="form-control form-control-sm course_img" id="formFileSm" type="file">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Instructor</label>
                                    <select class="form-select form-select-sm instructor" aria-label=".form-select-sm example">
                                        <option selected>Select Instructor (Optional)</option>

                                        <?php
                                            $sqlGet_users_tbl = "SELECT * FROM `users_tbl` WHERE user_type = 'instructor'";
                                            $result_users_tbl = mysqli_query($link, $sqlGet_users_tbl);
                                            $row_users_tbl = mysqli_fetch_assoc($result_users_tbl);
                                            $row_cnt_users_tbl = mysqli_num_rows($result_users_tbl);
                                        
                                            if($row_cnt_users_tbl > 0)
                                            {
                                                do{

                                                    echo '<option value="'.$row_users_tbl['sn'].'">'.$row_users_tbl['first_name'].' '.$row_users_tbl['last_name'].'</option>';

                                                }while($row_users_tbl = mysqli_fetch_assoc($result_users_tbl));

                                            }
                                            else{
                                                echo '<option value="0">No Instructor Found</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn create-course" style="background-color:#008080;color:#fff;"> <i class="fas fa-save"></i> Save</button>
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


            $("body").on("change",".course_img",function () {
                
                var input = this;
                // Get the selected file from the file input
                var selectedFile = input.files[0];

                if (selectedFile) {
                    var reader = new FileReader();

                    reader.onload = function (e) {


                        var img = new Image();
                        img.src = e.target.result;

                        img.onload = function () {
                            var canvas = document.createElement('canvas');
                            var ctx = canvas.getContext('2d');
                            var maxWidth = 300; // Set your desired width
                            var maxHeight = 300; // Set your desired height
                            var width = img.width;
                            var height = img.height;

                            if (width > height) {
                                if (width > maxWidth) {
                                    height *= maxWidth / width;
                                    width = maxWidth;
                                }
                            } else {
                                if (height > maxHeight) {
                                    width *= maxHeight / height;
                                    height = maxHeight;
                                }
                            }

                            canvas.width = width;
                            canvas.height = height;
                            ctx.drawImage(img, 0, 0, width, height);

                            var base64Image = canvas.toDataURL(selectedFile.type);

                            localStorage.setItem('course_img',base64Image);

                        };
                    };

                    reader.readAsDataURL(selectedFile);
                }
                
            });


            $("body").on("change",".course_img_edit",function () {
                
                var input = this;
                // Get the selected file from the file input
                var selectedFile = input.files[0];

                if (selectedFile) {
                    var reader = new FileReader();

                    reader.onload = function (e) {


                        var img = new Image();
                        img.src = e.target.result;

                        img.onload = function () {
                            var canvas = document.createElement('canvas');
                            var ctx = canvas.getContext('2d');
                            var maxWidth = 300; // Set your desired width
                            var maxHeight = 300; // Set your desired height
                            var width = img.width;
                            var height = img.height;

                            if (width > height) {
                                if (width > maxWidth) {
                                    height *= maxWidth / width;
                                    width = maxWidth;
                                }
                            } else {
                                if (height > maxHeight) {
                                    width *= maxHeight / height;
                                    height = maxHeight;
                                }
                            }

                            canvas.width = width;
                            canvas.height = height;
                            ctx.drawImage(img, 0, 0, width, height);

                            var base64Image = canvas.toDataURL(selectedFile.type);

                            localStorage.setItem('course_img',base64Image);

                            // alert(base64Image);

                        };
                    };

                    reader.readAsDataURL(selectedFile);
                }
                
            });


            $('body').on('click','.create-course',function() {

                var title = $('.title').val();
                var description = $('.description').val();
                var instructor = $('.instructor').val();
                var img = localStorage.getItem('course_img');

                $('.title, .description').each(function() {
                    if($(this).val() === '' || $(this).val() === '0') {
                        $(this).css("border", "1px solid red");
                    } else {
                        $(this).css("border", "1px solid #008080");
                    }
                });

                if (title == '' || title == '0' || description == '' || description == '0') 
                {
                    
                    $.wnoty({
                        type: 'error',
                        message: "The course title and description should not be left empty.",
                        autohideDelay: 7000
                    });

                } 
                else 
                {
                    $(".create-course").html("<i class=\"fas fa-save\"></i> Save");

                    $.ajax({
                        type: 'POST',
                        url:"../../controller/php-script/create-course/",
                        data: {
                            title:title,
                            description:description,
                            instructor:instructor,
                            img:img
                        },
                        success: function (output) {

                            if(output == '0')
                            {
                                $.wnoty({
                                    type: 'info',
                                    message: "A course already exist with this title",
                                    autohideDelay: 5000
                                });
                            }
                            else{

                                $.wnoty({
                                    type: 'success',
                                    message: "Course Created Successful.",
                                    autohideDelay: 5000

                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 5000);
                            }

                            localStorage.removeItem('course_img')
                            
                            $(".create-course").html("<i class=\"fas fa-save\"></i> Save");

                        }

                    });
                }

            });


            $('body').on('click','.course_edit_btn',function() {

                var course_id = $(this).data('id');
                var title = $('.title_edit'+course_id).val();
                var description = $('.description_edit'+course_id).val();
                var img = localStorage.getItem('course_img');

                $('.title_edit, .description_edit').each(function() {
                    if($(this).val() === '' || $(this).val() === '0') {
                        $(this).css("border", "1px solid red");
                    } else {
                        $(this).css("border", "1px solid #008080");
                    }
                });

                if (title == '' || title == '0' || description == '' || description == '0') 
                {
                    
                    $.wnoty({
                        type: 'error',
                        message: "The course title and description should not be left empty.",
                        autohideDelay: 7000
                    });

                } 
                else 
                {
                    $(".course_edit_btn").html("<i class=\"fas fa-save\"></i> Save");

                    $.ajax({
                        type: 'POST',
                        url:"../../controller/php-script/edit-course/",
                        data: {
                            title:title,
                            description:description,
                            img:img,
                            course_id:course_id
                        },
                        success: function (output) {

                            // alert(output);

                            if(output == '0')
                            {
                                $.wnoty({
                                    type: 'info',
                                    message: "A course already exist with this title",
                                    autohideDelay: 5000
                                });
                            }
                            else{

                                $.wnoty({
                                    type: 'success',
                                    message: "Course Created Successful.",
                                    autohideDelay: 5000

                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            }

                            localStorage.removeItem('course_img')
                            
                            $(".course_edit_btn").html("<i class=\"fas fa-save\"></i> Save");

                        }

                    });
                }

            });


            $('body').on('click', '.delete_course', function(){

                $(".delete_course").html("<i class=\"fas fa-spinner fa-spin\"></i>");

                var data_id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url:"../../controller/php-script/delete-course/",
                    data: {
                        courseid:data_id
                    },
                    success: function (output) {

                        $(".delete_course").html("<i class=\"fas fa-trash\"></i> Delete");

                        if(output == 1)
                        {
                            $.wnoty({
                                type: 'success',
                                message: "Course deleted successfully.",
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