<?php
 session_start();
 include '_dbconnect.php';

 if(isset($_POST['delete']))
 {
    $id = $_POST['delete_id'];

    echo $id;

    $query = "DELETE FROM `user_list` WHERE u_id = '$id' ";
    $query_run =mysqli_query($conn, $query);

    if($query_run)
    {       
        session_destroy();
        header("Location:/GrowMore_Project");
    }
    else
    {
        header('Location: ../index.php');
    }
 }

?>