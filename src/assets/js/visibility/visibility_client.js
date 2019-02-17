$(document).ready(function () {   

    //REFENCE PROFILE FUNCTIONS--------------------------------------------------------------------
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
        var datas = get_profile_datas(profile); //implemented in ig_iterations.js
        //2. append html-code card to container
        var str =   "<div id='container-"+profile+"' class='col-md-4 col-sm-12 col-xs-12'>"+
                    "<div class='card'>"+
                        "<div class='profile card-body card-body-profile'>"+
                            "<button onclick='modal_confirm_message(\"Confirma a eliminação desse perfil de referência?\", \"delete_reference_profile\", \""+profile+"\");' class='profile-delete close' type='button' title='Fechar'><span aria-hidden='true'>&times;</span></button> "+
                            "<br>"+
                            "<div class='text-center'>"+
                                "@<a id='name-profile' href='"+datas["profile_url"]+"' target='_blank'>"+
                                    "<img class='img-profile' src='"+datas["profile_picture_url"]+"'>"+
                                    "<h5 class='card-title'>"+
                                            datas["profile"]+
                                    "</h5>"+
                                "</a>"+
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
    
    
    //GEOLOCATION FUNCTIONS--------------------------------------------------------------------
    $("#container-add-geolocalização").keypress(function (e) {
        if (e.which == 13) {
            $("#add-geolocation").click();
            return false;
        }
    });
    
    $("#add-geolocation").click(function(){
        //var btn =this; spinner_start(btn);
        geolocation = validate_element("#login-geolocation",ig_geolocation_regular_expression);
        if(geolocation){
            container = "#container-geolocations";
            geolocation = $("#login-geolocation").val();
            add_geolocation(container, geolocation);
            $("#login-geolocation").val("");
        }else{
            modal_alert_message("Geolocalização incorreta, confira");
        }
        //spinner_stop(btn);
    });
    
    function add_geolocation(container, geolocation){
        //1. get profile datas of IG
        var datas = get_geolocation_datas(geolocation); //implemented in ig_iterations.js
        //2. append html-code card to container
        var str="<div id='container-"+geolocation+"' class='col-md-4 col-sm-12 col-xs-12'>"+
                "<div class='card'>"+
                    "<div class='geolocation card-body card-body-profile'>"+
                        "<button onclick='modal_confirm_message(\"Confirma a eliminação dessa gelocalização?\", \"delete_geolocation\", \""+geolocation+"\");' class='profile-delete close' type='button' title='Fechar'><span aria-hidden='true'>&times;</span></button> "+
                        "<br>"+
                        "<div class='text-center'>"+
                            "<a  href='"+datas["profile_url"]+"' target='_blank'>"+
                                "<img class='img-geolocation' src='"+datas["geolocation_picture_url"]+"'>"+
                                "<h5 id='name-profile' class='card-title'>"+
                                "<i class='fas fa-map-marker-alt'></i> "+datas["geolocation"]+
                                "</h5>"+
                            "</a>"+
                        "</div>"+
                        "<div class='row'>"+
                            "<div class='col-md-12 col-sm-12 col-xs-12 text-center p-0'>"+
                                datas["place"]+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>"+
            "</div>";
        $(container).append(str);        
    }
    
    
    //HASHTAG FUNCTIONS--------------------------------------------------------------------
    $("#container-add-hashtag").keypress(function (e) {
        if (e.which == 13) {
            $("#add-hashtag").click();
            return false;
        }
    });
    
    $("#add-hashtag").click(function(){
        //var btn =this; spinner_start(btn);
        hashtag = validate_element("#login-hashtag",ig_hashtag_regular_expression);        
        if(hashtag){
            container = "#container-hashtags";
            hashtag = $("#login-hashtag").val();
            add_hashtag(container, hashtag);
            $("#login-hashtag").val("");
        }else{
            modal_alert_message("Hashtag incorreto, confira");
        }
        //spinner_stop(btn);
    });
    
    function add_hashtag(container, hashtag){        
        //1. get profile datas of IG
        var datas = get_hashtag_datas(hashtag); //implemented in ig_iterations.js
        //2. append html-code card to container
        var str="<div id='container-"+hashtag+"' class='col-md-4 col-sm-12 col-xs-12'>"+
            "<div class='card'>"+
                "<div class='hastag card-body card-body-profile'>"+
                    "<button onclick='modal_confirm_message(\"Confirma a eliminação desse hashtag?\", \"delete_hashtag\", \""+hashtag+"\");' class='profile-delete close' type='button' title='Eliminar'><span aria-hidden='true'>&times;</span></button>"+
                    "<br>"+
                    "<div class='text-center'>"+
                        "<a href='"+datas["hashtag_url"]+"' target='_blank'>"+
                            "<img class='img-profile' src='"+datas["hashtag_picture_url"]+"'>"+
                            "<h5 id='name-profile' class='card-title'>"+
                                    "#"+datas["hashtag"]+""+
                            "</h5>"+
                        "</a>"+
                    "</div>"+
                    "<div class='row'>"+
                        "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0'>"+
                        "</div>"+
                        "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0'>"+
                            "<p class='m-b-0 label-profile'>Posts</p>"+
                            "<h6 id='amount-post-profile' class='text-muted'>"+datas["post"]+"</h6>"+
                        "</div>"+
                        "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0' >"+
                        "</div>"+
                    "</div>"+
                "</div>"+
            "</div>"+
        "</div>";
        $(container).append(str);        
    }
    
    
    //WHITE LIST FUNCTIONS--------------------------------------------------------------------
    $("#container-add-profile-wl").keypress(function (e) {
        if (e.which == 13) {            
            $("#add-profile-wl").click();
            return false;
        }
    });
    
    $("#add-profile-wl").click(function(){
        //var btn =this; spinner_start(btn);
        profile_wl = validate_element("#login-profile-wl",ig_profile_regular_expression);        
        if(profile_wl){
            container = "#container-profile-wl";
            profile_wl = $("#login-profile-wl").val();
            add_profile_wl(container, profile_wl);
            $("#login-profile-wl").val("");
        }else{
            modal_alert_message("Perfil incorreto, confira");
        }
        //spinner_stop(btn);
    });
    
    function add_profile_wl(container, profile_wl){        
        //1. get profile datas of IG
        var datas = get_profile_datas(profile_wl); //implemented in ig_iterations.js
        //2. append html-code card to container
        var str="<a id='container-"+profile_wl+"' class='item-white-list'>"+
            "<button onclick='modal_confirm_message(\"Confirma a eliminação desse perfil da lista branca?\", \"delete_profile_wl\", \""+profile_wl+"\");' type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                "<span aria-hidden='true'>&times;</span>"+
            "</button>"+
            "<div class='user-img'>"+
                "<img src='"+datas['profile_picture_url']+"' alt='photo' class='img-circle'>"+
                "<!--<span class='profile-status online pull-right'></span>-->"+
            "</div>"+
            "<div class='mail-contnet'>"+
                "<h5>"+datas['profile']+"</h5>"+
                "<span class='time'>"+datas['followers']+" seguidores</span>"+
            "</div>"+
        "</a>";
        $(container).append(str);
    }
    
    //BLACK LIST FUNCTIONS--------------------------------------------------------------------
    $("#container-add-profile-bl").keypress(function (e) {
        if (e.which == 13) {
            $("#add-profile-bl").click();
            return false;
        }
    });
    
    $("#add-profile-bl").click(function(){
        //var btn =this; spinner_start(btn);
        profile_bl = validate_element("#login-profile-bl",ig_profile_regular_expression);        
        if(profile_bl){
            container = "#container-profile-bl";
            profile_bl = $("#login-profile-bl").val();
            add_profile_bl(container, profile_bl);
            $("#login-profile-bl").val("");
        }else{
            modal_alert_message("Perfil incorreto, confira");
        }
        //spinner_stop(btn);
    });
    
    function add_profile_bl(container, profile_bl){        
        //1. get profile datas of IG
        var datas = get_profile_datas(profile_bl); //implemented in ig_iterations.js
        //2. append html-code card to container
        var str="<a id='container-"+profile_bl+"'  class='item-white-list'>"+
            "<button onclick='modal_confirm_message(\"Confirma a eliminação desse perfil da lista negra?\", \"delete_profile_bl\", \""+profile_bl+"\");' type='button' class='close' data-dismiss='modal' aria-label='Close'>"+
                "<span aria-hidden='true'>&times;</span>"+
            "</button>"+
            "<div class='user-img'>"+
                "<img src='"+datas['profile_picture_url']+"' alt='photo' class='img-circle'>"+
                "<!--<span class='profile-status online pull-right'></span>-->"+
            "</div>"+
            "<div class='mail-contnet'>"+
                "<h5>"+datas['profile']+"</h5>"+
                "<span class='time'>"+datas['followers']+" seguidores</span>"+
            "</div>"+
        "</a>";
        $(container).append(str);
    }
    
    
});

function delete_reference_profile(profile){
    //1. eliminar profile do banco de dados com ajax
    //2. en el success del ajax remover el container del profile    
    cnt = "#container-"+profile;
    $(cnt).remove();
}

function delete_geolocation(geolocation){
    //1. eliminar geolocation do banco de dados com ajax
    //2. en el success del ajax remover el container de la geolocation
    cnt = "#container-"+geolocation;
    $(cnt).remove();
}

function delete_hashtag(hashtag){
    //1. eliminar hashtag do banco de dados com ajax
    //2. en el success del ajax remover el container del hashtag
    cnt = "#container-"+hashtag;
    $(cnt).remove();
}

function delete_profile_wl(profile_wl){
    //1. eliminar hashtag do banco de dados com ajax
    //2. en el success del ajax remover el container del hashtag
    cnt = "#container-"+profile_wl;
    $(cnt).remove();
}

function delete_profile_bl(profile_bl){
    //1. eliminar hashtag do banco de dados com ajax
    //2. en el success del ajax remover el container del hashtag
    cnt = "#container-"+profile_bl;
    $(cnt).remove();
}

