<?php
include ('authentication.php'); 

if(isset($_POST['services_delete_btn']))
{
    $id = $_POST['services_delete_btn'];

    $query = "UPDATE services SET status='2' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Services Deleted";
        header('Location: services-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong";
        header('Location: services-view.php');
        exit(0);
    }
}


if(isset($_POST['update_services']))
{
    $id = $_POST['id'];
    $office_id = $_POST['office_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $office_division = $_POST['office_division'];
    $classification = $_POST['classification'];
    $transaction = $_POST['transaction'];
    $who_may_avail = $_POST['who_may_avail'];
    $processing_time = $_POST['processing_time'];
    $total_fees = $_POST['total_fees'];
    $period_of_extension = $_POST['period_of_extension'];
    $documentary_requirements = $_POST['documentary_requirements'];
    $where_to_secure = $_POST['where_to_secure'];
    $clients_action = $_POST['clients_action'];
    $agency_action = $_POST['agency_action'];
    $fees_to_be_paid = $_POST['fees_to_be_paid'];
    $time = $_POST['time'];
    $person_in_charge = $_POST['person_in_charge'];
    $contact_number = $_POST['contact_number'];
    $status = $_POST['status']==true ? '1' : '0';

    $query = "UPDATE services SET office_id='$office_id', title='$title', description='$description', office_division='$office_division', classification='$classification', transaction='$transaction', who_may_avail='$who_may_avail', processing_time='$processing_time', total_fees='$total_fees', period_of_extension='$period_of_extension', documentary_requirements='$documentary_requirements', where_to_secure='$where_to_secure', clients_action='$clients_action', agency_action='$agency_action', fees_to_be_paid='$fees_to_be_paid', time='$time', person_in_charge='$person_in_charge', contact_number='$contact_number', status='$status' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Services Updated";
        header('Location: services-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong";
        header('Location: services-edit.php');
        exit(0);
    }
}


if(isset($_POST['add_services']))
{
    $office_id = $_POST['office_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $office_division = $_POST['office_division'];
    $classification = $_POST['classification'];
    $transaction = $_POST['transaction'];
    $who_may_avail = $_POST['who_may_avail'];
    $processing_time = $_POST['processing_time'];
    $total_fees = $_POST['total_fees'];
    $period_of_extension = $_POST['period_of_extension'];
    $documentary_requirements = $_POST['documentary_requirements'];
    $where_to_secure = $_POST['where_to_secure'];
    $clients_action = $_POST['clients_action'];
    $agency_action = $_POST['agency_action'];
    $fees_to_be_paid = $_POST['fees_to_be_paid'];
    $time = $_POST['time'];
    $person_in_charge = $_POST['person_in_charge'];
    $contact_number = $_POST['contact_number'];
    $status = $_POST['status']==true ? '1' : '0';

    $query = "INSERT INTO services (office_id, title, description, office_division, classification, transaction, who_may_avail, processing_time, total_fees, period_of_extension, documentary_requirements, where_to_secure, clients_action, agency_action, fees_to_be_paid, time, person_in_charge, contact_number, status) VALUES ('$office_id', '$title', '$description', '$office_division', '$classification', '$transaction', '$who_may_avail', '$processing_time', '$total_fees', '$period_of_extension', '$documentary_requirements', '$where_to_secure', '$clients_action', '$agency_action', '$fees_to_be_paid', '$time', '$person_in_charge', '$contact_number', '$status')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Services Added Successfully";
        header('Location: services-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong!";
        header('Location: services-add.php');
        exit(0);
    }
}



//Office Location CRUD SECTION
if(isset($_POST['delete_office']))
{
    $id = $_POST['delete_id'];
    //2 = delete office location
    $query ="UPDATE offices SET status = '2' WHERE id = '$id' LIMIT 1";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Office Location Deleted Successfully";
        header('Location: office-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong!";
        header('Location: office-view.php');
        exit(0);
    }
}
 

if(isset($_POST['update_office'])){

    $id = $_POST['edit_id'];
    $officename = $_POST['officename'];
    $floor = $_POST['floor'];
    $navbar_status = $_POST['navbar_status']==true ? '1' : '0';
    $status = $_POST['status']==true ? '1' : '0';

    $query = "UPDATE offices SET officename='$officename', floor='$floor', navbar_status='$navbar_status', status='$status' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Office Location Updated Successfully";
        header('Location: office-view.php?='.$id);
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong!";
        header('Location: office-edit.php');
        exit(0);
    }
}


if(isset($_POST['add_office']))
{
    $officename = $_POST['officename'];
    $floor = $_POST['floor'];
    $navbar_status = $_POST['navbar_status']==true ? '1' : '0';
    $status = $_POST['status']==true ? '1' : '0';

    $query = "INSERT INTO offices (officename, floor, navbar_status, status) VALUES ('$officename', '$floor', '$navbar_status', '$status')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Office Location Added Successfully";
        header('Location: office-view.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong!";
        header('Location: office-add.php');
        exit(0);
    }

}


//User registration CRUD SECTION

if(isset($_POST['user_delete']))
{
    $id = $_POST['user_id'];

    $query = "DELETE FROM users WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Admin/User Deleted Successfully";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong!";
        header('Location: view-register.php');
        exit(0);
    }

} 


if(isset($_POST['add_user']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role_as = $_POST['role_as'];
    $status = $_POST['status']==true ? '1' : '0';

    $query = "INSERT INTO users (fname, lname, email, password, role_as, status) VALUES ('$fname', '$lname', '$email', '$password', '$role_as', '$status')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Admin/User Added Successfully";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Something Went Wrong!";
        header('Location: view-register.php');
        exit(0);
    }

}



if(isset($_POST['update_user']))
{
    $id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status']==true ? '1' : '0';

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Updated Successfully";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "User Not Updated";
        header('Location: register.php');
    } 
}


?>