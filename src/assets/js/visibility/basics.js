var ig_profile_regular_expression = "^[a-zA-Z0-9\._]{1,300}$";
var ig_geolocation_regular_expression = "^[a-zA-Z-0-9\._]{1,300}$";
var ig_hashtag_regular_expression = "^[a-zA-Z0-9\._]{1,300}$";
var verification_code_regular_expression = "^[0-9]{4}$";
var checkpoint_required_code_regular_expression = "^[0-9]{6}$";
var email_regular_expression = "^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,}$";
var complete_name_regular_expression = "^[a-z A-Z0-9áÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊôÔûÛñ\._]{2,150}$";

function validate_element(element_selector,pattern){
    if(!$(element_selector).val().match(pattern)){
        $(element_selector).css("border", "1px solid red");
        return false;
    } else{
        $(element_selector).css("border", "1px solid #d9d9d9");
        return true;
    }
}

function validate_not_empty(element_selector){
    if($(element_selector).val().trim()==""){
        $(element_selector).css("border", "1px solid red");
        return false;
    } else{
        $(element_selector).css("border", "1px solid #d9d9d9");
        return true;
    }
}

function validate_equals(element_selector, element_selector2){
    if($(element_selector2).val().trim()=="" || $(element_selector).val().trim()!==$(element_selector2).val().trim()){
        $(element_selector2).css("border", "1px solid red");
        return false;
    } else{
        $(element_selector2).css("border", "1px solid #d9d9d9");
        return true;
    }
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
        $(element_selector).css("border", "1px solid #d9d9d9");
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
        $(element_selector).css("border", "1px solid #d9d9d9");
        return true;
    }
}

function validate_year(element_selector, pattern) {
    if (!$(element_selector).val().match(pattern) || Number($(element_selector).val()) < 2017) {
        $(element_selector).css("border", "1px solid red");
        return false;
    } else {
        $(element_selector).css("border", "1px solid #d9d9d9");
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

function set_global_var(str, value) {
    switch (str) {
        case 'pk':
            pk = value;
            break;                 
    }
}

function spinner_start(handle){
    $(handle).children("i").css({"display":"inline-block","visibility":"visible"});
}

function spinner_stop(handle){
    $(handle).children("i").css({"display":"none","visibility":"hidden"});
}

function modal_alert_message(text_message){
    $('#modal_alert_message').modal('show');
    $('#alert_message_text').text(text_message);        
}

function modal_success_message(text_message){
    $('#modal_success_message').modal('show');
    $('#success_message_text').text(text_message);        
}

function modal_confirm_message(text_message,function_name,param){
    var action = function_name+"('"+param+"')";
    $('#confirm_message_text').text(text_message);
    $('#accept_modal_confirm_message').attr('onclick',action)
    $('#modal_confirm_message').modal('show');
}

$(document).ready(function(){  
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    $("#accept_modal_success_message").click(function () {
        $('#modal_success_message').modal('hide');
    });
    
 }); 
 