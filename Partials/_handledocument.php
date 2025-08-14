<?php
session_start();

include '_dbconnect.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user_email = $_SESSION['useremail'];
    $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $Name = $result['user_name'];
    $Email = $result['user_email'];
    $folder = "../assets/uploads/Documents/";
    if (isset($_POST['submit'])) {

        $img_iden = $_FILES['Identity']['name'];
        $tmp_iden = $_FILES['Identity']['tmp_name'];
        $f0 = $Name."-".time()."-".$img_iden;
        move_uploaded_file($tmp_iden, $folder.$f0);


        $img_Res = $_FILES['Residence']['name'];
        $tmp_Res = $_FILES['Residence']['tmp_name'];
        $f1 = $Name."-".time()."-".$img_Res;
        move_uploaded_file($tmp_Res, $folder.$f1);

        $img_salslip = $_FILES['SalarySlips']['name'];
        $tmp_salslip = $_FILES['SalarySlips']['tmp_name'];
        $f2 = $Name."-".time()."-".$img_salslip;
        move_uploaded_file($tmp_salslip, $folder.$f2);

        $img_bnkpass = $_FILES['Passbook']['name'];
        $tmp_bnkpass = $_FILES['Passbook']['tmp_name'];
        $f3 = $Name."-".time()."-".$img_bnkpass;
        move_uploaded_file($tmp_bnkpass, $folder.$f3);

        $img_KYC = $_FILES['KYC']['name'];
        $tmp_KYC = $_FILES['KYC']['tmp_name'];
        $f4 = $Name."-".time()."-".$img_KYC;
        move_uploaded_file($tmp_KYC, $folder.$f4);

        $sql = "insert into  document(Name,Email,Identity,Residence,SalarySlips,Passbook,KYCDocument,timestamp)
        values('$Name','$Email','$f0','$f1','$f2','$f3','$f4',current_timestamp())";
        mysqli_query($conn, $sql);
        $_SESSION['status'] = "Documents Successfully Added";
        header("Location:_Documents.php");
    } else {
        $_SESSION['status'] = "Something Went Wrong";
        header("Location:_Document.php");
    }
}
