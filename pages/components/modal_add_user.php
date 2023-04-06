<!--  Modal content for Adding User -->
<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myLargeModalLabel">User Registration Form</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal"
aria-hidden="true"></button>
</div>

<div class="modal-body">
<!-- ==================================================== -->
<!-- User Registration Modal Body Start -->
<!-- ==================================================== -->
<div class="row">

    
    <div class="col-sm-12 col-md-6">
   
        
    <form action="users.php" method="POST" enctype="multipart/form-data">
                                
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Name:</h4>
                    <h6 class="card-subtitle"><code>Required</code></h6>
                    
                        <div class="form-group">
                            <input type="text" class="form-control mb-2" name="first_name" id="firstName" placeholder="First name">
                            <!-- <input type="text" class="form-control mb-2" name="middle_name" id="middleName" placeholder="Middle name"> -->
                            <input type="text" class="form-control mb-2" name="last_name" placeholder="Last name" id="lastName">
                            <label class="mr-sm-2" for="userType" >Extension: (Ex. Jr., Sr., I, I, III)</label>
                            <select class="form-select mr-sm-2 mb-4" id="userType" name="ext">
                                <option selected="">None...</option>
                                <option value="Jr.">Jr.</option>
                                <option value="Sr.">Sr.</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                            </select>
                        </div>
                    <h4 class="card-title mt-3">User Type:</h4>
                    <h6 class="card-subtitle"><code></code></h6>
                        <div class="form-group mb-4">
                            <label class="mr-sm-2" for="userType">Select</label>
                            <select class="form-select mr-sm-2 mb-4" id="userType" name="user_type">
                            <option selected value="" hidden>Choose...</option>
                            <?php
                                $get_user_types = $conn->query("SELECT * FROM tbl_user_type") or die(jm_error('Get user type query Failed: ').$conn->error."<h2>At line: ".__LINE__."</h2>");
                                while ($row = $get_user_types->fetch_assoc()):
                            ?>
                                <option value="<?php echo $row['type_name']; ?>"><?php echo ucwords($row['type_name']); ?></option>

                                <?php endwhile; ?>
                            </select>
                            <h4 class="card-title">Email:</h4>
                            <h6 class="card-subtitle"><code>Required</code></h6>
                        
                            <input type="email" class="form-control mb-2" name="email" placeholder="your_email@example.com" id="user_email">
                            <h6 class="card-title">Account/User name:<br /><code>Auto-generated</code></h6>
                            <input type="text" id="userName" value="" class="form-control mb-2" name="username" >
                            <h4 class="card-title">Password:</h4>
                            <h6 class="card-subtitle"><code>Auto-generated</code></h6>

                            <div class="input-group">
                                <input id="gen_password" type="password" class="form-control" value="12345"
                                    aria-label="Input group example" aria-describedby="passwordEye" name="gen_password">
                                <div class="input-group-prepend">
                                    <div class="input-group-text h-100" id="passwordEye"><i class="fas fa-eye-slash"></i></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
    </div>
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="row">
                    <div class="card-body">
                        <!-- use JS to preview image here after user select a file -->
                        <img src="../assets/images/users/user_def_img.png" alt="profile picture" class="col-md-5"></img>
                        
                        <h4 class="card-title mt-2">Upload photo</h4>
                        
                        <input type="file" id="userphoto" name="profile_pic">
                        
                        <label for="contactNo" class="mt-2">Contact No.</label>
                        <input type="text" id="contactNo" class="form-control" name="contact_no" placeholder="Ex. 094112345678">
                                
                    </div>
                    
                        <div class="card-body jm-card-body">
                            <h4 class="card-title jm-card-bod">Address:</h4>
                                <input type="text" class="form-control mb-2" name="house_no" placeholder="Apt/Bldg/House No.">
                                <input type="text" class="form-control mb-2" name="street" placeholder="Street">
                                <input type="text" class="form-control mb-2" name="brgy" placeholder="Brgy.">
                                <input type="text" class="form-control mb-2" name="city" placeholder="City/Town">
                                <input type="text" class="form-control mb-2" name="province" placeholder="Province">
                                <input type="text" class="form-control mb-2" name="zipcode" placeholder="Zipcode">
                                <input type="text" class="form-control mb-2" name="country" value="Philippines" placeholder="Country">

                                <label class="mr-sm-2" for="userType" name="expiration_date">Set Expiration</label>
                               
                                <select class="form-select mr-sm-2 mb-2" id="expiration_date" name="expiration_date">
                                    <option selected value="3">3 months</option>
                                    <option value="6">6 months</option>
                                    <option value="9">9 months</option>
                                    <option value="12">12 months</option>
                                </select>
                        </div>
                </div>
            </div>
        
            <button class="btn btn-primary" name="submit_user" id="btnSubmit">Submit</button>
            
        </div>
    </form>
   
    
</div>
<button class="btn btn-primary" id="trigger_submit">Submit</button>





<!-- ================TRIGGER BUTTONS==================== -->

<!-- ==================================================== -->

<!-- ==================================================== -->
<!-- Modal Body End -->
<!-- ==================================================== -->

</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->