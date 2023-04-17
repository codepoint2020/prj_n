<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="
                        <?php 
                        if ($_SESSION['user_type'] == "administrator") {
                            echo 'panel.php?adm_home=true';
                        } else {
                            echo 'panel.php?home=true';
                        }
                        
                         ?>
                        "
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Home Page</span></a></li>
                        <li class="list-divider"></li>
                    
                        <li class="nav-small-cap"><span class="hide-menu">Menu</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">References </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <!-- <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span
                                            class="hide-menu"> Recently Uploaded
                                        </span></a>
                                </li> -->
                                <li class="sidebar-item"><a href="#" class="sidebar-link"><span
                                            class="hide-menu"> Categories
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="panel.php?all_references=true" class="sidebar-link"><span
                                            class="hide-menu"> All References
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">Profile </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="table-basic.html" class="sidebar-link"><span
                                            class="hide-menu"> Update Profile
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="table-dark-basic.html" class="sidebar-link"><span
                                            class="hide-menu"> Account
                                        </span></a>
                                </li>
                             
                            </ul>
                        </li>

                        <?php if ($_SESSION['user_type'] == 'administrator'): ?>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="bar-chart" class="feather-icon"></i><span
                                    class="hide-menu">System Statistics </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="chart-morris.html" class="sidebar-link"><span
                                            class="hide-menu"> Overview
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="chart-chart-js.html" class="sidebar-link"><span
                                            class="hide-menu"> References Utilization
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="chart-knob.html" class="sidebar-link"><span
                                            class="hide-menu">
                                            Logs
                                        </span></a>
                                </li>
                            </ul>
                        </li> -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="settings"
                                        class="svg-icon me-2 ms-1"></i><span
                                    class="hide-menu">e-Library Manager </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="panel.php?load_users=true" class="sidebar-link"><span
                                            class="hide-menu"> Users
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="panel.php?manage_references=true" class="sidebar-link"><span
                                            class="hide-menu"> Add New Reference
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="panel.php?manage_all_ref=true" class="sidebar-link"><span
                                            class="hide-menu"> Manage References
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="panel.php?categories=true" class="sidebar-link"><span
                                            class="hide-menu"> Categories
                                        </span></a>
                                </li>
                                <!-- <li class="sidebar-item"><a href="chart-knob.html" class="sidebar-link"><span
                                            class="hide-menu">
                                            Settings
                                        </span></a>
                                </li> -->
                            </ul>
                        </li>
                        <?php endif; ?>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                    class="hide-menu">Saved References</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="ui-buttons.html" class="sidebar-link"><span
                                            class="hide-menu"> Frequently Used
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="ui-modals.html" class="sidebar-link"><span
                                            class="hide-menu"> By Categories </span></a>
                                </li>
                               
                            </ul>
                        </li>

                        
                        <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html"
                                aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                    class="hide-menu">Request Assistance
                                </span></a>
                        </li> -->

                        <!-- <?php //if ($_SESSION['user_type'] == 'administrator'): ?>
                            <li class="sidebar-item"> <a class="sidebar-link" href="ticket-list.html"
                                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                    class="hide-menu">Ticket List
                                </span></a>
                        </li>
                        <?php //else: ?>

                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="ui-cards.html"
                                aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                                    class="hide-menu">Request Assistance
                                </span></a>
                            </li>

                        <?php //endif; ?> -->

                        <li class="nav-small-cap"><span class="hide-menu">STATUS: <?php echo (isset($_SESSION['is_in'])) ? "LOGGED IN" : ""; ?></span></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="authentication.php?logout=true"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Logout</span></a></li>
                                   
    
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>