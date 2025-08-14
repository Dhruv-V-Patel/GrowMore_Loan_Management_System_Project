<?php
session_start();
include '_dbconnect.php';

if (isset($_POST['save'])) {
    $email = $_POST['email'];
   $pass = $_POST['Pass'];
   $cpass = $_POST['CPass'];

   if($pass == $cpass){
    $hash = password_hash($pass, PASSWORD_DEFAULT);
   $sql ="UPDATE `user_list` SET `user_pass`= '$hash', `timestamp`=current_timestamp() WHERE `user_email`= '$email'";
   $result = mysqli_query($conn, $sql);
   if($result)
        {
                $_SESSION['status'] = "Password Successfully Changed";
                header('Location: _PassRest.php');
        }
        else
        {
            $_SESSION['status'] = "Something Went Wrong";
            header('Location: _PassRest.php');
        }
    }
  // $_SESSION['status'] = "Password Successfully Updated";
  //echo $email;
}

?>
<?php
include '_dbconnect.php';

if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT user_email FROM user_list WHERE user_email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_email = $row['user_email'];
?>
        <!DOCTYPE html>
        <html>

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

            <title></title>
            <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
        </head>

        <body>
            <div class="py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Reset Password</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                    <input type="hidden" name="email" class="form-control" value="<?php echo $get_email  ?>">
                                        <div class="form-group mb-3">
                                            <label>New Password</label>
                                            <input type="password" name="Pass" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Confirm Password</label>
                                            <input type="text" name="CPass" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                            <a href="../index.php">
                                                <button type="button" class="btn btn-secondary">Back</button></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
            </script>

        </body>

        </html>
<?php } else {
        $_SESSION['status'] = "No Email Found";
        header("Location:_PassRest.php");
        exit(0);
    }
}
?>
