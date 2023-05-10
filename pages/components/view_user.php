<style>

/* .card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
} */

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
    </style>

<?php

if (isset($_GET['edit_user_info'])) {
    $user_id = html_ent($_GET['user_id']);
}

$query_user = $conn->query("SELECT * FROM tbl_users WHERE user_id = $user_id") or die("Failed to query user".$conn->error.__LINE__);

$user_info = $query_user->fetch_assoc();
$address_id = $user_info["address_id"];

$query_address = $conn->query("SELECT * FROM tbl_address WHERE address_id = $address_id");
$user_address = $query_address->fetch_assoc();


?>


<div class="container">
        <div class="main-body">
        
              <!-- Breadcrumb -->
              <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </nav> -->
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="../assets/images/users/<?php echo $user_info['profile_pic']; ?>" alt="Admin" class="" width="250">
                        <div class="mt-3">
                          <h4><?php echo ucwords($user_info['first_name'] . " " .$user_info['last_name']); ?></h4>
                          <p class="text-secondary mb-4"><?php echo ucwords($user_info['user_type']); ?></p>
                          <p class="text-secondary mb-4">Username: <?php echo $user_info['username']; ?></p>
                          <!-- <p class="text-muted font-size-sm"><?php //echo $_SESSION['user_email']; ?></p> -->
                          <!-- <button class="btn btn-primary">Follow</button>
                          <button class="btn btn-outline-primary">Message</button> -->
                          <div class="row">


                        <!-- FUTURE IMPLEMENTATION IF NECESSARY -->
                        <!-- <div class="col-sm-12">
                          <a class="btn btn-info mb-4" style="width: 100%" data-bs-toggle="tooltip" title="Click here to update your information" href="panel.php?edit_user_info=<?php //echo $user_info['user_id']?>">Edit user's info</a>
                        </div> -->


                        <div class="col-sm-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#manual_password" type="button" role="tab" aria-controls="home" aria-selected="true">Manual Password</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#generate_password" type="button" role="tab" aria-controls="profile" aria-selected="false">Auto Generate</button>
            </li>
          
            </ul>

            <form action="panel.php?edit_user_info=true&user_id=<?php echo $user_id; ?>" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="manual_password" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mb-3 mt-4">
                       
                            <input type="text" class="form-control" id="m_password" name="m_password" placeholder="Enter a password">
                        </div>
                        <div>
                            <button class="btn btn-success" name="m_password_btn">Submit</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="generate_password" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="mt-3">
                            <button class="btn btn-success" name="gen_password_btn">Reset Password</button>
                        </div>
                    </div>
                </div>
            </form>
                        </div>


                      </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card mt-3">
                    <ul class="list-group list-group-flush">

                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                        <span class="text-secondary">no record found</span>
                      </li>
                      
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                        <span class="text-secondary">no record found</span>
                      </li>
                  
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                        <span class="text-secondary">no record found</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                        <span class="text-secondary">no record found</span>
                      </li>
                    
                    </ul>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php echo ucwords($user_info['last_name'] . ", " . $user_info['first_name']); ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $user_info['email']; ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Primary Contact#</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?php echo $user_info['contact_no']; ?>
                        </div>

                
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Secondary Contact#</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $user_info['contact_no2']; ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $user_address['house_no'] . ", " . $user_address['street'] . ", " . $user_address['brgy'] . ", " . $user_address['city'] . ", " . $user_address["province"]; ?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Sex:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo isset($_SESSION['sex']) && !empty($_SESSION['sex']) ? $_SESSION['sex'] : '<span class="text-secondary">No record found</span>';?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Date of birth:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php // echo isset($_SESSION['dob']) && !empty($_SESSION['dob']) ? $_SESSION['dob'] : '<span class="text-secondary">No record found</span>';?>
                        </div>
                      </div>
                  
                      
                    </div>
                  </div>
    
                  <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h4 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Recently Viewed References</h4>
                          <a href="#"><div>Under construction</div></a>
                          <small>Under construction</small>
                          <hr>

                          <p class="text-secondary">No record found</p>

                         
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                        <h4 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Recent Communications</h4>
                            <a href="#"><div>Under construction</div></a>
                            <small>Under construction</small>
                            <hr>


                          <p class="text-secondary">No record found</p>
                        
                        </div>
                      </div>
                    </div>
                  </div>
    
    
    
                </div>
              </div>
    
            </div>
        </div>
