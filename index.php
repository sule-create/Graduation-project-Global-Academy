<?php  include ('../controller/session/session-checker.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="author" content="Global Academy"/>	
	<meta name="description" content="Global Academy revolutionizes course registration with its user-friendly web application. Whether you're a student, instructor, or head of department, our platform offers seamless registration, access to educational resources, and efficient management tools. Enjoy unlimited student registrations, dedicated support for educators, and a modern interface designed for optimal user experience. Join Global Academy today and simplify your academic journey."/>
	<meta name="keywords" content="">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!-- SITE TITLE -->
	<title>Global Academy | Sign In</title>
	<link rel="shortcut icon" href="../assets/images/website_images/Global.png" type="image/x-icon">
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">	
	<!-- font awesome cn -->
	<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<!-- font awesome cn -->
	<link href="../css/website_css/signin.css" rel="stylesheet">	
	
	<!--css notify-->
	<link href="../assets/plugins/notify/wnoty.css" rel="stylesheet">
	<!--css notify-->
	
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
 </head>
  <body style="overflow-y:visible;">
        <!-- Sign In Form -->
        <section id="wrapper" >
            <div class="container">
                      
				<div align="center" class="row">
					<div class="col-md-12">
                           
                        <div  id="contentlogin" class="" style="box-shadow:0 2px 5px 0 #D3D3D3; 0 3px 11px 0 #D3D3D3;border-radius:10px;margin-top:2%;">
                              
                          	<img id="logo" class="img-fluid" src="../assets/images/website_images/Global.png" style="margin-top:2.5%;width:100px;height:auto;">

                            <center>
								<h4 style="padding-top:40px;color:#008080;" id="verificatitle">Welcome back!</h4>
							</center>
                         
    				        <div class="centerlogin usernameverify" >
        						<input type="text" autocomplete="off" class="generalinput email" placeholder="johndoe@gmail.com">
    							<i class="fa fa-envelope fa-lg  icon" style=""></i>
                            </div>
                            
                            <div class="centerlogin passwordverify" >
            					<input type="password"  autocomplete="off" class="generalinput signuppassword" placeholder="password"  >
        						<i class="fa fa-eye fa-lg" style="" id="viewpassword"></i>
                            </div>

                            <p style="margin-top:36px;"></p>
                                    
                            <div class="row">
                                <div class="col-lg-6">
                                              
                                    <input type="checkbox" style="width: 1em;cursor:pointer;" id="remindmepassid" class="filled-in chk-col-light-blue remindpasswordlink"/> 
                                        <label for="remindmepassid">Remember me</label>
                                	</div>
									<div class="col-lg-6">
										<a style="color:#008080;font-size:15px;" href="../forget-password">Forgot Password</a>
									</div>
                                </div>
                                <p style="color:#92929D;padding-top:20px;"></p>
                                <button type="button" id="signin-btn" style="background-color:#008080;cursor:pointer;" class="btn btn-block btn-lg text-light">Sign In</button>
                                     
                                <p style="padding-top:20px;padding-bottom:50px;color:#92929D;font-size:14px;" id="signin">Don't have an account? <a href="../signup?" style="color:#008080;">Sign Up</a></p>
                                    
                          	</div>
                        </div>
                       
                    </div>
                </div>
			</div>
		</section>

         <!-- EXTERNAL SCRIPTS============================================= -->	
        <script src="../assets/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		
        <script src="../assets/plugins/notify/wnoty.js"></script>

		<script>
			// jQuery
			$(document).ready(function() {
				$('#viewpassword').on('click', function() {
					var passwordField = $('#signinpassword');
					var fieldType = passwordField.attr('type');
					
					if (fieldType === 'password') 
					{
						passwordField.attr('type', 'text');

					} 
					else 
					{
						passwordField.attr('type', 'password');
					}
				});
			});


			$('body').on('click','#signin-btn',function() {

				var email = $('.email').val();
				var password = $('.signuppassword').val();

				$('.email, .signuppassword').each(function() {
					if($(this).val() === '' || $(this).val() === '0') {
						$(this).css("border", "1px solid red");
					} else {
						$(this).css("border", "1px solid #008080");
					}
				});


				if (email == '' || email == '0' || password == '' || password == '0') 
				{
					
					$.wnoty({
						type: 'error',
						message: "No field should be left empty.",
						autohideDelay: 7000
					});
				} 
				else 
				{
					
					$('#signin-btn').html('Signing in...');

					$.ajax({
						type: 'POST',
						url:"../controller/php-script/sign-in/",
						data: {
							email:email,
							password:password
						},
						success: function (output) {

							if(output === '0')
							{
								$.wnoty({
									type: 'info',
									message: "Invalid email or password provided.",
									autohideDelay: 7000
								});
							}
							else{

								$.wnoty({
									type: 'success',
									message: "Logging In...",
									autohideDelay: 7000

								});
								
								window.location.href = "../"+output+"/home";
							}

							$('#signin-btn').html('Sign in');

						}

					});
				}

			});
	
		</script>
        
  </body>
</html>