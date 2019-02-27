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
                
        <!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">-->
        <link href="<?php echo base_url()?>assets/css/bootstrap-toggle.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/mycss.css"> 
        
        <script type="text/javascript">
            var base_url = "<?php echo base_url()?>";
            var module = "visibility";
        </script>
    </head>

    <body class="fix-header fix-sidebar card-no-border">
<!--        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">DOORIG</p>
            </div>
        </div>-->
        <!-- Main wrapper -->
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
                                            
                                            <div class=" m-top-20">                                                
                                                <input id="activate-account" type="checkbox" checked data-toggle="toggle" data-on="<i class='fa fa-play'></i> Play" data-off="<i class='fa fa-pause'></i> Pause">                                              
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
                                                                        <p class="soc-header box-twitter">TOTAL <br>SEGUIDOS</p>
                                                                        <div class="soc-content">
                                                                            <div class="col-12 b-r">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">perfis</h5>
                                                                            </div>                                                                            
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
                                                                            <div class="col-12 b-r">
                                                                                <h3 class="font-medium">456</h3>
                                                                                <h5 class="text-muted">perfis</h5>
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
                                        <div class="col-md-7 col-sm-8 col-xs-12">                                            
                                            <div class="row">
                                                <!-- Column -->
                                                <div class="col-lg-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h3>Histórico</h3>
                                                            <div class="row">
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
                                        <!-- REFERENCE PROFILE DETAILS -->
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <a href="#">Saiva mais <i class="far fa-question-circle"></i></a>
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
                                        <!-- ADD REFERENCE PROFILE BUTTON -->
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <label for="int1">Novo Perfil de Referência:</label>
                                                <div class="input-group" id="container-add-reference-profile">
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
                                                        <!-- PROFILES HERE AS A col-md-4 ELEMENT ADDED OR LOADED IN REAL TIME -->
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
                                                <a href="#">Saiva mais <i class="far fa-question-circle"></i></a>
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
                                                <h4 class="text-muted"><span id="amount-reference-profile-used">21</span> Geolocalizações usadas</h4>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <h4 class="text-muted"><span id="amount-profile-followed">21256</span> Perfis seguidos </h4>
                                            </div>
                                            <div class="col-md-2 text-left"></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <label for="int1">Nova Geolocalização:</label>
                                                <div class="input-group" id="container-add-geolocalização">
                                                    <input id="login-geolocation" type="text" onkeyup="search_match_geolocation('#login-geolocation','#table-search-geolocation');" class="form-control to-lower-case">
                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                    <button id="add-geolocation" type="button" class="btn btn-info" style="margin-left:4px;max-height:38px">
                                                        Adicionar
                                                        <i class="fa fa-plus-circle"></i>
                                                    </button>
                                                    <div id="container-search-geolocation" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                        <table id="table-search-geolocation" class="table">                                
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
                                                    <div id="container-geolocations" class="row">
                                                        <!-- GEOLOCATIONS HERE AS A col-md-4 ELEMENT ADDED OR LOADED IN REAL TIME -->
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
                                                <a href="#">Saiva mais <i class="far fa-question-circle"></i></a>
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
                                                <label for="int1">Novo Hashtag:</label>
                                                <div class="input-group" id="container-add-hashtag">
                                                    <input id="login-hashtag" type="text" onkeyup="search_match_hashtag('#login-hashtag','#table-search-hashtag');" class="form-control to-lower-case">
                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                    <button id="add-hashtag" type="button" class="btn btn-info" style="margin-left:4px;max-height:38px">
                                                        Adicionar
                                                        <i class="fa fa-plus-circle"></i>
                                                    </button>
                                                    <div id="container-search-hashtag" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                        <table id="table-search-hashtag" class="table">                                
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
                                                    <div id="container-hashtags" class="row">
                                                        <!-- HASHTAGS HERE AS A col-md-4 ELEMENT ADDED OR LOADED IN REAL TIME -->
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
                                                <a href="#">Saiva mais <i class="far fa-question-circle"></i></a>
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
                                                <div class="input-group" id="container-add-profile-wl">
                                                    <input id="login-profile-wl" type="text" onkeyup="search_match_profile_wl('#login-profile-wl','#table-search-profile-wl');" class="form-control to-lower-case">
                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                    <button id="add-profile-wl" type="button" class="btn btn-info" style="margin-left:4px;max-height:38px">
                                                        Adicionar
                                                        <i class="fa fa-plus-circle"></i>
                                                    </button>
                                                    <div id="container-search-profile-wl" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                        <table id="table-search-profile-wl" class="table">                                
                                                        </table>
                                                    </div> 
                                                </div>
                                                <div class="card-over-card">
                                                    <div class="card-body">
                                                        <div class="message-box">
                                                            <div id="" class="message-widget message-scroll">
                                                                <div id="container-profile-wl">
                                                                    <!-- PROFILES OF WHITE LIST HERE -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-5">
                                                <h2 class="text-muted pd-10 text-center"> Nunca seguir</h2>                                                
                                                <div class="input-group" id="container-add-profile-bl">
                                                    <input id="login-profile-bl" type="text" onkeyup="search_match_profile_wl('#login-profile-bl','#table-search-profile-bl');" class="form-control to-lower-case">
                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                    <button id="add-profile-bl" type="button" class="btn btn-info" style="margin-left:4px;max-height:38px">
                                                        Adicionar
                                                        <i class="fa fa-plus-circle"></i>
                                                    </button>
                                                    <div id="container-search-profile-bl" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                                        <table id="table-search-profile-bl" class="table">                                
                                                        </table>
                                                    </div> 
                                                </div>
                                                <div class="card-over-card">
                                                    <div class="card-body">
                                                        <div class="message-box">
                                                            <div id="" class="message-widget message-scroll">
                                                                <div id="container-profile-bl">
                                                                    <!--PROFILES OF BLACK LIST HERE -->
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
                
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>        
        
        <!-- system scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="<?php echo base_url()?>assets/js/visibility/PT/internalization.js"></script>
        <script src="<?php echo base_url()?>assets/js/visibility/mask.js"></script>
        <script src="<?php echo base_url()?>assets/js/visibility/basics.js"></script>
        <script src="<?php echo base_url()?>assets/js/visibility/dasboard.js"></script>
        <script src="<?php echo base_url()?>assets/js/visibility/visibility_client.js"></script>
        
    </body>
</html>