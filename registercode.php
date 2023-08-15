<?php
session_start();
include('admin\config\dbcon.php');

if(isset($_POST['register_btn']))
{
    $fname= mysqli_real_escape_string($conn,$_POST['fname']);
    $lname= mysqli_real_escape_string($conn,$_POST['lname']);
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password= mysqli_real_escape_string($conn,$_POST['password']);
    $confirmpassword= mysqli_real_escape_string($conn,$_POST['cpassword']);

    if($password == $confirmpassword)
    {
        //check email
        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($conn,$checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            $_SESSION['status'] = "Email Already Exists. Please Try Another one";
            header('Location: register.php');
            exit(0);
        }
        else
        {
            $query = "INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
            $query_run = mysqli_query($conn,$query);

            if($query_run)
            {
                $_SESSION['status'] = "Registeration Successfully";
                header('Location: login.php');
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Something Went Wrong. Please Try Again";
                header('Location: register.php');
                exit(0);
            }
        }

    }
    else{
        $_SESSION['status'] = "Password and Confirm Password does not match";
        header('Location: register.php');
        exit(0);
    }

}
else
{
    header('Location: register.php');
    exit(0);
}

?>