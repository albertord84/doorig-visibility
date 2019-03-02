<!-- STATISTICS -->
<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="col-md-12">
                <div class="text-right">
                    <a href="#">Saiva mais <i class="far fa-question-circle"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title text-center">
                        <h2 style="color:red">PERFIL OU SENHA INCORRETOS!!</h2>
                        <span class="border"></span>
                    </div>
                </div>                                        
            </div>            
            
            <section class="verify-account-steep1 text-right">
                <div class="row" >
                    <div class="col-md-1"></div>
                    <div class="col-md-10" style="min-height:70px;background-color:#FAFAFA; border:1px solid #E6E6E6; margin-top:10px; padding: 15px">
                        <div class="row" >                                
                            <div class="col-md-1"></div>
                            <div class="col-md-10"> 
                                <h3 class="text-center">Informe novamente as credenciais da sua marca:</h3>
                                <form id="container-update-mark-credentials" class="text-left m-t-20">
                                    <div class="form-group">
                                        <label>Perfil da sua marca:</label>
                                        <input id="login_profile" type="text" onkeyup="search_match_profile('#login_profile','#table_search_profile');" class="form-control to-lower-case" >
                                        <div id="container_search_profile" class="col-md-12 col-sm-12 col-xs-12 text-center " style="max-height: 230px; overflow-y: auto; overflow-x: hidden;">                            
                                            <table id="table_search_profile" class="table">                                
                                            </table>
                                        </div>                                                                
                                    </div>
                                    <div class="form-group">
                                        <label>Senha:</label>
                                        <input id="password" type="password" class="form-control" id="firstName1"> 
                                    </div>
                                    <div class="form-group">
                                        <label>Confirmar senha:</label>
                                        <input id="password-rep" type="password" class="form-control" id="firstName1"> 
                                    </div>
                                </form> 
                            </div>
                            <div class="col-md-1 text-center"></div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>                    
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group text-right" style="margin-top:40px">
                            <button id="btn-update-mark-credentials" type="button" class="btn btn-info" style="padding:10px 30px 10px 30px">
                                <i class="fa fa-spinner fa-spin myspinner"></i>
                                Enviar
                            </button>                                                                    
                        </div>
                    </div>
                    <div class="col-md-2"></div>                                                                
                </div>
            </section> 

        </div>
    </div>
</div>
