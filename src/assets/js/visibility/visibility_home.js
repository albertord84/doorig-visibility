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
                        "login_profile":$("#login_profile").val(),
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
                    $('.sigin-painel-steep-2').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                    $('.sigin-painel-steep-3').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
                } else
                    modal_alert_message(response.message);                    
            },
            error : function(xhr, status) {
                spinner_stop(btn);
                modal_alert_message('Erro enviando dados, tente depois...');                    
            }
        });
    });
    
    $('#btn-contract-steep-3').click(function(){
        var btn =this; spinner_start(btn);
        $.ajax({
            url : base_url+'index.php/welcome/contract_visibility_steep_3',
            data :{},
            type : 'POST',
            dataType : 'json',
            success : function(response){
                spinner_stop(btn);
                if(response.code===0){
                    $(location).attr('href', base_url+"/index.php/welcome/client/");
                } else
                    modal_alert_message(response.message);                    
            },
            error : function(xhr, status) {
                spinner_stop(btn);
                modal_alert_message('Erro enviando dados, tente depois...');                    
            }
        });
    });
    
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
        plane_id = "very_fast";
    });
    
    $("#container-add-reference-profile").keypress(function (e) {
        if (e.which == 13) {
            $("#add-reference-profile").click();
            return false;
        }
    }); 
    
    $("#add-reference-profile").click(function(){
        //var btn =this; spinner_start(btn);
        profile = validate_element("#login-reference-profile",ig_profile_regular_expression);
        if(profile){
            container = "#container-reference-profiles";
            profile = $("#login-reference-profile").val();
            add_reference_profile(container, profile);
            $("#login-reference-profile").val("");
        }else{
            modal_alert_message("Perfil incorreto, confira");
        }
        //spinner_stop(btn);
    });
    
    function add_reference_profile(container, profile){
        //1. get profile datas of IG
        datas = get_profile_datas(profile); //implemented in ig_iterations.js
        //2. append html-code card to container
        str =   "<div id='container-"+profile+"' class='col-md-4 col-sm-12 col-xs-12'>"+
                    "<div class='card'>"+
                        "<div class='profile card-body card-body-profile'>"+
                            "<button onclick='modal_confirm_message(\"Confirma a eliminação desse item?\", \"delete_reference_profile\", \""+profile+"\");' class='profile-delete close' type='button' title='Fechar'><span aria-hidden='true'>&times;</span></button> "+
                            "<br>"+
                            "<div class='text-center'>"+
                                "<img class='img-profile' src='"+datas["profile_picture_url"]+"'>"+
                                "<h5 class='card-title'>"+
                                    "@<a id='name-profile' href='"+datas["profile_url"]+"' target='_blank'>"+
                                        datas["profile"]+
                                    "</a>"+
                                "</h5>"+
                            "</div>"+
                            "<div class='row'>"+
                                "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0'>"+
                                    "<p class='m-b-0 label-profile'>Posts</p>"+
                                    "<h6 id='amount-post-profile' class='text-muted'>"+datas["post"]+"</h6>"+
                                "</div>"+
                                "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0'>"+
                                    "<p class='m-b-0 label-profile'>Seguidores</p>"+
                                    "<h6 id='amount-folowers-profile' class='text-muted'>"+datas["followers"]+"</h6>"+
                                "</div>"+
                                "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0' >"+
                                    "<p class='m-b-0 label-profile' >Seguindo</p>"+
                                    "<h6 id='amount-following-profile' class='text-muted'>"+datas["following"]+"</h6>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>";
        $(container).append(str);
        
    }
    
    
}); 

    function delete_reference_profile(profile){
        //1. eliminar profile do banco de dados com ajax
        
        //2. en el success del ajax remover el container del profile
        cnt = "#container-"+profile;
        $(cnt).remove();
    }