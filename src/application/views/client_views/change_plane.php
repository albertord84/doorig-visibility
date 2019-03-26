<!-- STATISTICS -->
<div class="card">
    <div class="card-body">
        <div class="container sensitive_painel">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title text-center">
                        <h2>Atualize seu plano</h2>
                        <span class="border"></span>
                    </div>
                </div>                                        
            </div>
            <form>
                <div class="col-md-12" >
                    <div class="row price-table" style="min-height:70px;background-color:#FAFAFA; border:1px solid #E6E6E6; margin-top:10px; padding: 15px">
                        <div class="col-md-4">
                            <div id="midle_plane" class="table-block text-center" >                                                                        
                                <div class="table-det">
                                    <h3 style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Médio</h3>
                                    <h2 style="font-size:1.5em;margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"><span>$R </span><?php echo number_format((float)$planes[0]->normal_val/100, 2, ',', '.');?></h2>
                                    <ul>
                                        <li style="margin-top:4px;margin-bottom:4px;padding-top:4px;padding-bottom:4px;">Perfis de Referência</li>
                                        <li style="margin-top:4px;margin-bottom:4px;padding-top:4px;padding-bottom:4px;">Like First</li>
                                    </ul>
                                    <br><br>
                                    <label class="inline custom-control custom-checkbox block">
                                        <input id="midle_plane_radio" type="radio" name="select_plane" class="custom-control-input">
                                        <span id="contrated_midle_plane" class="custom-control-label ml-0"></span> 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div id="fast_plane" class="table-block text-center active">                                                                        
                                <div class="table-det">
                                    <h3 style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Rápido</h3>
                                    <h2 style="font-size:1.5em;margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"><span>$R </span><?php echo number_format((float)$planes[1]->normal_val/100, 2, ',', '.');?></h2>
                                    <ul>
                                        <li style="margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;">Perfis de Referência</li>
                                        <li style="margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;">Geolocalização</li>
                                        <li style="margin-top:3px;margin-bottom:3px;padding-top:3px;padding-bottom:3px;">Like First</li>
                                    </ul>
                                    <br>
                                    <label class="inline custom-control custom-checkbox block">
                                        <input id="fast_plane_radio" type="radio" name="select_plane" class="custom-control-input">
                                        <span id="contrated_fast_plane" class="custom-control-label ml-0"></span> 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div id="very_fast_plane" class="table-block text-center">                                                                        
                                <div id="very_fast_plane" class="table-det">
                                    <h3 style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Ultra rápido</h3>
                                    <h2 style="font-size:1.5em;margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;"><span>$R </span><?php echo number_format((float)$planes[2]->normal_val/100, 2, ',', '.');?></h2>
                                    <ul>
                                        <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Perfis de Referência</li>
                                        <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Geolocalização</li>
                                        <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Hashtag</li>
                                        <li style="margin-top:2px;margin-bottom:2px;padding-top:2px;padding-bottom:2px;">Like First</li>
                                    </ul>
                                    <label class="inline custom-control custom-checkbox block" style="margin-bottom:10px">
                                        <input id="very_fast_plane_radio" type="radio" name="select_plane" class="custom-control-input">
                                        <span id="contrated_very_fast_plane" class="custom-control-label ml-0"></span> 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 text-right" style="margin-top:40px">
                            <button id="btn-update-plane" type="button" class="btn btn-info" style="padding:10px 30px 10px 30px">
                                <i class="fa fa-spinner fa-spin myspinner"></i>
                                Atualizar
                            </button>                                                                    
                        </div>
                        <div class="col-md-2"></div>
                    </div> 
                </div>    
            </form>
        </div>
    </div>
</div>