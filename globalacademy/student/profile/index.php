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
    <title>Global Academy | My Profile</title>
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
           <main class="main-container">
            <div class="main-title">
                    <span class="font-weight-bold">My Profile</span>
                </div>
                <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img id="img_src" src="<?php echo $userphoto;?>" style="width:183px; height:auto;" alt=""/>
                                    <div class="file btn btn-lg btn-primary">
                                        <span id="img_loader">Change Photo</span>
                                        <input type="file" name="file" id="profile_img"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile-head">
                                    <h5>
                                        <?php echo $firstname.' '.$lastname;?>
                                    </h5>
                                    <p>
                                        <h6>
                                            <?php echo $email;?>
                                        </h6>
                                    </p>
                                    <p>
                                        <h6>
                                            <?php echo $Phone;?>
                                        </h6>
                                    </p>
                                    <p><h6><?php echo strtoupper($usertype);?></h6></p>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4" align="right">
                                <button type="button" class="btn profile-edit-password-btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-pen"></i> Edit Profile</button><br><br>
                                <button type="button" class="btn profile-edit-password-btn" style="background-color:#008080;color:#fff;" data-bs-toggle="modal" data-bs-target="#staticBackdroppassword"><i class="fas fa-lock"></i> Change Password</button>
                            </div>
                        </div>
                    </form>           
                </div>
           </main>
           <!-- End Main -->
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="color:#3C4748;border-radius:20px;border:2px solid #008080;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">First name</label>
                                <input type="email" class="form-control firstname" id="exampleFormControlInput1" placeholder="John" value="<?php echo $firstname;?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Last name</label>
                                <input type="email" class="form-control lastname" id="exampleFormControlInput1" placeholder="Doe" value="<?php echo $lastname;?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control email" id="exampleFormControlInput1" disabled placeholder="johndoe@gmail.com" value="<?php echo $email;?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                                <input type="email" class="form-control phone" id="exampleFormControlInput1" placeholder="2348123456789" value="<?php echo $Phone;?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="save-btn" class="btn" style="background-color:#008080;color:#fff;"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdroppassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdroppasswordLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="color:#3C4748;border-radius:20px;border:2px solid #008080;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">New Password</label>
                                <input type="password" class="form-control password1" id="exampleFormControlInput1" placeholder="*****">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control password2" id="exampleFormControlInput2" placeholder="*****">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="save-password-btn" class="btn" style="background-color:#008080;color:#fff;"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../js/app.js"></script>

        <script src="../../assets/plugins/notify/wnoty.js"></script>
       <script>

            $(document).ready(function() {
                // Function to update the current date and time
                function updateDateTime() {
                    var now = new Date();
                    var date = now.toDateString();
                    var time = now.toLocaleTimeString();
                    $('#datetime').html(date + ' ' + time);
                }

                // Initial call to display current date and time
                updateDateTime();

                // Call the function every second to update the time
                setInterval(updateDateTime, 1000);
            });


            $('body').on('click','#save-btn',function() {

                var firstname = $('.firstname').val();
                var lastname = $('.lastname').val();
                var email = $('.email').val();
                var Phone = $('.phone').val();
                var usertype = "<?php echo $usertype;?>";

                $('.firstname, .lastname, .email, .phone').each(function() {
                    if($(this).val() === '' || $(this).val() === '0') {
                        $(this).css("border", "1px solid red");
                    } else {
                        $(this).css("border", "1px solid #008080");
                    }
                });


                if (firstname == '' || firstname == '0' || lastname == '' || lastname == '0' || email == '' || email == '0' || Phone == '' || Phone == '0') 
                {
                    
                    $.wnoty({
                        type: 'error',
                        message: "No field should be left empty.",
                        autohideDelay: 7000
                    });


                } 
                else 
                {
                    $("#save-btn").html("<i class=\"fas fa-save\"></i> Save");

                    $.ajax({
                        type: 'POST',
                        url:"../../controller/php-script/save-edit/",
                        data: {
                            firstname:firstname,
                            lastname:lastname,
                            email:email,
                            Phone:Phone,
                            usertype:usertype
                        },
                        success: function (output) {

                            if(output == '0')
                            {
                                $.wnoty({
                                    type: 'info',
                                    message: "Error occured, reload page and try again.",
                                    autohideDelay: 5000
                                });
                            }
                            else{

                                $.wnoty({
                                    type: 'success',
                                    message: "Edit Successful.",
                                    autohideDelay: 5000

                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 5000);
                            }
                            
                            $("#save-btn").html("<i class=\"fas fa-save\"></i> Save");

                        }

                    });
                }

            });


            $('body').on('click','#save-password-btn',function() {

                var password1 = $('.password1').val();
                var password2 = $('.password2').val();
                var userid = "<?php echo $userid;?>";
                var usertype = "<?php echo $usertype;?>";

                if (password1 == '' || password1 == '0' || password2 == '' || password2 == '0') 
                {
                    
                    $.wnoty({
                        type: 'error',
                        message: "No field should be left empty.",
                        autohideDelay: 7000
                    });

                } 
                else if (password1 !== password2) 
                {
                    
                    $.wnoty({
                        type: 'error',
                        message: "Password does not march.",
                        autohideDelay: 7000
                    });

                } 
                else{
                    $("#save-password-btn").html("<i class=\"fas fa-save\"></i> Save");

                    $.ajax({
                        type: 'POST',
                        url:"../../controller/php-script/change-password/",
                        data: {
                            password1:password1,
                            password2:password2,
                            userid:userid,
                            usertype:usertype
                        },
                        success: function (output) {

                            if(output == '0')
                            {
                                $.wnoty({
                                    type: 'info',
                                    message: "Error occured, reload page and try again.",
                                    autohideDelay: 5000
                                });
                            }
                            else{

                                $.wnoty({
                                    type: 'success',
                                    message: "Password changed successfully.",
                                    autohideDelay: 5000

                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            }
                            
                            $("#save-password-btn").html("<i class=\"fas fa-save\"></i> Save");

                        }

                    });
                }

            }); 


            $("#profile_img").change(function () {
                
                $('#img_loader').html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span class="visually-hidden" role="status">Loading...</span>');

                var input = this;
                // Get the selected file from the file input
                var selectedFile = input.files[0];
                var userId = localStorage.getItem('user_id');

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


                            $.ajax({
                                type: 'post',
                                url: '../../controller/php-script/save-edit-photo/',
                                data: { email: "<?php echo $email;?>", base64Image: base64Image, usertype: "<?php echo $usertype;?>" },
                                success: function (data) {
                                    // alert(data);
                                    $('#img_loader').html('Change Photo');
                                    $('#img_src').attr('src',  e.target.result);

                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000);

                                }
                            });
                        };
                    };

                    reader.readAsDataURL(selectedFile);
                }
            });
        </script>
   </body>

   </html>