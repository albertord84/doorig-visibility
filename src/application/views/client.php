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
        
        <!-- chartist CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/chartist-js/dist/chartist.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/node_modules/chartist-js/dist/chartist-init.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/node_modules/css-chart/css-chart.css" rel="stylesheet">
        <!--This page css - Morris CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">
        
        <!--alerts CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
        
        <!-- Dashboard 1 Page CSS -->
        <link href="<?php echo base_url()?>assets/css/pages/dashboard1.css" rel="stylesheet">
        
        <!-- You can change the theme colors from here -->
        <link href="<?php echo base_url()?>assets/css/colors/default.css" id="theme" rel="stylesheet">
        
        <!-- page css -->
        <link href="<?php echo base_url()?>assets/css/pages/widget-page.css" rel="stylesheet">
        
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
<!--                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                    <i class="icon-Business-Mens"></i>
                                    <span class="hide-menu">Captação de Leads</span>
                                </a>
                            </li>-->
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
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Mais visibilidade</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        
                        <!-- HEADER -->
                        <div class="card">
                            <div class="card-body">
                                <h1>MÓDULO VISIBILIDADE</h1>
                            </div>
                        </div>
                        
                        <!-- CLIENT DATAS -->
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="sec-title text-center">
                                                <h2>Sua Marca</h2>
                                                <span class="border"></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1 col-sm-6 col-xs-12"></div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="text-center">
                                                <a href="https://www.instagram.com/leticiajural/" target="_blank">
                                                    <img class="img-profile-client" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/e3e5009d310027e1344a6ef66285c867/5CDAF899/t51.2885-19/s150x150/47694626_1984680308492965_2263875741303177216_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                    <p id="name-profile-client" style="color:black;font-size:1.5em">@leticiajural</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-xs-12">                                            
                                            <div class="row">                                                
                                                <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                    <p class="m-b-0">Posts</p>
                                                    <h6 id="amount-post-profile" class="text-muted">105</h6>
                                                </div>
                                                <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                    <p class="m-b-0 ">Seguidores</p>
                                                    <h6 id="amount-folowers-profile" class="text-muted">8,317</h6>
                                                </div>
                                                <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0" >
                                                    <p class="m-b-0 " >Seguindo</p>
                                                    <h6 id="amount-following-profile" class="text-muted">1,457</h6>
                                                </div>
                                            </div>
                                            <div class="row m-top-20">                                                
                                                <div class="col-md-12 col-sm-12 col-xs-12 text-justify p-0">
                                                    <p class="m-b-0">Letícia Jura
                                                        22 anos
                                                        💪 Feminista sim!
                                                        📝Serviço Social UFF
                                                        🎭Atriz
                                                        🏖️Carioca
                                                        ♌Leonina
                                                        Parcerias via Direct
                                                        Monólogo Desapegada: https://youtu.be/pD_L0NfwEk8 
                                                    </p>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-6 col-xs-12"></div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- STATISTICS -->
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="sec-title text-center">
                                                <h2>Desempenho até Hoje</h2>
                                                <span class="border"></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-xs-12">
                                            <div class="text-center">
                                                <div class="row m-top-30">
                                                    <!-- INÍCIO -->
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="social-widget">
                                                                        <p class="soc-header box-facebook">INÍCIO <br><?php echo date("d/m/y",1485907200);?></p>
                                                                        <div class="soc-content">
                                                                            <div class="col-6 b-r">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">Seguidores</h5></div>
                                                                            <div class="col-6">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">Seguindo</h5></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- AGORA -->
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="social-widget">
                                                                        <p class="soc-header box-twitter">AGORA <br><?php echo date("d/m/y",time());?></p>
                                                                        <div class="soc-content">
                                                                            <div class="col-6 b-r">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">Seguidores</h5></div>
                                                                            <div class="col-6">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">Seguindo</h5></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Follows today -->
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="social-widget">
                                                                        <p class="soc-header box-twitter">TOTAL SEGUIDOS</p>
                                                                        <div class="soc-content">
                                                                            <div class="col-6 b-r">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">Seguidores</h5></div>
                                                                            <div class="col-6">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">Seguindo</h5></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Total gain -->
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="social-widget">
                                                                        <p class="soc-header box-twitter">TOTAL <br>GANHOS</p>
                                                                        <div class="soc-content">
                                                                            <div class="col-6 b-r">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">Seguidores</h5></div>
                                                                            <div class="col-6">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">Seguindo</h5></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-8 col-xs-12">                                            
                                            <div class="row">
                                                <!-- Column -->
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                    <h3>Histórico</h3>
                                                                    <ul class="list-inline pull-right">
                                                                        <li>
                                                                            <h6 class="text-muted">
                                                                                <i class="fa fa-circle m-r-5 text-success"></i>
                                                                                Perfis seguidos
                                                                            </h6>
                                                                        </li>
                                                                        <li>
                                                                            <h6 class="text-muted">
                                                                                <i class="fa fa-circle m-r-5 text-info"></i>
                                                                                Seguidores ganhos
                                                                            </h6> 
                                                                        </li>
                                                                    </ul>                                                                    
                                                                    <div class="total-revenue4" style="height: 350px;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                             
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- REFERENCE PROFILES -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <a href="#">Saber mais <i class="far fa-question-circle"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="sec-title text-center">
                                                <h2>Perfis de Referência</h2>                                                
                                                <span class="border"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 text-left"></div>
                                            <div class="col-md-4 text-left">
                                                <h4 class="text-muted"><span id="amount-reference-profile-used">21</span> perfis de referência usados</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <h4 class="text-muted"><span id="amount-profile-followed">21256</span> perfis seguidos </h4>
                                            </div>
                                            <div class="col-md-2 text-left"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input id="cep" type="text" class="form-control" placeholder="Novo perfil de referência">
                                                    <button type="button" class="btn btn-info" style="margin-left:5px;max-height:38px"><i class="fa fa-plus-circle"></i> Adicionar</button>                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div id="mandatary_reference_profile_container" class="container" style="min-height:70px;background-color:#FAFAFA; border:1px solid #E6E6E6; margin-top:10px; padding: 15px">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="profile card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a href="https://www.instagram.com/leticiajural/" target="_blank">
                                                                            <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/e3e5009d310027e1344a6ef66285c867/5CDAF899/t51.2885-19/s150x150/47694626_1984680308492965_2263875741303177216_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                                    @leticiajural
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Posts</p>
                                                                            <h6 id="amount-post-profile" class="text-muted">105</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Seguidores</p>
                                                                            <h6 id="amount-folowers-profile" class="text-muted">8,317</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0" >
                                                                            <p class="m-b-0 label-profile" >Seguindo</p>
                                                                            <h6 id="amount-following-profile" class="text-muted">1,457</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="profile card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a  href="https://www.instagram.com/desainemarmores/" target="_blank">
                                                                            <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/581e26f0c737200838ab7d63cd5f710c/5CE31862/t51.2885-19/s150x150/16110336_541368592676753_1487422431021760512_a.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                                    @desainemarmores
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Posts</p>
                                                                            <h6 id="amount-post-profile" class="text-muted">105</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Seguidores</p>
                                                                            <h6 id="amount-folowers-profile" class="text-muted">8,317</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0" >
                                                                            <p class="m-b-0 label-profile" >Seguindo</p>
                                                                            <h6 id="amount-following-profile" class="text-muted">1,457</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="profile card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a href="https://www.instagram.com/leticiajural/" target="_blank">
                                                                            <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/e3e5009d310027e1344a6ef66285c867/5CDAF899/t51.2885-19/s150x150/47694626_1984680308492965_2263875741303177216_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                                    @leticiajural
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Posts</p>
                                                                            <h6 id="amount-post-profile" class="text-muted">105</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Seguidores</p>
                                                                            <h6 id="amount-folowers-profile" class="text-muted">8,317</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0" >
                                                                            <p class="m-b-0 label-profile" >Seguindo</p>
                                                                            <h6 id="amount-following-profile" class="text-muted">1,457</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="profile card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a  href="https://www.instagram.com/leticiajural/" target="_blank">
                                                                        <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/e3e5009d310027e1344a6ef66285c867/5CDAF899/t51.2885-19/s150x150/47694626_1984680308492965_2263875741303177216_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                                    @leticiajural
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Posts</p>
                                                                            <h6 id="amount-post-profile" class="text-muted">105</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Seguidores</p>
                                                                            <h6 id="amount-folowers-profile" class="text-muted">8,317</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0" >
                                                                            <p class="m-b-0 label-profile" >Seguindo</p>
                                                                            <h6 id="amount-following-profile" class="text-muted">1,457</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- GEOLOCALIZAÇÕES -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <a href="#">Saber mais <i class="far fa-question-circle"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="sec-title text-center">
                                                <h2>Geolocalizações</h2>
                                                <span class="border"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 text-left"></div>
                                            <div class="col-md-4 text-left">
                                                <h4 class="text-muted"><span id="amount-reference-profile-used">21</span> perfis de referência usados</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <h4 class="text-muted"><span id="amount-profile-followed">21256</span> perfis seguidos </h4>
                                            </div>
                                            <div class="col-md-2 text-left"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input id="cep" type="text" class="form-control" placeholder="Nova geolocalização">
                                                    <button type="button" class="btn btn-info" style="margin-left:5px;max-height:38px"><i class="fa fa-plus-circle"></i> Adicionar</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div id="mandatary_reference_profile_container" class="container" style="min-height:70px;background-color:#FAFAFA; border:1px solid #E6E6E6; margin-top:10px; padding: 15px">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="geolocation card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a  href="https://www.instagram.com/explore/locations/132572325/paraty-rio-de-janeiro-brazil/" target="_blank">
                                                                            <img class="img-geolocation" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/07114fc29134522fb4155acd130f6356/5CEDA917/t51.2885-15/e35/c0.180.1440.1440/s150x150/50940491_285229628820295_7727971394039570778_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                            <i class="fas fa-map-marker-alt"></i>paraty
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center p-0">
                                                                            Paraty, Rio de Janeiro, Brazil
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="geolocation card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a  href="https://www.instagram.com/explore/locations/235572176/havana-cuba/" target="_blank">
                                                                            <img class="img-geolocation" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/0e0665bc27d1d522d0344227c6585a8d/5CE43CF1/t51.2885-15/e35/c0.66.1080.1080/s150x150/49906960_1195650967254359_2837116182678356102_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                                    <i class="fas fa-map-marker-alt"></i>havana
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center p-0">
                                                                            Havana, Cuba
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="geolocation card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a  href="https://www.instagram.com/explore/locations/265308852/porto-seguro/" target="_blank">
                                                                            <img class="img-geolocation" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/7855b5a00e80b4d39f44a49f8983936d/5CF89720/t51.2885-15/e35/c0.135.1080.1080/s150x150/49907385_2707625052581813_7768085816435745265_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                                    <i class="fas fa-map-marker-alt"></i>porto-seguro
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center p-0">
                                                                            Porto Seguro
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>                                                
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- HASHTAG -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <a href="#">Saber mais <i class="far fa-question-circle"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="sec-title text-center">
                                                <h2>Hashtags</h2>
                                                <span class="border"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 text-left"></div>
                                            <div class="col-md-4 text-left">
                                                <h4 class="text-muted"><span id="amount-reference-profile-used">21</span> perfis de referência usados</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <h4 class="text-muted"><span id="amount-profile-followed">21256</span> perfis seguidos </h4>
                                            </div>
                                            <div class="col-md-2 text-left"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input id="cep" type="text" class="form-control" placeholder="Novo hastag">
                                                    <button type="button" class="btn btn-info" style="margin-left:5px;max-height:38px"><i class="fa fa-plus-circle"></i> Adicionar</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">
                                                <div id="mandatary_reference_profile_container" class="container" style="min-height:70px;background-color:#FAFAFA; border:1px solid #E6E6E6; margin-top:10px; padding: 15px">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="hastag card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a href="https://www.instagram.com/explore/tags/paratyrj/" target="_blank">
                                                                            <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/b7bf187e14a9483e73010aa9ea668f64/5CEEB777/t51.2885-15/e35/s150x150/49466842_394330344461436_4342610591931226679_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                                    #paratyrj
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Posts</p>
                                                                            <h6 id="amount-post-profile" class="text-muted">122,763</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="hastag card-body card-body-profile">
                                                                    <button class="profile-delete close" type="button" title="Eliminar"><span aria-hidden="true">&times;</span></button> 
                                                                    <br>
                                                                    <div class="text-center">
                                                                        <a href="https://www.instagram.com/explore/tags/buzios/" target="_blank">
                                                                            <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/184bd8ef3e8ed6f076c6545ce9ddda38/5CFFE32C/t51.2885-15/e35/c61.0.720.720a/s150x150/49907342_135759430788163_1102588690808536521_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                            <h5 id="name-profile" class="card-title">
                                                                                    #buzios
                                                                            </h5>                                                                                    
                                                                        </a>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0">
                                                                            <p class="m-b-0 label-profile">Posts</p>
                                                                            <h6 id="amount-post-profile" class="text-muted">1,614,076</h6>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-12 col-xs-12 text-center p-0" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>                                                
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BLACK AND WHITE LIST -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <a href="#">Saber mais <i class="far fa-question-circle"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="sec-title text-center">
                                                <h2>Cuidados Especiais</h2>
                                                <span class="border"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-5">
                                                <h2 class="text-muted pd-10 text-center"> Nunca deseguir</h2>
                                                <div class="input-group">
                                                    <input id="cep" type="text" class="form-control" placeholder="Perfil">
                                                    <button type="button" class="btn btn-info" style="margin-left:5px;max-height:38px"><i class="fa fa-plus-circle"></i> Adicionar</button>
                                                </div>
                                                <div class="card-over-card">
                                                    <div class="card-body">
                                                        <div class="message-box">
                                                            <div class="message-widget message-scroll">
                                                                <!-- Message -->
                                                                <a class="item-white-list" href="#">
                                                                    <div class="user-img"> 
                                                                        <img src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/b32831cf9858708dcf63d408d4bdb71a/5CF726F7/t51.2885-19/s150x150/50234427_626897431073233_568031019991564288_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net" alt="photo" class="img-circle"> 
                                                                        <span class="profile-status online pull-right"></span> 
                                                                    </div>
                                                                    <div class="mail-contnet">
                                                                        <h5>msouzi</h5> 
                                                                        <span class="time">Adicionado em: 01/02/2019</span> 
                                                                    </div>
                                                                </a>                                                                                                                             
                                                                <!-- Message -->
                                                                <a class="item-white-list" href="#">
                                                                    <div class="user-img"> 
                                                                        <img src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/b32831cf9858708dcf63d408d4bdb71a/5CF726F7/t51.2885-19/s150x150/50234427_626897431073233_568031019991564288_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net" alt="photo" class="img-circle"> 
                                                                        <span class="profile-status online pull-right"></span> 
                                                                    </div>
                                                                    <div class="mail-contnet">
                                                                        <h5>msouzi</h5> 
                                                                        <span class="time">Adicionado em: 01/02/2019</span> 
                                                                    </div>
                                                                </a>                                                                                                                             
                                                                <!-- Message -->
                                                                <a class="item-white-list" href="#">
                                                                    <div class="user-img"> 
                                                                        <img src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/b32831cf9858708dcf63d408d4bdb71a/5CF726F7/t51.2885-19/s150x150/50234427_626897431073233_568031019991564288_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net" alt="photo" class="img-circle"> 
                                                                        <span class="profile-status online pull-right"></span> 
                                                                    </div>
                                                                    <div class="mail-contnet">
                                                                        <h5>msouzi</h5> 
                                                                        <span class="time">Adicionado em: 01/02/2019</span> 
                                                                    </div>
                                                                </a>                                                                                                                             
                                                                <!-- Message -->
                                                                <a class="item-white-list" href="#">
                                                                    <div class="user-img"> 
                                                                        <img src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/b32831cf9858708dcf63d408d4bdb71a/5CF726F7/t51.2885-19/s150x150/50234427_626897431073233_568031019991564288_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net" alt="photo" class="img-circle"> 
                                                                        <span class="profile-status online pull-right"></span> 
                                                                    </div>
                                                                    <div class="mail-contnet">
                                                                        <h5>msouzi</h5> 
                                                                        <span class="time">Adicionado em: 01/02/2019</span> 
                                                                    </div>
                                                                </a>                                                                                                                             
                                                                <!-- Message -->
                                                                <a class="item-white-list" href="#">
                                                                    <div class="user-img"> 
                                                                        <img src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/b32831cf9858708dcf63d408d4bdb71a/5CF726F7/t51.2885-19/s150x150/50234427_626897431073233_568031019991564288_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net" alt="photo" class="img-circle"> 
                                                                        <span class="profile-status online pull-right"></span> 
                                                                    </div>
                                                                    <div class="mail-contnet">
                                                                        <h5>msouzi</h5> 
                                                                        <span class="time">Adicionado em: 01/02/2019</span> 
                                                                    </div>
                                                                </a>                                                                                                                             
                                                                                                                                                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <h2 class="text-muted pd-10 text-center"> Nunca seguir</h2>
                                                <div class="input-group">
                                                    <input id="cep" type="text" class="form-control" placeholder="Perfil">
                                                    <button type="button" class="btn btn-info" style="margin-left:5px;max-height:38px"><i class="fa fa-plus-circle"></i> Adicionar</button>
                                                </div>
                                                <div class="card-over-card">
                                                    <div class="card-body">
                                                        <div class="message-box">
                                                            <div class="message-widget message-scroll">
                                                                <!-- Message -->
                                                                <a class="item-white-list" href="#">
                                                                    <div class="user-img"> 
                                                                        <img src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/5cf37201c531c842a66247fe150d80db/5CF4909D/t51.2885-19/s150x150/42002828_488142708262658_4860776533704310784_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net" alt="photo" class="img-circle"> 
                                                                        <span class="profile-status online pull-right"></span> 
                                                                    </div>
                                                                    <div class="mail-contnet">
                                                                        <h5>ma.ietto</h5> 
                                                                        <span class="time">Adicionado em: 01/02/2019</span> 
                                                                    </div>
                                                                </a>                                                               
                                                                <!-- Message -->
                                                                <a class="item-white-list" href="#">
                                                                    <div class="user-img"> 
                                                                        <img src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/5cf37201c531c842a66247fe150d80db/5CF4909D/t51.2885-19/s150x150/42002828_488142708262658_4860776533704310784_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net" alt="photo" class="img-circle"> 
                                                                        <span class="profile-status online pull-right"></span> 
                                                                    </div>
                                                                    <div class="mail-contnet">
                                                                        <h5>ma.ietto</h5> 
                                                                        <span class="time">Adicionado em: 01/02/2019</span> 
                                                                    </div>
                                                                </a>                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>    
                                        
                                        
                                        
                                                                                        
                                    </div>
                                </div>
                            </div>
                        </div>



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
        
        <!-- Chart JS -->
        <script src="<?php echo base_url()?>assets/node_modules/chartist-js/dist/chartist.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
        <!-- Chart JS -->
        <script src="<?php echo base_url()?>assets/node_modules/echarts/echarts-all.js"></script>
        <!-- Flot Charts JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/flot/excanvas.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/flot/jquery.flot.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/flot/jquery.flot.time.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/widget-charts.js"></script>
        
        
        
        
        <script src="<?php echo base_url()?>assets/js/home.js"></script>
        
        
        
        
    </body>
</html>