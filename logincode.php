<?php
session_start();    
include('admin/config/dbcon.php'); 

if (isset($_POST['login_btn']))
 {   // check if login button is clicked
    $email = mysqli_real_escape_string($conn, $_POST['email']); // get email from form and prevent sql injection
    $password = mysqli_real_escape_string($conn, $_POST['password']);   // get password from form and prevent sql injection

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password' "; // select all data from database table where email and password match
    $query_run = mysqli_query($conn, $query); // run query

    if(mysqli_num_rows($query_run)>0)
    {
        foreach($query_run as $row)
        {
            $user_id = $row['user_id']; 
            $user_name = $row['fname'].' '.$row['lname'];
            $user_email = $row['email'];
            $role_as = $row['role_as'];
        }

        $_SESSION['auth'] = true;   // if email and password match
        $_SESSION['auth_role'] = "$role_as"; //1=admin, 0=normal user, 2=superaadmin
        $_SESSION['auth_user'] =[
            'user_id'=> $user_id,
            'user_name'=> $user_name,
            'user_email'=> $user_email,
        ];

        if($_SESSION['auth_role']==1) //admin = 1
        {
            $_SESSION['status'] = 'Welcome to Dashboard'; // if email and password match
            header("Location: admin/index.php"); // redirect to admin index.php
            exit(0);
        }
        if($_SESSION['auth_role']==2)
        { 
            $_SESSION['status'] = 'Welcome Dashboard'; // if email and password match 2=Superadmin
            header('Location: admin/index.php'); // redirect to admin index.php
            exit(0);
        }
        elseif($_SESSION['auth_role']==0)
        {
            $_SESSION['status'] ="You are logged In!"; // if email and password match
            header('Location: _index.php'); // redirect to _index.php
            exit(0);
        }
    }
    else{
        $_SESSION['status'] = 'Email or Password is Invalid'; // if email and password does not match
        header('Location: index.php'); // redirect to index.php
        exit(0);
    }



} else {
    $_SESSION['status'] = 'You are not allowed to access this file'; // if login button is not clicked
    header('Location: index.php'); // redirect to index.php
    exit(0);
}
?>