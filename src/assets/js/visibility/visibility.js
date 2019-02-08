$(document).ready(function () {   
        
    
    
    
    //old code of dumbu
    $("#verify_cep").click(function () {
        if(validate_element("#cep",'^[0-9]{8}$')){
            $.ajax({
                url: base_url+'index.php/welcome/get_cep_datas',                
                data: {
                    'cep': $('#cep').val(),
                },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if(response['success']){
                        response = response['datas'];
                        $('#street_address').val(response['logradouro']);
                        $('#neighborhood_address').val(response['bairro']);
                        $('#municipality_address').val(response['localidade']);
                        $('#state_address').val(response['uf']);            
                    } else
                        modal_alert_message('CEP inválido');
                }
        });
        } else{
            modal_alert_message('CEP inválido');
        }
    });
                
    $("#check_cupao").click(function () {
        if($("#cupao_number").val()!==''){
            var l = Ladda.create(this);
            l.start();
            $.ajax({
                url: base_url + 'index.php/welcome/check_ticket_peixe_urbano',
                data: {
                    'cupao_number': $('#cupao_number').val(),
                    'pk': pk
                },
                type: 'POST',
                dataType: 'json',
                success: function (response) {
                    if (response['success']) {
                        set_global_var('cupao_number_checked', true);  
                    }
                    modal_alert_message(response['message']);
                    l.stop();
                },
                error: function (xhr, status) {
                    modal_alert_message('Não foi possível conferir a autenticidade do CUPOM. Tente depois.');                    
                    l.stop();
                }
            });
        }else{
            modal_alert_message('Deve preencher o campo com o código do CUPOM');  
        }
    });
    
    
    $("#signin_btn_insta_login").click(function() {
        if ($('#signin_clientLogin').val() != '' && $('#signin_clientPassword').val() != '' && $('#client_email').val() != '') {
            if (validate_element('#client_email', "^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,4}$")) {
                if (validate_element('#signin_clientLogin', '^[a-zA-Z0-9\._]{1,300}$')) {                   
                    //if($("#errorcaptcha").text()!='Codigo de segurança errado' && $("#errorcaptcha").text()!=''){
                        var l = Ladda.create(this);
                        l.start();
                        l.start();
                        $.ajax({
                            url: base_url + 'index.php/welcome/check_user_for_sing_in',
                            data: {
                                'client_email': $('#client_email').val(),
                                'client_login': $('#signin_clientLogin').val(),
                                'client_pass': $('#signin_clientPassword').val(),
                                'language': language,
                                'utm_source': typeof getUrlVars()["utm_source"] !== 'undefined' ? getUrlVars()["utm_source"] : 'NULL'
                            },
                            type: 'POST',
                            dataType: 'json',
                            success: function (response) {
                                if (response['success']) {
                                    set_global_var('insta_profile_datas', jQuery.parseJSON(response['datas']));
                                    set_global_var('pk', response['pk']);
                                    set_global_var('datas', response['datas']);
                                    set_global_var('early_client_canceled', response['early_client_canceled']);
                                    set_global_var('login', $('#signin_clientLogin').val());
                                    set_global_var('pass', $('#signin_clientPassword').val());
                                    set_global_var('email', $('#client_email').val());
                                    set_global_var('need_delete', response['need_delete']);
                                    //if(need_delete<response['MIN_MARGIN_TO_INIT']){   
                                     //modal_alert_message('Você precisa desseguer pelo menos '+need_delete+' usuários para que o sistema funcione corretamente');                                
                                    // }
                                    //active_by_steep(2);
                                    if (response['cause'] === 'email_send') {
                                        active_by_steep(3);
                                        $('#container_sigin_code_message').text(response['message']);
                                        $('#container_sigin_code_message').css('visibility', 'visible');
                                        $('#container_sigin_code_message').css('color', 'green');
                                    }
                                    else {
                                        $('#container_sigin_message').text(response['message']);
                                        $('#container_sigin_message').css('visibility', 'visible');
                                        $('#container_sigin_message').css('color', 'red');
                                    }
                                    l.stop();
                                } else {
                                    if (response['cause'] == 'checkpoint_required') {
                                        modal_alert_message(response['message']);
                                    } else {
                                        $('#container_sigin_message').text(response['message']);
                                        $('#container_sigin_message').css('visibility', 'visible');
                                        $('#container_sigin_message').css('color', 'red');
                                    }
                                    l.stop();
                                }

                            },
                            error: function (xhr, status) {
                                $('#container_sigin_message').text(T('Não foi possível comprobar a autenticidade do usuario no Instagram!'));
                                $('#container_sigin_message').css('visibility', 'visible');
                                $('#container_sigin_message').css('color', 'red');
                                l.stop();
                            }
                        });
                    /*} else{
                        $('#container_sigin_message').text(T('Verifique o codigo de segurança'));
                        $('#container_sigin_message').css('visibility', 'visible');
                        $('#container_sigin_message').css('color', 'red');                    
                    }    */
                } else {
                    $('#container_sigin_message').text(T('O nome de um perfil só pode conter combinações de letras, números, sublinhados e pontos!'));
                    $('#container_sigin_message').css('visibility', 'visible');
                    $('#container_sigin_message').css('color', 'red');
                }
            } else {
                $('#container_sigin_message').text(T('Problemas na estrutura do email informado!'));
                $('#container_sigin_message').css('visibility', 'visible');
                $('#container_sigin_message').css('color', 'red');
                //modal_alert_message('O email informado não é correto');
            }
        } else {
            $('#container_sigin_message').text(T('Deve preencher todos os dados corretamente!'));
            $('#container_sigin_message').css('visibility', 'visible');
            $('#container_sigin_message').css('color', 'red');
            //modal_alert_message('Formulario incompleto');
        }
    });
    
    $("#btn_sing_in").click(function () {             
        if (flag == true) {
            flag = false;
            $('#btn_sing_in').attr('disabled', true);
            $('#btn_sing_in').css('cursor', 'wait');
            $('#my_body').css('cursor', 'wait');
            var l = Ladda.create(this);
            l.start();
            l.start();
            
            if (payment_option==0) {
                if (($('#credit_card_name').val()).toUpperCase()==='VISA' || ($('#credit_card_name').val()).toUpperCase()==='MASTERCARD') {
                    alert(T("Informe seu nome no cartão e não a bandeira dele."));
                }
                       
                var name = validate_element('#credit_card_name', "^[A-Z ]{4,50}$");
                var number = validate_element('#credit_card_number', "^[0-9]{10,20}$");
                
                if (number) {
                    // Validating a Visa card starting with 4, length 13 or 16 digits.
                    number = validate_element('#credit_card_number', "^(?:4[0-9]{12}(?:[0-9]{3})?)$");
                    
                    if (!number) {
                        // Validating a MasterCard starting with 51 through 55, length 16 digits.
                        number = validate_element('#credit_card_number', "^(?:5[1-5][0-9]{14})$");
                        
                        if (!number) {
                            // Validating a American Express credit card starting with 34 or 37, length 15 digits.
                            number = validate_element('#credit_card_number', "^(?:3[47][0-9]{13})$");
                            
                            if (!number) {
                                // Validating a Discover card starting with 6011, length 16 digits or starting with 5, length 15 digits.
                                number = validate_element('#credit_card_number', "^(?:6(?:011|5[0-9][0-9])[0-9]{12})$");
                                
                                if (!number) {
                                    // Validating a Diners Club card starting with 300 through 305, 36, or 38, length 14 digits.
                                    number = validate_element('#credit_card_number', "^(?:3(?:0[0-5]|[68][0-9])[0-9]{11})$");
                                    
                                    if (!number) {
                                        // Validating a Elo credit card
                                        number = validate_element('#credit_card_number', "^(?:((((636368)|(438935)|(504175)|(451416)|(636297))[0-9]{0,10})|((5067)|(4576)|(4011))[0-9]{0,12}))$");
                                        
                                        if (!number) {
                                            // Validating a Hypercard
                                            number = validate_element('#credit_card_number', "^(?:(606282[0-9]{10}([0-9]{3})?)|(3841[0-9]{15}))$");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                
                var cvv = validate_element('#credit_card_cvc', "^[0-9]{3,4}$");
                var month = validate_month('#credit_card_exp_month', "^[0-10-9]{2,2}$");
                var year = validate_year('#credit_card_exp_year', "^[2-20-01-20-9]{4,4}$");            
                var date = validate_date($('#credit_card_exp_month').val(),$('#credit_card_exp_year').val());                  
                if (name && number && cvv && month && year) {
                    if (date) {
                        datas={
                            'user_login': login,
                            'user_pass': pass,
                            'user_email': email,
                            'credit_card_number': $('#credit_card_number').val(),
                            'credit_card_cvc': $('#credit_card_cvc').val(),
                            'credit_card_name': $('#credit_card_name').val(),
                            'credit_card_exp_month': $('#credit_card_exp_month').val(),
                            'credit_card_exp_year': $('#credit_card_exp_year').val(),
                            'need_delete': need_delete,
                            'early_client_canceled': early_client_canceled,
                            'plane_type': plane,
                            'pk': pk,
                            'datas': datas,
                            'purchase_access_token': registration_code
                        };
                        datas['ticket_peixe_urbano']=$('#ticket_peixe_urbano').val();
                        $.ajax({
                            url: base_url + 'index.php/welcome/check_client_data_bank',
                            data: datas,
                            type: 'POST',
                            dataType: 'json',
                            success: function (response) {
                                if (response['success']) {
                                    $(location).attr('href', base_url + 'index.php/welcome/purchase?language='+language);
                                } else {
                                    modal_alert_message(response['message']);
                                    set_global_var('flag', true);
                                    $('#btn_sing_in').attr('disabled', false);
                                    $('#btn_sing_in').css('cursor', 'pointer');
                                    $('#my_body').css('cursor', 'auto');
                                    l.stop();
                                }
                            },
                            error: function (xhr, status) {
                                set_global_var('flag', true);
                            }
                        });
                    } else {
                        modal_alert_message(T('Data errada'));
                        set_global_var('flag', true);
                        $('#btn_sing_in').attr('disabled', false);
                        $('#btn_sing_in').css('cursor', 'pointer');
                        $('#my_body').css('cursor', 'auto');
                        l.stop();
                    }   
                } else{
                    modal_alert_message(T('Verifique os dados fornecidos'));
                    set_global_var('flag', true);
                    $('#btn_sing_in').attr('disabled', false);
                    $('#btn_sing_in').css('cursor', 'pointer');
                    $('#my_body').css('cursor', 'auto');
                    l.stop();
                }
            } else if(payment_option==1){ //boleto bancario
                var ticket_bank_option = parseInt($('#ticket_bank_option').val());
                var ticket_bank_client_name = validate_element('#ticket_bank_client_name', "^[A-Za-z ]{4,50}$");
                var cpf = validate_cpf('#cpf', "^[0-9]{2,11}$");
                var cep = validate_element("#cep",'^[0-9]{8}$');
                var street_address = validate_element('#street_address','^[a-zA-Z0-9. áéíóúãõẽâîô]{5,80}$');
                var neighborhood_address = validate_element('#neighborhood_address','^[a-zA-Z0-9. áéíóúãõẽâîô]{2,80}$');
                var municipality_address = validate_element('#municipality_address','^[a-zA-Z0-9. áéíóúãõẽâîô]{2,80}$');
                var state_address = validate_element('#state_address','^[A-Z]{2}$');
                var house_number = validate_element('#house_number','^[0-9/]{1,7}$');
                var ticket_bank_option_tmp = validate_element('#ticket_bank_option','^[1-3]{1}$');
                
                if( ticket_bank_option_tmp && cep && street_address && neighborhood_address && municipality_address && state_address && house_number &&
                    cpf && ticket_bank_client_name && (ticket_bank_option>=1 && ticket_bank_option<=3)) {
                    datas={
                        'pk': pk,
                        'ticket_bank_option': $('#ticket_bank_option').val(),
                        'ticket_bank_client_name': $('#ticket_bank_client_name').val(),
                        'cpf': $('#cpf').val(),                        
                        'cep':$('#cep').val(),
                        'street_address': $('#street_address').val(),
                        'house_number': $('#house_number').val(),
                        'neighborhood_address': $('#neighborhood_address').val(),
                        'municipality_address': $('#municipality_address').val(),
                        'state_address': $('#state_address').val(),                         
                        'user_email': email,
                        'need_delete': need_delete,
                        'early_client_canceled': early_client_canceled,
                        'plane_type': plane,
                        'purchase_access_token': registration_code
                    };
                    $.ajax({
                        url: base_url + 'index.php/welcome/check_client_ticket_bank',
                        data: datas,
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {
                            if (response['success']) {
                                var text = "Boleto gerado com sucesso!!"+
                                    "Agora acesse ao seu email e continue com as instruções"
                                l.stop();
                                $('#btn_sing_in').css('cursor', 'pointer');
                                modal_alert_message(text);
                            } else{
                                modal_alert_message(response['message']);
                                set_global_var('flag', true);
                                $('#btn_sing_in').attr('disabled', false);
                                $('#btn_sing_in').css('cursor', 'pointer');
                                $('#my_body').css('cursor', 'auto');
                                l.stop();
                            }
                        },
                        error: function (xhr, status) {
                            set_global_var('flag', true);
                        }
                    });                    
                } else{                    
                    modal_alert_message('Alguns dados inválidos');
                    set_global_var('flag', true);
                    $('#btn_sing_in').attr('disabled', false);
                    $('#btn_sing_in').css('cursor', 'pointer');
                    $('#my_body').css('cursor', 'auto');
                    l.stop();
                }
                
                    
                
            }
        } else {
            console.log('paymet working');
        }
    });
    
    $('#container_login_panel').keypress(function (e) {
        if (e.which == 13) {
            $("#signin_btn_insta_login").click();
            return false;
        }
    });

    $('#btn_select_plane_slow').click(function () {
        $("#btn_select_plane_slow span div").text(T("SELECIONADO"));
        $("#btn_select_plane_moderated span div").text(T("SELECIONAR"));
        $("#btn_select_plane_fast span div").text(T("SELECIONAR"));
        $("#btn_select_plane_turbo span div").text(T("SELECIONAR"));
        $("#container_plane_4_90").addClass( "active" );
        $("#container_plane_9_90").removeClass( "active" );
        $("#container_plane_29_90").removeClass( "active" );
        $("#container_plane_99_90").removeClass( "active" );
        location.href = "#lnk_register_now";
        $("#client_email").focus();
        plane = '2';
    });
    
    $('#btn_select_plane_moderated').click(function () {
        $("#btn_select_plane_slow span div").text(T("SELECIONAR"));
        $("#btn_select_plane_moderated span div").text(T("SELECIONADO"));
        $("#btn_select_plane_fast span div").text(T("SELECIONAR"));
        $("#btn_select_plane_turbo span div").text(T("SELECIONAR"));
        $("#container_plane_4_90").removeClass( "active" );
        $("#container_plane_9_90").addClass( "active" );
        $("#container_plane_29_90").removeClass( "active" );
        $("#container_plane_99_90").removeClass( "active" );
        location.href = "#lnk_register_now";
        $("#client_email").focus();
        plane = '3';
    });
    
    $('#btn_select_plane_fast').click(function () {
        $("#btn_select_plane_slow span div").text(T("SELECIONAR"));
        $("#btn_select_plane_moderated span div").text(T("SELECIONAR"));
        $("#btn_select_plane_fast span div").text(T("SELECIONADO"));
        $("#btn_select_plane_turbo span div").text(T("SELECIONAR"));
        $("#container_plane_4_90").removeClass( "active" );
        $("#container_plane_9_90").removeClass( "active" );
        $("#container_plane_29_90").addClass( "active" );
        $("#container_plane_99_90").removeClass( "active" );
        location.href = "#lnk_register_now";
        $("#client_email").focus();
        plane = '4';
    });
    
    $('#btn_select_plane_turbo').click(function () {
        $("#btn_select_plane_slow span div").text(T("SELECIONAR"));
        $("#btn_select_plane_moderated span div").text(T("SELECIONAR"));
        $("#btn_select_plane_fast span div").text(T("SELECIONAR"));
        $("#btn_select_plane_turbo span div").text(T("SELECIONADO"));
        $("#container_plane_4_90").removeClass( "active" );
        $("#container_plane_9_90").removeClass( "active" );
        $("#container_plane_29_90").removeClass( "active" );
        $("#container_plane_99_90").addClass( "active" );
        location.href = "#lnk_register_now";
        $("#client_email").focus();
        plane = '5';
    });
    
    $('#coniner_data_panel').css({'height': ''+$('#coniner_login_panel').height()});
    $('#container_sing_in_panel').css({'height': ''+$('#coniner_login_panel').height()});

    function active_by_steep(steep) {
        switch (steep) {
            case 1:
                $('#container_login_panel').css('visibility', 'visible');
                $('#container_login_panel').css('display', 'block');
                $('#signin_profile').css({'visibility':'hidden','display':'none'});                
                $('#coniner_data_panel *').prop('disabled', true);
                $('#coniner_data_panel').css('background-color', '#F5F5F5');
                $('#container_sing_in_panel *').prop('disabled', true);
                $('#container_sing_in_panel').css('background-color', '#F5F5F5');
                $("#btn_sing_in").hover(function () {
                    $('#btn_sing_in').css('cursor', 'not-allowed');
                }, function () { });                
                $("#coniner_data_panel *").hover(function () {
                    $('#coniner_data_panel *').css('cursor', 'not-allowed');
                }, function () { });                
                $("#container_sing_in_panel *").hover(function () {
                    $('#container_sing_in_panel *').css('cursor', 'not-allowed');
                }, function () { });                
                break;                
            case 2:                
                $('#login_sign_in').css('visibility', 'hidden');
                $('#container_sigin_message').css('visibility', 'hidden');
                $('#container_login_panel').css('visibility', 'hidden');
                $('#container_login_panel').css('display', 'none');
                $('#signin_profile').css('visibility', 'visible');
                $('#signin_profile').css('display', 'block');
                $('#img_ref_prof').attr("src", insta_profile_datas.profile_pic_url);
                $('#name_ref_prof').text(insta_profile_datas.username);
                $('#ref_prof_followers').text(T('Seguidores: ') + insta_profile_datas.follower_count);
                $('#ref_prof_following').text(T('Seguindo: ') + insta_profile_datas.following);
                $('#coniner_data_panel *').prop('disabled', false);
                $('#coniner_data_panel *').css('color', '#000000');
                $('#container_sing_in_panel *').prop('disabled', false);
                $('#container_sing_in_panel *').css('color', '#000000');
                $('#coniner_data_panel').css('background-color', 'transparent');
                $('#container_sing_in_panel').css('background-color', 'transparent');
                $('#btn_sing_in').css('cursor', 'default');
                $("#coniner_data_panel *").hover(function () {
                    $('#coniner_data_panel *').css('cursor', 'auto');
                }, function () { });
                $("#container_sing_in_panel *").hover(function () {
                    $('#container_sing_in_panel *').css('cursor', 'auto');
                }, function () { });
                break;
            case 3:                
                $('#login_sign_in').css('visibility', 'hidden');
                $('#container_sigin_message').css('visibility', 'hidden');
                $('#container_login_panel').css('visibility', 'hidden');
                $('#container_login_panel').css('display', 'none');
                $('#signin_profile').css('visibility', 'visible');
                $('#signin_profile').css('display', 'block');
                $('#img_ref_prof').attr("src", insta_profile_datas.profile_pic_url);
                $('#name_ref_prof').text(insta_profile_datas.username);
                $('#ref_prof_followers').text(T('Seguidores: ') + insta_profile_datas.follower_count);
                $('#ref_prof_following').text(T('Seguindo: ') + insta_profile_datas.following);
                break;
        }
    }

    $("#tab_credit_card").click(function () {
        payment_option=0;
    });
    
    $("#tab_ticket_bank").click(function () {
        payment_option=1;
    });
    
    $("#show_login").click(function () {
        $("#loginform").fadeIn();
        $("#loginform").css({"visibility": "visible", "display": "block"});
    });

    $("#close_login").click(function () {
        $("#loginform").fadeOut();
        $("#loginform").css({"visibility": "hidden", "display": "none"});
    });

    $("#lnk_use_term").click(function () {
        url = base_url + "assets/others/TERMOS DE USO DUMBU 2.pdf";
        window.open(url, '_blank');
        return false;
    });
    
    $("#signin_btn_send_code").click(function () {
        if ($('#signin_code').val() != '') {
            if (validate_element('#signin_code', "^[0-9]{4}$")) {
                var l = Ladda.create(this);
                l.start();
                l.start();
                $.ajax({
                    url: base_url + 'index.php/welcome/check_registration_code',
                    data: {
                        'pk': pk,
                        'registration_code': $('#signin_code').val()
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response['success']) {
                            set_global_var('registration_code', response['registration_code']);
                            $('#signin_code').css('visibility', 'hidden');
                            $('#signin_btn_send_code').css('visibility', 'hidden');
                            active_by_steep(2);
                            $('#container_sigin_code_message').text(response['message']);
                            $('#container_sigin_code_message').css('visibility', 'visible');
                            $('#container_sigin_code_message').css('color', 'green');
                            l.stop();
                        } else {
                            $('#container_sigin_code_message').text(response['message']);
                            $('#container_sigin_code_message').css('visibility', 'visible');
                            $('#container_sigin_code_message').css('color', 'red');
                            l.stop();
                        }
                    },
                    error: function (xhr, status) {
                        $('#container_sigin_code_message').text(T('Não foi possível verificar o código enviado!'));
                        $('#container_sigin_code_message').css('visibility', 'visible');
                        $('#container_sigin_code_message').css('color', 'red');
                        l.stop();
                    }
                });
            } else {
                $('#container_sigin_code_message').text(T('O código do cadastro só pode conter 4 números!'));
                $('#container_sigin_code_message').css('visibility', 'visible');
                $('#container_sigin_code_message').css('color', 'red');
            }
        } else {
            $('#container_sigin_code_message').text(T('Deve preencher todos os dados corretamente!'));
            $('#container_sigin_code_message').css('visibility', 'visible');
            $('#container_sigin_code_message').css('color', 'red');
            //modal_alert_message('Formulario incompleto');
        }
    });

    
}); 