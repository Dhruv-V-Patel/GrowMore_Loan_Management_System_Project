<?php
$showError = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';

    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "SELECT * FROM `user_list` WHERE `user_email`='$email'";
    $result= mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            header("Location:\GrowMore_Project\Index.php?loginsuccess=true");
            exit();
        } 
        else{
            $showError = "Password do not match";
            session_start();
            $_SESSION['status'] = "Password do not match";
            header("Location:\GrowMore_Project\Index.php?loginsuccess=false&error=$showError");
        } 
    } 
    else{
        $showError = "User Not Found";
        session_start();
        $_SESSION['status'] = "User Not Found";
        header("Location:\GrowMore_Project\Index.php?loginsuccess=false&error=$showError");
    } 
}
