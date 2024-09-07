<?php
if (isset($_POST['submit'])) {
    // Retrieve form data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    include '../classes/dbh.class.php'; 
    include '../classes/signup.class.php';
    include '../classes/signupcontr.class.php';
    
    $signup = new Signupcontr($uid, $pwd, $pwdRepeat, $email);
    $signup->signupUser();

    header("Location: ../home.php?signup=success");
    exit();
} else {
 
    header("Location: ../home.php");
    exit();
}
