<!-- BLACK AND WHITE LIST -->
<div class="row">
    <div class="col-12">
        <div class="card sensitive_painel">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="#">Saiba mais <i class="far fa-question-circle"></i></a>
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