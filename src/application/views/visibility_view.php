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
        
        <script type="text/javascript">
            var base_url = "<?php echo base_url()?>";
            var module = "visibility";
        </script>
    </head>

    <body class="fix-header fix-sidebar card-no-border">
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">DOORIG</p>
            </div>
        </div>
        <!-- Main wrapper -->
        <div id="main-wrapper">
            <?php echo $lateral_menu;?>
        </div>    
            
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-8 align-self-center">
                        <!--<h3 class="text-themecolor">Aumente sua visibilidade no Instagram!</h3>-->
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
                                                    <h2>Veja mais no video</h2>
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
                                                                <label for="firstName1">Perfil da sua marca:</label>
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
                                                                <div id="midle_plane" class="table-block text-center" >                                                                        
                                                                    <div class="table-det">
                                                                        <h2 style="font-size:2em"><span>$R </span>20.45</h2>
                                                                        <h3>Médio</h3>
                                                                        <ul>
                                                                            <li>Perfis de Referência</li>
                                                                            <li>Like First</li>
                                                                        </ul>
                                                                        <!--<div class="button">
                                                                            <a class="thm-btn bg-clr3" href="#">Get Service</a>
                                                                        </div>-->
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input">
                                                                            <span class="custom-control-label ml-0">1 star</span> 
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                                <div id="fast_plane" class="table-block text-center active">                                                                        
                                                                    <div class="table-det">
                                                                        <h2 style="font-size:2em"><span>$R </span>38.12</h2>
                                                                        <h3>Rápido</h3>
                                                                        <ul>
                                                                            <li>Perfis de Referência</li>
                                                                            <li>Geolocalização</li>
                                                                            <li>Like First</li>
                                                                        </ul>
                                                                        <!--<div class="button">
                                                                            <a class="thm-btn bg-clr3" href="#">Get Service</a>
                                                                        </div>-->
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input">
                                                                            <span class="custom-control-label ml-0">1 star</span> 
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                                <div  class="table-block text-center">                                                                        
                                                                    <div id="very_fast_plane" class="table-det">
                                                                        <h2 style="font-size:2em"><span>$R </span>55.00</h2>
                                                                        <h3>Ultra rápido</h3>
                                                                        <ul>
                                                                            <li>Perfis de Referência</li>
                                                                            <li>Geolocalização</li>
                                                                            <li>Hashtag</li>
                                                                            <li>Like First</li>
                                                                        </ul>
                                                                        <!--<div class="button">
                                                                            <a class="thm-btn bg-clr3" href="#">Get Service</a>
                                                                        </div>-->
                                                                        <label class="inline custom-control custom-checkbox block">
                                                                            <input type="checkbox" class="custom-control-input">
                                                                            <span class="custom-control-label ml-0">1 star</span> 
                                                                        </label>
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
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8">
                                                            <label for="int1">Insira pelo menos um Perfil de Referência:</label>
                                                            <div class="input-group">
                                                                <input id="cep" type="text" class="form-control" placeholder="Perfil de referência *" required="required" data-validation-required-message="CEP inválido.">
<!--                                                                    <div class="input-group-append">
                                                                    <button id="verify_cep" style="height: 38px" title="Adicionar" class="btn btn-outline-secondary" type="button"><i class="fas fa-plus"></i></button>
                                                                </div>-->
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
                                                                                <button class="profile-delete close" type="button" title="Fechar"><span aria-hidden="true">&times;</span></button> 
                                                                                <br>
                                                                                <div class="text-center">
                                                                                    <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/e3e5009d310027e1344a6ef66285c867/5CDAF899/t51.2885-19/s150x150/47694626_1984680308492965_2263875741303177216_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                                    <h5 class="card-title">
                                                                                        @<a id="name-profile" href="https://www.instagram.com/leticiajural/" target="_blank">
                                                                                            leticiajural
                                                                                        </a>
                                                                                    </h5>                                                                                    
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
                                                                                <button class="profile-delete close" type="button" title="Fechar"><span aria-hidden="true">&times;</span></button> 
                                                                                <br>
                                                                                <div class="text-center">
                                                                                    <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/581e26f0c737200838ab7d63cd5f710c/5CE31862/t51.2885-19/s150x150/16110336_541368592676753_1487422431021760512_a.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                                    <h5 class="card-title">
                                                                                        @<a id="name-profile" href="https://www.instagram.com/desainemarmores/" target="_blank">
                                                                                            desainemarmores
                                                                                        </a>
                                                                                    </h5>                                                                                    
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
                                                                                <button class="profile-delete close" type="button" title="Fechar"><span aria-hidden="true">&times;</span></button> 
                                                                                <br>
                                                                                <div class="text-center">
                                                                                    <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/e3e5009d310027e1344a6ef66285c867/5CDAF899/t51.2885-19/s150x150/47694626_1984680308492965_2263875741303177216_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                                    <h5 class="card-title">
                                                                                        <a id="name-profile" href="https://www.instagram.com/leticiajural/" target="_blank">
                                                                                            @leticiajural
                                                                                        </a>
                                                                                    </h5>                                                                                    
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
                                                                                <button class="profile-delete close" type="button" title="Fechar"><span aria-hidden="true">&times;</span></button> 
                                                                                <br>
                                                                                <div class="text-center">
                                                                                    <img class="img-profile" src="https://instagram.fsdu8-1.fna.fbcdn.net/vp/e3e5009d310027e1344a6ef66285c867/5CDAF899/t51.2885-19/s150x150/47694626_1984680308492965_2263875741303177216_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net">
                                                                                    <h5 class="card-title">
                                                                                        <a id="name-profile" href="https://www.instagram.com/leticiajural/" target="_blank">
                                                                                            @leticiajural
                                                                                        </a>
                                                                                    </h5>                                                                                    
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
                                                </section>
                                            <!-- Step 4 -->
<!--                                                <h6>Finalizar</h6>
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
                                                                        <input type="checkbox" class="custom-control-input">
                                                                        <span class="custom-control-label ml-0">1 star</span> 
                                                                    </label>
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
                                                </section>-->
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
                                                        <h2 ><span>$</span>20.45</h2>
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
                                                        <h2 ><span>$</span>38.12</h2>
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
                                                        <h2 ><span>$</span>55.00</h2>
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
        <script type="text/javascript">$('#slimtest1, #slimtest2, #slimtest3, #slimtest4').perfectScrollbar();</script>        
        <!--Wizard JavaScript -->
        <script src="<?php echo base_url()?>assets/node_modules/moment/min/moment.min.html"></script>
        <script src="<?php echo base_url()?>assets/node_modules/wizard/jquery.steps.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/wizard/jquery.validate.min.js"></script>
        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url()?>assets/node_modules/sweetalert/sweetalert.min.js"></script>
        <script src="<?php echo base_url()?>assets/node_modules/wizard/steps.js"></script>
        
        <!-- system scripts -->
        <script src="<?php echo base_url()?>assets/js/dashboard/talkme_painel_dashboard.js"></script>
        <script src="<?php echo base_url()?>assets/js/dashboard/basics.js"></script>
        <script src="<?php echo base_url()?>assets/js/dashboard/dasboard.js"></script>
        
        <script src="<?php echo base_url()?>assets/js/visibility.js"></script>
        
        
        
    </body>
</html>