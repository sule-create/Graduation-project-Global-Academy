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
	<title>Global Academy | Registration</title>
	<link rel="shortcut icon" href="../assets/images/website_images/Global.png" type="image/x-icon">

	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

	<link href="../css/website_css/signup.css" rel="stylesheet">	
	
	<!-- Boxicons CSS -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<link href="../assets/plugins/notify/wnoty.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
	
</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-6 col-lg-4 d-none d-sm-block  d-xm-block d-md-block" >
				<div style="background-color: #008080; height: 97vh; margin: 10px 0 0 0px; border-radius: 15px;">
					
					<div style="padding: 50px 20px 50px; display: flex;">
						<img src="../assets/images/website_images/Global5.png" width="100" height="100" alt="">
					</div>
				
					<div class="chi_ain" style="padding: 0px 50px 20px 30px;" >
						<p style="font-size: 35px;text-decoration: none;cursor: context-menu; color:#fff; margin-top: -20px; position: fixed;">Seamless ways to </p>
						<br>
						<a style="font-size: 30px;text-decoration: none;cursor: context-menu; color:#fff;" href="#" class="typewrite" data-period="3000"
							data-type='[ "Registration Courses", "Manage Students", "Manage Instructors", "Manage Course Schedule", "Assign Courses to Students", "Assign Courses to Instructor" ]'>
							<span class="wrap"></span>
						</a>									
					</div>

					<p class="des_txtx" style="color:#e9ecef; font-size: 14px; font-weight: 200; margin-top: 23%; margin-left: 30px;">
						
					</p>
						
					<div class="chi-testimonial-container">
														
							<p class="renxtestimonial">
								Global Academy made course registration effortless! As a student, 
								I appreciated the intuitive interface and easy navigation.
							</p>
							<div class="chi-user">
								<img src="../assets/images/website_images/Global5.png" alt="user" class="renz_user-image">
								<div class="renz_user-details">
									<p class="lausername">Mr. John Doe</p>
									<p class="larole">Student of Global Academy</p>
								</div>
							</div>
							<div class="chi-progress-bar"></div>
					</div>
					
				
				</div>
			</div>

			<div class="col-sm-8 col-md-6 col-lg-8 mt-auto mb-auto">
		    	
				<div style="margin: 40px;">
					<div class="d-block d-sm-none d-md-none d-xm-none" align="center">
						<img src="../assets/images/website_images/Global.png" width="100" height="100" alt="">
					</div>
					<h2 style="font-weight: 700; color: #555;">Sign up</h2>
					<p style="color:#92929D;font-size:13px;" id="signin">Have an account? <a href="../sign-in" style="color:#008080;"> Sign In </a>
					</p>
					<div>
					    
					</div>
				</div>
				<div class="chi-formbody" style="margin: 40px 140px 0 40px;">  
					<div class="row">
						<div class="col-12">
							<div class="form-floating mb-3">
								<select type="text" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-select form-select-sm usertype">
									<option value="">Select User</option>
									<option value="hod">HOD</option>
									<option value="instructor">Instructor</option>
									<option value="student">Student</option>
								</select>
								<label for="floatingInput" style="color: #555; margin-top: 2px; font-size: 11px; font-weight: 500;">What user are you </label>
							</div>
						</div>
						<div class="col-6">
							<div class="form-floating mb-3">
								<span style="position: absolute; left: 88%; color: #7d8597; margin-top: 15px;"><i class="fa fa-1x fa-user" aria-hidden="true"></i></span>
								<input type="text" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm firstname" placeholder="John">
								<label for="floatingInput" style="color: #555; margin-top: 2px; font-size: 11px; font-weight: 500;">First Name </label>
							</div>
						</div>
						<div class="col-6">
							<div class="form-floating mb-3 ">
							<span style="position: absolute; left: 88%; color: #7d8597; margin-top: 15px;"><i class="fa fa-1x fa-user" aria-hidden="true"></i></span>
								<input type="text" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm lastname" placeholder="Doe">
								<label for="floatingInput" style="color: #555; font-size: 11px; font-weight: 500;">Last Name</label>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating mb-3">
								<span style="position: absolute; left: 94%; color: #7d8597; margin-top: 15px;"><i class="fa fa-1x fa-envelope" aria-hidden="true"></i></span>
								<input type="email" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm email" placeholder="johndoe@gmail.com">
								<label for="floatingInput" style="color: #555; margin-top: 2px; font-size: 11px; font-weight: 500;">Email </label>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating mb-3">
								<span style="position: absolute; left: 94%; color: #7d8597; margin-top: 15px;z-index:6;"><i class="fa fa-1x fa-phone" aria-hidden="true"></i></span>
								<input type="number" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm phone" placeholder="2348123456789">
								<label for="floatingInput" style="color: #555; font-size: 11px; font-weight: 500;">Phone Number</label>
							</div>
						</div>
						<div class="col-12">
							<div class="form-floating mb-3">
								<span class="" style="position: absolute; left: 94%; color: #7d8597; margin-top: 15px;cursor:pointer;"><i class="fa fa-1x fa-eye viewpassword" aria-hidden="true"></i></span>
								<input type="password" style="height: 55px; box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border: none; border-radius: 6px;" class="form-control form-control-sm signuppassword" placeholder="123456">
								<label for="floatingInput" style="color: #555; font-size: 11px; font-weight: 500;">Password</label>
							</div>
						</div>
						
						<div class="col-12">
							<div align="center">
								<button class="btn btn-lg" id="signup-btn" type="button" style="padding: 12px; border-radius: 10px; font-size: 13px; width: 100%;color:white;background-color:#008080;">Sign Up</button>
							</div>
						</div>
					</div>
					
				</div>
  			</div>
		</div>
	</div>
	
    <script>
        
		var TxtType = function (el, toRotate, period) {
			this.toRotate = toRotate;
			this.el = el;
			this.loopNum = 0;
			this.period = parseInt(period, 10) || 2000;
			this.txt = '';
			this.tick();
			this.isDeleting = false;
		};

		TxtType.prototype.tick = function () {
			var i = this.loopNum % this.toRotate.length;
			var fullTxt = this.toRotate[i];

			if (this.isDeleting) {
				this.txt = fullTxt.substring(0, this.txt.length - 1);
			} else {
				this.txt = fullTxt.substring(0, this.txt.length + 1);
			}

			this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

			var that = this;
			var delta = 200 - Math.random() * 100;

			if (this.isDeleting) { delta /= 2; }

			if (!this.isDeleting && this.txt === fullTxt) {
				delta = this.period;
				this.isDeleting = true;
			} else if (this.isDeleting && this.txt === '') {
				this.isDeleting = false;
				this.loopNum++;
				delta = 500;
			}

			setTimeout(function () {
				that.tick();
			}, delta);
		};

		window.onload = function () {
			var elements = document.getElementsByClassName('typewrite');
			for (var i = 0; i < elements.length; i++) {
				var toRotate = elements[i].getAttribute('data-type');
				var period = elements[i].getAttribute('data-period');
				if (toRotate) {
					new TxtType(elements[i], JSON.parse(toRotate), period);
				}
			}
			
			var css = document.createElement("style");
			css.type = "text/css";
			css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
			document.body.appendChild(css);
		};

    </script>

	<!-- jquery link -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/notify/wnoty.js"></script>
	
	<script>
		// jQuery
		$(document).ready(function() {
			$('.viewpassword').on('click', function() {
				var passwordField = $('.signuppassword');
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


		$('body').on('click','#signup-btn',function() {

			var usertype = $('.usertype option:selected').val();
			var firstname = $('.firstname').val();
			var lastname = $('.lastname').val();
			var email = $('.email').val();
			var Phone = $('.phone').val();
			var password = $('.signuppassword').val();

			$('.usertype, .firstname, .lastname, .email, .phone, .signuppassword').each(function() {
				if($(this).val() === '' || $(this).val() === '0') {
					$(this).css("border", "1px solid red");
				} else {
					$(this).css("border", "1px solid #008080");
				}
			});

			
			if (usertype == '' || usertype == '0' || firstname == '' || firstname == '0' || lastname == '' || lastname == '0' || email == '' || email == '0' || Phone == '' || Phone == '0' || password == '' || password == '0') 
			{
				
				$.wnoty({
					type: 'error',
					message: "No field should be left empty.",
					autohideDelay: 7000
				});


			} 
			else 
			{
				$("#signup-btn").html("Signing Up...");

                $.ajax({
                    type: 'POST',
                    url:"../controller/php-script/sign-up/",
                    data: {
                        usertype:usertype,
                        firstname:firstname,
                        lastname:lastname,
                        email:email,
                        Phone:Phone,
                        password:password
                    },
                    success: function (output) {

						if(output == '0')
						{
							$.wnoty({
								type: 'info',
								message: "User already exist.",
								autohideDelay: 7000
							});
						}
						else{

							$.wnoty({
								type: 'success',
								message: "Registration Successful, Logging In...",
								autohideDelay: 7000

							});
							
							window.location.href = "../hod/home";
						}
                        
                        $("#signup-btn").html("Sign Up");

                    }

                });
			}

		});

	</script>

</body>

</html>