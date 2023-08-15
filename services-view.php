<?php
include('authentication.php');
include('includes/header.php');

// Pagination variables
$recordsPerPage = 9; // Number of records to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $recordsPerPage; // Offset for the SQL query

// Search variable
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Update search count for each service
if (!empty($search)) {
    $updateSearchCountQuery = "UPDATE services SET search_count = search_count + 1 WHERE title LIKE '%$search%'";
    mysqli_query($conn, $updateSearchCountQuery);
}

?>


        <div class="container-fluid px-4">
            <div class="row mt-4">
                <div class="col-md-12">
                    <?php include('message.php'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h1>View Services Offered
                                <a href="services-add.php" class="btn btn-primary float-end">ADD SERVICES</a>
                            </h1>
                        </div>
                        <div class="card-body">
                            <!-- Search Box -->
                            <form method="GET" action="">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search service....." name="search" value="<?php echo htmlentities($search); ?>">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-stripe">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Service Name</th>
                                            <th>Office Location</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Query to retrieve services with pagination and search
                                        $servicesQuery = "SELECT services.id, services.title, offices.officename, services.status FROM services INNER JOIN offices ON services.office_id = offices.id WHERE services.status!='2'";
                                        // Add search condition to the query if search is not empty
                                        if (!empty($search)) {
                                            $servicesQuery .= " AND (services.title LIKE '%$search%' OR offices.officename LIKE '%$search%')";
                                        }
                                        // Add pagination limits to the query
                                        $servicesQuery .= " LIMIT $recordsPerPage OFFSET $offset";
                                        $services_run = mysqli_query($conn, $servicesQuery);
                                        if (mysqli_num_rows($services_run) > 0) {
                                            foreach ($services_run as $row) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['officename']; ?></td>
                                                    <td><?php echo $row['status'] == 1 ? 'Hidden' : 'Visible'; ?></td>
                                                    <td>
                                                        <a href="services-edit.php?id=<?= $row['id'] ?>" class="btn btn-success">EDIT</a>
                                                    </td>
                                                    <td>
                                                        <form action="code.php" method="POST">
                                                            <button type="submit" name="services_delete_btn" value="<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                        ?>
                                            <tr>
                                                <td colspan="6">No Record Found</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            // Pagination links
                            $totalRecordsQuery = "SELECT COUNT(*) as total FROM services INNER JOIN offices ON services.office_id = offices.id WHERE services.status!='2'";
                            if (!empty($search)) {
                                $totalRecordsQuery .= " AND (services.title LIKE '%$search%' OR offices.officename LIKE '%$search%')";
                            }
                            $totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
                            $totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
                            $totalRecords = $totalRecordsRow['total'];
                            $totalPages = ceil($totalRecords / $recordsPerPage);
                            if ($totalPages > 1) {
                                echo '<nav aria-label="Page navigation">';
                                echo '<ul class="pagination">';
                                if ($page > 1) {
                                    echo '<li class="page-item"><a class="page-link" onclick="changePage(' . ($page - 1) . ')">Previous</a></li>';
                                }
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '"><a class="page-link" onclick="changePage(' . $i . ')">' . $i . '</a></li>';
                                }
                                if ($page < $totalPages) {
                                    echo '<li class="page-item"><a class="page-link" onclick="changePage(' . ($page + 1) . ')">Next</a></li>';
                                }
                                echo '</ul>';
                                echo '</nav>';
                            }
                            ?>
                            <script>
                                function changePage(page) {
                                    // Get the current search query
                                    var search = '<?php echo htmlentities($search); ?>';
                                    // Construct the new URL with the updated page and search query
                                    var newURL = window.location.pathname + '?page=' + page + '&search=' + search;
                                    // Navigate to the new URL
                                    window.location.href = newURL;
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('includes/footer.php');
        include('includes/scripts.php');
        ?>
