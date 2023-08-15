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
                            <h1>Add Office Location
                                <a href="office-view.php" class="btn btn-danger float-end">BACK</a>
                            </h1>
                        </div>
                        <div class="card-body">

                        <form action="code.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Office Name</label>
                                            <input type="text" placeholder="office name" name="officename" required class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Floor</label>
                                            <select name="floor" required class="form-control">
                                                <option value="">--SELECT FLOOR--</option>
                                                <option value="0" ?> First Floor</option>
                                                <option value="1" ?> Second Floor</option>
                                                <option value="2" ?> Third Floor</option>
                                                <option value="3" ?> NOT FOUND inside the new city hall building</option>
                                            </select>
                                        </div>
                                
<!-- 
                                         <div class ="col-md-6 mb-3">
                                            <label for="">x coordinate</label>
                                            <input type="text" name="x_coordinate" required class="form-control">
                                        </div> 

                                        <div class ="col-md-6 mb-3">
                                            <label for="">y coordinate</label>
                                            <input type="text" name="y_coordinate" required class="form-control">
                                        </div>

                                        <div class ="col-md-6 mb-3">
                                            <label for="">z coordinate</label>
                                            <input type="text" name="z_coordinate" required class="form-control">
                                            <br>
                                            </br> -->


                                        <!-- <div class="col-md-6 mb-3">
                                            <label for=""></label>
                                            <input type="checkbox" name="navbar_status" width="70px" height="70px">
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" width="70px" height="70px">
                                        </div> - -->

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="add_office" class="btn btn-primary">Add Office Location</button>
                                    </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include ('includes/footer.php');
include ('includes/scripts.php');
?>