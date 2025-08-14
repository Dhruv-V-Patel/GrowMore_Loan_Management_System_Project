<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Payment Gateway By GrowMore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="..\assets\css\_Pay.css" type="text/css">
    <style>
    </style>
</head>

<body>
    <div class="container">
        <div class="row border rounded mx-auto mt-5 p-2 shadow-lg">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Payment Gateway</h2>
                    </div>
                    <div class="card-body">
                        <?php

                        if (isset($_POST['submit'])) {
                            $id = $_POST['id'];
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $mobile = $_POST['mobile'];
                            $add = $_POST['add'];
                            $pin = $_POST['pin'];
                            $city = $_POST['city']; 
                        ?>
                           
                            <div class="box-area">
                                <div class="single-box">
                                    <div class="img-area">
                                        <img src="../assets/images/Paytm.png" alt="">
                                        <img src="../assets/images/gpay.png" alt="">
                                        <img src="../assets/images/phonepe.png" alt=""><br>
                                        <img src="../assets/images/apay.png" alt="">
                                        <img src="../assets/images/upi.jpg" alt="">

                                    </div>
                                    <span class="header-text"><strong>Scan QR</strong></span>
                                    <div class="img-text">
                                        <p> <img src="..\assets\images\Paytm_QR.jpg" alt="" class="img-responsive img-thumbnail mb-2" width="200"><br>
                                            Scan this QR Code from any app.Money will reach in GrowMore's Bank account.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="image">
                                <form action="_PayCode.php" method="POST" enctype="multipart/form-data">

                                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                                    <input type="hidden" name="name" id="name" value="<?php echo $name ?>">
                                    <input type="hidden" name="email" id="email" value="<?php echo $email ?>">
                                    <input type="hidden" name="mobile" id="mobile" value="<?php echo $mobile ?>">
                                    <input type="hidden" name="add" id="add" value="<?php echo $add ?>">
                                    <input type="hidden" name="pin" id="pin" value="<?php echo $pin ?>">
                                    <input type="hidden" name="city" id="city" value="<?php  echo $city ?>"> 
                                    <?php  } ?>
                                    <label for="formFile" class="form-label">Upload Payment Image</label>
                                    <input class="form-control" type="file" id="pay" name="pay" required>
                                    <input type="submit" name="Upload" value="Upload" class="btn btn-primary float-right mt-2" >
                                </form>
                            </div>
                            <a href="_Payment.php"><button class="btn btn-info mt-2">BACK</button></a>

                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------ Main Body End here ------------------------------------------------->


        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
        </script>
        <script>
            let popup = document.getElementById("popup");

            function closePopup() {
                popup.classList.add("close-popup");
            }
        </script>

</body>

</html>