$(document).ready(function () {   
    
    var alt = "300px";
    var plane = "fast";       
    $('#midle_plane').height(alt);
    $('#fast_plane').height(alt);
    $('#very_fast_plane').height(alt);  
    $("#fast_plane_radio").attr('checked', true);
    
    $('#btn-contract-steep-1').click(function(){        
        var profile = validate_element("#login_profile",ig_profile_regular_expression);
        var password = validate_not_empty("#password");
        var password_rep = validate_equals("#password","#password-rep");
        selected_profile = true;
        if(!selected_profile)
            modal_alert_message("Deve selecionar um perfil válido");
        else
        if(!profile || !password)
            modal_alert_message("Alguns dados incorretos, confira.");
        else
            if(!password_rep)
                modal_alert_message("As senhas não coincidem");
            else{
                var btn =this; spinner_start(btn);
                $.ajax({
                    url : base_url+'index.php/welcome/contract_visibility_steep_1',
                    data :{
                        "insta_name":$("#login_profile").val(),
                        //"insta_id":selected_profile['user']['pk'],
                        "password":$("#password").val(),
                        "passwordrep":$("#password-rep").val(),
                    },
                    type : 'POST',
                    dataType : 'json',
                    success : function(response){
                        spinner_stop(btn);
                        if(response.code===0){                            
                            $('.sigin-painel-steep-1').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                            $('.sigin-painel-steep-2').css({'display':'block','visibility': 'visible', 'opacity': '1'});                                        
                        } else
                            modal_alert_message(response.message);                    
                    },
                    error : function(xhr, status) {
                        spinner_stop(btn);
                        modal_alert_message('Erro enviando dados, tente depois...');                    
                    }
                });  
            }
    });
    
    $('#btn-contract-steep-2').click(function(){        
        var btn =this; spinner_start(btn);
        $.ajax({
            url : base_url+'index.php/welcome/contract_visibility_steep_2',
            data :{
                "plane":plane
            },
            type : 'POST',
            dataType : 'json',
            success : function(response){
                spinner_stop(btn);
                if(response.code===0){
                    $(location).attr('href', base_url+"index.php/welcome/index/");                    
                } else
                    modal_alert_message(response.message);                    
            },
            error : function(xhr, status) {
                spinner_stop(btn);
                modal_alert_message('Erro enviando dados, tente depois...');                    
            }
        });
    });
    
//    $('#btn-contract-steep-3').click(function(){
//        var btn =this; spinner_start(btn);
//        $.ajax({
//            url : base_url+'index.php/welcome/contract_visibility_steep_3',
//            data :{},
//            type : 'POST',
//            dataType : 'json',
//            success : function(response){
//                spinner_stop(btn);
//                if(response.code===0){
//                    $(location).attr('href', base_url+"/index.php/welcome/client/");
//                } else
//                    modal_alert_message(response.message);                    
//            },
//            error : function(xhr, status) {
//                spinner_stop(btn);
//                modal_alert_message('Erro enviando dados, tente depois...');                    
//            }
//        });
//    });
    
    $("#midle_plane_radio").click(function(){
        $("#midle_plane").addClass("active");
        $("#fast_plane").removeClass("active");
        $("#very_fast_plane").removeClass("active");
        plane = "midle";
    });
    
    $("#fast_plane_radio").click(function(){
        $("#midle_plane").removeClass("active");
        $("#fast_plane").addClass("active");
        $("#very_fast_plane").removeClass("active");
        plane = "fast";
    });
    
    $("#very_fast_plane_radio").click(function(){
        $("#midle_plane").removeClass("active");
        $("#fast_plane").removeClass("active");
        $("#very_fast_plane").addClass("active");
        plane = "very_fast";
    });
    
    }); 

    