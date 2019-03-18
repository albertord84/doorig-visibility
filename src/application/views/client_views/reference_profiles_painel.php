<!-- REFERENCE PROFILES -->
<div class="row">
    <div class="col-12">
        <div class="card sensitive_painel">
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
                        <div class="container card-over-card container-profiles">
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
        <div class="card sensitive_painel">
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
                        <h4 class="text-muted"><span id="amount-geolocations-used">21</span> Geolocalizações usadas</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <h4 class="text-muted"><span id="amount-profile-geolocations-followed">21256</span> Perfis seguidos </h4>
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
                        <div class="container card-over-card  container-profiles">
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
        <div class="card sensitive_painel">
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
                        <h4 class="text-muted"><span id="amount-hashtags-used">21</span> perfis de referência usados</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <h4 class="text-muted"><span id="amount-profile-hashtags-followed">21256</span> perfis seguidos </h4>
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
                        <div class="container card-over-card  container-profiles">
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
