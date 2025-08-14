<?php
session_start();

include '_dbconnect.php';
$sql1 = "SELECT * FROM `loan_plan`";
$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_num_rows($query1);

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Interest Rate & Charges</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
</head>

<body>

    <!------------------------------------------------ Add Loan Plan Modal Start here --------------------------------------------->

    <div class="modal fade" id="AddPlanModal" tabindex="-1" aria-labelledby="AddPlanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddPlanModalLabel">Loan Type Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_LoanCode.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><i class="bi bi-justify"></i> Loan Plan(Months)</label>
                            <input type="text" name="Plan" id="Plan" class="form-control"
                                placeholder="Loan Plan (Months)">
                            <small class="form-text text-muted">Please Enter Month for Plan </small>
                        </div>
                        <div class="form-group">
                            <label for=""><i class="bi bi-ticket-detailed"></i> Interest</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="interest_percentage"
                                    id="interest_percentage" placeholder="Interest" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""><i class="bi bi-ticket-detailed"></i> Monthly Over due's Penalty</label>
                            <div class="input-group mb-3">
                                <input type="text" id="penalty_rate" class="form-control" name="penalty_rate"
                                    placeholder="Monthly Over due's Penalty in percentage">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="Add1" id="Add" class="btn btn-primary">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!------------------------------------------------ Add Loan Plan Modal End here ----------------------------------------------->

    <!------------------------------------------------ Edit Loan Plan Modal Start here --------------------------------------------->

    <div class="modal fade" id="EditTypeModal" tabindex="-1" aria-labelledby="EditTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditTypeModalLabel">Loan Plan Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_LoanCode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="Planid" id="Planid">
                        <div class="form-group">
                            <label for=""><i class="bi bi-justify"></i> Loan Plan(Months)</label>
                            <input type="text" name="edit_plan" id="edit_plan" class="form-control"
                                placeholder="Loan Plan (Months)">
                            <small class="form-text text-muted">Please Enter Month for Plan </small>
                        </div>
                        <div class="form-group">
                            <label for=""><i class="bi bi-ticket-detailed"></i> Interest</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="edit_interest_percentage"
                                    id="edit_interest_percentage" placeholder="Interest"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""><i class="bi bi-ticket-detailed"></i> Monthly Over due's Penalty</label>
                            <div class="input-group mb-3">
                                <input type="text" id="edit_penalty_rate" class="form-control" name="edit_penalty_rate"
                                    placeholder="Monthly Over due's Penalty in percentage">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update1" id="update1" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!------------------------------------------------ Edit Loan Plan Modal End here ----------------------------------------------->

    <!------------------------------------- ---------- Delete Loan Plan Modal Start here --------------------------------------------->

    <div class="modal fade" id="DeleteTypeModal" tabindex="-1" aria-labelledby="DeleteTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteTypeModalLabel">User Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_LoanCode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_type_id" id="delete_type_id">
                        <h4>Are you sure, you want to delete this data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete1" class="btn btn-danger">YES..! Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!------------------------------------------------ Delete Loan Plan Modal End here ----------------------------------------------->

    <!------------------------------------------------ Main Body Start here ------------------------------------------------->

    <div class="container">
        <div class="row border rounded mx-auto mt-5 p-2 shadow-lg">
            <div class="col-md-12">
                <div class="card">
                    <?php
                    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {  ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card-header text-center">
                        <h2>Interest Rate
                            <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                $user_email = $_SESSION['useremail'];
                                $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
                                $query = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_assoc($query);

                                if ($result['user_name'] == "Administrator") { ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#AddPlanModal"><i class="bi bi-plus"></i> Add Loan Plan</button>
                            <?php }  } ?>
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <tr>
                                <th>Sr No.</th>
                                <th><i class="bi bi-justify"></i> Interest Rate</th>

                                
                                <?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    $user_email = $_SESSION['useremail'];
                                    $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
                                    $query = mysqli_query($conn, $sql);
                                    $result = mysqli_fetch_assoc($query);

                                    if ($result['user_name'] == "Administrator") { ?>
                                <th><i class="bi bi-list-task"></i> Action</th> <?php }
                                 } ?>
                            </tr>
                            <?php
                            for ($i = 1; $i <= $result1; $i++) {
                                $row = mysqli_fetch_array($query1);
                                $months = $row['months'];
									$months = $months / 12;
									if($months < 1){
										$months = $row['months']. " months";
									}else{
										$m = explode(".", $months);
										$months = $m[0] . " yrs.";
										if(isset($m[1])){
											$months .= " and ".number_format(12 * ($m[1] /100 ),0)."month/s";
										}
									}
                            ?>
                            <tr>
                                <td class="Type_id">
                                    <?php echo $row['id'] ?>
                                </td>
                                <td class="">
                                    <p class="mb-0">Years/Month: <b><?php echo $months ?></b></p>
                                    <p class="mb-0">Interest: <b><?php echo $row['interest_percentage']."%" ?></b></p>
                                </td>

                                <?php
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        $user_email = $_SESSION['useremail'];
                                        $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
                                        $query = mysqli_query($conn, $sql);
                                        $result = mysqli_fetch_assoc($query);
                                        if ($result['user_name'] == "Administrator") { ?>
                                <td class="">
                                    <a href="#" class="badge badge-primary Edit_plan_btn p-2">EDIT</a>
                                    <a href="#" class="badge badge-danger Delete_plan_btn p-2">DELETE</a>
                                </td>
                                <?php } } ?>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <div class="card-header text-center mb-1">
                        <h3>Applicable Fees and Charges:</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width:300px">Processing Fees</th>
                                <td>
                                    <p class="mb-0"><b>Processing fee up to 2% of the loan amount. </b></p>
                                </td>
                            </tr>
                            <tr>
                                <th style="width:300px">Flexi Fee</th>

                                <td>
                                    <p class="mb-0"><b>Flexi Variant: A fee will be deducted upfront from the loan
                                            amount (as applicable below)</b></p>
                                    <p class="mb-0">Up to Rs.1,999/- for loan amount less than Rs.2,00,000/-</small></p>
                                    <p class="mb-0">Up to Rs.3,999/- for loan amount from Rs.2,00,000/- to Rs.3,99,999/-</small></p>
                                    <p class="mb-0">Up to Rs.5,999/- for loan amount from Rs.4,00,000/- to Rs.5,99,999/-</small></p>
                                    <p class="mb-0">Up to Rs.7,999/- for loan amount from Rs.6,00,000/- to Rs.9,99,999/-</small></p>
                                    <p class="mb-0">Up to Rs.8,999/- for loan amount from Rs.10,00,000/- to Rs.14,99,999/-</small></p>
                                    <p class="mb-0">Up to Rs.9,999/- for loan amount from Rs.15,00,000/- to Rs.19,99,999/-</small></p>
                                    <p class="mb-0">Up to Rs.10,999/- for loan amount from Rs.20,00,000/- to Rs.24,99,999/-</small></p>
                                    <p class="mb-0">Up to Rs.11,999/- for loan amount from Rs.25,00,000/- to Rs.29,99,999/-</small></p>
                                    <p class="mb-0">Up to Rs.12,999/- for loan amount Rs.30,00,000/- and above</small></p>
                                    <p class="mb-0"><b>*All the charges above are inclusive of applicable taxes</b></small></p>

                                </td>
                            </tr>
                            <tr>
                                <th style="width:300px">Penal payment</th>
                                <td>
                                    <p class="mb-0"><b>Any delay in payment of monthly instalment/EMI shall attract <U> Penal interest(Penalty) at the rate of 2.5% per month </U> the monthly instalment/EMI outstanding form the date default until the receipt of the monthly instalment/EMI.</b></p>
                                </td>
                            </tr>
                        </table>
                        <a href="../Index.php" class="badge badge-info p-2">BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------ Main Body End here ------------------------------------------------->

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script>
    /*-------------------------------------- Loan Plan Edit Data JQuery Code Start Here -----------------------------------------------*/

    $(document).ready(function() {

        $('.Edit_plan_btn').click(function(e) {
            e.preventDefault();

            var Type_id = $(this).closest('tr').find('.Type_id').text();
            //console.log(Type_id);

            $.ajax({
                type: "POST",
                url: "_LoanCode.php",
                data: {
                    'checking_edit_plan_btn': true,
                    'Typeid': Type_id,
                },
                success: function(response) {
                    //console.log(response);
                    $.each(response, function(key, value) {
                        //console.log(value['months']);  
                        $('#Planid').val(value['id']);
                        $('#edit_plan').val(value['months']);
                        $('#edit_interest_percentage').val(value[
                            'interest_percentage']);
                        $('#edit_penalty_rate').val(value['penalty_rate']);
                    });
                    $('#EditTypeModal').modal('show');
                }
            });
        });

    });

    /*-------------------------------------- Loan Plan Edit Data JQuery Code End Here  ------------------------------------------------*/

    /*-------------------------------------- Loan Plan Delete Data JQuery Code Start Here ---------------------------------------------*/
    $(document).ready(function() {

        $('.Delete_plan_btn').click(function(e) {
            e.preventDefault();
            var Type_id = $(this).closest('tr').find('.Type_id').text();
            console.log(Type_id);

            $('#delete_type_id').val(Type_id);
            $('#DeleteTypeModal').modal('show');

        });

    });

    /*-------------------------------------- Loan Plan Delete Data JQuery Code End Here -----------------------------------------------*/
    </script>
</body>

</html>
<?php

?>