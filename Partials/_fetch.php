<?php 
include '_dbconnect.php';
if(isset($_POST['view_btn'])){
    $request = $_POST['id'];
   // echo $request;
    $ql1 = "SELECT * FROM `loan_application` WHERE `Status` = '$request'";
    $que1 = mysqli_query($conn, $ql1);
    $res = mysqli_num_rows($que1);
if($res>0){
?>

<table class="table table-striped text-center">
        <tr>
            <th>Loan Reference ID</th>
            <th><i class="bi bi-file-person-fill"></i> Name</th>
            <th><i class="bi bi-envelope-fill"></i> Email</th>
            <th><i class="bi bi-telephone-fill"></i> Mobile No.</th>
            <th><i class="bi bi-list-ul"></i> Loan Type</th>
            <th><i class="bi bi-cash"></i> Loan Amount</th>
            <th><i class="bi bi-calendar3"></i> Loan Term (in months)</th>
            <th> Interest Rate</th>
            <th><i class="bi bi-cash"></i> Total Amount</th>
            <th>Issue Date</th>
            <th>Status</th>
            <th><i class="bi bi-list-task"></i> Action</th>
        </tr>
        <?php 
         for($i=1; $i<=$res;$i++){
         $row=mysqli_fetch_array($que1);
        ?>
        <tr>
        <td>
            <?php echo $row['Loan_ID'] ?>
        </td>
        <td>
            <?php echo $row['U_Name'] ?>
        </td>
        <td>
            <?php echo $row['Email'] ?>
        </td>
        <td>
            <?php echo $row['Phone'] ?>
        </td>
        <td>
            <?php echo $row['Loan_type'] ?>
        </td>
        <td>
            <?php echo $row['Loan_amount'] ?>
        </td>
        <td>
            <?php echo $row['Loan_term'] ?> Months
        </td>
        <td>
            <?php echo $row['Interest_Rate'] ?> <i class="bi bi-percent"></i>
        </td>
        <td>
            <?php echo $row['Total_payable_Amount'] ?>
        </td>
        <td>
            <?php echo $row['timestamp'] ?>
        </td>
        <td>
            <?php echo $row['Status'] ?>
        </td>
        <td>
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>"/>
            <button type="submit" class="btn btn-primary mb-1" name="Apporve" id="Apporve">Apporve</button><br>
            <button type="submit" class="btn btn-danger mb-1" name="Reject" id="Reject">Reject</button>
         </td>
        </tr> 
        <?php } ?>
</table>
<a href="../Index.php" class="badge badge-info p-2">BACK</a>

<?php }
        else{
            echo "<b><center> Sorry! No Record Found <b>";
        }
    ?>
<?php } ?>
<?php
if(isset($_POST['Apporve'])){

    $id = $_POST['id'];
    echo $id;
    $select = "UPDATE `loan_application` SET `Status` = 'Apporved' WHERE `id` = '$id'";
    $result = mysqli_query($conn,$select);
    $_SESSION['status'] = "This Application is Apporved";
    header("Location:_Loans1.php");
}
if(isset($_POST['Reject'])){

    $id = $_POST['id'];
    $select = "UPDATE `loan_application` SET `Status` = 'Rejected' WHERE `id` = '$id'";
    $result = mysqli_query($conn,$select);
    $_SESSION['status'] = "This Application is Rejected";
    header("Location:_Loans1.php");

}
?>
