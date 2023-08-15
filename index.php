<?php
session_start();

if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['status']))
    {
        $_SESSION['status'] = "You are already logged in.";
    }
    
    header('Location: index.php');
    exit(0);
}

include ('includes/header.php');
include ('includes/navbar.php');
?>

<h1 style="text-align: center; font-size: 32px;">Interactive Self-service Kiosk for Indoor Navigation using Navmesh for the New Malaybalay City Hall</h1>

<div class="py-5">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-5">

            <?php include('message.php'); ?>

            <img src="images/img.png" alt="" style="width: 250px; height: 250px; display: block; margin-left: auto; margin-right: auto; padding: 25px">
                <div class="card">
                    <div class="card-header">
                    
                        <h4 style="text-align:center;">LOGIN</h4>
                    </div>
                    <div class="card-body">

                        <form action="logincode.php" method="POST">

                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Enter Email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter Password" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="login_btn" class="btn btn-primary">LOGIN ACCOUNT</button>
                                </div>
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
            <footer style="text-align: center; margin-top: 119px; background-color: #007bff; padding: 10px;">
                    <div>
                            <img src="images/logo.jpg" alt="Logo" style="width: 90px; height: 90px; border-radius: 100%; margin-top: 6px; float: left;">        
                    </div>
                <p style="color: white;">Bukidnon State University - College Of Technologies</p>
                <p style="font-size: 16px; color: white; text-align: left-right;">Mylene Depigan and Ivy Grace Mapalad <br>Loren Pacuribot and Mary Cel Pagpaguitan</p>
            </footer>

            <?php
            include ('includes/footer.php');
            ?>