<?php
session_start();
include '_dbconnect.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Documents</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <!------------------------------------------------ Main Body Start here ------------------------------------------------->
    <div class="container">
        <div class="row border rounded mx-auto mt-5 p-2 shadow-lg">
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
                        <h1>Your Info</h1>
                        <h5 class="text-light text-dark">Verify</h5>
                    </div>
                    <div class="row row-normalize mt-3">
                        <div class="col-md-6">
                            <div class="man-image mt-2 pt-2">
                                <img src="../assets/images/woman.png" alt="" style="margin-left: 50px;">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 text-dark">
                            <h4 class="text-center">Submit Documents</h4>
                            <form action="_handledocument.php" method="post" enctype="multipart/form-data">
                                <table class="table table-striped col-md-12" style="border-spacing:0 15px; border-collapse:separate;">
                                    <tr>
                                        <th><i class="bi bi-file-person-fill"></i> Proof of Identity* (Passport/Driving
                                            License/Voters ID/Pancard - any one)<br>
                                            <input class="form-control" type="file" id="Identity" name="Identity" required>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><i class="bi bi-house-fill"></i> Proof of Residence* (Leave and License
                                            Agreement/Utility Bill(Not More Than 3
                                            Months Old)/Passport - any one)<br>
                                            <input class="form-control" type="file" id="Residence" name="Residence" required>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><i class="bi bi-wallet-fill"></i> Salary Slips for Last 3 Months*<br>
                                            <input class="form-control" type="file" id="SalarySlips" name="SalarySlips" required>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><i class="bi bi-bank2"></i> Bank Passbook<br>
                                            <input class="form-control" type="file" id="Passbook" name="Passbook" required>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><i class="bi bi-person-bounding-box"></i> KYC Document Proof of Identity*
                                            (Aadhar card/Pan Crad/Voter ID/Driving
                                            License)<br>
                                            <input class="form-control" type="file" id="KYC" name="KYC" required>
                                        </th>
                                    </tr>
                                </table>
                                <div class="p-2">
                                    <button type="submit" class="btn btn-primary float-right" name="submit" id="submit">SUBMIT</button>
                                    <a href="../Index.php"><button type="button" class="btn btn-secondary ml-2">BACK</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!------------------------------------------------ Main Body End here ------------------------------------------------->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>