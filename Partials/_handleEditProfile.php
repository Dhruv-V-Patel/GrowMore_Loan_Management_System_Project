<?php
session_start();
$showError = "false";
include '_dbconnect.php';

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
$user_email=$_SESSION['useremail'];
$sql="SELECT * FROM `user_list` WHERE user_email = '$user_email'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
$id=$result['u_id'];
//echo $id;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username =  $_POST['Name'];
    $user_email =  $_POST['Email'];
    $user_mobile =  $_POST['Mobile'];
    $user_gender =  $_POST['Gender'];
    $pass =  $_POST['Pass'];
    $cur_pass =  $_POST['Cur_Pass'];
    $cpass =  $_POST['CPass'];
    
    if(!empty($pass)){
        if($pass == $cpass){

            if(password_verify($cur_pass, $result['user_pass'])){
            //echo $pass , $cur_pass;
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql ="UPDATE `user_list` SET `user_name`= '$username', `user_email`='$user_email', `user_mobile`='$user_mobile', `user_pass`= '$hash', `timestamp`=current_timestamp(),`user_img`='$user_img',`user_gender` = '$user_gender' WHERE `u_id`= '$id'";
            $result = mysqli_query($conn, $sql);
            if($result){
                $_SESSION['status'] = "Passwords & Record Successfully Updated";
                header("Location:/GrowMore_Project/Partials/_EditProfile.php?EditProfileSuccess=true");
                exit();
            }
        }
        else{
            $showError="Current Passwords is Wrong";
            $_SESSION['status'] = "Current Password Wrong";
            header("Location:/GrowMore_Project/Partials/_EditProfile.php?EditProfileSuccess=false&error=$showError");
        }
        }
        else{
            $showError="Passwords do not match";
            $_SESSION['status'] = "Password do not match";
            header("Location:/GrowMore_Project/Partials/_EditProfile.php?EditProfileSuccess=false&error=$showError");
        }
    }else{

    $sql ="UPDATE `user_list` SET `user_name`= '$username', `user_email`='$user_email', `user_mobile`='$user_mobile',`timestamp`=current_timestamp(),`user_gender` = '$user_gender' WHERE `u_id`= $id";
    $result = mysqli_query($conn, $sql);
    $_SESSION['status'] = "Record Successfully Updated";
   header("Location:/GrowMore_Project/Partials/_EditProfile.php?EditProfileSuccess=true");
    }

}
else
{
    header("Location:/GrowMore_Project/Partials/_EditProfile.php?EditProfileSuccess=false&error=$showError");
}
}

/*------------------------------------------------Image update------------------------------------------------------------ */

?>