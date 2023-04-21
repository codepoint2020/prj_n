

<div class="col-md-6">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-end">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium"><?php echo get_num_users(); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total number of users
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller"></sup><?php echo get_num_books(); ?></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Number of references
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i class="fas fa-book"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body bg-info  grow shadow-2 rounded-4">
                    <a href="panel.php?manage_references=true">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium text-center ">Add Reference</h2>
                                <h6 class="font-weight-normal mb-0 w-100 text-truncate text-dark">Click to add new reference/book
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7"><i class="fas fa-plus text-dark"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body bg-success  grow shadow-2 rounded-4">
                    <a href="panel.php?load_users=true">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium text-center ">Manage Users</h2>
                                <h6 class="font-weight-normal mb-0 w-100 text-truncate text-dark">Add/View/Edit user's information.
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-dark"><i class="fas fa-users"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body bg-warning rounded-4">
                    <a href="#">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium text-center ">References</h2>
                                <h6 class="font-weight-normal mb-0 w-100 text-truncate text-dark">Update References
                                </h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-edit text-dark"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-end ">
                <div class="card-body bg-secondary rounded-4">
                    <a href="#">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium text-center ">System Settings</h2>
                                <h6 class="font-weight-normal mb-0 w-100 text-truncate text-dark">Manage/configure system settings
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-white"><i class="icon-settings"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
       
    </div>
</div>


<!-- <div class="col-sm-6 col-lg-3">
<div class="card border-end ">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <div class="d-inline-flex align-items-center">
                    <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                    <span
                        class="badge bg-danger font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">-18.33%</span>
                </div>
                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Projects
                </h6>
            </div>
            <div class="ms-auto mt-md-3 mt-lg-0">
                <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
            </div>
        </div>
    </div>
</div>
</div> -->


<div class="col-sm-6 col-lg-3">
    <div class="card">
        <div class="card-body">
            
            <h4 class="card-title">Recent User Changes</h4>
            
            <div class="mt-4 activity">
                <?php for ($i = 0; $i < 3; $i++): ?>
                <!-- <div class="d-flex align-items-start border-left-line pb-3">
                    <div>
                        <a>
                            <img class="rounded-circle" width="40" src="../assets/images/users/user_def_img.png" alt="user photo"></img>
                        </a>
                    </div>
                    <div class="ms-3 mt-2">
                        <h5 class="text-dark font-weight-medium mb-2">New user added</h5>
                        <p class="font-14 mb-2 text-muted">Added by: <br> Jerome Morales
                        </p>
                        <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>
                    </div>
                </div> -->
                <?php endfor; ?>
                <div class="card">
                    <img class="card-img-top img-fluid" src="../assets/images/under_construction.png"
                        alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Work is underway</h4>
                        <p class="card-text">The development of this page is still in progress, try again later.</p>
                        <p class="card-text"><small class="text-muted">Maintainance, development</small></p>
                    </div>
                </div>

                <div class="ms-3 mt-2">             
                    <a href="#"
                        class="font-14 border-bottom pb-1 border-info">View All</a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-sm-6 col-lg-3">
    <div class="card">
        <div class="card-body">
            
            <h4 class="card-title">Recent References Changes</h4>
            
            <div class="mt-4 activity">
                <?php for ($i = 0; $i < 3; $i++): ?>
                <div class="d-flex align-items-start border-left-line pb-3">
                    <div>
                        <a>
                            <img class="rounded-circle" width="40" src="../assets/images/users/user_def_img.png" alt="user photo"></img>
                        </a>
                    </div>
                    <div class="ms-3 mt-2">
                        <h5 class="text-dark font-weight-medium mb-2">Electronic Warfare</h5>
                        <p class="font-14 mb-2 text-muted">Added by: <br> Jerome Morales
                        </p>
                        <span>Category: Research</span><br>
                        <span class="font-weight-light font-14 text-muted">10 Minutes Ago</span>
                    </div>
                </div>
                <?php endfor; ?>

                <div class="ms-3 mt-2">             
                    <a href="#"
                        class="font-14 border-bottom pb-1 border-info">View All</a>
                </div>
                
            </div>
        </div>
    </div>
</div> -->





