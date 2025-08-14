<?php
session_start();
include '_dbconnect.php';

/*----------------------------------------- User View Data Code Start Here  ----------------------------------------------*/

    if (isset($_POST['checking_view_btn'])) {

        $u_id = $_POST['User_id'];
        // echo $return = $u_id;

            $sql = "SELECT * FROM `user_list` WHERE u_id = '$u_id'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($query);
            if($result>0){
            for ($i = 1; $i <= $result; $i++) {
                $row = mysqli_fetch_array($query);
                echo $return = '
                <h5> ID : ' .$row['u_id'].'</h5>
                <h5> Name : ' .$row['user_name'].'</h5>
                <h5> Email : ' .$row['user_email'].'</h5>
                <h5> Mobile NO. : ' .$row['user_mobile'].'</h5>
                <h5> Gender : ' .$row['user_gender'].'</h5>
                ';
            }
        } else {
            echo $return = "<h5>No Record Found </h5>";
        }
        
    }

/*----------------------------------------- User View Data Code End Here  ------------------------------------------------*/

/*----------------------------------------- User Edit Data Code Start Here  ----------------------------------------------*/

    if (isset($_POST['checking_edit_btn'])) {

        $u_id = $_POST['User_id'];
        // echo $return = $u_id;
        $result_array = [];

            $sql = "SELECT * FROM `user_list` WHERE u_id = '$u_id'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($query);
            if($result > 0){
            for ($i = 1; $i <= $result; $i++) {
                $row = mysqli_fetch_array($query);

                array_push($result_array,$row);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        } else {
            echo $return = "<h5>No Record Found </h5>";
        }
        
    }

    if(isset($_POST['update'])){

        $id= $_POST['id'];
        $name= $_POST['Name'];
        $email= $_POST['Email'];
        $mobile= $_POST['Mobile'];
        $gender= $_POST['Gender'];

        $query = "UPDATE `user_list` SET `user_name`= '$name', `user_email`='$email', `user_mobile`='$mobile',`timestamp`=current_timestamp(),`user_gender` = '$gender' WHERE `u_id`= '$id'";
        $query_run =mysqli_query($conn, $query);

        if($query_run)
        {
                $_SESSION['status'] = "Successfully Updated";
                header('Location: _UserData.php');
        }
        else
        {
            $_SESSION['status'] = "Something Went Wrong";
            header('Location: _UserData.php');
        }
    }
/*----------------------------------------- User Edit Data Code End Here  ------------------------------------------------*/

/*----------------------------------------- User Delete Data Code Start Here  ----------------------------------------------*/
if(isset($_POST['delete']))
{
    $id = $_POST['user_id'];

    $query = "DELETE FROM `user_list` WHERE u_id = '$id' ";
    $query_run =mysqli_query($conn, $query);

    if($query_run)
    {
            $_SESSION['status'] = "Successfully Deleted";
            header('Location: _UserData.php');
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong";
        header('Location: _UserData.php');
    }

}
/*----------------------------------------- User Delete Data Code End Here  ------------------------------------------------*/
