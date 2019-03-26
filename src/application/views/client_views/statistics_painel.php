<!-- STATISTICS -->
<div class="card">
    <div class="card-body">
        <div class="container sensitive_painel">
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
                                                <p class="soc-header box-twitter">INÍCIO <br> <span id="init_date"></span></p>
                                                <div class="soc-content">
                                                    <div class="col-6 b-r">
                                                        <h3 id="insta_followers_ini" class="font-medium"></h3>
                                                        <h6 class="text-muted">Seguidores</h6></div>
                                                    <div class="col-6">
                                                        <h3 id="insta_following_ini" class="font-medium"></h3>
                                                        <h6 class="text-muted">Seguindo</h6></div>
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
                                                <p id="actual_date" class="soc-header box-twitter">AGORA <br><?php echo date("d/n/Y",time());?></p>
                                                <div class="soc-content">
                                                    <div class="col-6 b-r">
                                                        <h3 id="actual_followers" class="font-medium"></h3>
                                                        <h6 class="text-muted">Seguidores</h6></div>
                                                    <div class="col-6">
                                                        <h3 id="actual_followings" class="font-medium"></h3>
                                                        <h6 class="text-muted">Seguindo</h6></div>
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
                                                        <h3 id="total_followeds" class="font-medium"></h3>
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
                                                        <h3 id="total_gain" class="font-medium"></h3>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center">
                                <h4 class="card-title">Histórico</h4>
                                <div class="ml-auto">
                                    <ul class="list-inline text-right">
<!--                                        <li>
                                            <h5><i class="fa fa-circle m-r-5 text-inverse"></i>iPhone</h5>
                                        </li>-->
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5 text-info"></i>Seguidos</h5>
                                        </li>
                                        <li>
                                            <h5><i class="fa fa-circle m-r-5 text-success"></i>Seguidores</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="morris-area-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>