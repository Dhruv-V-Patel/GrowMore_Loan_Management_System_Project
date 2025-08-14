<!doctype html>
<html lang="en">

<head>
     <link rel="stylesheet" href="./assets/css/MainStyle.css" type="text/css" />
    <!-- Icon script-->
    <script src="https://kit.fontawesome.com/a7a17df157.js" crossorigin="anonymous"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- icon and title in title bar-->
    <title>GrowMore - Capital Funding & Management</title>
    <link rel="icon" type="image" href="assets\images\GM Logo1.jpg" />
    <style>
        @media screen and (max-width: 900px){
            .icon{
                flex-direction: column;
            }
            .icon ul{
                flex-direction: column;
            }
            .icon ul li a{
                flex-direction: column;
            }
            .man-image img{
                width: 300px;
            }
        }
        @media screen and (max-width: 1024px){
            .man-image img{
                width: 300px;
            }
        }
    </style>
</head>

<body>
    <?php include 'Partials/_dbconnect.php'; ?>
    <?php include 'Partials/_header.php'; ?>

    <!--scroll up code Start here -->
    <div id="progress">
        <span id="progress-value">&#x1F815;</span>
    </div>
    <!--scroll up code end here -->

    <marquee direction="left" class="bg-primary pt-0"
        style="font-family:'Franklin Gothic Medium', Poppins,'Arial Narrow', Arial, sans-serif; color:white"
        scrollamount="5" behavior="alternate" scrolldelay="100">Welcome To GrowMore - Capital Funding & Management
    </marquee>

    <!--side area Start here -->

    <?php  
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $user_email = $_SESSION['useremail'];
        $sql = "SELECT * FROM `user_list` WHERE user_email = '$user_email'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query); 

            if($result['user_name'] == "Administrator"){
            echo ' <div class="side pb-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
               
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets\images/adminpanel.jpg" style="width:2400px; height:350px;"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item ">
                        <img src="assets\images/GrowMore.jpg" style="width:1500px; height:350px;" class="d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets\images/Vehicle_loan GrowMore.jpg" style="width:2400px; height:350px;"
                            class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>';
            }
            else{
                echo '<div class="side pb-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                   
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets\images/GrowMore.jpg" style="width:1500px; height:350px;" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets\images/Home_Loan GrowMore.jpg" style="width:2400px; height:350px;"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets\images/Vehicle_loan GrowMore.jpg" style="width:2400px; height:350px;"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>';
            }
        }
        else{
            echo'
            <div class="side pb-3">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                   
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets\images/GrowMore.jpg" style="width:1500px; height:350px;" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets\images/Home_Loan GrowMore.jpg" style="width:2400px; height:350px;"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="assets\images/Vehicle_loan GrowMore.jpg" style="width:2400px; height:350px;"
                                class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            ';
        }    
    ?>


    <!--side area end here -->

    <hr style="width:100%; height:2px; border-width:0; color:gray; background-color:gray">

    <!--feature area start here -->

    <div class="features bg-primary py-5">
        <h2 class="text-center "
            style="font-family:'Franklin Gothic Medium', Poppins,'Arial Narrow', Arial, sans-serif; color:white;">
            Feature
        </h2>
        <div class="icon text-center pt-5">
            <ul>
                <li>
                    <a href="#"><span><i class="fa-solid fa-user-shield"></i></span></a>
                    <div class="tooltrip text-center">Proper <br> Security</div>
                </li>
                <li>
                    <a href="#"><span><i class="fa-solid fa-gauge-high"></i></span></a>
                    <div class="tooltrip text-center">High<br>Performance </div>
                </li>
                <li>
                    <a href="#"><span><i class="fa-solid fa-rotate"></i></span></a>
                    <div class="tooltrip text-center">Business <Br> Sustainability </div>
                </li>
                <li>
                    <a href="#"><span><i class="fa-solid fa-circle-question"></i></span></a>
                    <div class="tooltrip text-center">Legendary <br> Support </div>
                </li>
                <li>
                    <a href="#"><span><i class="fa-solid fa-2"></i><i class="fa-solid fa-4"></i><br><i
                                class="fa-solid fa-xmark"></i>&nbsp;<i class="fa-solid fa-7"></i></span></a>
                    <div class="tooltrip text-center">24×7 <br> service available</div>
                </li>
            </ul>
        </div>
    </div>
    <!--feature area end here -->

    <hr style="width:100%; height:3px; border-width:0; color:gray; background-color:gray">

    <!--why choose us area start here -->

    <div class="section whychoose-area pt-5  bg-primary text-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="section-title">
                        <h2 class="text-warning"
                            style="font-family:'Franklin Gothic Medium', Poppins,'Arial Narrow', Arial, sans-serif;">Why
                            Choose <span style="color:black;">Us</span></h2>
                        <p class="text-light">Easy | Fast | Quick</p>
                    </div>
                </div>
            </div>
            <div class="row row-normalize mt-3">
                <div class="col-md-6 col-sm-12">
                    <div class="man-image mt-2 pt-2">
                        <img src="assets/images/woman.png" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="whychoose-list mt-5 pt-5">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <div class="media">
                                    <div class="icon1" style="color:black;">
                                        <i class="fa-solid fa-certificate pt-2"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h4 style="font-family:'Franklin Gothic Medium', Poppins,'Arial Narrow', Arial, sans-serif; color:black;"
                                            class="media-heading">Good Performance</h4>
                                        <p style="font-family:'Montserrat', sans-serif">Becuase we have good performance
                                            and wonderful customer support.Our Employees taking Care of you things</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="icon1" style="color:black;">
                                        <i class="fa-solid fa-chart-line pt-2"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h4 style="font-family:'Franklin Gothic Medium', Poppins,'Arial Narrow', Arial, sans-serif;color:black;"
                                            class="media-heading">Easy Documentation</h4>
                                        <p style="font-family:'Montserrat', sans-serif">We gives you easy process for
                                            request a loan and higher support</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="icon1" style="color:black;">
                                        <i class="fa-regular fa-circle-question pt-2"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                        <h4 style="font-family:'Franklin Gothic Medium', Poppins,'Arial Narrow', Arial, sans-serif; color:black;"
                                            class="media-heading">Creative Technology Support</h4>
                                        <p style="font-family:'Montserrat', sans-serif">Technical Support from us.Users
                                            can easily request for loans online and verify their documents on our site
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--why choose us area end here -->


    <?php include 'Partials/_footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="assets/JS/script.js"></script>
</body>

</html>