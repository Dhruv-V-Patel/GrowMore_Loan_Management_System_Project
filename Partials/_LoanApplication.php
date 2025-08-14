<?php
error_reporting(0);
include '_dbconnect.php';
$sql1 = "SELECT * FROM `loan_plan`";
$query1 = mysqli_query($conn, $sql1);
$result1 = mysqli_num_rows($query1);

$sql = "SELECT * FROM `loan_types`";
$query = mysqli_query($conn, $sql);
$result = mysqli_num_rows($query);

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user_email = $_SESSION['useremail'];
    $ql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
    $que = mysqli_query($conn, $ql);
    $res = mysqli_fetch_assoc($que);
    $id = $res['u_id']; 
    $u_email = $res['user_email']; 
    ?>


    <!DOCTYPE html>
    <html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title>Loan Application Form</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


        <style>
            th {
                width: 500px;
            }
            .popup {
                width: 400px;
                background-color: #fff;
                border-radius: 6px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(1);
                text-align: center;
                padding: 0 30px 30px;
                color: #333;
                visibility: visible;
                transition: transform 0.4s,top 0.4s;
            }
            .close-popup{
                visibility:hidden ;
                top: 0%;
                transform: translate(-50%, -50%) scale(0.1);
            }
            .popup img{
                width: 100px;
                margin-top: -50px;
                border-radius: 60%;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }
            .popup h2{
                font-size: 38px;
                margin: 10px 0 10px;
                font-weight: 500;
            }
            .popup button{
                width: 100%;
                margin-top: 10px;
                padding: 10px 0;
                border: 0;
                font-size: 18px;
                outline: none;
                border-radius: 4px;
                cursor: pointer;
                box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);

            }
        </style>
    </head>
    <body>
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
                            <h1>New Loan Application</h1>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" onsubmit="return validation()" name="myfrm">
                                <table class="table table-striped text-left" style=" border-collapse:separate;">
                                    <tr>
                                        <th><i class="bi bi-file-person-fill"></i> Full Name :<br>
                                            <input class="form-control" type="text" id="Name" name="Name"value="<?php if(isset($_POST['Name'])) echo $_POST['Name']; ?>"  required>
                                        </th>
                                        <th><i class="bi bi-envelope-fill"></i> Email :<br>

                                            <input class="form-control" type="text" id="Email" name="Email" value="<?php echo $u_email ?>" readonly>

                                        </th>
                                    </tr>
                                    <tr>
                                        <th><i class="bi bi-telephone-fill"></i> Phone :<br>
                                            <input class="form-control" type="text" id="Phone" name="Phone" value="<?php if(isset($_POST['Phone'])) echo $_POST['Phone']; ?>" required>
                                        </th>
                                        <th><i class="bi bi-list-ul"></i> Loan Type :<br>
                                            <select class="form-control ml-2" aria-label="Default select example" name="Type" id="Type" required>
                                                <option value="">--Select Loan Type--</option>
                                                <?php
                                                for ($i = 1; $i <= $result; $i++) {
                                                    $row1 = mysqli_fetch_array($query);
                                                ?>
                                                    <option value="<?php echo $row1['loan_type'] ?>" <?php echo(isset($_POST['Type']) && $_POST['Type'] == $row1['loan_type']) ? 'selected' : ''; ?> > <?php echo $row1['loan_type'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><i class="bi bi-cash"></i> Loan Amount :<br>
                                            <input class="form-control" type="number" id="Amount" name="Amount" value="<?php if(isset($_POST['Amount'])) echo $_POST['Amount']; ?>" required>
                                        </th>
                                        <th><i class="bi bi-calendar3"></i> Loan Term (in months) :<br>
                                            <select class="form-control ml-2" aria-label="Default select example" name="Term" id="Term" required>
                                                <option value="">--Select Loan Term (in months)--</option>
                                                <?php
                                                for ($i = 1; $i <= $result1; $i++) {
                                                    $row = mysqli_fetch_array($query1);
                                                ?>
                                                    <option value="<?php echo $row['months'] ?>" <?php echo(isset($_POST['Term']) && $_POST['Term'] == $row['months']) ? 'selected' : ''; ?> ><?php echo $row['months'] ?> Months</option>
                                                <?php } ?>
                                            </select>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><i class="bi bi-ticket-detailed"></i> Reason for Loan<br>
                                            <textarea class="form-control" id="Reason" name="Reason" rows="3" required><?php echo isset($_POST['Reason']) ? htmlspecialchars($_POST['Reason']) : '' ?></textarea>
                                        </th>
                                        <th style="text-align: center;" class="align-middle">
                                            <button type="submit" class="btn btn-success" name="EMI" id="EMI">Calculate EMI</button>
                                        </th>
                                    </tr>
                                    <?php if (isset($_POST['EMI'])) {
                                       /* $name = $_POST['Name'];
                                        $email = $_POST['Email'];
                                        $phone = $_POST['Phone'];
                                        $type = $_POST['Type'];
                                        $reason = $_POST['Reason']; */
                                        $amount = $_POST['Amount'];
                                        $term = $_POST['Term'];
                                        $sql2 = "SELECT * FROM `loan_plan` WHERE months = '$term'";
                                        $query2 = mysqli_query($conn, $sql2);
                                        $result2 = mysqli_fetch_assoc($query2);
                                        $rate = $result2['interest_percentage'];
                                        $penalty = $result2['penalty_rate'];
                                        $interestrate = ($rate / 100) / 12;

                                        if (empty($amount) || empty($term)) {
                                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <strong>Hey!</strong>Loan Amount or Loan Term Field is Empty...
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>';
                                        } else {
                                            $EMI = $amount * $interestrate * pow(1 + $interestrate, $term) / (pow(1 + $interestrate, $term) - 1);
                                            $TotalEmi = round($term * $EMI);
                                            $PayableAmount = round($TotalEmi - $amount);

                                            echo '<tr> 
                                                        <td> Loan EMI :<br><b>' . round($EMI) . '</b>
                                                        </td>
                                                        <td> Total Interest Payable :<br><b>' . $PayableAmount . '</b>
                                                        </td>
                                                        </tr>
                                                        <tr> 
                                                        <td> Total Amount :<br><b>' . $TotalEmi . '</b>
                                                        </td>
                                                        <th>
                                                        <h5 class="mb-0"><small>Interest: <b>' . $rate . ' % </b></small></h5>
                                                        <h5 class="mb-0"><small>Over dure Penalty: <b>' . $penalty . ' %</b></small></h5>
                                                        </th>
                                                    </tr>';
                                        }
                                    }
                                    ?>
                                </table>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check" name="check" onclick="enable()" required>
                                    <label class="form-check-label" for="defaultCheck1">
                                           Have you submitted your Documents? <a href="_Documents.php">Click Here</a>
                                    </label>
                                </div>
                                <div class="p-2">
                                    <button type="submit" class="btn btn-primary float-right" name="submit" id="submit" disabled="true">Submit</button>
                                    <a href="_Loans.php"><button type="button" class="btn btn-secondary ml-2">Back</button></a>
                                </div>
                            </form>
                            <?php
                                        if (isset($_POST['submit'])) {
                                            $name = $_POST['Name'];
                                            $email = $_POST['Email'];
                                            $phone = $_POST['Phone'];
                                            $type = $_POST['Type'];
                                            $loan_amount = $_POST['Amount'];
                                            $loan_term = $_POST['Term'];
                                            $reason = $_POST['Reason'];
                                            $code = rand(0, 999999);
                                            $loan_id = "REFID" . $code;
                                            $sql2 = "SELECT * FROM `loan_plan` WHERE months = '$loan_term'";
                                            $query2 = mysqli_query($conn, $sql2);
                                            $result2 = mysqli_fetch_assoc($query2);
                                            $rate = $result2['interest_percentage'];
                                            $penalty = $result2['penalty_rate'];
                                            $interestrate = ($rate / 100) / 12;

                                            $EMI = $loan_amount * $interestrate * pow(1 + $interestrate, $loan_term) / (pow(1 + $interestrate, $loan_term) - 1);
                                            $TotalEmi = round($loan_term * $EMI);
                                            $PayableAmount = round($TotalEmi - $loan_amount);


                                            if(isset($_POST['check'])){
                                                $ql1 = "SELECT * FROM `document` WHERE Email = '$email'";
                                                $que1 = mysqli_query($conn, $ql1);
                                                $numRows = mysqli_num_rows($que1);
                                                if($numRows > 0){
                                                    $sql = "INSERT INTO  `loan_application` (`Loan_ID`,`U_Name`,`Email`,`Phone`,`Loan_type`,`Loan_amount`,`Loan_term`,`Interest_Rate`,`Total_payable_Amount`,`Reason`,`Status`,`timestamp`) VALUES ('$loan_id','$name','$email','$phone','$type','$loan_amount','$loan_term','$rate','$TotalEmi','$reason','Pending',current_timestamp())";
                                                    $query_run = mysqli_query($conn, $sql);
                                                    echo '<div class="popup" id="popup">
                                                    <img src="..\assets\images\tick1.png" alt="">
                                                    <h2>Success!</h2>
                                                    <h5> Loan ID : '.$loan_id .'</h5>
                                                    <p> Loan Type : '.$type .'<br> Loan Amount : '.$loan_amount .'<br>Loan term : '.$loan_term .'<br> Interest Rate : '.$rate .'<br> Penalty Rate : '.$penalty .'<br>
                                                    <b>Total Amount : '.$TotalEmi .'</b><br>Thank you for apply Loan Application.<br>Your Application is approved/rejected within 24 to 72 hours..</p>
                                                    <button type="button" class="btn btn-success" onclick="closePopup()">OK</button>
                                                </div>';
                                                }
                                            else{
                                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                <strong>Hey!</strong> Documents are not submited. Please submit your document first...
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>';
                                            }
                                        }
                                    }
                                 ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
 
    <!------------------------------------------------ Main Body End here ------------------------------------------------->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

     <script>
        function enable(){
            var check = document.getElementById("check");
            var btn = document.getElementById("submit");
            if(check.checked){
                btn.removeAttribute("disabled");
            }else{
                btn.disabled="true";
            }
        }
        let popup =document.getElementById("popup");

        function closePopup(){
            popup.classList.add("close-popup");
        }

        function validation() {
        var phone = document.forms['myfrm']['Phone'];
        var get_num = String(phone.value).charAt(0);
        var first_num = Number(get_num);

        if (isNaN(phone.value) || phone.value.length != 10 || first_num < 6) {
            alert('Invalid Phone Number');
            return false;
        }
        return true;
    }
     </script>
    </body>

    </html>
    