<?php
session_start();

if(isset($_SESSION['auth']))
{
    $_SESSION['status'] = "You are already logged in.";
    header('Location: index.php');
    exit(0);
}

include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <?php include('message.php');
                ?>

                <img src="images/img.png" alt="" style="width: 250px; height: 250px; display: block; margin-left: auto; margin-right: auto; padding: 25px">
                <div class="card">
                    <div class="card-header">
                        <h4 style="text-align:center;">REGISTER</h4>
                    </div>
                    <div class="card-body">

                        <form action="registercode.php" method="POST">
                            <div class="form-group mb-3">
                                <label>First Name</label>
                                <input required type="text" name="fname" placeholder="Enter your First Name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Last Name</label>
                                <input required  type="text" name="lname" placeholder="Enter your Last Name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input required  type="email" name="email" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input required  type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Confirm Password</label>
                                <input required  type="password" name="cpassword" placeholder="Enter Confirm Password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="register_btn" class="btn btn-primary">REGISTER ACCOUNT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include ('includes/footer.php');
?>