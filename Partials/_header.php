<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    function hideid() {
      document.getElementById("username").style.visibility = "hidden";
    }
    setTimeout("hideid()", 10000);
  </script>
  <style>
    .float {
      padding-top: 0px;
      padding-bottom: 0px;
      height: 50px;
    }

    .profile {
      display: flex;
      align-items: center;
      padding-left: 15px;
      padding-top: 0px;
      padding-bottom: 0px;
    }

    .profile h4 {
      font-family: 'Franklin Gothic Medium', Poppins, 'Arial Narrow', Arial, sans-serif;
      font-size: 25px;
      margin-left: 10px;
      margin-top: 10px;
    }

    .dropdown-menu i {
      font-size: 20px;
      margin-right: 10px;
    }

    .container .dropdown-menu a {
      font-size: 20px;
      font-family: 'Times New Roman', Times, serif;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  /* ---------------------------------------- Header Area start Here ---------------------------------------- */
  echo '<nav class="navbar navbar-expand-lg navbar-light bg-warning py-1">
<a class="navbar-brand" href="#">GrowMore</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Partials\_AboutUS.php">About US</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Loan Details
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="Partials/_LoanTypes.php">Loan Type</a>
        <a class="dropdown-item" href="Partials/_LoanPlan.php">Interest Rate and Charges</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="Partials/_EMIcalculator.php"><i class="fa-solid fa-calculator"></i> EMI Calculator</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Partials\_contactus.php" tabindex="-1" >Contact us</a>
    </li>
  </ul>
  <div class="row mx-2">';
  /*--------------------------------- check wheter user logged in  ---------------------------------*/
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user_email = $_SESSION['useremail'];
    $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);
    echo '<form class="form-inline my-1 my-lg-0">
    </form>
           <div id="username" style="visibility:visible">
            <p class="ml-2 mt-3">Welcome ' . $result['user_name'] . '</p></div>
                <div class="dropdown mr-2" style="width: 40px;">
                  <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="assets\images\no-image.jpg" style="width:35px;height:35px; border-radius:50%; cursor:pointer;" >
                  </a>
                  <div class="container">
                  <div class="dropdown-menu dropdown-menu-right" style="width: 300px;" aria-labelledby="dropdownMenuLink">
                    <div class="float mt-0">
                      <div class="profile">
                        <img src="assets\images\no-image.jpg" style="width:40px;height:40px; border-radius:50%; cursor:pointer;" >
                        <h4>' . $result['user_name'] . '</h4>
                      </div>
                    </div>
                    <hr style="width:100%; height:3px; border-width:0; color:gray; background-color:gray">
                    <a class="dropdown-item" href="Partials/_UserProfile.php"><i class="fa-solid fa-circle-user"></i>Profile</a>';
                      if ($result['user_name'] == "Administrator") {
                        echo ' <a class="dropdown-item" href="Partials/_Documents1.php"><i class="fa-solid fa-address-card"></i> Documents </a>
                                                <a class="dropdown-item" href="Partials/_Loans1.php"><i class="fa-solid fa-file-pen"></i> Loan Application</a>';
                      } else {
                        echo ' <a class="dropdown-item" href="Partials/_Documents.php"><i class="fa-solid fa-address-card"></i> Documents </a>
                                                <a class="dropdown-item" href="Partials/_Loans.php"><i class="fa-solid fa-file-pen"></i> Loan Application</a>';
                      }
                      echo '<a class="dropdown-item" href="Partials/_PayDetail.php"><i class="fa-solid fa-money-bill-wave"></i> Payment</a>';
                      if ($result['user_name'] == "Administrator") {
                        echo '<a class="dropdown-item" href="Partials/_UserData.php"><i class="fa-solid fa-user-group"></i> Users</a>';
                      }
                      echo '<div class="dropdown-divider"></div>
                    <a role="button" href="Partials/_logout.php" class="btn btn-outline-primary mx-3"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                  </div>
                </div>
            </div>';
  } else {
    echo '<form class="form-inline my-2 my-lg-0">
    </form>
    
    <button class="btn btn-outline-primary ml-2" data-toggle="modal" data-target="#loginModal"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</button>
    <button class="btn btn-outline-primary mx-2" data-toggle="modal" data-target="#signupModal"><i class="fa-solid fa-user-plus"></i> Sign Up</button>';
  }
  echo '</div>
</div>
</nav> ';
  /* ---------------------------------------- Header Area End Here ---------------------------------------- */

  include 'Partials/_loginModal.php';
  include 'Partials/_signupModal.php';

  /*--------------------------------------- Signup Message Area Start Here ---------------------------------------*/
  if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You Can Now Login
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  } elseif (isset($_SESSION['status'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Wrong!</strong> ' . $_SESSION['status'] . '
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
    unset($_SESSION['status']);
  } else {
  }
  /*--------------------------------------- Signup Message Area End Here ---------------------------------------*/

  /*--------------------------------------- Login Message Area Start Here ---------------------------------------*/

  if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Login successfully.. 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  } elseif (isset($_SESSION['status'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Wrong!</strong> ' . $_SESSION['status'] . '
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
    unset($_SESSION['status']);
  } else {
  }
  /*--------------------------------------- Login Message Area End Here ---------------------------------------*/

  /*--------------------------------------- Edit Message Area End Here ---------------------------------------*/

  ?>

</body>

</html>