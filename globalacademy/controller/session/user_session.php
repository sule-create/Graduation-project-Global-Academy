<?php

	ob_start();
	session_start();

	include('../../controller/config/config.php');

	if (!isset($_SESSION['user_type']) && empty($_SESSION['user_type'])) {
		header("Location: ../../sign-in/");
	}

	$user_type = $_SESSION['user_type'];
	$ses_email = $_SESSION['email'];

    $sqlGet_users_tbl = "SELECT * FROM `users_tbl` WHERE `email` = '$ses_email' AND user_type = '$user_type'";
    $result_users_tbl = mysqli_query($link, $sqlGet_users_tbl);
    $row_users_tbl = mysqli_fetch_assoc($result_users_tbl);
    $row_cnt_users_tbl = mysqli_num_rows($result_users_tbl);

    if($row_cnt_users_tbl > 0)
    {
        $usertype = $row_users_tbl['user_type'];

        if($user_type === $usertype)
        {
            $userid = $row_users_tbl['sn'];
            $firstname = $row_users_tbl['first_name'];
            $lastname = $row_users_tbl['last_name'];
            $email = $row_users_tbl['email'];
            $Phone = $row_users_tbl['phone_number'];
            $photo = $row_users_tbl['photo'];
    
            if($photo == '' || $photo == '0' || $photo == NULL)
            {
                $userphoto = '../../assets/images/website_images/default.png';
            }
            else
            {
                $userphoto = $photo;
            }
        }
        else{
            header("Location: ../../$user_type/home/");
        }
        
    }
    else
    {
        header("Location: ../../sign-in/");
    }

?>