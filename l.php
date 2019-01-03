<?php   
//log.php 
 session_start();
 unset($_SESSION["user_name"]); 
 header("location: auth.php");  
 ?> 

