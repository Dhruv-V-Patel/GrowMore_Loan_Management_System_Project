<?php 
include '_dbconnect.php';
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true){
    $user_email=$_SESSION['useremail'];
     $sql="SELECT * FROM `user_list`";
     $query = mysqli_query($conn, $sql);
     $result = mysqli_num_rows($query);
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

    <title>User Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-icons.css">
</head>

<body>

    <!------------------------------------- ---------- User View Modal Start here --------------------------------------------->

        <div class="modal fade" id="ViewUserModal" tabindex="-1" aria-labelledby="ViewUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ViewUserModalLabel">User Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="user_editing_data">


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    <!------------------------------------------------ User View Modal End here ----------------------------------------------->

    <!------------------------------------------------ User Edit Modal Start here --------------------------------------------->

     <div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="EditUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditUserModalLabel">User Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="_UserCode.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for=""><i class="bi bi-person-circle"></i> Name</label>
                        <input type="text" name="Name" id="Name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for=""><i class="bi bi-envelope"></i> Email</label>
                        <input type="text" name="Email" id="Email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for=""><i class="bi bi-person-square"></i> Mobile NO.</label>
                        <input type="text" name="Mobile" id="Mobile" class="form-control" placeholder="Mobile No.">
                    </div>
                    <div class="form-group">
                        <label for=""><i class="bi bi-gender-ambiguous"></i> Gender</label>
                        <select class="form-select ml-3" aria-label="Default select example" name="Gender" id="Gender"
                            required>
                            <option value="">--Select Gender--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
     </div>

    <!------------------------------------------------ User Edit Modal End here ----------------------------------------------->

    <!------------------------------------- ---------- User Delete Modal Start here --------------------------------------------->

        <div class="modal fade" id="DeleteUserModal" tabindex="-1" aria-labelledby="DeleteUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="DeleteUserModalLabel">User Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="_UserCode.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="user_id" id="delete_id">
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

    <!------------------------------------------------ User Delete Modal End here ----------------------------------------------->


    <!------------------------------------------------ Main Body Start here ----------------------------------------------->

        <div class="container">
            <div class="row border rounded mx-auto mt-5 p-2 shadow-lg">
                <div class="col-md-12">
                    <div class="card">
                        <?php 
                    if(isset($_SESSION['status']) && $_SESSION['status'] != '')
                    {  ?>
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
                            <h1>Users Records</h1>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped text-center">
                                <tr>
                                    <th><i class="bi bi-person-vcard-fill"></i>ID</th>
                                    <th><i class="bi bi-file-image"></i>Image</th>
                                    <th><i class="bi bi-person-circle"></i> Name</th>
                                    <th><i class="bi bi-envelope"></i> Email</th>
                                    <th><i class="bi bi-person-square"></i> Mobile NO.</th>
                                    <th><i class="bi bi-gender-ambiguous"></i> Gender</th>
                                    <th><i class="bi bi-list-task"></i> Action</th>
                                </tr>
                                <?php 
                            for($i=1; $i<=$result;$i++){
                                $row=mysqli_fetch_array($query);
                            ?>
                                <tr>
                                    <td class="user_id">
                                        <?php echo $row['u_id'] ?>
                                    </td>
                                    <td>
                                        <?php echo '<img src="'.$row['user_img'].'"style="width:100px; height:100px; object-fit: cover;"'; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_email'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_mobile'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['user_gender'] ?>
                                    </td>
                                    <td>
                                        <a href="#" class="badge badge-primary view_btn p-2">VIEW</a>
                                        <a href="#" class="badge badge-info edit_btn p-2">EDIT</a>
                                        <a href="#" class="badge badge-danger delete_btn p-2">DELETE</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        <a href="../Index.php" class="badge badge-secondary p-2">BACK</a>
                        </div>
                    </div>
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

        <script>

    /*-------------------------------------- User View Data JQuery Code Start Here ----------------------------------------------*/

        $(document).ready(function() {

            $('.view_btn').click(function(e) {
                e.preventDefault();

                var user_id = $(this).closest('tr').find('.user_id').text();
                //console.log(user_id);

                $.ajax({
                    type: "POST",
                    url: "_UserCode.php",
                    data: {
                        'checking_view_btn': true,
                        'User_id': user_id,
                    },
                    success: function(response) {
                        //console.log(response);
                        $('.user_editing_data').html(response);
                        $('#ViewUserModal').modal('show');
                    }
                });

            });

        });

    /*-------------------------------------- User View Data JQuery Code End Here ------------------------------------------------*/

    /*-------------------------------------- User Edit Data JQuery Code Start Here -----------------------------------------------*/

        $(document).ready(function() {

            $('.edit_btn').click(function(e) {
                e.preventDefault();

                var user_id = $(this).closest('tr').find('.user_id').text();
                //console.log(user_id);

                $.ajax({
                    type: "POST",
                    url: "_UserCode.php",
                    data: {
                        'checking_edit_btn': true,
                        'User_id': user_id,
                    },
                    success: function(response) {
                        //console.log(response);
                        $.each(response, function(key, value) {
                            //console.log(value['user_name']);  
                            $('#id').val(value['u_id']);
                            $('#Name').val(value['user_name']);
                            $('#Email').val(value['user_email']);
                            $('#Mobile').val(value['user_mobile']);
                            $('#Gender').val(value['user_gender']);

                        });
                        $('#EditUserModal').modal('show');
                    }
                });

            });

        });

    /*-------------------------------------- User Edit Data JQuery Code End Here  ------------------------------------------------*/
    
    /*-------------------------------------- User Delete Data JQuery Code Start Here ---------------------------------------------*/
            $(document).ready(function () {

                $('.delete_btn').click(function (e) { 
                    e.preventDefault();
                    var user_id = $(this).closest('tr').find('.user_id').text();
                   console.log(user_id);

                    $('#delete_id').val(user_id);
                    $('#DeleteUserModal').modal('show');

                });
                
            });

    /*-------------------------------------- User Delete Data JQuery Code End Here -----------------------------------------------*/
    
    </script>
</body>

</html>
<?php
}
?>