<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/favicon.png">
        <title>Maior visibilidade no Instagram</title>
        
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
        
        <!-- This page CSS -->
        <!-- chartist CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
        
        <!--c3 CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
        
        <!--Toaster Popup message CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/style-doorig.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/pages/pricing-page.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/timeline.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/node_modules/wizard/steps.css" rel="stylesheet">
        <!--alerts CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
        
        <!-- Dashboard 1 Page CSS -->
        <link href="<?php echo base_url()?>assets/css/pages/dashboard1.css" rel="stylesheet">
        
        <!-- You can change the theme colors from here -->
        <link href="<?php echo base_url()?>assets/css/colors/default.css" id="theme" rel="stylesheet">
        
        
    </head>

    <body class="fix-header fix-sidebar card-no-border">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Admin Wrap</p>
            </div>
        </div>
        <!-- Main wrapper - style you can find in pages.scss -->
        <div id="main-wrapper">
            <!-- Topbar header - style you can find in pages.scss -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- Logo -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.html">
                            <!-- Logo icon --><b>
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="<?php echo base_url()?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="<?php echo base_url()?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text --><span>
                             <!-- dark Logo text -->
                             <img src="<?php echo base_url()?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                             <!-- Light Logo text -->    
                             <img src="<?php echo base_url()?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                    </div>
                    <!-- End Logo -->
                    <div class="navbar-collapse">
                        <!-- toggle and nav items -->
                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="sl-icon-menu"></i></a> </li>
                        </ul>
                        <!-- User profile and search -->
                        <ul class="navbar-nav my-lg-0">
                            <!-- Comment -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-Bell"></i>
                                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
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
                            <!-- End Comment -->
                            
                                                        
                            <!-- Language -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                    <i class="flag-icon flag-icon-us"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animated bounceInDown"> 
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-pr"></i> Portugês</a> 
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> English</a>
                                    <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Español</a>
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
            <!-- End Topbar header -->
            
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <aside class="left-sidebar">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap text-center">MÓDULOS</li>
                            <li id="lnk-dashboard"> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Car-Wheel"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Globe"></i>
                                    <span class="hide-menu">Mais visibilidade </span>
                                </a>
                            </li>
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Business-Mens"></i>
                                    <span class="hide-menu">Captação de Leads</span>
                                </a>
                            </li>
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Landscape-2"></i>
                                    <span class="hide-menu">Post-Stories</span>
                                </a>
                            </li>
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Mail-Send"></i>
                                    <span class="hide-menu">Envio de Directs</span>
                                </a>
                            </li>
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Brain-2"></i>
                                    <span class="hide-menu">Deep-Analisys</span>
                                </a>
                            </li>                            
                            <li class="nav-small-cap text-center">OUTROS</li>
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Money-2"></i>
                                    <span class="hide-menu">Pagamento</span>
                                </a>
                            </li>                            
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class=" icon-Bar-Chart"></i>
                                    <span class="hide-menu">Resumo Conta</span>
                                </a>
                            </li>                            
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Headset"></i>
                                    <span class="hide-menu">Contate-nos</span>
                                </a>
                            </li>                            
                        </ul>
                    </nav>
                </div>
            </aside>
        </div>    
            
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row page-titles">
                        <div class="col-md-8 align-self-center">
                            <h3 class="text-themecolor">Aumente sua visibilidade no Instagram!</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Mais visibilidade</li>
                            </ol>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                                 
                            <div class="card">
                                <div class="card-body">
                                    <h1>MÓDULO VISIBILIDADE</h1>
                                </div>
                            </div>
                            
                            <!-- SIDE BY SIDE SECTION -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css /> -->
                                        <div class="container">                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="sec-title text-center">
                                                        <h2>Passo a Passo</h2>
                                                        <span class="border"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="main-timeline">
                                                        <div class="timeline">
                                                            <a href="#" class="timeline-content">
                                                                <div class="timeline-icon">
                                                                    <i class="far fa-address-card"></i>
                                                                </div>
                                                                <div class="inner-content">
                                                                    <p class="description">
                                                                        Escolha os Perfis de Referência, Geolocalização ou Hastag dos que deseja atrair os novos seguidores.
                                                                    </p>
                                                                </div>
                                                                <div class="timeline-year"><span>Passo 1</span></div>
                                                            </a>
                                                        </div>
                                                        <div class="timeline">
                                                            <a href="#" class="timeline-content">
                                                                <div class="timeline-icon">
                                                                    <i class="fas fa-cog  slow-spin"></i>
                                                                </div>
                                                                <div class="inner-content">
                                                                    <p class="description">
                                                                        A ferramenta seguirá automaticamente os seguidores dos Perfis de Referência, Geolocalização ou Hastag escolhidos por você.
                                                                    </p>
                                                                </div>
                                                                <div class="timeline-year"><span>Passo 2</span></div>
                                                            </a>
                                                        </div>
                                                        <div class="timeline">
                                                            <a href="#" class="timeline-content">
                                                                <div class="timeline-icon">
                                                                    <i class="fa fa-users"></i>
                                                                </div>
                                                                <div class="inner-content">
                                                                    <p class="description">
                                                                        Uma parte desses perfis poderão seguir você de volta por se identificar com seu conteúdo.
                                                                    </p>
                                                                </div>
                                                                <div class="timeline-year"><span>Passo 3</span></div>
                                                            </a>
                                                        </div>
                                                        <div class="timeline">
                                                            <a href="#" class="timeline-content">
                                                                <div class="timeline-icon">
                                                                    <i class="fas fa-cog  slow-spin"></i>
                                                                </div>
                                                                <div class="inner-content">
                                                                    <p class="description">
                                                                        A ferramenta deixará de seguir esses perfis automáticamente após 48 horas.
                                                                    </p>
                                                                </div>
                                                                <div class="timeline-year"><span>Passo 4</span></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- VIDEO SECTION -->
                            <div class="card">
                                <div class="card-body">
                                    <A name="lnk_how_function"></A>
                                    <section class="about-sec video" id="video">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="sec-title text-center">
                                                        <h2>Assista o video explicativo</h2>
                                                        <span class="border"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="left-content-area text-center">
                                                        <div class="img-wrapper">
                                                            <img src="http://localhost/doorig/src/assets/images/video-sec/video-img.jpg" alt="clients story">
                                                            <div class="hover">
                                                                <a href="../../../www.youtube.com/watch46da.html?v=EfTUpvxEbqc" class="video-play video-play-btn" target="_self"><i class="flaticon-music-player-play"></i></a>
                                                                <!--<a href="https://youtu.be/Eo2Lr1trSKs" class="video-play video-play-btn" target="_self"><i class="flaticon-music-player-play"></i></a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                               </div>
<!--                                               <div class="col-md-6 col-sm-12">
                                                    <div class="right-content-area"> 
                                                        <div class="sec-title text-left">
                                                            <h2>PASSO A PASSO</h2></div>
                                                            <spam></spam>

                                                        <div class="about-item" style="width: 180%">
                                                            <ul>
                                                                <li><i class="fa fa-arrow-circle-right"></i>1. Escolha os Perfis de referência, geolocalização ou hastag dos que deseja captar seus seguidores para sua marca</li>
                                                                <li><i class="fa fa-arrow-circle-right"></i>2. A ferramenta de visibilidade seguirá automaticamente os seguidores dos Perfis de referência</li>
                                                                <li><i class="fa fa-arrow-circle-right"></i>3. Uma parte desses seguidores poderão seguir você de volta por se identificar com o conteúdo da sua marca</li>
                                                                <li><i class="fa fa-arrow-circle-right"></i>4. A ferramenta deixará de seguir esses perfis automáticamente após 48 horas.</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                               </div>-->
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            
                            <!-- SIGNIN SECTION -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body wizard-content">
                                            <div class="col-md-12">
                                                <div class="sec-title text-center">
                                                    <h2>Assinar agora</h2>
                                                    <span class="border"></span>
                                                </div>
                                            </div>
                                            <form action="#" class="tab-wizard wizard-circle">
                                                <!-- Step 1 -->
                                                    <h6>Informar marca</h6>
                                                    <section>
                                                        <div class="row">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label for="firstName1">Perfil da marca:</label>
                                                                    <input type="text" class="form-control" id="firstName1"> 
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="firstName1">Senha:</label>
                                                                    <input type="text" class="form-control" id="firstName1"> 
                                                                </div>                                                                
                                                            </div>
                                                            <div class="col-md-2"></div> 
                                                        </div>
                                                    </section>
                                                    
                                                <!-- Step 2 -->
                                                    <h6>Selecionar plano</h6>
                                                    <section class="price-table">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                                    <div class="table-block text-center">
                                                                        <div class="icon-box">
                                                                            <i class="flaticon-folder"></i>
                                                                        </div>
                                                                        <div class="table-det">
                                                                            <h2 style="font-size:2.5em"><span>$</span>20.45</h2>
                                                                            <h3>Médio</h3>
                                                                            <ul>
                                                                                <li>Normal Server Power</li>
                                                                                <li>Unlimited Montly Traffic</li>
                                                                            </ul>
                                                                            <div class="button">
                                                                                <a class="thm-btn bg-clr3" href="#">Get Service</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                                    <div class="table-block text-center active">
                                                                        <div class="icon-box">
                                                                            <i class="flaticon-folder"></i>
                                                                        </div>
                                                                        <div class="table-det">
                                                                            <h2 style="font-size:2.5em"><span>$</span>38.12</h2>
                                                                            <h3>Rápido</h3>
                                                                            <ul>
                                                                                <li>Normal Server Power</li>
                                                                                <li>Unlimited Montly Traffic</li>
                                                                            </ul>
                                                                            <div class="button">
                                                                                <a class="thm-btn bg-clr4" href="#">Get Service</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                                    <div class="table-block text-center">
                                                                        <div class="icon-box">
                                                                            <i class="flaticon-folder"></i>
                                                                        </div>
                                                                        <div class="table-det">
                                                                            <h2 style="font-size:2.5em"><span>$</span>55.00</h2>
                                                                            <h3>Ultra rápido</h3>
                                                                            <ul>
                                                                                <li>Normal Server Power</li>
                                                                                <li>Unlimited Montly Traffic</li>
                                                                            </ul>
                                                                            <div class="button">
                                                                                <a class="thm-btn bg-clr3" href="#">Get Service</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                <!-- Step 3 -->
                                                    <h6>Configuração inicial</h6>
                                                    <section>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="int1">Interview For :</label>
                                                                    <input type="text" class="form-control" id="int1"> </div>
                                                                <div class="form-group">
                                                                    <label for="intType1">Interview Type :</label>
                                                                    <select class="custom-select form-control" id="intType1" data-placeholder="Type to search cities" name="intType1">
                                                                        <option value="Banquet">Normal</option>
                                                                        <option value="Fund Raiser">Difficult</option>
                                                                        <option value="Dinner Party">Hard</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Location1">Location :</label>
                                                                    <select class="custom-select form-control" id="Location1" name="location">
                                                                        <option value="">Select City</option>
                                                                        <option value="India">India</option>
                                                                        <option value="USA">USA</option>
                                                                        <option value="Dubai">Dubai</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="jobTitle2">Interview Date :</label>
                                                                    <input type="date" class="form-control" id="jobTitle2">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Requirements :</label>
                                                                    <div class="m-b-10">
                                                                        <label class="custom-control custom-radio">
                                                                            <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                                                            <span class="custom-control-label">Employee</span>
                                                                        </label>
                                                                        <label class="custom-control custom-radio">
                                                                            <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                                                            <span class="custom-control-label">Contract</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                <!-- Step 4 -->
                                                    <h6>Finalizar</h6>
                                                    <section>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="behName1">Behaviour :</label>
                                                                    <input type="text" class="form-control" id="behName1">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="participants1">Confidance</label>
                                                                    <input type="text" class="form-control" id="participants1">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="participants1">Result</label>
                                                                    <select class="custom-select form-control" id="participants1" name="location">
                                                                        <option value="">Select Result</option>
                                                                        <option value="Selected">Selected</option>
                                                                        <option value="Rejected">Rejected</option>
                                                                        <option value="Call Second-time">Call Second-time</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="decisions1">Comments</label>
                                                                    <textarea name="decisions" id="decisions1" rows="4" class="form-control"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Rate Interviwer :</label>
                                                                    <div class="c-inputs-stacked">
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">1 star</span> </label>
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">2 star</span> </label>
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">3 star</span> </label>
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">4 star</span> </label>
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label ml-0">5 star</span> </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- PRICE SECTION -->
                            <!--<div class="card">
                                <div class="card-body">    
                                    <section class="price-table">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="sec-title text-center">
                                                        <h2>Best Pricing Plan</h2>
                                                        <span class="border"></span>
                                                        <p>Lorem ipsum dolor  amet mi ultricies interdum pede eu vestibulum vulputate maurimtum <br>commod rhoncus consectetuer reduce producet</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <div class="table-block text-center">
                                                        <div class="icon-box">
                                                            <i class="flaticon-folder"></i>
                                                        </div>
                                                        <div class="table-det">
                                                            <h2 style="font-size:2.5em"><span>$</span>20.45</h2>
                                                            <h3>Personal Plan</h3>
                                                            <ul>
                                                                <li>Normal Server Power</li>
                                                                <li>Unlimited Montly Traffic</li>
                                                                <li>Cloud Technology</li>
                                                                <li>Unlimited Disic Space</li>
                                                            </ul>
                                                            <div class="button">
                                                                <a class="thm-btn bg-clr3" href="#">Get Service</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <div class="table-block text-center active">
                                                        <div class="icon-box">
                                                            <i class="flaticon-folder"></i>
                                                        </div>
                                                        <div class="table-det">
                                                            <h2 style="font-size:2.5em"><span>$</span>38.12</h2>
                                                            <h3>Business Plan</h3>
                                                            <ul>
                                                                <li>Normal Server Power</li>
                                                                <li>Unlimited Montly Traffic</li>
                                                                <li>Cloud Technology</li>
                                                                <li>Unlimited Disic Space</li>
                                                            </ul>
                                                            <div class="button">
                                                                <a class="thm-btn bg-clr4" href="#">Get Service</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <div class="table-block text-center">
                                                        <div class="icon-box">
                                                            <i class="flaticon-folder"></i>
                                                        </div>
                                                        <div class="table-det">
                                                            <h2 style="font-size:2.5em"><span>$</span>55.00</h2>
                                                            <h3>Super Service Plan</h3>
                                                            <ul>
                                                                <li>Normal Server Power</li>
                                                                <li>Unlimited Montly Traffic</li>
                                                                <li>Cloud Technology</li>
                                                                <li>Unlimited Disic Space</li>
                                                            </ul>
                                                            <div class="button">
                                                                <a class="thm-btn bg-clr3" href="#">Get Service</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>-->
                        
                        </div>
                    </div>

                    <footer class="footer text-center">
                        DOORIG - TODOS OS DIREITOS RESERVADOS
                    </footer>
                </div>
            </div>
        <!-- End Wrapper -->
        
        <!-- All Jquery -->
        <script src="<?php echo base_url()?>assets/node_modules/jquery/jquery.min.js"></script>
        <!-- Bootstrap popper Core JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
        <!--Wave Effects -->
        <script src="<?php echo base_url()?>assets/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="<?php echo base_url()?>assets/js/sidebarmenu.js"></script>
        <!-- This page plugins -->
        <!--morris JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/morrisjs/morris.min.js"></script>
        <!--c3 JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/d3/d3.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/c3-master/c3.min.js"></script>
        <!-- Popup message jquery -->
        <script src="<?php echo base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
        <!-- Chart JS -->
        <script src="<?php echo base_url()?>assets/js/dashboard1.js"></script>
        <!-- Style switcher -->
        <script src="<?php echo base_url()?>assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
        
        <!--Custom JavaScript -->
        <script src="<?php echo base_url()?>assets/js/custom.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
        <script type="text/javascript">
            $('#slimtest1, #slimtest2, #slimtest3, #slimtest4').perfectScrollbar();
        </script>
        
        <!--Wizard JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/moment/min/moment.min.html"></script>
        <script src="<?php echo base_url()?>assets/node_modules/wizard/jquery.steps.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/wizard/jquery.validate.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url()?>assets/node_modules/sweetalert/sweetalert.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/wizard/steps.js"></script>
        
        
    </body>
</html>