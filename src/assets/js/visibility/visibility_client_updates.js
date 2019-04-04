$(document).ready(function () {
    var alt = "390px";
    $('#midle_plane').height(alt);
    $('#fast_plane').height(alt);
    $('#very_fast_plane').height(alt);  
    var contrated_plane = person_profile.MarkInfo.Plane.id;
    
    
    function load_contrated_plane(){
        if(contrated_plane == 1){
            $("#contrated_midle_plane").text("Plano atual");            
            $("#midle_plane_radio").click();
        }
        else
        if(contrated_plane == 2){
            $("#contrated_fast_plane").text("Plano atual");            
            $("#fast_plane_radio").click();
        }
        else
        if(contrated_plane == 3){
            $("#contrated_very_fast_plane").text("Plano atual");            
            $("#very_fast_plane_radio").click();
        }
    }
    
    $("#midle_plane_radio").click(function () {
        $("#midle_plane").addClass("active");
        $("#fast_plane").removeClass("active");
        $("#very_fast_plane").removeClass("active");
        plane = "midle";
    });

    $("#fast_plane_radio").click(function () {
        $("#midle_plane").removeClass("active");
        $("#fast_plane").addClass("active");
        $("#very_fast_plane").removeClass("active");
        plane = "fast";
    });

    $("#very_fast_plane_radio").click(function () {
        $("#midle_plane").removeClass("active");
        $("#fast_plane").removeClass("active");
        $("#very_fast_plane").addClass("active");
        plane = "very_fast";
    });    
    
    function update_plane(a){
        $.ajax({
            url: base_url + 'index.php/Payment/update_plane',
            data: {
                "plane": plane,
                'client_id':person_profile.Id
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                spinner_stop(btn);
                if (response.code === 0) {
                    modal_success_message('Atualização realizada com sucesso');
                    $(location).attr('href', base_url + "index.php/welcome/index/");
                } else
                    modal_alert_message(response.message);
            },
            error: function (xhr, status) {
                modal_alert_message('Erro enviando dados, tente depois...');
            }
        });
    }
    
    $('#btn-update-plane').click(function () {
         planes = {0:"midle",1:"fast",2:"very_fast"};
        if(planes[contrated_plane]==plane) return;
        modal_confirm_message("Confirma a atualização do plano?", "update_plane", "1");
    });
    
    
    $('#btn-update-mark-credentials').click(function () {
        alert(1234);
        var profile = validate_element("#login_profile", ig_profile_regular_expression);
        var password = validate_not_empty("#password");
        var password_rep = validate_equals("#password","#password-rep");
        //selected_profile = true;
        if(!selected_profile)
            modal_alert_message("Deve selecionar um perfil válido");
        else
        if (!profile || !password)
            modal_alert_message("Alguns dados incorretos, confira.");
        else
        if (!password_rep)
            modal_alert_message("As senhas não coincidem");
        else {
            var btn = this;
            spinner_start(btn);
            $.ajax({
                url: base_url + 'index.php/welcome/update_mark_credentials',
                data: {
                    "insta_name": $("#login_profile").val(),
                    "insta_id": selected_profile['user']['pk'],
                    "password": $("#password").val(),
                    "passwordrep": $("#password-rep").val(),
                },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    spinner_stop(btn);
                    if (response.code === 0) {
                        //modal_success_message("Marca atualizada com sucesso");
                        $(location).attr('href', base_url+"index.php/welcome/");
                    } else
                        modal_alert_message(response.message);
                },
                error: function (xhr, status) {
                    spinner_stop(btn);
                    modal_alert_message('Erro enviando dados, tente depois...');
                }
            });
        }
    });
    
    load_contrated_plane();
});


function update_plane(a){
        $.ajax({
            url: base_url + 'index.php/Payment/update_plane',
            data: {
                "plane": plane,
                'client_id':person_profile.Id
            },
            type: 'POST',
            dataType: 'json',
            success: function (response) {
                spinner_stop(btn);
                if (response.code === 0) {
                    modal_success_message('Atualização realizada com sucesso');
                    $(location).attr('href', base_url + "index.php/welcome/index/");
                } else
                    modal_alert_message(response.message);
            },
            error: function (xhr, status) {
                modal_alert_message('Erro enviando dados, tente depois...');
            }
        });
    }
    
    
