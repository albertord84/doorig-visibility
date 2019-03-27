$(document).ready(function () {
    var str =   "<li role='separator' class='divider'></li>"+
                "<li><a href='"+base_url+"index.php/welcome/mark'><i class='fab fa-instagram'></i> Atualizar marca</a></li>"+
                "<li><a href='"+base_url+"index.php/welcome/planes'><i class='fas fa-tachometer-alt'></i> Atualizar planos</a></li>";
    $("#dinamic_menu_items").append(str);

});

    