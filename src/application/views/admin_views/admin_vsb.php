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
        <div class="navbar-header" style="width: 180px;">
            <a class="navbar-brand" href="index.html">
              <!-- Logo icon -->
              <b>
                <!-- Dark Logo icon -->
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
                <i class="mdi mdi-filter-outline"></i>Filtro   
                <!--mdi-filter-outline-->
                <!--<li><a id="lnk_loguot" href=""><i class="fa fa-power-off"></i> Logout</a></li>-->
              </a>              
              <div class="dropdown-menu animated bounceInDown" style="padding: 0px 10px 0px 10px !important;">
                <form id="filter-form" class="default-form m-top-5 m-b-0">
                  <ul class="mega-dropdown-menu row">                  
                    <li class="col-lg-3 col-xlg-2 m-b-0 p-b-10 p-t-10" style="background: #e9ecef">
                      <h4 class="m-b-5">- CLIENTE -</h4>
                        <div class="form-group m-b-15">
                          <input type="text" class="form-control form-control-sm" id="txtClientid" placeholder="Id do cliente"> </div>
                        <div class="form-group m-b-15">
                          <input type="text" class="form-control form-control-sm" id="txtMarkid" placeholder="Id do Instagram"> </div>
                        <div class="form-group m-b-15">
                          <input type="text" class="form-control form-control-sm" id="txtProfile" placeholder="Perfil do Instagram"> </div>
                        <div class="form-group m-b-15">
                          <input type="email" class="form-control form-control-sm" id="txtEmail" placeholder="Enter email"> </div>                  
                        <div class="form-group m-b-15">
                          <select class="form-control form-control-sm" id="cmbStatus">
                            <option selected="">Escolher status...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select> 
                        </div> 
                        <h6 class="m-b-5">Data do status:</h6>
                        <div class="form-group m-b-15 row">                          
                          <label for="ctrlFromDate" class="col-2 col-form-label font-12 font-bold">&nbsp;&nbsp;&nbsp;&nbsp;Desde:</label>
                          <div class="col-10"><input class="form-control form-control-sm" type="date" id="ctrlFromDate"></div>  
                        </div>  
                        <div class="form-group m-b-15 row"> 
                          <label for="ctrlToDate" class="col-2 col-form-label font-12 font-bold">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Até:</label>
                          <div class="col-10"><input class="form-control form-control-sm" type="date" id="ctrlToDate"></div>                           
                        </div>
                    </li>
                    <li class="col-lg-3  m-b-0 p-b-10 p-t-10" style="background: #e9ecef">
                      <h4 class="m-b-5">- PAGAMENTO -</h4>
                        <div class="form-group m-b-15">
                          <input type="text" class="form-control form-control-sm" id="txtCartao" placeholder="Cartão de credito"> </div>
                        <div class="form-group m-b-15">
                          <select class="form-control form-control-sm" id="cmbPlano">
                            <option selected="">Escolher plano...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                        <h6 class="m-b-5">Data da assignatura:</h6>
                        <div class="form-group m-b-15 row">                          
                          <label for="ctrlFromDate" class="col-2 col-form-label font-12 font-bold">&nbsp;&nbsp;&nbsp;&nbsp;Desde:</label>
                          <div class="col-10"><input class="form-control form-control-sm" type="date" id="ctrlFromDate"></div>  
                        </div>  
                        <div class="form-group m-b-15 row"> 
                          <label for="ctrlToDate" class="col-2 col-form-label font-12 font-bold">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Até:</label>
                          <div class="col-10"><input class="form-control form-control-sm" type="date" id="ctrlToDate"></div>                           
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Enter email"> </div>
                        
                    </li>
                    <li class="col-lg-3  m-b-0 p-b-10 p-t-10" style="background: #e9ecef">
                      <h4 class="m-b-5">TRABALHO</h4>
                        <div class="form-group">
                          <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Enter email"> </div>
                        
                    </li>
                    <li class="col-lg-3 m-b-0 p-b-10 p-t-10" style="background: #e9ecef">
                      <h4 class="m-b-5">OUTROS</h4>
                      <div class="form-group m-b-15">
                          <select class="form-control form-control-sm" id="cmbActiveProfile">
                            <option selected="">Perfis ativos...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select> </div> 
                        <div class="form-group">
                          <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Enter email"> </div>
                        
                        <button type="submit" class="btn btn-info">Consultar</button>                    
                    </li>                   

                  </ul>
                </form>  
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