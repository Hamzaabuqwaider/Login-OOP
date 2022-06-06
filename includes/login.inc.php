<?php 

if (isset($_POST['submit'])) 
{
    // Grabbind the data
    $uid = $_POST['uid'];
    $email = $_POST['pwd'];


    // Instantiate SignupContr Class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new loginContr($uid , $pwd);
    
    // Running error handlers and user Signup
    $login ->loginUser();
    // Going to back to front page
    header('location: ../index.php?error=none');
}