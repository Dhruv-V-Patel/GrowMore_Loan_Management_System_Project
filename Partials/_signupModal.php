<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup to GrowMore Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/GrowMore_Project/Partials/_handlesignup.php" method="post" name="myfrm"
                onsubmit="return validation()" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="UserName" name="UserName" required
                            placeholder="Your Full Name">
                        <small class="form-text text-muted">Please Enter Your Full Name</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="sigupEmail" name="sigupEmail"
                            aria-describedby="emailHelp" required placeholder="abcxyz@gmail.com">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMobile1">Mobile No</label>
                        <input type="text" class="form-control" id="Mobile" name="Mobile" placeholder="9999555111" required>
                        <small id="emailHelp" class="form-text text-muted">Mobile Number should be of only 10 digit.</small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputMobile1">Gender</label>
                    <select class="form-control" aria-label="Default select example" name="Gender" id="Gender" required>
                            <option value="">--Select Gender--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password" placeholder="************" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="CPassword" name="CPassword" placeholder="************" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="Singup">Signup</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
            <script>
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
        </div>
    </div>
</div>