<?php
error_reporting(0);
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';

    /*$filename = $_FILES["Uploadfile"]["name"];
    $tempname = $_FILES["Uploadfile"]["tmp_name"];
    $folder = "../assets/uploads/".$filename;
    move_uploaded_file($tempname,$folder);*/

    $username = $_POST['UserName'];
    $user_email = $_POST['sigupEmail'];
    $user_mobile = $_POST['Mobile'];
    $user_gender = $_POST['Gender'];
    //$user_img = $_POST['Uploadfile'];
    $pass = $_POST['Password'];
    $cpass = $_POST['CPassword'];

    //Check wheter this email exists
    $existSql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);

    $existSql1 = "SELECT * FROM `user_list` WHERE user_mobile='$user_mobile'";
    $result1= mysqli_query($conn, $existSql1);
    $numRows1 = mysqli_num_rows($result1);
    
    if($numRows > 0){
        $showError="Email Already In Use";
        session_start();
        $_SESSION['status'] = "Email Already In Use";
    }
    elseif($numRows1 > 0){
       
        if($numRows1 > 0){
            $showError = "Mobile Number Already In Use";
            session_start();
            $_SESSION['status'] = "Mobile Number Already In Use";
        }
        
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql="INSERT INTO `user_list` (`user_name`, `user_email`, `user_mobile`, `user_pass`, `timestamp`,`user_gender`) VALUES ('$username', '$user_email', '$user_mobile', '$hash', current_timestamp(),'$user_gender')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location:/GrowMore_Project/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError="Passwords do not match";
            session_start();
            $_SESSION['status'] = "Passwords do not match";
        }
    }
   header("Location:/GrowMore_Project/index.php?signupsuccess=false&error=$showError");
}

?>