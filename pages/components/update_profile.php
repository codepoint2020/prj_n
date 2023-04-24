<style>


.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8;
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}


 </style>


<img src="" alt="">

<div class="container rounded bg-white mt-5 mb-5">
        <div class="row shadow-2">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../assets/images/users/<?php echo $_SESSION['profile_pic']; ?>"><span class="font-weight-bold mb-4"><?php echo $_SESSION['system_user']; ?></span>
         
                <div class="col-md-12 changePhotoWrapper">
                <!-- <button class="btn btn-primary" id="btnChangePic">Change Photo</button> -->
                <label for="photoChange" class="btn btn-primary changePhotoWrapper">change Picture</label>
                    <input type="File" id="photoChange" style="display: none">
                </div>
            </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>


                    <form action="">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $_SESSION['first_name']; ?>"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="<?php echo $_SESSION['first_name']; ?>" placeholder="surname"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Contact #1</label><input type="text" class="form-control" placeholder="enter contact number" value="<?php echo $_SESSION['contact_no']; ?>"></div>

                        <div class="col-md-12"><label class="labels">Contact #2</label><input type="text" class="form-control" placeholder="enter contact number" value="<?php echo $_SESSION['contact_no2']; ?>"></div>

                        <div class="col-md-12"><label class="labels">House No./Bldg. Room No.</label><input type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $_SESSION['house_no']; ?>"></div>

                        <div class="col-md-12"><label class="labels">Street</label><input type="text" class="form-control" placeholder="House No. or Bldg Room No. " value="<?php echo $_SESSION['street']; ?>"></div>

                        <div class="col-md-12"><label class="labels">Brgy</label><input type="text" class="form-control" placeholder="House No. or Bldg Room No. " value="<?php echo $_SESSION['brgy']; ?>"></div>

                    
                        <div class="col-md-12"><label class="labels">City/Town</label><input type="text" class="form-control" placeholder="enter city or town" value="<?php echo $_SESSION['city']; ?>"></div>

                        <div class="col-md-12"><label class="labels">Province</label><input type="text" class="form-control" placeholder="enter province" value="<?php echo $_SESSION['province']; ?>"></div>

                        <div class="col-md-12"><label class="labels">Zipcode</label><input type="text" class="form-control" placeholder="enter zipcode" value="<?php echo $_SESSION['zipcode']; ?>"></div>

                     

                       
                    </div>
                  
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <!-- <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br> -->
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Custom Select</h4>
                
                             
                                <div class="form-group mb-4">
                                    <label class="mr-sm-2" for="inlineFormCustomSelect">Sex:</label>
                                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected="">Choose...</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">custom</option>
                                
                                        </select>
                                </div>

                                <div class="col-md-12"><label class="labels">Facebook</label><input type="text" class="form-control" placeholder="enter facebook url" value="<?php echo isset($_SESSION['facebook']) && !empty($_SESSION['facebook']) ? $_SESSION['facebook'] : 'No record found' ?>">
                                </div>

                                <div class="col-md-12"><label class="labels">Website</label><input type="text" class="form-control" placeholder="enter personal website" value="<?php echo isset($_SESSION['website']) && !empty($_SESSION['website']) ? $_SESSION['website'] : 'No record found';?>">
                                </div>
                                
                                <div class="col-md-12"><label class="labels">Instagram</label><input type="text" class="form-control" placeholder="enter your instagram url " value="<?php echo isset($_SESSION['ig']) && !empty($_SESSION['ig']) ? $_SESSION['ig'] : 'No record found';?>">
                                </div>

                                <div class="col-md-12"><label class="labels">Twitter</label><input type="text" class="form-control" placeholder="enter your twitter url" value="<?php echo isset($_SESSION['twitter']) && !empty($_SESSION['twitter']) ? $_SESSION['twitter'] : 'No record found';?>">
                                </div>

                              
                                <h4 class="card-title mt-4">Update Password:</h4>

                                <div class="input-group">
                                    <input  type="text" class="form-control" placeholder="Enter old password" value=""
                                        aria-label="Input group example" aria-describedby="passwordEye" name="old_password">
                                 
                                </div>
                        

                                <div class="input-group mt-2">
                                    <input  type="text" class="form-control" placeholder="Enter a new password"
                                        aria-label="Input group example" aria-describedby="passwordEye" name="new_password">
                                   
                                </div>



                            </div>

                            
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-success btn-block" name="btn_update_profile">Save Profile</button>
                        </div>
                </div>
            </div>

            
            </form>
        </div>
    </div>
    </div>
    </div>