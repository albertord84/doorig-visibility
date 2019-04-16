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
        <!-- You can change the theme colors from here -->
        <link href="<?php echo base_url()?>assets/css/colors/default.css" id="theme" rel="stylesheet">        
        <!-- Touchspin control --> 
        <link href="<?php echo base_url()?>assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
        
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
                <!--<i class="icon-Magnifi-Glass2">Filtro</i>-->   
                <i class="mdi mdi-filter-outline">Filtro</i>   
              </a>                                         
              <div class="dropdown-menu animated bounceInDown" style="padding: 0px 10px 0px 10px !important;">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"> 
                      <a class="nav-link active" data-toggle="tab" href="#home" role="tab"  style="background: #e9ecef">
                        <span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Filtro b&aacute;sico</span>
                      </a></li>
                    <li class="nav-item"> 
                      <a class="nav-link" data-toggle="tab" href="#advanced" role="tab" style="background: #ffeeba">
                        <span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Filtro avanzado</span>
                      </a> 
                    </li>
                </ul>
                <!--End nav tabs-->
                <form id="filter-form" class="default-form m-top-5 m-b-0">
                  <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="home" role="tabpanel">
                      <ul class="mega-dropdown-menu row">                  
                        <li class="col-lg-4 col-xlg-2 m-b-0 p-b-10 p-t-10" style="background: #e9ecef">
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
                        <li class="col-lg-4  m-b-0 p-b-10 p-t-10" style="background: #e9ecef">
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
                            <div class="form-group m-b-0 row" style="margin-bottom: -12px;">
                              <h6 class="col-5 col-form-label font-14">Tentativas de compra:</h6>
                              <div class="form-group col-7">    
                                <input id="spinTentativas" class="vertical-spin form-control form-control-sm" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="" name="vertical-spin"> 
                              </div>
                            </div>
                            <div class="form-group m-b-15">
                              <select class="form-control form-control-sm" id="cmbProcionalCode">
                                <option selected="">Escolher c&oacute;digo propocional...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                        </li>
                        <li class="col-lg-4  m-b-0 p-b-10 p-t-10" style="background: #e9ecef">
                          <h4 class="m-b-5">TRABALHO</h4>
                            <div class="form-group m-b-5 row" style="margin-bottom: -12px;">
                              <h6 class="col-8 col-form-label font-14">Não recebe trahalho h&aacute; mais de (x dias):</h6>
                              <div class="form-group col-4">    
                                <input id="spinRecebeWork" class="vertical-spin form-control form-control-sm" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="" name="vertical-spin"> 
                              </div>
                            </div>                      
                            <div class="form-group m-b-15">
                              <select class="form-control form-control-sm" id="cmbPause">
                                <option selected="">Escolha situação da ferramenta</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select> 
                            </div>                       
                            <div class="form-group m-b-15">
                              <select class="form-control form-control-sm" id="cmbTotalUnfollow">
                                <option selected="">Escolha opção para Total Unfollow</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select> 
                            </div> 
                            <div class="form-group m-b-15">
                              <select class="form-control form-control-sm" id="cmbAutolike">
                                <option selected="">Escolha opção para Autolike</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select> 
                            </div>
                            <div class="form-group m-b-15">
                              <select class="form-control form-control-sm" id="cmbActiveProfile">
                                <option selected="">Escolha opção para perfis ativos...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select> 
                            </div>                             
                        </li>
                      </ul>
                    </div>
                    <div class="tab-pane" id="advanced" role="tabpanel">
                      <ul class="mega-dropdown-menu row">                  
                        <li class="col-lg-4 col-xlg-2 m-b-0 p-b-10 p-t-10" style="background: #ffeeba; height: 392px;">
                          <h4 class="m-b-5">- Nuevos filtros que vayan surgiendo aqui... </h4>
                        </li>
                        <li class="col-lg-4 col-xlg-2 m-b-0 p-b-10 p-t-10" style="background: #ffeeba">
                          <h4 class="m-b-5">- otros... </h4>
                        </li>
                        <li class="col-lg-4 col-xlg-2 m-b-0 p-b-10 p-t-10" style="background: #ffeeba">
                          <h4 class="m-b-5">- otros mas...</h4>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group m-b-5 m-t-5">
                    <button type="submit" class="btn btn-info">Consultar</button> 
                  </div>
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
    <!-- Touchspin control -->  
    <script src="<?php echo base_url()?>assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/visibility/admin-vsb.js" type="text/javascript"></script>
    
    <!-- system scripts --> 
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/PT/internalization.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/mask.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/basics.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/dasboard.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
    <script src="<?php //echo base_url()?>assets/js/dashboard/dashboard_client.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>-->
  </body>
</html>