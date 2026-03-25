<?php
include('controller/config/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content="EduMESS" />
	<meta name="description"
		content="Global Academy revolutionizes course registration with its user-friendly web application. Whether you're a student, instructor, or head of department, our platform offers seamless registration, access to educational resources, and efficient management tools. Enjoy unlimited student registrations, dedicated support for educators, and a modern interface designed for optimal user experience. Join Global Academy today and simplify your academic journey." />
	<meta name="keywords"
		content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- SITE TITLE -->
	<title>
		Global Academy
	</title>

	<!-- FAVICON -->
	<link rel="shortcut icon" href="assets/images/website_images/Global.png" type="image/x-icon">

	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- website css -->
	<link rel="stylesheet" href="css/website_css/website_css.css">

	<!-- font awesome cn -->
	<link rel="stylesheet" href="assets/plugins/font_awesome/css/font-awesome.min.css">

	<!-- Boxicons CSS -->
	<link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body >

	<section>

		<!-- NavBar -->
		<nav class="navbar navbar-expand-lg navbar-light navbarstyle fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand navbar-brandimg" href="<?php echo $defaultUrl;?>">
					<img class="img-fluid" src="<?php echo $defaultUrl;?>assets/images/website_images/Global.png" style="height:60px;width:auto;"/>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
						
						<li class="nav-item me-4">
							<a class="nav-link" aria-current="page" href="<?php echo $defaultUrl;?>">
								Home
							</a>
						</li>
					</ul>
					<form class="d-flex">
						<a href="<?php echo $defaultUrl; ?>sign-in/" class="btn waves-effect waves-light me-4" style="border:1px solid #008080;color:#008080;font-size:13px;">
							Sign In
						</a>
						<a href="<?php echo $defaultUrl; ?>signup/" class="btn waves-effect waves-light me-4" style="color:white;font-size:13px;background: #008080;">
							Sign Up
						</a>
					</form>
				</div>
			</div>
		</nav>


		<!-- Top banner -->
		<div class="container" style="width:90%;">
			<div class="row">
				<div class="col-sm-12 col-md-7 col-lg-7 col-xl-7 home">

					<!-- dotted img -->
					<img class="dotted-img img-fluid" src="assets/images/website_images/dottedimg.png" />

					<div class="aftwriteup">
						<span>
							Welcome to Global Academy
						</span>
					</div>
					<div class="home-text">
						<h1>
							Discover a streamlined approach for
						</h1>
						<p class="animate-text">
							<span style="color:#008080;">
								Course Registration
							</span>
							<span style="color:#008080;">
								Managing Students
							</span>
							<span style="color:#008080;">
								Managing Instructors
							</span>
							<span style="color:#008080;">
								Managing Course Schedule
							</span>
							<span style="color:#008080;">
								Assigning Courses to Students
							</span>
							<span style="color:#008080;">
								Assigning Courses to Instructor
							</span>
						</p>
					</div>
					<div class="btndiv" align="left">
						<a href="<?php echo $defaultUrl; ?>sign-in/" class="btn waves-effect waves-light appbtn" style="border:1px solid #008080;color:#008080;">
							Sign In
						</a>
						&nbsp;&nbsp;
						<a href="signup/" class="btn startbtn" style="background: #008080;">
							<span>
								Register Now &nbsp;&nbsp;&nbsp;<svg width="19" height="16"
									viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path
										d="M17.7145 8.70711C18.105 8.31658 18.105 7.68342 17.7145 7.29289L11.3505 0.928932C10.96 0.538408 10.3268 0.538408 9.93628 0.928932C9.54576 1.31946 9.54576 1.95262 9.93628 2.34315L15.5931 8L9.93628 13.6569C9.54576 14.0474 9.54576 14.6805 9.93628 15.0711C10.3268 15.4616 10.96 15.4616 11.3505 15.0711L17.7145 8.70711ZM0 9H17.0074V7H0V9Z"
										fill="white"></path>
								</svg>
							</span>
						</a>
					</div>

					<img class="dotted-imgsec img-fluid" src="assets/images/website_images/dottedimg.png" />
				</div>
				<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 d-none d-sm-block d-md-block d-xm-block">
					<img height="auto" style="width: 115%; margin-top: 150px;" src="assets/images/tertiaryBanner.png"/>
				</div>
			</div>
		</div>

		<!-- Features -->
		<div class="container">
			<div class="row" style="margin-top:60px;">
				<div class="col-12 fs-1 fw-bold" align="center" style="color:#008080;">
					Our Features
				</div>
			</div>
		</div>

		<div class="container" style="width:85%;">

			<!-- K-12 -->
			<div class="row g-5" style="margin-top:60px;">
				<div class="col-md-12 col-lg-6">
					<img class="d-none d-sm-block d-md-block d-xm-block" src="assets/images/EduMESSeLibray.png" style="height: auto;width:120%; margin-left: -20px;margin-top:30px;" />
				</div>
				<div class="col-md-12 col-lg-6" style="font-size:15px;color:#3A3A3A;margin-top:12px;">
					<div class="row">
						<div class="col-12" style="margin-top:30px;">
							<small style="color:#524f4e;font-size:15px;">
								Global Academy provides a platform where HODs, Instructors and Students can come in and manage their academic operation at ease from one platform
							</small>
						</div>
						<div class="col-2" style="margin-top:30px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#008080;font-size:30px;">
								<i class="fa fa-user" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">
							<span style="color:#008080;font-size:18px;font-weight:520;">
								HOD (Head of Department).
							</span><br>
							<small style="color:#524f4e;font-size:13px;">
								<ul class="dotted-list">
									<li>Manages Users(Students and Instructor).</li>
									<li>Creates Courses</li>
									<li>Manages and assigns courses to instructors and students.</li>
									<li>Manages his/her profile information.</li>
								</ul>
							</small>
						</div>
						<div class="col-2" style="margin-top:30px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#008080;font-size:30px;">
								<i class="fa fa-user" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">

							<span style="color:#008080;font-size:18px;font-weight:520;">
								Instructor
							</span><br>
							<small style="color:#524f4e;font-size:13px;">
								<ul class="dotted-list">
									<li>Manages his/her courses</li>
									<li>Sees students offering his/her courses</li>
									<li>Manages his/her profile information.</li>
								</ul>
							</small>

						</div>
						<div class="col-2" style="margin-top:30px;">
							<span class="btn btn-sm btn-icon"
								style="cursor:pointer;background-color:#F1F5F9;color:#008080;font-size:30px;">
								<i class="fa fa-user" aria-hidden="true" style="padding:5px;"></i>
							</span>
						</div>
						<div class="col-10" style="margin-top:30px;">

							<span style="color:#008080;font-size:18px;font-weight:520;">
								Student
							</span><br>
							<small style="color:#524f4e;font-size:13px;">
								<ul class="dotted-list">
									<li>Registers the couses he/she is offering.</li>
									<li>Manages his/her profile information.</li>
								</ul>
							</small>

						</div>
						<div class="col-12">
							<div class="btndiv" align="left">
								<a href="<?php echo $defaultUrl; ?>sign-in/" class="btn waves-effect waves-light appbtn" style="border:1px solid #008080;color:#008080;">
									Sign In
								</a>
								&nbsp;&nbsp;
								<a href="signup/?lang=<?php echo $lang; ?>" class="btn startbtn"
									style="background: #008080;">
									<span>
										Register Now &nbsp;&nbsp;&nbsp;<svg width="19" height="16"
											viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path
												d="M17.7145 8.70711C18.105 8.31658 18.105 7.68342 17.7145 7.29289L11.3505 0.928932C10.96 0.538408 10.3268 0.538408 9.93628 0.928932C9.54576 1.31946 9.54576 1.95262 9.93628 2.34315L15.5931 8L9.93628 13.6569C9.54576 14.0474 9.54576 14.6805 9.93628 15.0711C10.3268 15.4616 10.96 15.4616 11.3505 15.0711L17.7145 8.70711ZM0 9H17.0074V7H0V9Z"
												fill="white"></path>
										</svg>
									</span>
								</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-6" align="left">
					<img class="img-fluid" style="width: 70px;margin-top:0%;"
						src="assets/images/website_images/dottedimg.png" />
				</div>
				<div class="col-6" align="right">
					<img class="img-fluid" style="width: 70px;margin-buttom:0%;"
						src="assets/images/website_images/dottedimg.png" />
				</div>
			</div>

		</div>
		<hr>

		<!-- Footer -->
		<div class="container-fluid footer-cnt">
			<div class="row container mb-5 footer-headers">
				<div class="col-md-12 col-lg-4">
					<img class="footer-brandimg img-fluid me-10" src="<?php echo $defaultUrl;?>assets/images/website_images/Global.png" />

				</div>

				<div class="col-md-6 col-lg-3 mt-3 footer-links">
					<h6>Contact Us</h6>
					<div class="mt-4">
						<a target="_blank" href="#">
							<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect width="34" height="34" rx="17" fill="#008080"></rect>
								<path d="M18.1875 11.375H21V8H18.1875C16.0163 8 14.25 9.76625 14.25 11.9375V13.625H12V17H14.25V26H17.625V17H20.4375L21 13.625H17.625V11.9375C17.625 11.6326 17.8826 11.375 18.1875 11.375Z" fill="white"></path>
							</svg>
						</a>
						<a target="_blank" href="#">
							<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect width="34" height="34" rx="17" fill="#008080"></rect>
								<path d="M26 11.7357C25.3381 12.029 24.627 12.2272 23.8794 12.3168C24.6508 11.8553 25.2278 11.1289 25.503 10.2731C24.7783 10.7036 23.9851 11.0066 23.158 11.1689C22.6018 10.575 21.8651 10.1814 21.0623 10.0491C20.2594 9.91687 19.4354 10.0534 18.7181 10.4374C18.0007 10.8215 17.4303 11.4316 17.0953 12.1731C16.7602 12.9146 16.6794 13.7459 16.8652 14.5381C15.3968 14.4643 13.9603 14.0827 12.649 13.4178C11.3376 12.753 10.1807 11.8199 9.25332 10.679C8.93623 11.226 8.7539 11.8602 8.7539 12.5356C8.75354 13.1436 8.90328 13.7423 9.18981 14.2786C9.47634 14.8149 9.89082 15.2722 10.3965 15.6099C9.81005 15.5912 9.23658 15.4327 8.72377 15.1477V15.1952C8.72371 16.048 9.0187 16.8746 9.55868 17.5346C10.0987 18.1947 10.8504 18.6476 11.6863 18.8165C11.1423 18.9637 10.5719 18.9854 10.0183 18.8799C10.2542 19.6137 10.7136 20.2553 11.3322 20.7151C11.9508 21.1748 12.6977 21.4295 13.4683 21.4436C12.1602 22.4706 10.5446 23.0276 8.88153 23.0252C8.58693 23.0252 8.29258 23.008 8 22.9736C9.68813 24.059 11.6532 24.6351 13.6602 24.6328C20.454 24.6328 24.168 19.006 24.168 14.1258C24.168 13.9673 24.164 13.8072 24.1569 13.6486C24.8793 13.1262 25.5029 12.4792 25.9984 11.7381L26 11.7357Z" fill="#F8FAFC"></path>
							</svg>
						</a>
						<a target="_blank" href="use#">
							<svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect width="34" height="34" rx="17" fill="#008080"></rect>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M13.5988 8.7995C14.4785 8.759 14.759 8.75 17 8.75C19.241 8.75 19.5215 8.75975 20.4005 8.7995C21.2795 8.83925 21.8795 8.9795 22.4045 9.18275C22.9542 9.3905 23.453 9.71525 23.8655 10.1352C24.2855 10.547 24.6095 11.045 24.8165 11.5955C25.0205 12.1205 25.16 12.7205 25.2005 13.598C25.241 14.4792 25.25 14.7597 25.25 17C25.25 19.241 25.2402 19.5215 25.2005 20.4012C25.1607 21.2787 25.0205 21.8787 24.8165 22.4037C24.6095 22.9543 24.285 23.4531 23.8655 23.8655C23.453 24.2855 22.9542 24.6095 22.4045 24.8165C21.8795 25.0205 21.2795 25.16 20.402 25.2005C19.5215 25.241 19.241 25.25 17 25.25C14.759 25.25 14.4785 25.2402 13.5988 25.2005C12.7213 25.1607 12.1213 25.0205 11.5963 24.8165C11.0457 24.6095 10.5469 24.2849 10.1345 23.8655C9.71478 23.4535 9.38999 22.9549 9.18275 22.4045C8.9795 21.8795 8.84 21.2795 8.7995 20.402C8.759 19.5207 8.75 19.2402 8.75 17C8.75 14.759 8.75975 14.4785 8.7995 13.5995C8.83925 12.7205 8.9795 12.1205 9.18275 11.5955C9.39029 11.0451 9.71534 10.5465 10.1352 10.1345C10.547 9.71488 11.0454 9.39008 11.5955 9.18275C12.1205 8.9795 12.7205 8.84 13.598 8.7995H13.5988ZM20.3337 10.2845C19.4637 10.2448 19.2028 10.2365 17 10.2365C14.7972 10.2365 14.5362 10.2448 13.6662 10.2845C12.8615 10.3212 12.425 10.4555 12.134 10.5687C11.7492 10.7188 11.474 10.8965 11.1853 11.1853C10.9115 11.4515 10.7009 11.7757 10.5687 12.134C10.4555 12.425 10.3212 12.8615 10.2845 13.6662C10.2448 14.5362 10.2365 14.7972 10.2365 17C10.2365 19.2028 10.2448 19.4637 10.2845 20.3337C10.3212 21.1385 10.4555 21.575 10.5687 21.866C10.7007 22.2238 10.9115 22.5485 11.1853 22.8148C11.4515 23.0885 11.7763 23.2993 12.134 23.4313C12.425 23.5445 12.8615 23.6788 13.6662 23.7155C14.5362 23.7552 14.7965 23.7635 17 23.7635C19.2035 23.7635 19.4637 23.7552 20.3337 23.7155C21.1385 23.6788 21.575 23.5445 21.866 23.4313C22.2508 23.2813 22.526 23.1035 22.8148 22.8148C23.0885 22.5485 23.2993 22.2238 23.4313 21.866C23.5445 21.575 23.6788 21.1385 23.7155 20.3337C23.7552 19.4637 23.7635 19.2028 23.7635 17C23.7635 14.7972 23.7552 14.5362 23.7155 13.6662C23.6788 12.8615 23.5445 12.425 23.4313 12.134C23.2813 11.7492 23.1035 11.474 22.8148 11.1853C22.5484 10.9116 22.2243 10.7009 21.866 10.5687C21.575 10.4555 21.1385 10.3212 20.3337 10.2845ZM15.9462 19.5433C16.5347 19.7882 17.19 19.8213 17.8002 19.6368C18.4104 19.4523 18.9375 19.0617 19.2917 18.5317C19.6459 18.0017 19.805 17.3652 19.742 16.7308C19.679 16.0965 19.3978 15.5037 18.9462 15.0538C18.6584 14.7661 18.3104 14.5459 17.9272 14.4089C17.5441 14.2719 17.1353 14.2215 16.7304 14.2615C16.3254 14.3014 15.9344 14.4306 15.5854 14.6398C15.2363 14.8491 14.9381 15.1331 14.712 15.4714C14.4859 15.8097 14.3376 16.194 14.2779 16.5965C14.2181 16.999 14.2484 17.4097 14.3664 17.7991C14.4844 18.1886 14.6874 18.547 14.9605 18.8485C15.2337 19.1501 15.5704 19.3874 15.9462 19.5433ZM14.0015 14.0015C14.3953 13.6077 14.8627 13.2954 15.3772 13.0823C15.8917 12.8692 16.4431 12.7595 17 12.7595C17.5569 12.7595 18.1083 12.8692 18.6228 13.0823C19.1373 13.2954 19.6047 13.6077 19.9985 14.0015C20.3923 14.3953 20.7046 14.8627 20.9177 15.3772C21.1308 15.8917 21.2405 16.4431 21.2405 17C21.2405 17.5569 21.1308 18.1083 20.9177 18.6228C20.7046 19.1373 20.3923 19.6047 19.9985 19.9985C19.2032 20.7938 18.1247 21.2405 17 21.2405C15.8753 21.2405 14.7968 20.7938 14.0015 19.9985C13.2062 19.2032 12.7595 18.1247 12.7595 17C12.7595 15.8753 13.2062 14.7968 14.0015 14.0015ZM22.181 13.391C22.2786 13.299 22.3567 13.1883 22.4107 13.0655C22.4648 12.9427 22.4936 12.8103 22.4956 12.6762C22.4975 12.5421 22.4725 12.4089 22.4221 12.2846C22.3717 12.1603 22.2968 12.0474 22.202 11.9525C22.1071 11.8577 21.9942 11.7828 21.8699 11.7324C21.7456 11.682 21.6124 11.657 21.4783 11.6589C21.3442 11.6609 21.2118 11.6897 21.089 11.7438C20.9662 11.7978 20.8555 11.8759 20.7635 11.9735C20.5845 12.1633 20.4865 12.4153 20.4903 12.6762C20.4941 12.9371 20.5994 13.1862 20.7839 13.3706C20.9683 13.5551 21.2174 13.6604 21.4783 13.6642C21.7392 13.668 21.9912 13.57 22.181 13.391Z" fill="#F8FAFC"></path>
							</svg>
						</a>
						<a target="_blank" href="#">
							<svg width="34" height="34">
								<rect width="34" height="34" rx="17" fill="#008080"></rect>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8 9.50382C8 9.10498 8.15844 8.72248 8.44046 8.44046C8.72248 8.15844 9.10498 8 9.50382 8H24.4945C24.6922 7.99968 24.888 8.03834 25.0707 8.11378C25.2533 8.18922 25.4194 8.29996 25.5592 8.43964C25.699 8.57933 25.81 8.74522 25.8856 8.92783C25.9612 9.11044 26.0001 9.30617 26 9.50382V24.4945C26.0002 24.6922 25.9614 24.888 25.8859 25.0707C25.8104 25.2534 25.6996 25.4194 25.5598 25.5593C25.4201 25.6991 25.2541 25.81 25.0715 25.8856C24.8888 25.9612 24.6931 26.0001 24.4954 26H9.50382C9.30627 26 9.11065 25.9611 8.92814 25.8855C8.74564 25.8098 8.57982 25.699 8.44017 25.5593C8.30052 25.4195 8.18976 25.2536 8.11424 25.0711C8.03871 24.8886 7.99989 24.6929 8 24.4954V9.50382ZM15.1247 14.8629H17.5621V16.0869C17.9139 15.3833 18.8139 14.75 20.1664 14.75C22.7592 14.75 23.3736 16.1515 23.3736 18.7231V23.4865H20.7497V19.3089C20.7497 17.8444 20.3979 17.018 19.5045 17.018C18.2649 17.018 17.7495 17.909 17.7495 19.3089V23.4865H15.1247V14.8629ZM10.6247 23.3745H13.2495V14.75H10.6247V23.3736V23.3745ZM13.625 11.9371C13.6299 12.1618 13.59 12.3853 13.5074 12.5943C13.4248 12.8034 13.3013 12.9939 13.1441 13.1546C12.9869 13.3153 12.7992 13.4429 12.592 13.5301C12.3848 13.6173 12.1623 13.6622 11.9375 13.6622C11.7127 13.6622 11.4902 13.6173 11.283 13.5301C11.0758 13.4429 10.8881 13.3153 10.7309 13.1546C10.5737 12.9939 10.4502 12.8034 10.3676 12.5943C10.285 12.3853 10.2451 12.1618 10.25 11.9371C10.2597 11.496 10.4418 11.0762 10.7572 10.7677C11.0726 10.4591 11.4963 10.2863 11.9375 10.2863C12.3787 10.2863 12.8024 10.4591 13.1178 10.7677C13.4332 11.0762 13.6153 11.496 13.625 11.9371Z" fill="white"></path>
							</svg>
						</a>
					</div>
				</div>

			</div>

		</div>
	</section>

	<!-- jquery link -->
	<script src="assets/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap JavaScript -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- web js -->
	<script src="js/website_js/script.js"></script>

</body>

</html>