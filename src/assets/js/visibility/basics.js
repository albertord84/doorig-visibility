$(document).ready(function(){  
    
    function modal_alert_message(text_message){
        $('#modal_alert_message').modal('show');
        $('#alert_message_text').text(text_message);        
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    function modal_success_message(text_message){
        $('#modal_success_message').modal('show');
        $('#success_message_text').text(text_message);        
    }
    
    $("#accept_modal_success_message").click(function () {
        $('#modal_success_message').modal('hide');
    });
    
    function validate_element(element_selector,pattern){
        if(!$(element_selector).val().match(pattern)){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    } 
        
    function validate_not_empty(element_selector){
        if($(element_selector).val().trim()==""){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
        
    function getUrlVars(){
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++){
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }
        
    function validate_cpf(element_selector, pattern) {
        var cpf=$(element_selector).val();
        if(cpf.match(pattern)){
            cpf = cpf.replace(/[^\d]+/g,'');    
            if(cpf == '') {
                $(element_selector).css("border", "1px solid red");
                return false;
            }
            // Elimina CPFs invalidos conhecidos    
            if (cpf.length != 11 || 
                cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" 
                || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" 
                || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" 
                || cpf == "99999999999"){
                    $(element_selector).css("border", "1px solid red");
                    return false;
                }
            // Valida 1o digito 
            add = 0;
            for (i=0; i < 9; i ++)       
                add += parseInt(cpf.charAt(i)) * (10 - i);  
                rev = 11 - (add % 11);  
                if(rev == 10 || rev == 11)     
                    rev = 0;    
                if(rev != parseInt(cpf.charAt(9))){
                    $(element_selector).css("border", "1px solid red");
                    return false;
                }
            // Valida 2o digito 
            add = 0;
            for (i = 0; i < 10; i ++)
                add += parseInt(cpf.charAt(i)) * (11 - i);  
            rev = 11 - (add % 11);
            if (rev == 10 || rev == 11)
                rev = 0;
            if (rev != parseInt(cpf.charAt(10))){
                $(element_selector).css("border", "1px solid red");
                return false;
            }            
            $(element_selector).css("border", "1px solid gray");
            return true;
        }else{
            $(element_selector).css("border", "1px solid red");
            return false;
        }
    }
      
    function validate_month(element_selector, pattern) {
        if (!$(element_selector).val().match(pattern) || Number($(element_selector).val()) > 12) {
            $(element_selector).css("border", "1px solid red");
            return false;
        } else {
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
    
    function validate_year(element_selector, pattern) {
        if (!$(element_selector).val().match(pattern) || Number($(element_selector).val()) < 2017) {
            $(element_selector).css("border", "1px solid red");
            return false;
        } else {
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
    
    function validate_date(month, year) {
        var d=new Date();
        if (year < d.getFullYear() || (year == d.getFullYear() && month <= d.getMonth()+1)){
            return false;
        }
        return true;
    }
      
    function set_global_var(str, value) {
        switch (str) {
            case 'pk':
                pk = value;
                break;
            case 'early_client_canceled':
                early_client_canceled = value;
                break;
            case 'need_delete':
                need_delete = value;
                break;
            case 'login':
                login = value;
                break;
            case 'pass':
                pass = value;
                break;
            case 'datas':
                datas = value;
                break;
            case 'email':
                email = value;
                break;
            case 'flag':
                flag = value;
                break;
            case 'insta_profile_datas':
                insta_profile_datas = value;
                break;
            case 'cupao_number_checked':
                cupao_number_checked = value;
                break;
            case 'registration_code':
                registration_code = value;
                break;            
        }
    }
    
 }); 