<?php
session_start();
include '_dbconnect.php';

/*----------------------------------------- Loan Type Add Data Code Start Here  ----------------------------------------------*/

if(isset($_POST['Add'])){

    $Type = $_POST['Type'];
    $Description = $_POST['Description'];

    $query = "INSERT INTO `loan_types`(`loan_type`, `description`, `timestamp`) VALUES('$Type', '$Description', current_timestamp())";
    $query_run =mysqli_query($conn, $query);

    if($query_run)
    {
            $_SESSION['status'] = "Loan Type Successfully Added";
            header('Location: _LoanTypes.php');
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong";
        header('Location: _LoanTypes.php');
    }
}

/*----------------------------------------- Loan Type Add Data Code End Here  ----------------------------------------------*/

/*----------------------------------------- Loan Type Edit Data Code Start Here  ----------------------------------------------*/

    if (isset($_POST['checking_edit_btn'])) {

        $u_id = $_POST['Typeid'];
        //echo $return = $u_id;
        $result_array = [];

            $sql = "SELECT * FROM `loan_types` WHERE id = '$u_id'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_num_rows($query);
            if($result > 0){
                foreach($query as $row){
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
        $type= $_POST['edit_Type'];
        $des= $_POST['edit_Description'];

        //echo $type.' = '.$des;

        $query = "UPDATE `loan_types` SET `loan_type`= '$type', `description`='$des',`timestamp`=current_timestamp() WHERE `id`= '$id'";
        $query_run =mysqli_query($conn, $query);

        if($query_run)
        {
                $_SESSION['status'] = "Loan Type Successfully Updated";
                header('Location: _LoanTypes.php');
        }
        else
        {
            $_SESSION['status'] = "Something Went Wrong";
            header('Location: _LoanTypes.php');
        }
    }
/*----------------------------------------- Loan Type Edit Data Code End Here  ------------------------------------------------*/

/*----------------------------------------- Loan Type Delete Data Code Start Here  ----------------------------------------------*/
if(isset($_POST['delete']))
{
    $id = $_POST['Type_id'];
     
    echo $id;
    $query = "DELETE FROM `loan_types` WHERE id = '$id' ";
    $query_run =mysqli_query($conn, $query);

    if($query_run)
    {
            $_SESSION['status'] = "Loan Type Successfully Deleted";
            header('Location: _LoanTypes.php');
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong";
        header('Location: _LoanTypes.php');
    }

}
/*----------------------------------------- Loan Type Delete Data Code End Here  ------------------------------------------------*/


/*----------------------------------------------------------------------------------------------------------------------------------  
                                                  Loan Plan Code Here  
----------------------------------------------------------------------------------------------------------------------------------*/


/*----------------------------------------- Loan Plan Add Data Code Start Here  ----------------------------------------------*/

if(isset($_POST['Add1'])){

    $Type = $_POST['Plan'];
    $interest = $_POST['interest_percentage'];
    $penalty = $_POST['penalty_rate'];

    $query = "INSERT INTO `loan_plan`(`months`, `interest_percentage`,`penalty_rate`, `timestamp`) VALUES('$Type', '$interest','$penalty', current_timestamp())";
    $query_run =mysqli_query($conn, $query);

    if($query_run)
    {
            $_SESSION['status'] = "Loan Type Successfully Added";
            header('Location: _LoanPlan.php');
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong";
        header('Location: _LoanPlan.php');
    }
}

/*----------------------------------------- Loan Plan Add Data Code End Here  ----------------------------------------------*/

/*----------------------------------------- Loan Plan Edit Data Code Start Here  ----------------------------------------------*/

if (isset($_POST['checking_edit_plan_btn'])) {

    $u_id = $_POST['Typeid'];
    //echo $return = $u_id;
    $result_array = [];

        $sql = "SELECT * FROM `loan_plan` WHERE id = '$u_id'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);
        if($result > 0){
            foreach($query as $row){
                array_push($result_array,$row);
                header('Content-type: application/json');
                echo json_encode($result_array);
            }
        } else {
            echo $return = "<h5>No Record Found </h5>";
        }
    
}

if(isset($_POST['update1'])){

    $id= $_POST['Planid'];
    $type= $_POST['edit_plan'];
    $interest1 = $_POST['edit_interest_percentage'];
    $penalty1 = $_POST['edit_penalty_rate'];

    //echo $type.' = '.$des;

    $query = "UPDATE `loan_plan` SET `months`= '$type', `interest_percentage`='$interest1',`penalty_rate`= '$penalty1',`timestamp`=current_timestamp() WHERE `id`= '$id'";
    $query_run =mysqli_query($conn, $query);

    if($query_run)
    {
            $_SESSION['status'] = "Loan Plan Successfully Updated";
            header('Location: _LoanPlan.php');
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong";
        header('Location: _LoanPlan.php');
    }
}
/*----------------------------------------- Loan Plan Edit Data Code End Here  ------------------------------------------------*/

/*----------------------------------------- Loan Plan Delete Data Code Start Here  ----------------------------------------------*/
if(isset($_POST['delete1']))
{
$id = $_POST['delete_type_id'];
 
echo $id;
$query = "DELETE FROM `loan_plan` WHERE id = '$id' ";
$query_run =mysqli_query($conn, $query);

if($query_run)
{
        $_SESSION['status'] = "Loan Plan Successfully Deleted";
        header('Location: _LoanPlan.php');
}
else
{
    $_SESSION['status'] = "Something Went Wrong";
    header('Location: _LoanPlan.php');
}

}
/*----------------------------------------- Loan Plan Delete Data Code End Here  ------------------------------------------------*/
