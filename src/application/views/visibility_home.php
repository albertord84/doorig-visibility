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
        <link href="<?php echo base_url()?>assets/css/style.css"<?php echo '?'.$SCRIPT_VERSION;?> rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/style-doorig.css"<?php echo '?'.$SCRIPT_VERSION;?> rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/pages/pricing-page.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/timeline.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/node_modules/wizard/steps.css" rel="stylesheet">
        <!--alerts CSS -->
        <link href="<?php echo base_url()?>assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">        
        <!-- Dashboard 1 Page CSS -->
        <link href="<?php echo base_url()?>assets/css/pages/dashboard1.css" rel="stylesheet">        
        <!-- You can change the theme colors from here -->
        <link href="<?php echo base_url()?>assets/css/colors/default.css" id="theme" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/mycss.css"<?php echo '?'.$SCRIPT_VERSION;?>> 
        <link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/wizard.css"> 
        
        <script type="text/javascript">
            var base_url = "<?php echo base_url()?>";
            var module = "visibility";
        </script>        
        
    </head>

    <body class="fix-header fix-sidebar card-no-border">
        
        <div id="main-wrapper">
            <?php echo $lateral_menu;?>
        </div>    
            
        <div class="page-wrapper">            
            <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-8 align-self-center">
                        <!--<h3 class="text-themecolor">Aumente sua visibilidade no Instagram!</h3>-->
<!--                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Mais visibilidade</li>
                        </ol>-->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="row card-body">
                                <div class="col-md-8">
                                    <h1>VISIBILIDADE</h1>                                    
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="#contract-now">
                                        <button class="btn btn-info">Contratar agora <i class="fas fa-user-plus"></i></button>
                                    </a>                                    
                                </div>
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
                                                    <h2>Veja mais no video</h2>
                                                    <span class="border"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="left-content-area text-center">
                                                    <div class="img-wrapper">
                                                        <img src="<?php echo $GLOBALS["sistem_config"]->BASE_SITE_URL?>../assets/images/video-sec/video-img.jpg" alt="clients story">
                                                        <div class="hover">
                                                            <a  class="video-play video-play-btn" target="_self">
                                                                <i class="fas fa-play-circle"></i>
                                                            </a>
                                                            <!--<a href="https://youtu.be/Eo2Lr1trSKs" class="video-play video-play-btn" target="_self"><i class="flaticon-music-player-play"></i></a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                        
                        <A name="contract-now"></A>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="col-md-12">
                                            <div class="sec-title text-center">
                                                <h2>Contratar agora</h2>
                                                <span class="border"></span>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-12">                                                
                                            <!-- Steep 1 -->
                                                <section class="sigin-painel-steep-1" style="display:block;">
                                                    <!-- Wizzard 1 -->
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">                                                            
                                                            <div class="stepwizard" style="width: 100%">
                                                                <div class="stepwizard-row setup-panel">
                                                                    <div class="stepwizard-step">
                                                                        <a href="#step-1" type="button" class="btn btn-info btn-circle">1</a>
                                                                    </div>
                                                                    <div class="stepwizard-step">
                                                                        <a href="#step-2" type="button" class="btn btn-secondary btn-circle" disabled="disabled">2</a>
                                                                    </div>
                                                                    <!--<div class="stepwizard-step">
                                                                        <a href="#step-3" type="button" class="btn btn-secondary btn-circle" disabled="disabled">3</a>
                                                                    </div> -->                                                                   
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <!-- Form 1 -->
                                                    <div class="row" >
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10" style="min-height:70px;background-color:#FAFAFA; border:1px solid #E6E6E6; margin-top:10px; padding: 15px">
                                                            <div class="row" >
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-10"> 
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <label>Perfil de Instagram da sua marca:</label>
                                                                            <input id="login_profile" type="text" onkeyup="search_match_profile('#login_profile','#table_search_profile');" class="form-control to-lower-case" >
                                                                            <div id="container_search_profile" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                                                <table id="table_search_profile" class="table">                                
                                                                                </table>
                                                                            </div>                                                                
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Senha de Instagram da sua marca:</label>
                                                                            <input id="password" type="password" class="form-control" id="firstName1"> 
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Confirmar a senha:</label>
                                                                            <input id="password-rep" type="password" class="form-control" id="firstName1"> 
                                                                        </div>
                                                                    </form>                                                                    
                                                                </div>
                                                                <div class="col-md-1"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                            <div class="form-group text-right" style="margin-top:40px">
                                                                <button id="btn-contract-steep-1" type="button" class="btn btn-info" style="padding:10px 30px 10px 30px">
                                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                                    Seguinte
                                                                </button>                                                                    
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>                                                                
                                                    </div>
                                                </section> 
                                               
                                            <!-- Steep 2 -->                                                
                                                <section class="sigin-painel-steep-2" style="display:none;">
                                                    <!-- Wizzard 2 -->
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                            <div class="stepwizard" style="width: 100%">
                                                                <div class="stepwizard-row setup-panel">
                                                                    <div class="stepwizard-step">
                                                                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                                                    </div>
                                                                    <div class="stepwizard-step">
                                                                        <a href="#step-2" type="button" class="btn btn-info btn-circle">2</a>
                                                                    </div>
                                                                    <!--<div class="stepwizard-step">
                                                                        <a href="#step-3" type="button" class="btn btn-secondary btn-circle" disabled="disabled">3</a>
                                                                    </div>-->
                                                                </div>
                                                                <br>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-2"></div>                                                        
                                                    </div>
                                                    <!-- Form 2 -->
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10" >
                                                                <div class="row price-table" style="min-height:70px;background-color:#FAFAFA; border:1px solid #E6E6E6; margin-top:10px; padding: 15px">
                                                                    
<!--                                                                    <div class="col-md-4">
                                                                        <div id="midle_plane" class="table-block text-center" >                                                                        
                                                                            <div class="table-det">
                                                                                <img src="<?php echo base_url()?>assets/images/icon/midle.png" width="70%">
                                                                                <h4>Médio</h4>
                                                                                <h2 style="font-size:1.5em;"><span>$R </span><?php echo number_format((float)$planes[0]->normal_val/100, 2, ',', '.');?></h2>
                                                                                <ul>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Perfis de Referência</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Geolocalização</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Hashtag</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Like First</li>
                                                                                </ul>
                                                                                <br><br>
                                                                                <label class="inline custom-control custom-checkbox block">
                                                                                    <input id="midle_plane_radio" type="radio" name="select_plane" class="custom-control-input">
                                                                                    <span class="custom-control-label ml-0"></span> 
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div id="fast_plane" class="table-block text-center active">                                                                        
                                                                            <div class="table-det">
                                                                                <img src="<?php echo base_url()?>assets/images/icon/fast.png" width="70%">
                                                                                <h4>Rápido</h4>
                                                                                <h2 style="font-size:1.5em;"><span>$R </span><?php echo number_format((float)$planes[1]->normal_val/100, 2, ',', '.');?></h2>
                                                                                <ul>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Perfis de Referência</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Geolocalização</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Hashtag</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Like First</li>
                                                                                </ul>
                                                                                <br>
                                                                                <label class="inline custom-control custom-checkbox block" style="margin-bottom:10px">
                                                                                    <input id="fast_plane_radio" type="radio" name="select_plane" class="custom-control-input">
                                                                                    <span class="custom-control-label ml-0"></span> 
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>-->
                                                                    
                                                                    
                                                                    
                                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                                        <div id="midle_plane" class="table-block text-center" >                                                                        
                                                                            <div id="midle_plane" class="table-det" >
                                                                                <img src="<?php echo base_url()?>assets/images/icon/midle.png" width="70%">
                                                                                <h4 style="">Médio</h4>
                                                                                <h2 style="font-size:1.5em;"><span>$R </span><?php echo number_format((float)$planes[0]->normal_val/100, 2, ',', '.');?></h2>
                                                                                <ul>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Perfis de Referência</li>
<!--                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Geolocalização</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Hashtag</li>-->
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Like First</li>
                                                                                </ul>
                                                                                <label class="inline custom-control custom-checkbox block" style="margin-top:85px;">
                                                                                    <input id="midle_plane_radio" type="radio" name="select_plane" class="custom-control-input">
                                                                                    <span class="custom-control-label ml-0"></span> 
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                                        <div id="fast_plane" class="table-block text-center">                                                                        
                                                                            <div id="fast_plane" class="table-det">
                                                                                <img src="<?php echo base_url()?>assets/images/icon/fast.png" width="70%">
                                                                                <h4 style="">Rápido</h4>
                                                                                <h2 style="font-size:1.5em;"><span>$R </span><?php echo number_format((float)$planes[1]->normal_val/100, 2, ',', '.');?></h2>
                                                                                <ul>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Perfis de Referência</li>
                                                                                    <!--<li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Geolocalização</li>-->
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Hashtag</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Like First</li>
                                                                                </ul>
                                                                                <label class="inline custom-control custom-checkbox block" style="margin-top:50px">
                                                                                    <input id="fast_plane_radio" type="radio" name="select_plane" class="custom-control-input">
                                                                                    <span class="custom-control-label ml-0"></span> 
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                                                        <div id="very_fast_plane" class="table-block text-center">                                                                        
                                                                            <div id="very_fast_plane" class="table-det">
                                                                                <img src="<?php echo base_url()?>assets/images/icon/very fast.png" width="70%">
                                                                                <h4 style="">Ultra rápido</h4>
                                                                                <h2 style="font-size:1.5em;"><span>$R </span><?php echo number_format((float)$planes[2]->normal_val/100, 2, ',', '.');?></h2>
                                                                                <ul>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Perfis de Referência</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Geolocalização</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Hashtag</li>
                                                                                    <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Like First</li>
                                                                                </ul>
                                                                                <label class="inline custom-control custom-checkbox block" style="margin-bottom:10px">
                                                                                    <input id="very_fast_plane_radio" type="radio" name="select_plane" class="custom-control-input">
                                                                                    <span class="custom-control-label ml-0"></span> 
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <div class="row">
                                                                    <div class="col-md-2"></div>
                                                                    <div class="col-md-8 text-right" style="margin-top:40px">
                                                                        <button id="btn-contract-steep-2" type="button" class="btn btn-info" style="padding:10px 30px 10px 30px">
                                                                            <i class="fa fa-spinner fa-spin myspinner"></i>
                                                                            Finalizar
                                                                        </button>                                                                    
                                                                    </div>
                                                                    <div class="col-md-2"></div>
                                                                </div> 
                                                            </div>    
                                                            <div class="col-md-1"></div>
                                                        </div> 
                                                    </form>
                                                </section>
                                                                
                                            <!-- Steep 3 -->         
                                                <!--<section class="sigin-painel-steep-3" style="display:none;">-->
                                                    <!-- Wizzard 3 -->
                                                    <!--<div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                            <div class="stepwizard" style="width: 100%">
                                                                <div class="stepwizard-row setup-panel">
                                                                    <div class="stepwizard-step">
                                                                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                                                    </div>
                                                                    <div class="stepwizard-step">
                                                                        <a href="#step-2" type="button" class="btn btn-success btn-circle">2</a>
                                                                    </div>
                                                                    <div class="stepwizard-step">
                                                                        <a href="#step-3" type="button" class="btn btn-info btn-circle">3</a>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>                                                            
                                                        </div>
                                                        <div class="col-md-2"></div>                                                        
                                                    </div>-->
                                                    <!-- Form 3 -->
                                                    <!--<div id="container-add-reference-profile">
                                                        <div class="row">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-8">
                                                                <label for="int1">Insira pelo menos um Perfil de Referência:</label>
                                                                <div class="input-group">
                                                                    <input id="login-reference-profile" type="text" onkeyup="search_match_profile('#login-reference-profile','#table-search-reference-profile');" class="form-control to-lower-case">
                                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                                    <button id="add-reference-profile" type="button" class="btn btn-info" style="margin-left:4px;max-height:38px">
                                                                        Adicionar
                                                                        <i class="fa fa-plus-circle"></i> 
                                                                    </button>
                                                                    <div id="container-search-reference-profile" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                                        <table id="table-search-reference-profile" class="table">                                
                                                                        </table>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">
                                                                <div class="container container-profiles">
                                                                    <div id="container-reference-profiles" class="row">
                                                                        
                                                                    </div>                                                                    
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2"></div>
                                                                    <div class="col-md-8 text-right" style="margin-top:40px">
                                                                        <button id="btn-contract-steep-3" type="button" class="btn btn-info" style="padding:10px 30px 10px 30px">
                                                                            <i class="fa fa-spinner fa-spin myspinner"></i>
                                                                            Finalizar
                                                                        </button>                                                                    
                                                                    </div>
                                                                    <div class="col-md-2"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div> 
                                                    </div>-->
                                                <!--</section>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php echo $modals?>

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
        <script type="text/javascript">$('#slimtest1, #slimtest2, #slimtest3, #slimtest4').perfectScrollbar();</script>        
        
        
        <!-- system scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="<?php echo base_url()?>assets/js/visibility/PT/internalization.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
        
        <script src="<?php echo $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL?>../assets/js/dashboard/mask.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
        <script src="<?php echo $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL?>../assets/js/dashboard/basics.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
        <script src="<?php echo $GLOBALS["sistem_config"]->DASHBOARD_SITE_URL?>../assets/js/dashboard/dasboard.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>       
        
        <script src="<?php echo base_url()?>assets/js/visibility/insta_interaction_commands.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
        <script src="<?php echo base_url()?>assets/js/visibility/visibility_home.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
        
    </body>
</html>