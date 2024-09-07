<?php
if (isset($_POST['submit'])) {
    // Retrieve form data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];



    include '../classes/dbh.class.php'; 
    include '../classes/login.class.php';
    include '../classes/logincontr.class.php';

    $login = new Logincontr($uid, $pwd);
    $login->getUser($uid, $pwd);
    

    header("Location: ../home.php?login=success");
    exit();
} else {
 
    header("Location: ../login.php");
    exit();
}
