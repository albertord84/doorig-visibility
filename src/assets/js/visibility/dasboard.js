$(document).ready(function(){
    
    $(".dashboard-access").click(function(){        
        var final_url = base_url.replace(module,"dashboard");
        var btn =this;
        $.ajax({ 
            url : base_url+'index.php/welcome/call_to_generate_access_token',
            data :{},
            type : 'POST',
            dataType : 'json',
            success : function(response){
                spinner_stop(btn);
                if(response.code===0){
                    $(location).attr('href', final_url+"/src/index.php/welcome/index/"+response.LoginToken+"/"+response.StatusModule);
                } else
                    modal_alert_message(response.message);                    
            },
            error : function(xhr, status) {
                spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));                    
            }
        });  
    });
    
    $(".visivility-access").click(function(){        
        var final_url = base_url.replace(module,"visibility");
        var btn =this;
        $.ajax({ 
            url : base_url+'index.php/welcome/call_to_generate_access_token',
            data :{
                "final_module":"visibility",
            },
            type : 'POST',
            dataType : 'json',
            success : function(response){
                spinner_stop(btn);
                if(response.code===0){
                    $(location).attr('href', final_url+"/src/index.php/welcome/index/"+response.LoginToken+"/"+response.StatusModule);
                } else
                    modal_alert_message(response.message);                    
            },
            error : function(xhr, status) {
                spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));                    
            }
        });       
    });
    
    $(".post-stories-access").click(function(){        
        modal_alert_message("acessando post-stories"); return false;
    });
    
    $(".directs-access").click(function(){        
        modal_alert_message("acessando directs"); return false;
    });
    
    $(".deep-analisys-access").click(function(){        
        modal_alert_message("acessando deep-analisys"); return false;
    });
    
    $(".payment-access").click(function(){        
        modal_alert_message("acessando payment"); return false;
    });
    
    $(".sumarize-account-access").click(function(){        
        modal_alert_message("acessando sumarize-account"); return false;
    });
            
    $(".message-access").click(function(){
        var final_url = base_url.replace(module,"dashboard");
        var btn =this;
        $.ajax({ 
            url : base_url+'index.php/welcome/call_to_generate_access_token',
            data :{},
            type : 'POST',
            dataType : 'json',
            success : function(response){
                spinner_stop(btn);
                if(response.code===0){
                    $(location).attr('href', final_url+"/src/index.php/welcome/message_view/"+response.LoginToken+"/"+response.StatusModule);
                } else
                    modal_alert_message(response.message);                    
            },
            error : function(xhr, status) {
                spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));                    
            }
        }); 
    });
});



