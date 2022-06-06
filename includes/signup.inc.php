<?php 

if (isset($_POST['submit'])) 
{
    // Grabbind the data
    $uid = $_POST['uid'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];

    // Instantiate SignupContr Class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid , $pwd , $pwdRepeat , $email);
    
    // Running error handlers and user Signup
    $signup ->signupUser();
    // Going to back to front page
    header('location: ../index.php?error=none');
}