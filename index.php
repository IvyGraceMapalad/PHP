<?php
include('authentication.php');
include('includes/header.php');
?>

<!-- Include the necessary libraries for the chart -->
<script src="https://www.gstatic.com/charts/loader.js"></script>

<div class="container-fluid px-4">
    <h1 class="mt-4">NEW MALAYBALAY CITY HALL ADMIN PANEL</h1>
    <ol class="breadcrumb mb-12">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    Total Offices
                    <?php
                    $dash_offices_query = "SELECT * FROM offices";
                    $dash_offices_query_run = mysqli_query($conn, $dash_offices_query);
                    if ($offices_total = mysqli_num_rows($dash_offices_query_run)) {
                        echo '<h4 class="mb-0">' . $offices_total . '</h4>';
                    } else {
                        echo '<h4 class="mb-0">No Data</h4>';
                    }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="office-view.php">View Details <i class="fas fa-caret-down"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Total Services Offered
                    <?php
                    $dash_services_query = "SELECT * FROM services";
                    $dash_services_query_run = mysqli_query($conn, $dash_services_query);
                    if ($services_total = mysqli_num_rows($dash_services_query_run)) {
                        echo '<h4 class="mb-0">' . $services_total . '</h4>';
                    } else {
                        echo '<h4 class="mb-0">No Data</h4>';
                    }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="services-view.php">View Details <i class="fas fa-caret-down"></i></a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total Users
                    <?php
                    $dash_users_query = "SELECT * FROM users";
                    $dash_users_query_run = mysqli_query($conn, $dash_users_query);
                    if ($users_total = mysqli_num_rows($dash_users_query_run)) {
                        echo '<h4 class="mb-0">' . $users_total . '</h4>';
                    } else {
                        echo '<h4 class="mb-0">No Data</h4>';
                    }
                    ?>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="view-register.php">View Details <i class="fas fa-caret-down"></i></a>
                </div>
            </div>
        </div>
    </div>

    <br>
    <h2 style="text-align= center;">BASIC REPORT</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    Services Search Count
                </div>
                <div class="card-body">
                    <?php
                    // Connect to the database
                    $conn = mysqli_connect('localhost', 'root', '', 'city');
                    // Check the connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    // Pagination variables for services
                    $services_limit = 5; // Number of records per page
                    $services_page = isset($_GET['services_page']) ? $_GET['services_page'] : 1; // Current page number
                    $services_offset = ($services_page - 1) * $services_limit; // Offset for SQL query

                    // Fetch data from services table with pagination
                    $services_query = "SELECT title, search_count FROM services ORDER BY search_count DESC LIMIT $services_limit OFFSET $services_offset";
                    $services_result = mysqli_query($conn, $services_query);
                    // Check if the query executed successfully
                    if ($services_result) {
                        // Check if there are any records
                        if (mysqli_num_rows($services_result) > 0) {
                            echo "<table class='table small-font'>";
                            echo "<thead><tr><th>Service Name</th><th>No. of visit</th></tr></thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_assoc($services_result)) {
                                echo "<tr>";
                                echo "<td>" . $row['title'] . "</td>";
                                echo "<td>" . $row['search_count'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";

                            

                            // Add download button and form for selecting date
                            echo "<br>";
                            echo "<form action='download.php' method='POST'>";
                            echo "<input type='hidden' name='type' value='services'>";
                            echo "<input type='submit' class='btn btn-primary' value='Download Services Report'>";
                            echo "</form>";
                        } else {
                            echo "No services found.";
                        }
                    } else {
                        echo "Error executing the query: " . mysqli_error($conn);
                    }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    Offices Search Count
                </div>
                <div class="card-body">
                    <?php
                    // Connect to the database
                    $conn = mysqli_connect('localhost', 'root', '', 'city');
                    // Check the connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    // Pagination variables for offices
                    $offices_limit = 6; // Number of records per page
                    $offices_page = isset($_GET['offices_page']) ? $_GET['offices_page'] : 1; // Current page number
                    $offices_offset = ($offices_page - 1) * $offices_limit; // Offset for SQL query

                    // Fetch data from offices table with pagination
                    $offices_query = "SELECT officename, search_count FROM offices ORDER BY search_count DESC LIMIT $offices_limit OFFSET $offices_offset";
                    $offices_result = mysqli_query($conn, $offices_query);
                    // Check if the query executed successfully
                    if ($offices_result) {
                        // Check if there are any records
                        if (mysqli_num_rows($offices_result) > 0) {
                            echo "<table class='table small-font'>";
                            echo "<thead><tr><th>Office Name</th><th>No. of visit</th></tr></thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_assoc($offices_result)) {
                                echo "<tr>";
                                echo "<td>" . $row['officename'] . "</td>";
                                echo "<td>" . $row['search_count'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            

                             // Add download button and form for selecting date
                             echo "<br>";
                             echo "<form action='download.php' method='POST'>";
                             echo "<input type='hidden' name='type' value='offices'>";
                             echo "<input type='submit' class='btn btn-primary' value='Download Office Report'>";
                             echo "</form>";
                         } else {
                             echo "No offices found.";
                         }
                     } else {
                         echo "Error executing the query: " . mysqli_error($conn);
                     }

                    // Close the connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>