<?php
// Check if the form is submitted
if (isset($_POST['type'])) {
    // Get the type of report to be downloaded
    $type = $_POST['type'];

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'city');
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data from the respective table based on the type of report
    if ($type == 'services') {
        $query = "SELECT title, search_count FROM services";
        $filename = "services_report.csv";
    } elseif ($type == 'offices') {
        $query = "SELECT officename, search_count FROM offices";
        $filename = "offices_report.csv";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);
    // Check if the query executed successfully
    if ($result) {
        // Create a file pointer
        $file = fopen($filename, "w");

        // Write the column headers to the file
        if ($type == 'services') {
            fputcsv($file, array('Service Name', 'Search Count'));
        } elseif ($type == 'offices') {
            fputcsv($file, array('Office Name', 'Search Count'));
        }

        // Write the data rows to the file
        while ($row = mysqli_fetch_assoc($result)) {
            fputcsv($file, $row);
        }

        // Close the file pointer
        fclose($file);

        // Set the appropriate headers for file download
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Pragma: no-cache');
        readfile($filename);

        // Delete the temporary file
        unlink($filename);
    } else {
        echo "Error executing the query: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
?>