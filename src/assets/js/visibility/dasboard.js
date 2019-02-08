$(document).ready(function(){
    
    $("#message_lnk").click(function(){
        url = base_url.replace(module,"dashboard");
        $(location).attr('href', url+"index.php/welcome/message_view");
        return false;
    });
    
    $("#visivility_lnk").click(function(){        
        //chamar por AJAX a função geradora de access_token
        //e no success do AJAX fazer a redireção
        url = base_url.replace(module,"visibility");
        $(location).attr('href', url);
        return false;
    });
    
    
});



