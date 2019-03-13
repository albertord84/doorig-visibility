<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">        
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/favicon.png">
        <title>Maior visibilidade no Instagram</title>        
        
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">                
        
        <!-- This page CSS -->        
        <!--<link href="<?php echo base_url()?>assets/node_modules/c3-master/c3.min.css" rel="stylesheet">-->        
        <!--Toaster Popup message CSS -->
        <!--<link href="<?php echo base_url()?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">-->        
        
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
        <link href="<?php echo base_url()?>assets/css/pages/widget-page.css" rel="stylesheet">
        
        <!--This page css - Morris CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/morrisjs/morris.css" rel="stylesheet">       
        <!--alerts CSS -->
        <!--<link href="<?php echo base_url()?>assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">-->        
        
        <!-- Dashboard menu -->
        <link href="<?php echo base_url()?>assets/css/pages/dashboard1.css" rel="stylesheet">        
        
        <!-- Theme colors -->
        <link href="<?php echo base_url()?>assets/css/colors/default.css" id="theme" rel="stylesheet">        
        
        <!-- Wizzard -->
        <link href="<?php echo base_url()?>assets/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/wizard.css">
        
        <!-- My CSS -->
        <link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/mycss.css"> 

        <script type="text/javascript">
            var base_url = "<?php echo base_url()?>";
            var module = "visibility";
            var person_profile = <?php echo $person_profile_datas;?>;         
        </script>
    </head>

    <body class="fix-header fix-sidebar card-no-border">
        
        <div id="main-wrapper">            
            <?php echo $lateral_menu;?>
        </div>    
        
        <!-- Page wrapper  -->
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
                        
                        <!-- PAINEL BY STATUS verify_account--> 
                        <?php if ($painel_verify_account) echo $painel_verify_account;?>
                        
                        <!-- PAINEL BY STATUS blocked_by_payment-->
                        <?php if ($painel_blocked_by_payment) echo $painel_blocked_by_payment;;?>
                        
                        <!-- PAINEL BY STATUS pending-->
                        <?php if ($painel_pending) echo $painel_pending;?>
                        
                        <!-- PAINEL BY STATUS blocked_by_insta-->
                        <?php if ($painel_blocked_by_insta) echo $painel_blocked_by_insta;?>

                        <!-- PERSON PROFILE DATAS -->
                        <?php echo $painel_person_profile;?>

                        <!-- STATISTICS -->
                        <?php echo $painel_statistics;?>
                        
                        <!-- REFERENCE PROFILES -->
                        <?php echo $painel_reference_profiles;?>                        
                        
                        <!-- AUTO LIKE AND UNFOLLOW TOTAL -->
                        <?php echo $configuration;?>
                        
                        <!-- BLACK AND WHITE LIST PROFILES -->
                        <?php echo $black_and_white_list;?>
                        
                    </div>
                </div>
                
                <?php echo $modals?>

                <footer class="footer text-center">
                    DOORIG - TODOS OS DIREITOS RESERVADOS
                </footer>
            </div>
        </div>        
        <!-- End Wrapper -->
        
        <script src="<?php echo base_url()?>assets/node_modules/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/waves.js"></script>
        <script src="<?php echo base_url()?>assets/js/sidebarmenu.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/custom.min.js"></script>
        
        <!-- This page plugins -->
        
        <!--morris JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/morrisjs/morris.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/morris-data.js"></script>
        
        <!--c3 JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/d3/d3.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/c3-master/c3.min.js"></script>
        <!-- Popup message jquery -->
        <script src="<?php echo base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
        <!-- Chart JS -->
        <script src="<?php echo base_url()?>assets/js/dashboard1.js"></script>
        <!-- Style switcher -->
        <script src="<?php echo base_url()?>assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>        
                
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>        
        <script src="<?php echo $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL?>../assets/js/jquery.mask.js"></script>
        
        <!-- system scripts -->
        <script src="<?php echo base_url()?>assets/js/visibility/PT/internalization.js"></script>
        
        <script src="<?php echo $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL?>../assets/js/dashboard/mask.js"></script>
        <script src="<?php echo $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL?>../assets/js/dashboard/basics.js"></script>
        <script src="<?php echo $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL?>../assets/js/dashboard/dasboard.js"></script>
        
        <script src="<?php echo base_url()?>assets/js/visibility/visibility_client.js"></script>
        
    </body>
</html>