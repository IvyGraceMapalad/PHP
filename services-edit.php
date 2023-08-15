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
                            <h1>Edit Services Offered
                                <a href="services-view.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $query = "SELECT * FROM services WHERE id = '$id' LIMIT 1";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $services_row = mysqli_fetch_assoc($query_run);
                                ?>      

                                <form action="code.php" method="POST" >


                                    <input type="hidden" name="id" value="<?= $services_row['id'] ?>">


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

                                                                        <option value="<?php echo $row_office['id']; ?>" <?php if($row_office['id'] == $services_row['office_id']){ echo "selected"; } ?>><?php echo $row_office['officename']; ?></option>

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
                                            <input type="text" name="title" value="<?php echo $services_row['title']; ?>"  class="form-control">
                                        </div>   
                                        <div class="col-md-16 mb-3">
                                            <label for="">Service Description</label>
                                            <textarea name="description" id="" cols="30" rows="10" class="form-control"><?php echo $services_row['description']; ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Office Division</label>
                                            <input type="text" name="division" value="<?php echo $services_row['office_division']; ?>"  class="form-control">
                                        </div>  
                                        <div class="col-md-4 mb-3">
                                            <label for="">Classification</label>
                                            <input type="text" name="classification" value="<?php echo $services_row['classification']; ?>"  class="form-control">
                                        </div>  
                                        <div class="col-md-4 mb-3">
                                            <label for="">Type of Transaction</label>
                                            <input type="text" name="transaction" value="<?php echo $services_row['transaction']; ?>"  class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Who May Avail</label>
                                            <input type="text" name="who_may_avail" value="<?php echo $services_row['who_may_avail']; ?>"  class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Total Processing Time</label>
                                            <input type="text" name="processing_time" value="<?php echo $services_row['processing_time']; ?>"  class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Total Fees</label>
                                            <input type="text" name="total_fees" value="<?php echo $services_row['total_fees']; ?>"  class="form-control">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="">Period Of Extension</label>
                                            <input type="text" name="period_of_extension" value="<?php echo $services_row['period_of_extension']; ?>"  class="form-control">
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label for="">Documentary Requirements</label>
                                            <textarea name="documentary_requirements" class="form-control" rows="10"><?php echo $services_row['documentary_requirements']; ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Where To Secure</label>
                                            <textarea name="where_to_secure"  class="form-control" rows="10"><?php echo $services_row['where_to_secure']; ?></textarea>
                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label for="">Clients Action (Detailed Steps)</label>
                                            <textarea name="clients_action"  class="form-control" rows="10"><?php echo $services_row['clients_action']; ?></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Agency Action (Detailed Steps)</label>
                                            <textarea name="agency_action"  class="form-control" rows="10"><?php echo $services_row['agency_action']; ?></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Fees to be Paid</label>
                                            <textarea name="fees_to_be_paid"  class="form-control" rows="10"><?php echo $services_row['fees_to_be_paid']; ?></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Processing Time</label>
                                            <textarea name="time"  class="form-control" rows="10"><?php echo $services_row['time']; ?></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Person In Charge </label>
                                            <textarea name="person_in_charge"  class="form-control" rows="10"><?php echo $services_row['person_in_charge']; ?></textarea>
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Contact Number</label>
                                            <textarea name="contact_number"  class="form-control" rows="10"><?php echo $services_row['contact_number']; ?></textarea>
                                        </div>
                                                
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" <?php echo $services_row['status'] == '1' ? 'checked': '' ?> />
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="update_services" class="btn btn-primary">Update Services</button>
                                    </div>
                                    </div>
                                </form>

                                <?php
                            }
                            else{
                                ?>
                                    <script>
                                    alert("No Record Found");
                                    window.location.href = "services-view.php";
                                <?php
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