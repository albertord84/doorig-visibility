$(document).ready(function () {
    
    $("#container-add-reference-profile").keypress(function (e) {
        if (e.which == 13) {
            $("#add-reference-profile").click();
            return false;
        }
    });
    $("#add-reference-profile").click(function () {
        //var btn =this; spinner_start(btn);
        profile = validate_element("#login-reference-profile", ig_profile_regular_expression);
        if (profile) {
            container = "#container-reference-profiles";
            profile = $("#login-reference-profile").val();
            add_person_profile(container, profile);
            $("#login-reference-profile").val("");
        } else {
            modal_alert_message("Perfil incorreto, confira");
        }
        //spinner_stop(btn);
    });
    $("#container-add-geolocalização").keypress(function (e) {
        if (e.which == 13) {
            $("#add-geolocation").click();
            return false;
        }
    });
    $("#add-geolocation").click(function () {
        //var btn =this; spinner_start(btn);
        geolocation = validate_element("#login-geolocation", ig_geolocation_regular_expression);
        if (geolocation) {
            container = "#container-geolocations";
            geolocation = $("#login-geolocation").val();
            add_geolocation(container, geolocation);
            $("#login-geolocation").val("");
        } else {
            modal_alert_message("Geolocalização incorreta, confira");
        }
        //spinner_stop(btn);
    });
    $("#container-add-hashtag").keypress(function (e) {
        if (e.which == 13) {
            $("#add-hashtag").click();
            return false;
        }
    });
    $("#add-hashtag").click(function () {
        //var btn =this; spinner_start(btn);
        hashtag = validate_element("#login-hashtag", ig_hashtag_regular_expression);
        if (hashtag) {
            container = "#container-hashtags";
            hashtag = $("#login-hashtag").val();
            add_hashtag(container, hashtag);
            $("#login-hashtag").val("");
        } else {
            modal_alert_message("Hashtag incorreto, confira");
        }
        //spinner_stop(btn);
    });
    $("#container-add-profile-wl").keypress(function (e) {
        if (e.which == 13) {
            $("#add-profile-wl").click();
            return false;
        }
    });
    $("#add-profile-wl").click(function () {
        //var btn =this; spinner_start(btn);
        profile_wl = validate_element("#login-profile-wl", ig_profile_regular_expression);
        if (profile_wl) {
            container = "#container-profile-wl";
            profile_wl = $("#login-profile-wl").val();
            add_profile_wl(container, profile_wl);
            $("#login-profile-wl").val("");
        } else {
            modal_alert_message("Perfil incorreto, confira");
        }
        //spinner_stop(btn);
    });
    $("#container-add-profile-bl").keypress(function (e) {
        if (e.which == 13) {
            $("#add-profile-bl").click();
            return false;
        }
    });
    $("#add-profile-bl").click(function () {
        //var btn =this; spinner_start(btn);
        profile_bl = validate_element("#login-profile-bl", ig_profile_regular_expression);
        if (profile_bl) {
            container = "#container-profile-bl";
            profile_bl = $("#login-profile-bl").val();
            add_profile_bl(container, profile_bl);
            $("#login-profile-bl").val("");
        } else {
            modal_alert_message("Perfil incorreto, confira");
        }
        //spinner_stop(btn);
    });
    
    $("#active-auto-like").click(function () {
        $.get({
            url : base_url+'index.php/Client/client_active_autolike',
            success: function (response){
                $("#active-auto-like").replaceClass("active-action","unactive-action");
                $("#unactive-auto-like").replaceClass("unactive-action","active-action");
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });    
    $("#unactive-auto-like").click(function () {
        $.get({
            url : base_url+'index.php/Client/client_unactive_autolike',
            success: function (response){
                $("#unactive-auto-like").replaceClass("active-action","unactive-action");
                $("#active-auto-like").replaceClass("unactive-action","active-action");
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });
    $("#active-unfollow-total").click(function () {
        $.get({
            url : base_url+'index.php/Client/client_active_total_unfollow',
            success: function (response){
                $("#active-unfollow-total").replaceClass("active-action","unactive-action");
                $("#unactive-unfollow-total").replaceClass("unactive-action","active-action");
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });    
    $("#unactive-unfollow-total").click(function () {
        $.get({
            url : base_url+'index.php/Client/client_unactive_total_unfollow',
            success: function (response){
                $("#unactive-unfollow-total").replaceClass("active-action","unactive-action");
                $("#active-unfollow-total").replaceClass("unactive-action","active-action");
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });
    $("#active-account").click(function () {
        $.get({
            url : base_url+'index.php/Client/client_play_tool',
            success: function (response){
                $("#active-account").replaceClass("active-action","unactive-action");
                $("#unactive-account").replaceClass("unactive-action","active-action");
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });    
    $("#unactive-account").click(function () {
        $.get({
            url : base_url+'index.php/Client/client_pause_tool',
            success: function (response){
                $("#unactive-account").replaceClass("active-action","unactive-action");
                $("#active-account").replaceClass("unactive-action","active-action");
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });
    
    //UPDATE MARK CREDENTIAL FUNCTIONS-----------------------------------------------------
    $("#container-update-mark-credentials").keypress(function (e) {
        if (e.which == 13) {
            $("#btn-update-mark-credentials").click();
            return false;
        }
    });
    
    $('#btn-update-mark-credentials').click(function(){ 
        var profile = validate_element("#login_profile",ig_profile_regular_expression);
        var password = validate_not_empty("#password");
        var password_rep = validate_equals("#password","#password-rep");
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
                    url : base_url+'index.php/Client/update_mark_credentials',
                    data :{
                        "insta_name":$("#login_profile").val(),
                        "insta_id":selected_profile['user']['pk'],
                        "password":$("#password").val(),
                        "passwordrep":$("#password-rep").val(),
                    },
                    type : 'POST',
                    dataType : 'json',
                    success : function(response){
                        spinner_stop(btn);
                        if(response.code===0){                            
                            $(location).attr('href', base_url+"index.php/welcome/");
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
            
    //VERIFY ACCOUNT FUNCTIONS-----------------------------------------------------
    $("#verify-account-by-email").click(function () {
        var btn =this; spinner_start(btn);
        request_checkpoint_required_code("email",btn);
    });
    
    $("#verify-account-by-sms").click(function () {
        var btn =this; spinner_start(btn);
        request_checkpoint_required_code("sms",btn);
    });
    
    function request_checkpoint_required_code(device,btn){        
        $('#verify-account-by-email').addClass("disabled");  
        $('#verify-account-by-sms').addClass("disabled");  
        $.ajax({
            url: base_url + 'index.php/Client/request_checkpoint_required_code',
            data: {
                "device": device
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                spinner_stop(btn);
                if (response.code === 0) {
                    $('.verify-account-steep1').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                    $('.verify-account-steep2').css({'display':'block','visibility': 'visible', 'opacity': '1'});                                        
                } else
                    modal_alert_message(response.message);
            },
            error: function (xhr, status) {                
                spinner_stop(btn);
                $('#verify-account-by-email').removeClass("disabled");  
                $('#verify-account-by-sms').removeClass("disabled");  
                $('#verify-account-by-email').addClass("active");  
                $('#verify-account-by-sms').addClass("active");  
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
            }
        });
    }
    
    $("#btn-send-verification-code").click(function () {
        code_validation = validate_element("#input-checkpoint-required-code",checkpoint_required_code_regular_expression)
        if(!code_validation){
            modal_alert_message("Código de validação errado");
        }else{
            var btn =this; spinner_start(btn);
            $.ajax({
                url: base_url + 'index.php/Client/verifify_checkpoint_required_code',
                data: {
                    "code": $("#input-checkpoint-required-code").val()
                },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    spinner_stop(btn);
                    if (response.code === 0) {
                        $(location).attr('href', base_url+"index.php/welcome/");
                    } else
                        modal_alert_message(response.message);
                },
                error: function (xhr, status) {                
                    spinner_stop(btn); 
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                }
            });            
        }
    });
    
    //DISPLAYING DATAS FUNCTIONS-----------------------------------------------------
    function display_person_profile_datas(){ 
        $("#ig-profile-name").text("@"+person_profile.MarkInfo.login);        
        $("#ig-profile-url").prop("href","https://www.instagram.com/"+person_profile.MarkInfo.login);
        DisplayPlayAndPauseButtons();        
        $.ajax({
            url: base_url+"index.php/welcome/get_person_profile_datas/"+person_profile.MarkInfo.login,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#ig-profile-description").text(response.json.description);
                $("#ig-profile-picture-url").prop("src",response.image);
                $("#ig-profile-amount-followers").text(response.followers);
                $("#ig-profile-amount-following").text(response.following);
                $("#ig-profile-amount-post").text(response.post);
            },
            error: function (xhr, status) {
                modal_alert_message('Não foi possível conectar com o Instagram');
            }
        });
    }
    
    function hasStatus(StatusList,st){
        var has =false;
        $.each( StatusList, function( key, value ) {
            if(value.client_status_id==st){
                has = true;
                return;
            }
        })
        return has;
    }
    
    function DisplayPlayAndPauseButtons(){
        StatusList = person_profile.MarkInfo.Status.ClientStatusList;
        text_by_status = false;
        if(person_profile.MarkInfo.like_first){             
            //is active
            $("#active-auto-like").replaceClass("active-action","unactive-action");
            $("#unactive-auto-like").replaceClass("unactive-action","active-action");
        } else{
            $("#unactive-auto-like").replaceClass("active-action","unactive-action");
            $("#active-auto-like").replaceClass("unactive-action","active-action");
        }
        
        if(hasStatus(StatusList,13)){ //TOTAL UNFOLLOW            
            $("#active-unfollow-total").replaceClass("active-action","unactive-action");
            $("#unactive-unfollow-total").replaceClass("unactive-action","active-action");            
            $("#text_by_status").text("UNFOLLOW TOTAL");
            text_by_status = true;
        } else{
            $("#unactive-unfollow-total").replaceClass("active-action","unactive-action");
            $("#active-unfollow-total").replaceClass("unactive-action","active-action");       
        }
        
        if(hasStatus(StatusList,14)){ //PAUSED
            $("#unactive-account").replaceClass("active-action","unactive-action");
            $("#active-account").replaceClass("unactive-action","active-action");
            $("#text_by_status").text("PAUSADO");
            $("#text_by_status").removeClass("text-success");
            $("#text_by_status").addClass("text-warning");
            text_by_status = true;
        }else{
            $("#active-account").replaceClass("active-action","unactive-action");
            $("#unactive-account").replaceClass("unactive-action","active-action");
        }
        
        if(hasStatus(StatusList,2) || hasStatus(StatusList,3) || hasStatus(StatusList,9)){ //PAUSED
            $("#text_by_status").text("BLOQUEADO");
            $("#text_by_status").removeClass("text-success");
            $("#text_by_status").removeClass("text-warning");
            $("#text_by_status").addClass("text-danger");
            text_by_status = true;
        }
        
        if(!text_by_status){
            $("#text_by_status").removeClass("text-danger");
            $("#text_by_status").removeClass("text-warning");
            $("#text_by_status").addClass("text-success");
            $("#text_by_status").text("ATIVO");
        }
    }
    
    function display_reference_profile_datas(){
        var rp = person_profile.ReferenceProfiles.ReferenceProfiles;
        $.each( rp, function( key, value ) {
            if(value.Type==0)
                show_profile_in_view("#container-reference-profiles", value.Insta_name,value.Id);
            else
            if(value.Type==1)
                show_geolocation_in_view("#container-geolocations", value.Insta_name,value.Id);
            else
            if(value.Type==2)
                show_hashtag_in_view("#container-hashtags", value.Insta_name,value.Id);
        })            
    }
    
    function display_black_and_white_list_datas(){       
        var rp = person_profile.BlackAndWhiteList.BlackAndWhiteList;        
        $.each( rp, function( key, value ) {
            console.log(value);
            if(value.black_or_white==0)
                show_profile_wl_in_view("#container-profile-wl", value.profile, value.Id);
            else
                show_profile_bl_in_view("#container-profile-bl", value.profile, value.Id);
        })
    }
    
    function display_chart_datas(){ //taken of morris-data.js
        var datas = person_profile.DailyReport.data;
        i=0; var statistics=[];
        $.each( datas, function( key, value ) {
            statistics[i]={
                period: timeConverter(value.date),
                followed: value.followings,
                followers: value.followers
            };
            i++;
        })
        Morris.Area({
            element: 'morris-area-chart',
            data:statistics,
            xkey: 'period',
            ykeys: [ 'followed', 'followers'],
            labels: [ 'Seguidos', 'Seguidores'],
            pointSize: 2,
            fillOpacity: 0.05,
            pointStrokeColors:[ '#009efb', '#55ce63'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 1,
            hideHover: 'auto',
            lineColors: [ '#009efb', '#55ce63'],
            resize: true
        });
        
    }
            
    display_person_profile_datas();
    display_reference_profile_datas();
    display_black_and_white_list_datas();
    display_chart_datas();
});


//REFENCE PROFILE FUNCTIONS-----------------------------------------------------
var match_profiles = null, selected_profile = null;
function search_match_profile(input_profile_id, table_match_id) {
    selected_profile = null;
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $(input_profile_id).val(),
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $(table_match_id).empty();
            if (response['users'].length !== 0) {
                var i = 0;
                var username, full_name, profile_pic_url, is_verified, follower_count;
                match_profiles = response['users'];
                while (match_profiles[i]) {
                    username = match_profiles[i]['user']['username'];
                    full_name = match_profiles[i]['user']['full_name'];
                    profile_pic_url = match_profiles[i]['user']['profile_pic_url'];
                    is_verified = match_profiles[i]['user']['is_verified'];
                    follower_count = match_profiles[i]['user']['follower_count'];
                    $(table_match_id).append(
                            "<tr onclick='select_profile_from_search(\"" + input_profile_id + "\",\"" + table_match_id + "\",\"" + username + "\");' class='row' id='row_prof_" + i + "'>" +
                            "<td class='col col-img-profile' id='col_1_prof_" + i + "'>" +
                            "<img class='search-img-profile' src='" + profile_pic_url + "' >" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                            "<div class='tt-suggestion' class='search-div-profile' >" +
                            "<div>" +
                            "<span><strong>" + username + "</strong></span>" +
                            "</div>" +
                            "<span style='color: gray;'>" + follower_count + " seguidores</span>" +
                            "</div>" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                            "<div class='tt-suggestion' class='search-div-profile' >" +
                            "<span style='color: gray;'> Nome completo</span><br>" +
                            "<span style='color: gray;'>" + full_name + "</span>" +
                            "</div>" +
                            "</td>" +
                            "</tr>");
                    i++;
                }
            } else {
                if ($(input_profile_id).val() !== '') {
                    $(table_match_id).append("<tr class='row'><td class='col'>" + T('Nenhum resultado encontrado.') + "</td></tr>");
                }
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });
}

function select_profile_from_search(input_profile_id, table_match_id, prof_name) {
    selected_profile = find_match_profile_in_list(match_profiles, prof_name);
    $(input_profile_id).val(prof_name);
    $(table_match_id).empty();
}

function find_match_profile_in_list(list_profiles, prof) {
    i = 0;
    while (list_profiles[i]) {
        if (list_profiles[i]['user']['username'] == prof) {
            return list_profiles[i];
        }
        i++;
    }
    return false;
}

function add_person_profile(container, profile) {
    //1. send request to server and append html-code card to container
    if (!selected_profile) {
        modal_alert_message("Deve selecionar um perfil da lista.");
    } else {
        $.ajax({
            url: base_url + 'index.php/PersonProfiles/insert',
            data: {
                "insta_name": profile,
                "insta_id": selected_profile['user']['pk'],
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                //spinner_stop(btn);
                if (response.code === 0) {
                    show_profile_in_view(container, profile,response.InsertedId);
                } else
                    modal_alert_message(response.message);
            },
            error: function (xhr, status) {
                //spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
            }
        });
    }
}

function show_profile_in_view(container, profile, id) {
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + profile,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            datas = find_match_profile_in_list(response['users'], profile);
            datas = datas.user;
            if(datas){                
                var str = "<div id='container-" + id + "' class='col-md-4 col-sm-12 col-xs-12'>" +
                        "<div class='card'>" +
                        "<div class='profile card-body card-body-profile'>" +
                        "<button onclick='modal_confirm_message(\"Confirma a eliminação desse perfil de referência?\", \"delete_profile\", \"" + id + "\");' class='profile-delete close' type='button' title='Fechar'><span aria-hidden='true'>&times;</span></button> " +
                        "<br>" +
                        "<div class='text-center'>" +
                        "<a id='name-profile' href='https://instagram.com/" + profile + "' target='_blank'>" +
                        "<img class='img-profile' src='" + datas.profile_pic_url + "'>" +
                        "<h5 class='card-title'>" +
                        "@" + profile +
                        "</h5>" +
                        "</a>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-12 col-sm-12 col-xs-12 text-center p-0'>" +
                        "<p class='m-b-0 label-profile'>Seguidores</p>" +
                        "<h6 id='amount-folowers-profile' class='text-muted'>" + datas.follower_count + "</h6>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                $(container).append(str);
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });
}

function delete_profile(id) {
    //1. eliminar profile do banco de dados com ajax en el success del ajax remover el container del profile
    $.ajax({
        url: base_url + 'index.php/PersonProfiles/delete',
        data: {
            "reference_profile_id": id
        },
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            //spinner_stop(btn);
            if (response.code === 0) {
                cnt = "#container-" + id;
                $(cnt).remove();
            } else
                modal_alert_message(response.message);
        },
        error: function (xhr, status) {
            //spinner_stop(btn);
            modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
        }
    });
}


//GEOLOCATION FUNCTIONS---------------------------------------------------------
var match_geolocation = null, selected_geolocation = null;
function search_match_geolocation(input_geolocation_id, table_match_id) {
    selected_geolocation = null;
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $(input_geolocation_id).val(),
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $(table_match_id).empty();
            if (response['places'].length !== 0) {
                var i = 0;
                var location_name, location_address, location_city, place_slug;
                match_geolocation = response['places'];
                while (match_geolocation[i]) {
                    location_name = match_geolocation[i]['place']['location']['name'];
                    location_address = match_geolocation[i]['place']['location']['address'];
                    location_city = match_geolocation[i]['place']['location']['city'];
                    place_slug = match_geolocation[i]['place']['slug'];
                    $(table_match_id).append(
                            "<tr class='row' id='row_geo_" + i + "'>" +
                            "<td class='col col-img-profile' id='col_1_geo_" + i + "'>" +
                            "<i class='sl-icon-location-pin' style='font-size: 30px;color:#20aee3'>" +
                            "</td>" +
                            "<td class='col' id='col_2_geo_" + i + "' style='text-align: left; vertical-align: middle;'>" +
                            "<div class='tt-suggestion' style='text-align: left; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 50px;' onclick='select_geolocalization_from_search(\"" + input_geolocation_id + "\",\"" + table_match_id + "\",\"" + place_slug + "\");'>" +
                            "<strong>" + location_name + "</strong><br>" +
                            "<span style='color: gray;'>" +
                            location_address +
                            ((location_address && location_city) ? ", " : "") +
                            location_city +
                            "</span>" +
                            "</div>" +
                            "</td>" +
                            "</tr>");
                    i++;
                }
            } else {
                if ($(input_geolocation_id).val() !== '') {
                    $(table_match_id).append("<tr class='row'><td class='col'>" + T('Nenhum resultado encontrado.') + "</td></tr>");
                }
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });
}

function select_geolocalization_from_search(geolocation_id, table_match_id, geolocation_name) {
    selected_geolocation = find_match_geolocation_in_list(match_geolocation, geolocation_name);
    $(geolocation_id).val(geolocation_name);
    $(table_match_id).empty();
}

function find_match_geolocation_in_list(list_geolocation, geolocation) {
    i = 0;
    while (list_geolocation[i]) {
        if (list_geolocation[i].place.slug == geolocation) {
            return list_geolocation[i];
        }
        i++;
    }
    return false;
}

function add_geolocation(container, geolocation) {
    //1. send request to server and append html-code card to container
    if (!selected_geolocation) {
        modal_alert_message("Deve selecionar uma geolocalização.");
    } else {
        $.ajax({
            url: base_url + 'index.php/GeolocationProfiles/insert',
            data: {
                "insta_name": geolocation,
                "insta_id": selected_geolocation['place']['location']['pk']
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                //spinner_stop(btn);
                if (response.code === 0) {
                    show_geolocation_in_view(container, geolocation, response.InsertedId);
                } else
                    modal_alert_message(response.message);
            },
            error: function (xhr, status) {
                //spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
            }
        });
    }
}

function show_geolocation_in_view(container, geolocation, id) {
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + geolocation,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            datas = find_match_geolocation_in_list(response['places'], geolocation);
            datas = datas.place;
            if(datas){                
                var str = "<div id='container-" + id + "' class='col-md-4 col-sm-12 col-xs-12'>" +
                        "<div class='card'>" +
                        "<div class='geolocation card-body card-body-profile'>" +
                        "<button onclick='modal_confirm_message(\"Confirma a eliminação dessa gelocalização?\", \"delete_geolocation\", \"" + id + "\");' class='profile-delete close' type='button' title='Fechar'><span aria-hidden='true'>&times;</span></button> " +
                        "<br>" +
                        "<div class='text-center'>" +
                        "<a  href='https://www.instagram.com/explore/locations/" + datas.location.pk + "/" + datas.location.slug + "/" + "' target='_blank'>" +                    
                        "<h5 id='name-profile' class='card-title'>" +
                            "<i class='sl-icon-location-pin' style='font-size: 30px;color:#20aee3'></i><br> " + geolocation +
                        "</h5>" +
                        "</a>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-12 col-sm-12 col-xs-12 text-center p-0'>" +
                        datas.title +
                        "</div>" +
                        "</div>" +
                        "<div class='row'>" +
                        "<div class='col-md-12 col-sm-12 col-xs-12 text-center p-0'>" +
                        datas.location.city +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                $(container).append(str);
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });
}

function delete_geolocation(id) {
    //1. eliminar profile do banco de dados com ajax en el success del ajax remover el container del profile
    $.ajax({
        url: base_url + 'index.php/GeolocationProfiles/delete',
        data: {
            "reference_profile_id": id
        },
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            //spinner_stop(btn);
            if (response.code === 0) {
                cnt = "#container-" + id;
                $(cnt).remove();
            } else
                modal_alert_message(response.message);
        },
        error: function (xhr, status) {
            //spinner_stop(btn);
            modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
        }
    });
}


//HASHTAG FUNCTIONS--------------------------------------------------------------------
var match_hashtag = null, selected_hashtag = null;
function search_match_hashtag(input_hashtag_id, table_match_id) {
    selected_hashtag = null;
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=%23' + $(input_hashtag_id).val(),
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $(table_match_id).empty();
            if (response['hashtags'].length !== 0) {
                var i = 0;
                var hashtag_name;
                match_hashtag = response['hashtags'];
                while (match_hashtag[i]) {
                    hashtag_name = match_hashtag[i]['hashtag']['name'];
                    $(table_match_id).append(
                        "<tr class='row' id='row_tag_" + i + "'>" +
                            "<td class='col col-img-profile' id='col_1_geo_" + i + "'>" +
                                "<span style='font-size: 30px;color:#20aee3'>#</span>" +
                            "</td>" +
                            "<td class='col' id='col_tag_" + i + "' style='text-align: left'>" +
                                "<div class='tt-suggestion' onclick='select_hashtag_from_search(\"" + input_hashtag_id + "\",\"" + table_match_id + "\",\"" + hashtag_name + "\");'>" +
                                "<strong>" + hashtag_name + "</strong><br>" +
                                "<span style='color: gray;'>" +
                                    match_hashtag[i]['hashtag']['media_count'] + T(' publicações') +
                                "</span>" +
                                "</div>" +
                            "</td>" +
                        "</tr>");
                    i++;
                }
            } else {
                if ($(input_hashtag_id).val() !== '') {
                    $(table_match_id).append("<tr class='row'><td class='col'>" + T('Nenhum resultado encontrado.') + "</td></tr>");
                }
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });
}

function select_hashtag_from_search(input_hashtag_id, table_match_id, hashtag_name) {
    selected_hashtag = find_match_hashtag_in_list(match_hashtag, hashtag_name);
    $(input_hashtag_id).val(hashtag_name);
    $(table_match_id).empty();
}

function find_match_hashtag_in_list(list_hashtag, hashtag) {
    i = 0;
    while (list_hashtag[i]) {
        if (list_hashtag[i].hashtag.name == hashtag) {
            return list_hashtag[i];
        }
        i++;
    }
    return false;
}

function add_hashtag(container, hashtag) {    
    //1. send request to server and append html-code card to container        
    if (!selected_hashtag) {
        modal_alert_message("Deve selecionar um hastag da lista");
    } else {
        $.ajax({
            url: base_url + 'index.php/HashtagProfiles/insert',
            data: {
                "insta_name": hashtag,
                "insta_id": selected_hashtag['hashtag']['id']
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                //spinner_stop(btn);
                if (response.code === 0) {
                    show_hashtag_in_view(container, hashtag, response.InsertedId);                    
                } else
                    modal_alert_message(response.message);
            },
            error: function (xhr, status) {
                //spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
            }
        });
    }
}

function show_hashtag_in_view(container, hashtag, id) {
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + hashtag,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            datas = find_match_hashtag_in_list(response['hashtags'], hashtag);
            datas = datas.hashtag;
            if(datas){                
                var str = "<div id='container-" + id + "' class='col-md-4 col-sm-12 col-xs-12'>" +
                            "<div class='card'>" +
                                "<div class='hastag card-body card-body-profile'>" +
                                    "<button onclick='modal_confirm_message(\"Confirma a eliminação desse hashtag?\", \"delete_hashtag\", \"" + id + "\");' class='profile-delete close' type='button' title='Eliminar'><span aria-hidden='true'>&times;</span></button>" +
                                    "<br>" +
                                    "<div class='text-center'>" +
                                            "<a href='https://www.instagram.com/explore/tags/" + hashtag + "/' target='_blank'>" +
                                            //"<img class='img-profile' src='" + datas["hashtag_picture_url"] + "'>" +
                                            "<td class='col col-img-profile' id='col_1_geo_" + i + "'>" +
                                                "<span style='font-size: 30px;color:#20aee3'>#</span>" +
                                            "</td>" +
                                            "<h5 id='name-profile' class='card-title'>" +
                                                "#" + hashtag + "" +
                                            "</h5>" +
                                        "</a>" +
                                    "</div>" +
                                    "<div class='row'>" +
                                    "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0'>" +
                                    "</div>" +
                                    "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0'>" +
                                        "<p class='m-b-0 label-profile'>Posts</p>" +
                                        "<h6 id='amount-post-profile' class='text-muted'>" + datas.media_count + "</h6>" +
                                    "</div>" +
                                    "<div class='col-md-4 col-sm-12 col-xs-12 text-center p-0' >" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>" +
                    "</div>";
                $(container).append(str);
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });
}

function delete_hashtag(id) {
    //1. eliminar profile do banco de dados com ajax en el success del ajax remover el container del profile
    $.ajax({
        url: base_url + 'index.php/HashtagProfiles/delete',
        data: {
            "reference_profile_id": id
        },
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            //spinner_stop(btn);
            if (response.code === 0) {
                cnt = "#container-" + id;
                $(cnt).remove();
            } else
                modal_alert_message(response.message);
        },
        error: function (xhr, status) {
            //spinner_stop(btn);
            modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
        }
    });
}


//WHITE LIST FUNCTIONS--------------------------------------------------------------------
function search_match_profile_wl(input_profile_id, table_match_id) {
    selected_profile = null;
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $(input_profile_id).val(),
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $(table_match_id).empty();
            if (response['users'].length !== 0) {
                var i = 0;
                var username, full_name, profile_pic_url, is_verified, follower_count;
                match_profiles = response['users'];
                while (match_profiles[i]) {
                    username = match_profiles[i]['user']['username'];
                    full_name = match_profiles[i]['user']['full_name'];
                    profile_pic_url = match_profiles[i]['user']['profile_pic_url'];
                    is_verified = match_profiles[i]['user']['is_verified'];
                    follower_count = match_profiles[i]['user']['follower_count'];
                    $(table_match_id).append(
                        "<tr onclick='select_profile_from_search(\"" + input_profile_id + "\",\"" + table_match_id + "\",\"" + username + "\");' class='row' id='row_prof_" + i + "'>" +
                            "<td class='col col-img-profile' id='col_1_prof_" + i + "'>" +
                                "<img class='search-img-profile' src='" + profile_pic_url + "' >" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                                "<div class='tt-suggestion' class='search-div-profile' >" +
                                    "<div>" +
                                        "<span><strong>" + username + "</strong></span>" +
                                    "</div>" +
                                    "<span style='color: gray;'>" + follower_count + " seguidores</span>" +
                                    "</div>" +
                            "</td>" +
                        "</tr>");
                    i++;
                }
            } else {
                if ($(input_profile_id).val() !== '') {
                    $(table_match_id).append("<tr class='row'><td class='col'>" + T('Nenhum resultado encontrado.') + "</td></tr>");
                }
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });
}

function add_profile_wl(container, profile_wl) {    
    //2. send request to server and append html-code card to container
    if (!selected_profile) {
        modal_alert_message("Deve selecionar um perfil para adicionar");
    } else {
        $.ajax({
            url: base_url + 'index.php/BlackAndWhiteList/insert_white',
            data: {
                "insta_name": profile_wl,
                "insta_id": selected_profile['user']['pk']
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                //spinner_stop(btn);
                if (response.code === 0) {
                    show_profile_wl_in_view(container, profile_wl, response.InsertedId);
                } else
                    modal_alert_message(response.message);
            },
            error: function (xhr, status) {
                //spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
            }
        });
    }
}

function show_profile_wl_in_view(container, profile_wl, id){
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + profile_wl,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            datas = find_match_profile_in_list(response['users'], profile_wl);
            datas = datas.user;
            if(datas){                
                var str = "<a id='container-wl-"+id+"'"+ " class='item-white-list'>" +
                    "<button onclick='modal_confirm_message(\"Confirma a eliminação desse perfil da lista branca?\", \"delete_profile_wl\", \"" + id + "\");' type='button' class='close' data-dismiss='modal' aria-label='Close'>" +
                        "<span aria-hidden='true'>&times;</span>" +
                    "</button>" +
                    "<div class='user-img'>" +
                        "<img src='" + datas.profile_pic_url + "' alt='photo' class='img-circle'>" +
                            "<!--<span class='profile-status online pull-right'></span>-->" +
                        "</div>" +
                        "<div class='mail-contnet'>" +
                            "<h5>" + profile_wl + "</h5>" +
                        "<span class='time'>" + datas.follower_count + " seguidores</span>" +
                    "</div>" +
                "</a>";
                $(container).append(str);
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });  
}

function delete_profile_wl(id) {
    //1. eliminar profile do banco de dados com ajax en el success del ajax remover el container del profile
    $.ajax({
        url: base_url + 'index.php/BlackAndWhiteList/delete',
        data: {
            "black_and_white_id": id
        },
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            //spinner_stop(btn);
            if (response.code === 0) {
                cnt = "#container-wl-"+id;
                $(cnt).remove();
            } else
                modal_alert_message(response.message);
        },
        error: function (xhr, status) {
            //spinner_stop(btn);
            modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
        }
    });
}

//BLACK LIST FUNCTIONS--------------------------------------------------------------------
function add_profile_bl(container, profile_bl) {
    //1. append html-code card to container
    if (!selected_profile) {
        modal_alert_message("Deve selecionar um perfil para adicionar");
    } else {
        $.ajax({
            url: base_url + 'index.php/BlackAndWhiteList/insert_black',
            data: {
                "insta_name": profile_bl,
                "insta_id": selected_profile['user']['pk']
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                //spinner_stop(btn);
                if (response.code === 0) {
                    show_profile_bl_in_view(container, profile_bl, response.InsertedId);
                } else
                    modal_alert_message(response.message);
            },
            error: function (xhr, status) {
                //spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
            }
        });
    }
}

function show_profile_bl_in_view(container, profile_bl, id){
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + profile_bl,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            datas = find_match_profile_in_list(response['users'], profile_bl);
            datas = datas.user;
            if(datas){                
                var str = "<a id='container-bl-"+id+"' class='item-white-list'>" +
                    "<button onclick='modal_confirm_message(\"Confirma a eliminação desse perfil da lista negra?\", \"delete_profile_bl\", \"" + id + "\");' type='button' class='close' data-dismiss='modal' aria-label='Close'>" +
                        "<span aria-hidden='true'>&times;</span>" +
                    "</button>" +
                    "<div class='user-img'>" +
                        "<img src='" + datas.profile_pic_url + "' alt='photo' class='img-circle'>" +
                            "<!--<span class='profile-status online pull-right'></span>-->" +
                        "</div>" +
                        "<div class='mail-contnet'>" +
                            "<h5>" + profile_bl + "</h5>" +
                        "<span class='time'>" + datas.follower_count + " seguidores</span>" +
                    "</div>" +
                "</a>";
                $(container).append(str);
            }
        },
        error: function (xhr, status) {
            modal_alert_message('Não foi possível conectar com o Instagram');
        }
    });  
}

function delete_profile_bl(id) {
    //1. eliminar profile do banco de dados com ajax en el success del ajax remover el container del profile
    $.ajax({
        url: base_url + 'index.php/BlackAndWhiteList/delete',
        data: {
            "black_and_white_id": id
        },
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            //spinner_stop(btn);
            if (response.code === 0) {
                cnt = "#container-bl-"+id;
                $(cnt).remove();
            } else
                modal_alert_message(response.message);
        },
        error: function (xhr, status) {
            //spinner_stop(btn);
            modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
        }
    });
}

if(person_profile.Status ==2 || person_profile.Status ==3 || person_profile.Status ==6 || person_profile.Status ==9){               
    $(".profile-delete").off("click");
    $(".sensitive_painel *").addClass('sensitive_painel_disabled');        
    $(".sensitive_painel_disabled *").off();                   
    $(".sensitive_painel_disabled").click(function (e) {
        modal_alert_message("Você deve resolver os problemas notificados.");
        return false;
    });
}