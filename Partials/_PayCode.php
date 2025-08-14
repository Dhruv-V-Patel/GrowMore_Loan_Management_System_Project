<?php
session_start();

include '_dbconnect.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user_email = $_SESSION['useremail'];
    $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $Name = $result['user_name'];
    $folder = "../assets/uploads/Payments/";



    if(isset($_POST['Upload'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $add = $_POST['add'];
        $pay = $_POST['pin'];
        $city = $_POST['city'];
        $code = rand(0, 999999);
        $PAY_id = "PAYID" . $code;


        $img_pay = $_FILES['pay']['name'];
        $tmp_pay = $_FILES['pay']['tmp_name'];
        $f0 = $Name."-".time()."-".$img_pay;
        move_uploaded_file($tmp_pay, $folder.$f0);        
        $sql = "INSERT INTO `payments`(`Reference_No`,`Loan_ID`, `Name`, `Email`, `Mobile`, `Address`, `paid_amount`, `CIty`, `Pay_img`,`timestamp`) VALUES ('$PAY_id','$id','$name','$email','$mobile','$add','$pay','$city','$f0',current_timestamp())";
        mysqli_query($conn, $sql);
        $_SESSION['status'] = "Record Successfully Added";
        header("Location:_Payment.php");
        //echo $img_pay. "<br> ".$tmp_pay."<br> ".$mobile." <br>".$id." <br>".$name." <br>".$PAY_id;

    } else {
        $_SESSION['status'] = "Something Went Wrong";
        header("Location:_Payment.php");
    }
}
?>