<?php
include ('authentication.php');
include ('includes/header.php');
?>

            <div class="container-fluid px-4">
            <div class="row mt-4">
                <div class="col-md-12">

                    <?php include('message.php'); ?>

                    <div class="card">
                        <div class="card-header">
                            <h1>Edit Office Location
                                <a href="office-view.php" class="btn btn-danger float-end">BACK</a>
                            </h1>
                        </div>
                        <div class="card-body">

                            <?php
                                if(isset($_GET['id']))
                                {
                                    $id = $_GET['id'];
                                    $office_edit = "SELECT * FROM offices WHERE id ='$id' LIMIT 1";

                                    $office_edit_run = mysqli_query($conn, $office_edit);

                                    if(mysqli_num_rows($office_edit_run) > 0)
                                    {
                                        foreach($office_edit_run as $row)
                                        {
                                            ?>

                                            <form action="code.php" method="POST">
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Office Name</label>
                                                        <input type="text" name="officename" value="<?php echo $row['officename']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Floor</label>
                                                        <select name="floor" required class="form-control">
                                                            <option value="">--SELECT FLOOR--</option>
                                                            <option value="0" <?php if($row['floor'] == 0){ echo "selected"; } ?>>First Floor</option>
                                                            <option value="1" <?php if($row['floor'] == 1){ echo "selected"; } ?>>Second Floor</option>
                                                            <option value="2" <?php if($row['floor'] == 2){ echo "selected"; } ?>>Third Floor</option>
                                                            <option value="3" <?php if($row['floor'] == 3){ echo "selected"; } ?>>NOT FOUND inside the new city hall building</option>
                                                        </select>
                                                    </div>
                                                                                            
                                                    
                                                    <div class="col-md-12 mb-3">
                                                        <button type="submit" name="update_office" class="btn btn-primary">Update Office Location</button>
                                                </div>
                                                </div>
                                            </form>
                                            <?php
                                        }

                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include ('includes/footer.php');
include ('includes/scripts.php');
?>