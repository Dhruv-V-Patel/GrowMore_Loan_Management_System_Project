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

    <title>Loan Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
</head>

<body>
    <!-- <div class="container" style="width: 2000px;"> -->
    <div class="row border rounded mx-3 mt-5 p-2 shadow-lg">
        <div class="card " style="width: 1500px;">
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
                <h2>Payments
                    <a href="_Payment.php"><button type="button" class="btn btn-primary float-right ml-2"><i class="bi bi-plus"></i> Pay EMI</button></a>
                </h2>
            </div>
            <div class="card-body">
                <table class="table table-striped text-center">
                        <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                $user_email = $_SESSION['useremail'];
                                $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
                                $query = mysqli_query($conn, $sql);
                                $result = mysqli_fetch_assoc($query);
                                $u_email = $result['user_email'];

                                if ($result['user_name'] == "Administrator") {

                                    $ql1 = "SELECT * FROM `payments`";
                                    $que1 = mysqli_query($conn, $ql1);
                                    $res = mysqli_num_rows($que1);
                                  echo'  <tr>
                                    <th>Payment Reference ID</th>
                                    <th>Loan Reference ID</th>
                                    <th><i class="bi bi-file-person-fill"></i> Name</th>
                                    <th><i class="bi bi-envelope-fill"></i> Email</th>
                                    <th><i class="bi bi-telephone-fill"></i> Mobile No.</th>
                                    <th>Address</th>
                                    <th><i class="bi bi-cash"></i> Paid Amount</th>
                                    <th> City</th>
                                    <th><i class="bi bi-image"></i> Payment image</th>
                                    <th>Payment Date</th>
                                </tr>
                                <tr>';

                                    for ($i = 1; $i <= $res; $i++) {
                                        $row = mysqli_fetch_array($que1);
                                        $folder = "../assets/uploads/Payments/";

                         ?>
                                    <td>
                                        <?php echo $row['Reference_No'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Loan_ID'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Mobile'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Address'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['paid_amount'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['CIty'] ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo $folder.$row['Pay_img'] ?>" alt="" class="img-responsive img-thumbnail" width="150" style="height:250px;">  
                                    </td>
                                    <td>
                                        <?php echo $row['timestamp'] ?>
                                    </td>
                    </tr>
                    <?php  }
                    } else {
                        echo'  <tr>
                        <th>Payment Reference ID</th>
                        <th>Loan Reference ID</th>
                        <th><i class="bi bi-file-person-fill"></i> Name</th>
                        <th><i class="bi bi-envelope-fill"></i> Email</th>
                        <th><i class="bi bi-telephone-fill"></i> Mobile No.</th>
                        <th>Address</th>
                        <th><i class="bi bi-cash"></i> Paid Amount</th>
                        <th> City</th>
                        <th>Payment Date</th>
                    </tr>
                    <tr>';
                       $ql1 = "SELECT * FROM `payments` WHERE Email = '$u_email'";
                       $que1 = mysqli_query($conn, $ql1);
                       $res = mysqli_num_rows($que1);
                       for ($i = 1; $i <= $res; $i++) {
                       $row = mysqli_fetch_array($que1);
                    ?>
                    <td>
                        <?php echo $row['Reference_No'] ?>
                    </td>
                    <td>
                        <?php echo $row['Loan_ID'] ?>
                    </td>
                    <td>
                        <?php echo $row['Name'] ?>
                    </td>
                    <td>
                        <?php echo $row['Email'] ?>
                    </td>
                    <td>
                        <?php echo $row['Mobile'] ?>
                    </td>
                    <td>
                        <?php echo $row['Address'] ?>
                    </td>
                    <td>
                        <?php echo $row['paid_amount'] ?>
                    </td>
                    <td>
                        <?php echo $row['CIty'] ?>
                    </td>
                    <td>
                        <?php echo $row['timestamp'] ?>
                    </td>
                    </tr><?php  } ?>
        <?php  }
                        } ?>
                </table>
                <a href="../Index.php" class="badge badge-info p-2">BACK</a>
            </div>
        </div>
    </div>
    <!-- </div>-->

    <!------------------------------------------------ Main Body End here ------------------------------------------------->

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

</body>

</html>