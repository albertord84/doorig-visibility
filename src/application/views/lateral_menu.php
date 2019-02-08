<style>
    a.disabled {
        pointer-events: none;
    }
</style>

<!-- Topbar header -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b>
                    <!-- Dark Logo icon -->
                    <img src="<?php echo base_url()?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="<?php echo base_url()?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>
                <span>
                    <!-- dark Logo text -->
                    <img src="<?php echo base_url()?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->    
                    <img src="<?php echo base_url()?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                </span> 
            </a>
        </div>
        <!-- Header bar -->
        <div class="navbar-collapse" >
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" > <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
            </ul>
            <!-- User profile -->
            <ul class="navbar-nav my-lg-0" >
                <!-- Comment -->
                <li class="nav-item dropdown">
                    <a style="padding-top:15px; margin-top:10px; height:50px" class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Bell"></i>
                        <div class="notify" > 
                            <span class="heartbit" style="margin-top: 12px"></span> 
                            <span class="point" style="margin-top: 12px"></span> 
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>                            
                <!-- Language -->
                <li class="nav-item dropdown">
                    <a style="padding-top:15px; margin-top:10px; height:50px" class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated bounceInDown"> 
                        <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-pt"></i> Portugês</a> 
                        <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-en"></i> English</a>
                        <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-sp"></i> Español</a>
                    </div>
                </li>                            
                <!-- Profile -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url()?>assets/images/users/1.jpg" alt="user" class="" /> <span class="hidden-md-down">Mark Sanders &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        <img src="<?php echo base_url()?>assets/images/users/1.jpg" alt="user">
                                    </div>
                                    <div class="u-text">
                                        <h4>Steave Jobs</h4>
                                        <p class="text-muted">varun@gmail.com</p>
                                        <!--<a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>-->
                                    </div> 
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <!--<li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>-->
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Left Sidebar -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap text-center">MÓDULOS</li>
                <li id="lnk-dashboard"> 
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false">
                        <i class="icon-Car-Wheel"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a id="visivility_lnk" class="has-arrow waves-effect waves-dark" aria-expanded="false">
                        <!--<i class="icon-Diamond"></i>-->
                        <i class="icon-Globe"></i>
                        <span class="hide-menu">Mais visibilidade </span>
                    </a>
                </li>
                <!--<li> 
                    <a class="has-arrow waves-effect waves-dark" aria-expanded="false">
                        <i class="icon-Business-Mens"></i>
                        <span class="hide-menu">Captação de Leads</span>
                    </a>
                </li>-->
                <li> 
                    <a href="<?php echo base_url()."index.php/welcome/redirect_to_post_stories"?>" class="has-arrow waves-effect waves-dark disabled" aria-expanded="false">
                        <i class="icon-Landscape-2"></i>
                        <span class="hide-menu">Post-Stories</span>
                    </a>
                </li>
                <li> 
                    <a href="<?php echo base_url()."index.php/welcome/redirect_to_directs"?>" class="has-arrow waves-effect waves-dark disabled" aria-expanded="false">
                        <i class="icon-Mail-Send"></i>
                        <span class="hide-menu">Envio de Directs</span>
                    </a>
                </li>
                <li> 
                    <a href="<?php echo base_url()."index.php/welcome/redirect_to_deep_analysis"?>" class="has-arrow waves-effect waves-dark disabled" aria-expanded="false">
                        <i class="icon-Brain-2"></i>
                        <span class="hide-menu">Deep-Analisys</span>
                    </a>
                </li>                            
                <li class="nav-small-cap text-center">OUTROS</li>
                <li> 
                    <a href="<?php echo base_url()."index.php/welcome/payment"?>" class="has-arrow waves-effect waves-dark" aria-expanded="false">
                        <i class="icon-Money-2"></i>
                        <span class="hide-menu">Pagamento</span>
                    </a>
                </li>                            
                <li> 
                    <a href="<?php echo base_url()."index.php/welcome/abstract_account"?>" class="has-arrow waves-effect waves-dark disabled" aria-expanded="false">
                        <i class=" icon-Bar-Chart"></i>
                        <span class="hide-menu">Resumo Conta</span>
                    </a>
                </li>
                <li>
                    <a id="message_lnk" class="has-arrow waves-effect waves-dark"  aria-expanded="false">
                        <i class="icon-Headset"></i>
                        <span class="hide-menu">Contate-nos</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
