<?php
session_start();

include '_dbconnect.php';
$sql1 = "SELECT * FROM `loan_types`";
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

    <title>Loan Types</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">

    <style>
        .align {
            text-align: justify;
            text-justify: inter-word;
            width:600px;
        }
        </style>
</head>

<body>

<!------------------------------------------------ Add Loan Type Modal Start here --------------------------------------------->

    <div class="modal fade" id="AddTypeModal" tabindex="-1" aria-labelledby="AddTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddTypeModalLabel">Loan Type Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_LoanCode.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""><i class="bi bi-justify"></i> Loan Type</label>
                            <input type="text" name="Type" id="Type" class="form-control" placeholder="Loan Type">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="bi bi-ticket-detailed"></i> Description</label>
                            <input type="text" name="Description" id="Description" class="form-control"
                                placeholder="Description of Loan Type">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="Add" id="Add" class="btn btn-primary">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!------------------------------------------------ Add Loan Type Modal End here ----------------------------------------------->

<!------------------------------------------------ Edit Loan Type Modal Start here --------------------------------------------->

    <div class="modal fade" id="EditTypeModal" tabindex="-1" aria-labelledby="EditTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditTypeModalLabel">Loan Type Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_LoanCode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for=""><i class="bi bi-justify"></i> Loan Type</label>
                            <input type="text" name="edit_Type" id="edit_Type" class="form-control"
                                placeholder="Loan Type">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="bi bi-ticket-detailed"></i> Description</label>
                            <textarea name="edit_Description" id="edit_Description" rows="5" class="form-control"
                                placeholder="Description of Loan Type"> </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!------------------------------------------------ Edit Loan Type Modal End here ----------------------------------------------->

<!------------------------------------- ---------- Delete Loan Type Modal Start here --------------------------------------------->

        <div class="modal fade" id="DeleteTypeModal" tabindex="-1" aria-labelledby="DeleteTypeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DeleteTypeModalLabel">Loan Type Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="_LoanCode.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="Type_id" id="delete_type_id">
                            <h4>Are you sure, you want to delete this data ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="delete" class="btn btn-danger">YES..! Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!------------------------------------------------ Delete Loan Type Modal End here ----------------------------------------------->

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
                        <h2>Loan Types
                            <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                $user_email = $_SESSION['useremail'];
                                $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
                                $query = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_assoc($query);

                                if ($result['user_name'] == "Administrator") { ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#AddTypeModal"><i class="bi bi-plus"></i> Add Loan Type</button>
                            <?php }  } ?>
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <tr>
                                <th>Sr No.</th>
                                <th><i class="bi bi-justify"></i> Loan Types</th>
                                <th><i class="bi bi-ticket-detailed"></i> Description</th>
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
                            ?>
                            <tr>
                                <td class="Type_id">
                                    <?php echo $row['id'] ?>
                                </td>
                                <td>
                                   <b> <?php echo $row['loan_type'] ?></b>
                                </td>
                                <td class="align">
                                    <?php echo $row['description'] ?>
                                </td>
                                <?php
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        $user_email = $_SESSION['useremail'];
                                        $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
                                        $query = mysqli_query($conn, $sql);
                                        $result = mysqli_fetch_assoc($query);
                                        if ($result['user_name'] == "Administrator") { ?>
                                <td>
                                    <a href="#" class="badge badge-primary Edit_btn p-2">EDIT</a>
                                    <a href="#" class="badge badge-danger Delete_btn mt-1 p-2">DELETE</a>
                                </td>
                                <?php }
                                    } ?>
                            </tr>
                            <?php } ?>
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

    /*-------------------------------------- Loan Type Edit Data JQuery Code Start Here -----------------------------------------------*/

        $(document).ready(function() {

            $('.Edit_btn').click(function(e) {
                e.preventDefault();

                var Type_id = $(this).closest('tr').find('.Type_id').text();
                //console.log(Type_id);

                $.ajax({
                    type: "POST",
                    url: "_LoanCode.php",
                    data: {
                        'checking_edit_btn': true,
                        'Typeid': Type_id,
                    },
                    success: function(response) {
                        //console.log(response);
                        $.each(response, function(key, value) {
                            //console.log(value['loan_type']);  
                            $('#id').val(value['id']);
                            $('#edit_Type').val(value['loan_type']);
                            $('#edit_Description').val(value['description']);
                        });
                        $('#EditTypeModal').modal('show');
                    }
                });
            });

        });

    /*-------------------------------------- Loan Type Edit Data JQuery Code End Here  ------------------------------------------------*/

    /*-------------------------------------- Loan Type Delete Data JQuery Code Start Here ---------------------------------------------*/
        $(document).ready(function () {

            $('.Delete_btn').click(function (e) { 
                e.preventDefault();
                var Type_id = $(this).closest('tr').find('.Type_id').text();
                console.log(Type_id);

                $('#delete_type_id').val(Type_id);
                $('#DeleteTypeModal').modal('show');

            });

        });

    /*-------------------------------------- Loan Type Delete Data JQuery Code End Here -----------------------------------------------*/

    </script>
</body>

</html>
<?php

?>