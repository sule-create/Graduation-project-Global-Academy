<?php

   ob_start();
   session_start();

   include('../controller/config/config.php');

   if(isset($_SESSION['user_type']) && !empty($_SESSION['user_type']))
   {
      header('location: ../'.$_SESSION['user_type'].'/home/');
   }

?>