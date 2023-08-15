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
                            <h1>Add Services Offered
                                <a href="services-view.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">

                        <form action="code.php" method="POST">

                                    <div class="row">

                                        <div class="col-md-12 mb-3">


                                            <label for="">Office List</label>
                                            <?php
                                                $office = "SELECT * FROM offices WHERE status = 0";
                                                $office_run = mysqli_query($conn, $office);

                                                if(mysqli_num_rows($office_run) > 0)
                                                {
                                                    ?>
                                                        <select name="office_id" required class="form-control">
                                                            <option value="">--Select Office Location--</option>
                                                            <?php
                                                                foreach($office_run as $row_office)
                                                                {
                                                                    ?>
                                                                        <option value="<?php echo $row_office['id']; ?>"><?php echo $row_office['officename']; ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo "No Data Found";
                                                }
                                            ?>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="">Service Name</label>
                                            <input type="text" placeholder="service name" name="title" required class="form-control">
                                        </div>   
                                        <div class="col-md-16 mb-3">
                                            <label for="">Service Description</label>
                                            <textarea name="description" placeholder="service description" required class="form-control" rows="4"></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Office Division</label>
                                            <input type="text" placeholder="office division" name="office_division" required class="form-control">
                                        </div>  

                                        <div class="col-md-4 mb-3">
                                            <label for="">Classification</label>
                                            <select name="classification" required class="form-control">
                                                <option value="">--Select Classification--</option>
                                                <option value="Option 1">Complex</option>
                                                <option value="Option 2">Simple</option>
                                                <option value="Option 3">Highly Technical</option>
                                                <option value="Option 4">Complex and Highly Technical</option>
                                                <option value="Option 5">Technical</option>
                                                
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>  

                                        <div class="col-md-4 mb-3">
                                            <label for="">Type of Transaction</label>
                                            <select name="transaction" required class="form-control">
                                                <option value="">--Select A Transaction Type--</option>
                                                <option value="Option 1">G2C - Government to Citizen</option>
                                                <option value="Option 2">G2G - Government to Government</option>
                                                <option value="Option 3">G2B - Government to Business Entity</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
<!-- 
                                        <div class="col-md-4 mb-3">
                                            <label for="">Who May Avail</label>
                                            <select name="who_may_avail" required class="form-control">
                                                <option value="">--Select Who May Avail--</option>
                                                <option value="Option 1">Option 1</option>
                                                <option value="Option 2">Option 2</option>
                                                <option value="Option 3">Option 3</option> -->


                                                <div class="col-md-4 mb-3"> 
                                                    <label for="">Who May Avail</label> 
                                                    <input type="text" placeholder="Who May Avail" name="who_may_avail" required class="form-control"> 
                                                </div> 
                                                <!-- Add more options as needed -->
                                            <!-- </select>
                                        </div> -->

                                        <div class="col-md-4 mb-3">
                                            <label for="">Total Processing Time</label>
                                            <input type="text" placeholder="total processing time" name="processing_time" required class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Total Fees</label>
                                            <input type="text" placeholder="total fees" name="total_fees" required class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Period Of Extension</label>
                                            <input type="text" placeholder="period of extension" name="period_of_extension" required class="form-control">
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label for="">Documentary Requirements</label>
                                            <textarea name="documentary_requirements" placeholder="documentary requirements" required class="form-control" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Where To Secure</label>
                                            <textarea name="where_to_secure" placeholder="where to secure" required class="form-control" rows="10"></textarea>
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label for="">Clients Action (Detailed Steps)</label>
                                            <textarea name="clients_action" placeholder="client's action" required class="form-control" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Agency Action (Detailed Steps)</label>
                                            <textarea name="agency_action" placeholder="agency action" required class="form-control" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Fees to be Paid</label>
                                            <textarea name="fees_to_be_paid" placeholder="fees to be paid" required class="form-control" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Processing Time</label>
                                            <textarea name="time" placeholder="processing time" required class="form-control" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Person In Charge </label>
                                            <textarea name="person_in_charge" placeholder="person in charge" required class="form-control" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Contact Number</label>
                                            <textarea name="contact_number" placeholder="contact number" required class="form-control" rows="10"></textarea>
                                        </div>
                                                
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" width="70px" height="70px">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="add_services" class="btn btn-primary">Add Services</button>
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