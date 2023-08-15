<?php
include('authentication.php');
include('includes/header.php');

// Pagination variables
$recordsPerPage = 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $recordsPerPage;

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Update search count for each office
if (!empty($search)) {
    $updateSearchCountQuery = "UPDATE offices SET search_count = search_count + 1 WHERE officename LIKE '%$search%' OR floor LIKE '%$search%'";
    mysqli_query($conn, $updateSearchCountQuery);
}
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h1>View Office Location
                        <a href="office-add.php" class="btn btn-primary float-end">ADD OFFICE LOCATION</a>
                    </h1>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search office name...." value="<?php echo htmlentities($search); ?>">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Office Name</th>
                                    <th>Floor</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Query with search functionality and pagination
                                $office = "SELECT * FROM offices WHERE status != 2 AND (officename LIKE '%$search%' OR floor LIKE '%$search%') LIMIT $recordsPerPage OFFSET $offset";
                                $office_run = mysqli_query($conn, $office);
                                if (mysqli_num_rows($office_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($office_run)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['officename']; ?></td>
                                            <td><?php echo $row['floor']; ?></td>
                                            <td>
                                                <?php
                                                if ($row['status'] == 1) {
                                                    echo 'Hidden';
                                                } else {
                                                    echo 'Visible';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <form action="office-edit.php?id=<?php echo $row['id']; ?>" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="delete_office" class="btn btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">NO Record Found</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    // Pagination links
                    $totalRecordsQuery = "SELECT COUNT(*) as total FROM offices WHERE status != 2 AND (officename LIKE '%$search%' OR floor LIKE '%$search%')";
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