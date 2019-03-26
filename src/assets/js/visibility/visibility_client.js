$(document).ready(function () {
    console.log(person_profile);
    //ACCOUNT FUNCTIONS-----------------------------------------------------
    $("#active-account").click(function () {
        $(this).prop("disabled",true);
        $.get({
            url : base_url+'index.php/Client/client_play_tool',
            success: function (response){
                $("#active-account").replaceClass("active-action","unactive-action");
                $("#unactive-account").replaceClass("unactive-action","active-action");
                $(this).prop("disabled",false);
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });    
    
    $("#unactive-account").click(function () {
        $(this).prop("disabled",true);
        $.get({
            url : base_url+'index.php/Client/client_pause_tool',
            success: function (response){
                $("#unactive-account").replaceClass("active-action","unactive-action");
                $("#active-account").replaceClass("unactive-action","active-action");
                $(this).prop("disabled",false);
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });
    
    //AUTOLIKE FUNCTIONS-----------------------------------------------------
    $("#active-auto-like").click(function () {
        $(this).prop("disabled",true);
        $.get({
            url : base_url+'index.php/Client/client_active_autolike',
            success: function (response){
                $("#active-auto-like").replaceClass("active-action","unactive-action");
                $("#unactive-auto-like").replaceClass("unactive-action","active-action");
                $(this).prop("disabled",false);
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });    
    
    $("#unactive-auto-like").click(function () {
        $(this).prop("disabled",true);
        $.get({
            url : base_url+'index.php/Client/client_unactive_autolike',
            success: function (response){
                $("#unactive-auto-like").replaceClass("active-action","unactive-action");
                $("#active-auto-like").replaceClass("unactive-action","active-action");
                $(this).prop("disabled",false);
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });
    
    //UNFOLLOW TOTAL FUNCTIONS-----------------------------------------------------
    $("#active-unfollow-total").click(function () {
        $(this).prop("disabled",true);
        $.get({
            url : base_url+'index.php/Client/client_active_total_unfollow',
            success: function (response){
                $("#active-unfollow-total").replaceClass("active-action","unactive-action");
                $("#unactive-unfollow-total").replaceClass("unactive-action","active-action");
                $(this).prop("disabled",false);
            },
            error : function(xhr, status){modal_alert_message('Erro enviando dados, tente depois...');}
        }); 
    });    
    
    $("#unactive-unfollow-total").click(function () {
        $(this).prop("disabled",true);
        $.get({
            url : base_url+'index.php/Client/client_unactive_total_unfollow',
            success: function (response){
                $("#unactive-unfollow-total").replaceClass("active-action","unactive-action");
                $("#active-unfollow-total").replaceClass("unactive-action","active-action");
                $(this).prop("disabled",false);
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
                
                $("#actual_followers").text(response.followers);
                $("#actual_followings").text(response.following);
                $("#total_gain").text(response.followers - person_profile.MarkInfo.insta_followers_ini);
            },
            error: function (xhr, status) {
                //modal_alert_message('Não foi possível conectar com o Instagram');
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
            if(value.black_or_white==0)
                show_profile_wl_in_view("#container-profile-wl", value.profile, value.id);
            else
                show_profile_bl_in_view("#container-profile-bl", value.profile, value.id);
        })
    }
    
    function display_chart_datas(){ //taken of morris-data.js
        var datas = person_profile.DailyReport.data;
        i=0; var statistics=[];
        $.each( datas, function( key, value ) {
            statistics[i]={
                period: timeConverter(value.date,"/"),
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
    
    function display_statistical_datas(){ 
        var info = person_profile.MarkInfo;
        $("#init_date").text(timeConverter(info.init_date,"/"));
        $("#insta_followers_ini").text(info.insta_followers_ini);
        $("#insta_following_ini").text(info.insta_following_ini);
        $("#total_followeds").text(info.total_followeds);        
        var info = person_profile.ReferenceProfiles;
        $("#amount_reference_profile_used").text(info.amount_reference_profile_used);
        $("#amount_geolocations_used").text(info.amount_geolocations_used);
        $("#amount_hashtags_used").text(info.amount_hashtags_used);
        
        if(info.amount_profile_followed)
            $("#amount_profile_followed").text(info.amount_profile_followed);
        else
            $("#amount_profile_followed").text(0);
        if(info.amount_profile_geolocations_followed)        
            $("#amount_profile_geolocations_followed").text(info.amount_profile_geolocations_followed);
        else
            $("#amount_profile_geolocations_followed").text(0);
        if(info.amount_profile_hashtags_followed)
            $("#amount_profile_hashtags_followed").text(info.amount_profile_hashtags_followed);
        else
            $("#amount_profile_hashtags_followed").text(0);
    }
    
    display_person_profile_datas();
    display_statistical_datas();
    display_reference_profile_datas();
    display_black_and_white_list_datas();
    display_chart_datas();
});

if(person_profile.Status ==2 || person_profile.Status ==3 || person_profile.Status ==6 || person_profile.Status ==9){               
    $(".profile-delete").off("click");
    $(".sensitive_painel *").addClass('sensitive_painel_disabled');        
    $(".sensitive_painel_disabled *").off();                   
    $(".sensitive_painel_disabled").click(function (e) {
        modal_alert_message("Você deve resolver os problemas notificados.");
        return false;
    });
}