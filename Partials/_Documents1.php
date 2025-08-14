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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>User Documents</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
<!-- <div class="container" style="width: 2000px;"> -->
        <div class="row border rounded mx-3 mt-5 p-2 shadow-lg">
                <div class="card " style="width: 1600px;">
                    <div class="card-header text-center pb-0">
                        <h2>User Documets</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center" id="refersh-section">
                            <tr>
                                <th><i class="bi bi-file-person-fill"></i> Name</th>
                                <th><i class="bi bi-envelope-fill"></i> Email</th>
                                <th><i class="bi bi-image"></i> Proof of Identity</th>
                                <th><i class="bi bi-house-fill"></i> Proof of Residence</th>
                                <th><i class="bi bi-wallet-fill"></i> Salary Slips</th>
                                <th><i class="bi bi-bank2"></i> Bank Passbook</th>
                                <th><i class="bi bi-person-bounding-box"></i> KYCDocument</th>
                            </tr>
                            <tr>
                            <?php 
                                    $ql1 = "SELECT * FROM `document`";
                                    $que1 = mysqli_query($conn, $ql1);
                                    $res = mysqli_num_rows($que1);
                                    if($res > 0){
                                    for($i=1; $i<=$res;$i++){
                                    $row=mysqli_fetch_array($que1);
                                    $folder = "../assets/uploads/Documents/";
                                    ?> 
                                    <td>
                                        <?php echo $row['Name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Email'] ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo $folder.$row['Identity'] ?>" alt="" class="img-responsive img-thumbnail" width="150">
                                    </td>
                                    <td>
                                        <img src="<?php echo $folder.$row['Residence'] ?>" alt="" class="img-responsive img-thumbnail" width="150">
                                    </td>
                                    <td>
                                        <img src="<?php echo $folder.$row['SalarySlips'] ?>" alt="" class="img-responsive img-thumbnail" width="150">
                                    </td>
                                    <td>
                                        <img src="<?php echo $folder.$row['Passbook'] ?>" alt="" class="img-responsive img-thumbnail" width="150">
                                    </td>
                                    <td>
                                        <img src="<?php echo $folder.$row['KYCDocument'] ?>" alt="" class="img-responsive img-thumbnail" width="150">
                                    </td></tr>
                                    <?php } }  ?>
                        
                        </table>
                        <a href="../Index.php" class="badge badge-info p-2">BACK</a>
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
</body>

</html>
