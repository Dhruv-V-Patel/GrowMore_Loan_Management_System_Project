<?php 
include '_dbconnect.php';

session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user_email = $_SESSION['useremail'];
    $ql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
    $que = mysqli_query($conn, $ql);
    $res = mysqli_fetch_assoc($que);
    $id = $res['u_id']; 
    $u_email = $res['user_email']; 
    ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Payment Gateway By GrowMore</title>
</head>

<body>
    <div class="container" style="justify-content: space-between;">
        <div class="row border rounded mt-5 p-2 shadow-lg">
            <div class="col-sm">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Payment Details </h2>
                    </div>
                    <?php
                        if (isset($_SESSION['status']) && $_SESSION['status'] == "Record Successfully Added") {  ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                            unset($_SESSION['status']);
                        }elseif (isset($_SESSION['status']) && $_SESSION['status'] == "Something Went Wrong"){ ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php 
                             unset($_SESSION['status']); 
                        }else{}
                        ?>
                    <div class="card-body">
                        <form action="_Pay.php" method="POST" onsubmit="return validation()" name="myfrm">
                            <table class="table table-striped text-center">
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <label for="exampleInputID1">Loan Reference Id</label>
                                            <input type="text" class="form-control" id="id" name="id" placeholder="Enter your Loan Reference Id" required>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label for="exampleInputNmae1">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" required>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"value="<?php echo $u_email ?>" readonly>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label for="exampleInputMobile1">Mobile No</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your Mobile" required>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <label for="exampleInputAddress1">Addredss</label>
                                            <input type="text" class="form-control" id="add" name="add" placeholder="Enter your Address with Pin code" required>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label for="exampleInputAddress1">Amount</label>
                                            <input type="number" class="form-control" id="pin" name="pin" placeholder="Enter your EMI Amount" required>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <label for="exampleInputCity1">City</label>
                                            <select class="form-control" id="city" name="city" required>
                                                <option selected="" value="">-- Select City --</option>
                                                <option value="Ahmedabad">Ahmedabad</option>
                                                <option value="Amreli">Amreli</option>
                                                <option value="Anand">Anand</option>
                                                <option value="Aravalli">Aravalli</option>
                                                <option value="Banaskantha">Banaskantha</option>
                                                <option value="Bharuch">Bharuch</option>
                                                <option value="Bhavnagar">Bhavnagar</option>
                                                <option value="Botad">Botad</option>
                                                <option value="Chhota Udepur">Chhota Udepur</option>
                                                <option value="Dahod">Dahod</option>
                                                <option value="Dang">Dang</option>
                                                <option value="Devbhoomi Dwarka">Devbhoomi Dwarka</option>
                                                <option value="Gandhinagar">Gandhinagar</option>
                                                <option value="Gir Somnath">Gir Somnath</option>
                                                <option value="Jamnagar">Jamnagar</option>
                                                <option value="Junagadh">Junagadh</option>
                                                <option value="Kutch">Kutch</option>
                                                <option value="Kheda">Kheda</option>
                                                <option value="Mahisagar">Mahisagar</option>
                                                <option value="Mehsana">Mehsana</option>
                                                <option value="Morbi">Morbi</option>
                                                <option value="Narmada">Narmada</option>
                                                <option value="Navsari">Navsari</option>
                                                <option value="Panchmahal">Panchmahal</option>
                                                <option value="Patan">Patan</option>
                                                <option value="Porbandar">Porbandar</option>
                                                <option value="Rajkot">Rajkot</option>
                                                <option value="Sabarkantha">Sabarkantha</option>
                                                <option value="Surat">Surat</option>
                                                <option value="Surendranagar">Surendranagar</option>
                                                <option value="Tapi">Tapi</option>
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Valsad">Valsad</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label for="exampleInputState1">State</label>
                                            <input type="text" class="form-control" value="Gujarat"
                                                id="state" readonly>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="2"><button type="sumbit" name="submit" class="btn btn-success"
                                            style="font-size: 1rem; width: 60%; padding: 0.5rem 1rem;">Procced to
                                            Pay</button>
                                    </td>
                                </tr>
                            </table>
                            <a href="_PayDetail.php" class="badge badge-info p-2">BACK</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">

        </div>
    </div>
    <script>
            function validation() {
                var phone = document.forms['myfrm']['mobile'];
                var get_num = String(phone.value).charAt(0);
                var first_num = Number(get_num);

                if (isNaN(phone.value) || phone.value.length != 10 || first_num < 6) {
                    alert('Invalid Phone Number');
                    return false;
                }
                return true;
            }

            </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php } ?>