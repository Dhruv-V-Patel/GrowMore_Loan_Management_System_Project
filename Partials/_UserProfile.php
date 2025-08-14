<?php
 //require '_functions.php';
 include '_dbconnect.php';
 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
</head>

<body>
  <?php /*include '_handleEditProfile.php'; */?>
<?php
	session_start();
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
        $user_email=$_SESSION['useremail'];
         $sql="SELECT * FROM `user_list` WHERE user_email = '$user_email'";
         $query = mysqli_query($conn, $sql);
         $result = mysqli_fetch_assoc($query);
         $id = $result['u_id'];?>
<!----------------------------------------------------------- Delete Modal ----------------------------------------------->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_DeleteProfile.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" value="<?php echo $result['u_id']?>" id="delete_id">
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
<!----------------------------------------------------------- Delete Modal ----------------------------------------------->


    <div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
        <div class="col-md-4 mt-4 text-center">
            <img src="<?php if(!empty($result['user_img']))
				{
					echo $result['user_img'];
				}else{
					echo '../assets/images/no-image.jpg';
				}
				?>
				" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
            <div class="my-3 mx-4 row">
                <a href="_EditProfile.php">
                    <button type="button" class="btn btn-primary ml-4">EDIT</button>
                </a>

                <button type="button" class="btn btn-danger ml-2" data-toggle="modal"
                    data-target="#exampleModal">DELETE</button>

                <a href="../index.php">
                    <button type="button" class="btn btn-info ml-2">BACK</button>
                </a>

            </div>
        </div>
        <div class="col-md-8">
            <div class="h2">User Profile</div>
            <table class="table table-striped">
                <tr>
                    <th colspan="2">User Details:</th>
                </tr>
                <tr>
                    <th><i class="bi bi-envelope"></i> Email</th>
                    <td><?php echo $result['user_email']?></td>
                </tr>
                <tr>
                    <th><i class="bi bi-person-circle"></i> Name</th>
                    <td><?php echo $result['user_name']?></td>
                </tr>
                <tr>
                    <th><i class="bi bi-person-square"></i> Mobile NO.</th>
                    <td><?php echo $result['user_mobile'] ?></td>
                </tr>
                <tr>
                    <th><i class="bi bi-gender-ambiguous"></i> Gender</th>
                    <td><?php echo $result['user_gender'] ?></td>
                </tr>
            </table>
        </div>
    </div> <?php
	}
    ?>
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