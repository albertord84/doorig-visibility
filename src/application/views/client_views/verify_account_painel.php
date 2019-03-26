<!-- VERIFY ACCOUNT VIEW -->
<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="col-md-12">
                <div class="text-right">
                    <a href="#">Saiba mais <i class="far fa-question-circle"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title text-center">
                        <h2 style="color:red">VERIFIQUE SUA CONTA!!</h2>
                        <span class="border"></span>
                    </div>
                </div>                                        
            </div>
            
            <!-- Steep 1 -->
            <section class="verify-account-steep1" style="display:block;">
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
                            <div class="col-md-12 text-center"> 
                                <h3>Solicite o código de verificação da sua marca a través de:</h3>
                                <div class="row">
                                    <div class="col-md-6 text-center m-t-30 m-b-30">
                                        <ul>
                                            <li>
                                                <label>Email cadastrado no Instagram</label>                                                
                                            </li>
                                            <li>
                                                <button id="verify-account-by-email" type="button" class="btn btn-info" style="padding:10px 30px 10px 30px">
                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                    Solicitar
                                                </button>                                                  
                                            </li>
                                        </ul>
                                    </div>                                        
                                    <div class="col-md-6 text-center m-t-30 m-b-30">
                                        <ul>
                                            <li>
                                                <label>SMS ao telefone cadastrado no Instagram</label>                                                
                                            </li>
                                            <li>
                                                <button id="verify-account-by-sms" type="button" class="btn btn-info" style="padding:10px 30px 10px 30px">
                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                    Solicitar
                                                </button>                                                  
                                            </li>
                                            
                                        </ul>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>                    
            </section> 

            <!-- Steep 2 -->                                                
            <section class="verify-account-steep2" style="display:none;">
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
                                </div>
                                <br>
                            </div>                                                            
                        </div>
                        <div class="col-md-2"></div>                                                        
                    </div>
                    <!-- Form 2 -->
                    <div class="row" >
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="min-height:70px;background-color:#FAFAFA; border:1px solid #E6E6E6; margin-top:10px; padding: 15px">
                            <div class="row" >                                
                                <div class="col-md-12 text-center"> 
                                    <h3>Insira o código recebido aqui:</h3>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10 m-t-30 m-b-30 text-left">                                            
                                            <label for="int1">Código de verificação:</label>
                                            <div class="input-group text-center" id="container-add-reference-profile">
                                                <input id="input-checkpoint-required-code" type="text" class="form-control" minlength="6" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">
                                                <button id="btn-send-verification-code" type="button" class="btn btn-info" style="margin-left:4px;max-height:38px;padding-left:30px;padding-right:30px ">
                                                    <i class="fa fa-spinner fa-spin myspinner"></i>
                                                    Enviar
                                                </button>                                                
                                            </div>
                                        </div>                                        
                                        <div class="col-md-1"></div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div> 
                </section>            
        </div>
    </div>
</div>