<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a7a17df157.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile </title>
</head>

<body>
    <?php if (isset($_GET['error'])) : ?>
        <p><?php echo $_GET['error']; ?> </p>
    <?php endif ?>
    <?php
    include '_dbconnect.php';
    session_start(); ?>
    <?php 
    if (isset($_GET['EditProfileSuccess']) && $_GET['EditProfileSuccess'] == "true") {
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Success!</strong> ' . $_SESSION['status'] . '
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    unset($_SESSION['status']);
      }
      elseif (isset($_SESSION['status'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Wrong!</strong> ' . $_SESSION['status'] . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
        unset($_SESSION['status']);
      } else {
      }
    ?>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $user_email = $_SESSION['useremail'];
        $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $id = $result['u_id']; ?>


        <div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
            <div class="col-md-4 text-center" style="margin-top: 100px;">
                 <!-- <img src='../assets/uploads/<?php //$image['user_img']  ?>' class='js-image img-fluid rounded' style='width:180px; height:180px; object-fit: cover;'>';*/ --->
                 <?php echo' <img src="';if(!empty($result['user_img']))
				{
					echo $result['user_img'];
				}else{
					echo '../assets/images/no-image.jpg';
				}
				
				echo'" class="js-image img-fluid rounded"
                style="width:180px; height:180px; object-fit: cover;">
            
            <div>
                <div class="mb-3">
                <form action="_handleImage.php" method="post" enctype="multipart/form-data" name="myfrm">
                    <label for="formFile" class="form-label">Click below to Select an image</label>
                    <input onchange="display_image(this.files[0])" class="form-control" type="file" id="my-image" name="my_image">
                    <input type="submit" name="submit" value="Upload" class="btn btn-primary float-end mt-2">
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="h2">Edit Profile</div>
            <form action="_handleEditProfile.php" method="post" onsubmit="return validation()" >
            <table class="table table-striped">
                <tr>
                    <th colspan="2">User Details</Details>
                    </th>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-envelope"></i> Email</th>
                    <td>
                        <input value="' . $result['user_email'] . '" type="text" class="form-control" id="Email" name="Email" placeholder="Email" readonly>
                    </td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-circle-user"></i> Name</th>
                    <td>';
                    if ($result['user_name'] == "Administrator") {
                        echo '<input value="' . $result['user_name'] . '"  type="text" class="form-control" id="Name" name="Name" placeholder="Name" readonly>';
                    }else{
                        echo '<input value="' . $result['user_name'] . '"  type="text" class="form-control" id="Name" name="Name" placeholder="Name">';
                    }
                    echo '</td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-square-phone"></i> Mobile NO.</th>
                    <td>
                        <input value="' . $result['user_mobile'] . '"  type="text" class="form-control" id="Mobile" name="Mobile" placeholder="Mobile NO.">
                    </td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-mars-and-venus"></i> Gender</th>
                    <td>
                        <select class="form-control" aria-label="Default select example" name="Gender" id="Gender">
                            <option selected value="'.$result['user_gender'].'">' . $result['user_gender'] . '</option>';
                            if($result['user_gender'] == "Male"){
                                  echo'<option value="Female">Female</option>
                                  <option value="Other">Other</option>';
                            }elseif($result['user_gender'] == "Female"){
                                echo '<option value="Male">Male</option>
                                <option value="Other">Other</option>';
                            }
                            else{
                           echo' <option value="Male">Male</option>
                           <option value="Female">Female</option>';}
                        echo'</select>
                    </td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-lock"></i> Current Password</th>
                    <td>
                        <input type="text" class="form-control" id="Cur_Pass" name="Cur_Pass" placeholder="Current Password">
                    </td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-lock"></i> Password</th>
                    <td>
                        <input type="text" class="form-control" id="Pass" name="Pass" placeholder="Password (leave empty to keep old password)">
                    </td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-lock"></i> Confirm Password </th>
                    <td>
                        <input type="text" class="form-control"Id="CPass" name="CPass" placeholder="Confirm Password">
                    </td>
                </tr>
            </table>
            <div class="p-2">
                    <button type="submit" class="btn btn-primary float-end" name="submit">SAVE</button>
                <a href="_UserProfile.php">
                    <button type="button" class="btn btn-info">BACK</button>
                </a>
            </div>
            </form>
        </div>
    </div>
    </form>';
        } else {
            echo 'something Wrong...';
        }
            ?>
</body>

</html>
<script>
    function display_image(file) {
        var img = document.querySelector(".js-image");
        img.src = URL.createObjectURL(file);
    }

    function validation() {
        var phone = document.forms['myfrm']['Mobile'];
        var get_num = String(phone.value).charAt(0);
        var first_num = Number(get_num);

        if (isNaN(phone.value) || phone.value.length != 10 || first_num < 6) {
            alert('Invalid Phone Number');
            return false;
        }
        return true;
    }
</script>
<!-- <script Type="javascript">
    alert("Your Profile is Updated")
</script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>