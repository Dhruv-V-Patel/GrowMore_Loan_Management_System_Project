<?php
        include '_dbconnect.php';

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user_email = $_SESSION['useremail'];
    $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    $id = $result['u_id'];

    if (isset($_POST['submit']) && isset($_FILES['my_image'])) {

        echo "<pre>";
        print_r($_FILES['my_image']);
        echo "<pre>";

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0) {
            if ($img_size > 2250000) {
                $em = "Sorry, your file is too large.";
                header("Location:/GrowMore_Project/Partials/_EditProfile.php?error=$em");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $folder = "../assets/uploads/".$img_name;
                    move_uploaded_file($tmp_name,$folder);  
                    //move_uploaded_file($tmp_name, $img_upload_path);

                    //Insert into Database
                    $sql = "UPDATE `user_list` SET `user_img`= '$folder' WHERE `u_id`= $id";
                    mysqli_query($conn, $sql);
                    header("Location:/GrowMore_Project/Partials/_EditProfile.php");
                } else {
                    $em = "You can't upload files of this type";
                    header("Location:/GrowMore_Project/Partials/_EditProfile.php?error=$em");
                }
            }
        } else {
            $em = "unknown error occurred!";
            header("Location:/GrowMore_Project/Partials/_EditProfile.php?error=$em");
        }
    } else {
        header("Location:/GrowMore_Project/Partials/_EditProfile.php");
    }
}
