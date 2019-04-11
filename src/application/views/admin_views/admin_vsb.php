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
        <!-- chartist CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">      
        <!--c3 CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/c3-master/c3.min.css" rel="stylesheet">        
        <!--Toaster Popup message CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">        
        <!-- Custom CSS -->
        <link href="<?php echo base_url()?>assets/css/style.css"<?php echo '?'.$SCRIPT_VERSION;?> rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/style-doorig.css"<?php echo '?'.$SCRIPT_VERSION;?> rel="stylesheet">        
        <!-- Dashboard 1 Page CSS -->
        <link href="<?php echo base_url()?>assets/css/pages/dashboard1.css" rel="stylesheet">        
        <!-- You can change the theme colors from here -->
        <link href="<?php echo base_url()?>assets/css/colors/default.css" id="theme" rel="stylesheet">        
        
        <script type="text/javascript">
            /*var base_url = "<?php //echo base_url();?>";            
            var client = <?php //echo $client;?>;            
            var module = "dashboard";*/
        </script>
    </head>

  <body class="fix-header fix-sidebar card-no-border">
    <header class="topbar">      
      <!-- ============================================================== -->
      <!-- Profile -->
      <!-- ============================================================== -->     
      <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
              <!-- Logo icon -->
              <b>
                <!-- Dark Logo icon  kkkk-->
                <img width="27px" src="<?php echo base_url()?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <!--<img src="<?php echo base_url()?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
              </b>
              <span>
                <!-- dark Logo text -->
                <img width="110px" src="<?php echo base_url()?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->    
                <!--<img src="<?php echo base_url()?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />-->
              </span> 
            </a>
        </div>
        <!-- Header bar -->
        <div class="navbar-collapse" >
          <!-- toggle and nav items -->
          <ul class="navbar-nav mr-auto">
            ADMIN VISIBILITY
          </ul>          
          <!-- ============================================================== -->
          <!-- mega menu -->
          <!-- ============================================================== -->
          <ul class="navbar-nav my-lg-0" > 
            <li class="nav-item dropdown mega-dropdown"> 
              <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-Box-Close"></i>Filtro                
                <!--<li><a id="lnk_loguot" href=""><i class="fa fa-power-off"></i> Logout</a></li>-->
              </a>              
              <div class="dropdown-menu animated bounceInDown">
                <ul class="mega-dropdown-menu row">
                  <li class="col-lg-3 col-xlg-2 m-b-30">
                    <h4 class="m-b-20">CAROUSEL</h4>
                    <!-- CAROUSEL -->
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <div class="container"> <img class="d-block img-fluid" src="../assets/images/big/img1.jpg" alt="First slide"></div>
                        </div>
                        <div class="carousel-item">
                          <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img2.jpg" alt="Second slide"></div>
                        </div>
                        <div class="carousel-item">
                          <div class="container"><img class="d-block img-fluid" src="../assets/images/big/img3.jpg" alt="Third slide"></div>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                    </div>
                    <!-- End CAROUSEL -->
                  </li>
                  <li class="col-lg-3 m-b-30">
                    <h4 class="m-b-20">ACCORDION</h4>
                    <!-- Accordian -->
                    <div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">
                      <div class="card">
                          <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                          </a>
                        </h5> </div>
                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                          <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                          <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Collapsible Group Item #2
                        </a>
                        </h5> </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" role="tab" id="headingThree">
                          <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                            </a>
                          </h5> 
                        </div>
                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="col-lg-3  m-b-30">
                    <h4 class="m-b-20">CONTACT US</h4>
                    <!-- Contact -->
                    <form>
                      <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Enter email"> </div>
                      <div class="form-group">
                        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                      </div>
                      <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                  </li>
                  <li class="col-lg-3 col-xlg-4 m-b-30">
                    <h4 class="m-b-20">List style</h4>
                    <!-- List style -->
                    <ul class="list-style-none">
                      <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                      <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                      <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                      <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                      <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Profile -->
          <!-- ============================================================== -->
          <ul class="navbar-nav my-lg-0" >                                                                  
            <li class="nav-item dropdown u-pro">
              <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="client_photo" src="<?php echo base_url()?>assets/images/resources/default-user.jpeg" alt="user"  /> 
                <span class="hidden-md-down">
                    <i><?php echo $email;?></i>
                    &nbsp;
                    <i class="fa fa-angle-down"></i>
                </span> 
              </a>
              <div class="dropdown-menu dropdown-menu-right animated flipInY">
                <ul class="dropdown-user">
                  <li>
                    <div class="dw-user-box">
                      <div class="u-img">
                        <img class="client_photo" src="<?php echo base_url()?>assets/images/resources/default-user.jpeg" alt="user">
                      </div>
                      <div class="u-text">
                        <h5 class="text-dark"><?php echo $name;?></h5>
                        <p class="text-muted"><?php echo $email;?></p>
                      </div>
                      <div>
                      </div>
                    </div>
                  </li>
                  <div id="dinamic_menu_items">                                
                  </div>
                  <li role="separator" class="divider"></li>
                  <li><a id="lnk_loguot" href=""><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>  
        
    <div class="container-fluid">    
      <div class="row page-titles">
        <div class="col-md-5 align-self-center">
        </div>                        
      </div>      
    </div>
    esto es un texto1
      
    <?php //echo $modals?>            
    <?php //echo $footer_admin;?>
    <!--</div>-->
        
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
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/js/custom.min.js"></script>
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

    <!-- system scripts --> 
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/PT/internalization.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/mask.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/basics.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/dasboard.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/dashboard_client.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>-->
  </body>
</html>