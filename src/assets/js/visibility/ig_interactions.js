$(document).ready(function () {
    
});

function search_match_profile(input_profile_id,table_match_id){
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $(input_profile_id).val(),
        type: 'GET',
        dataType: 'json',        
        success: function (response) {
            $(table_match_id).empty();
            if (response['users'].length !== 0) {
                var i = 0;
                var username, full_name, profile_pic_url, is_verified, follower_count;
                while (response['users'][i]) {
                    username = response['users'][i]['user']['username'];
                    full_name = response['users'][i]['user']['full_name'];
                    profile_pic_url = response['users'][i]['user']['profile_pic_url'];
                    is_verified = response['users'][i]['user']['is_verified'];
                    follower_count = response['users'][i]['user']['follower_count'];                    
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

function search_match_geolocation(input_geolocation_id,table_match_id){
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $(input_geolocation_id).val(),
        type: 'GET',
        dataType: 'json',        
        success: function (response) {            
            $(table_match_id).empty();            
            if (response['places'].length !== 0) {
                var i = 0;
                var location_name, location_address, location_city, place_slug;
                while (response['places'][i]) {
                    location_name = response['places'][i]['place']['location']['name'];
                    location_address = response['places'][i]['place']['location']['address'];
                    location_city = response['places'][i]['place']['location']['city'];
                    place_slug = response['places'][i]['place']['slug'];                    
                    $(table_match_id).append(
                        "<tr class='row' id='row_geo_"+i+"'>"+
                            "<td class='col col-img-profile' id='col_1_geo_"+i+"'>"+
                                "<i class='sl-icon-location-pin' style='font-size: 30px;color:#20aee3'>"+                                
                            "</td>"+
                            "<td class='col' id='col_2_geo_"+i+"' style='text-align: left; vertical-align: middle;'>" +                                                         
                                "<div class='tt-suggestion' style='text-align: left; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 50px;' onclick='select_geolocalization_from_search(\"" + input_geolocation_id + "\",\"" + table_match_id + "\",\"" + place_slug + "\");'>" +
                                    "<strong>" + location_name + "</strong><br>"+
                                    "<span style='color: gray;'>"+
                                        location_address +
                                        ((location_address && location_city) ? ", " : "") +
                                        location_city + 
                                    "</span>"+
                                "</div>"+
                            "</td>"+
                        "</tr>");
                    i++;
                }
            }else {
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

function search_match_hashtag(input_hashtag_id,table_match_id){
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=%23' + $(input_hashtag_id).val(),
        type: 'GET',
        dataType: 'json',        
        success: function (response) {
            $(table_match_id).empty();
            if (response['hashtags'].length !== 0) {
                var i = 0;
                var hashtag_name;
                while (response['hashtags'][i]) {
                    hashtag_name = response['hashtags'][i]['hashtag']['name'];
                    $(table_match_id).append(
                        "<tr class='row' id='row_tag_"+i+"'>"+
                            "<td class='col col-img-profile' id='col_1_geo_"+i+"'>"+
                                "<span style='font-size: 30px;color:#20aee3'>#</span>"+                                
                            "</td>"+
                            "<td class='col' id='col_tag_"+i+"' style='text-align: left'>"+
                                "<div class='tt-suggestion' onclick='select_hashtag_from_search(\"" + input_hashtag_id + "\",\"" + table_match_id + "\",\"" + hashtag_name + "\");'>" +
                                    "<strong>" + hashtag_name+"</strong><br>"+
                                    "<span style='color: gray;'>"+
                                        response['hashtags'][i]['hashtag']['media_count'] + T(' publicações') + 
                                    "</span>"+
                                "</div>"+
                            "</td>"+
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

function search_match_profile_wl(input_profile_id,table_match_id){
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $(input_profile_id).val(),
        type: 'GET',
        dataType: 'json',        
        success: function (response) {
            $(table_match_id).empty();
            if (response['users'].length !== 0) {
                var i = 0;
                var username, full_name, profile_pic_url, is_verified, follower_count;
                while (response['users'][i]) {
                    username = response['users'][i]['user']['username'];
                    full_name = response['users'][i]['user']['full_name'];
                    profile_pic_url = response['users'][i]['user']['profile_pic_url'];
                    is_verified = response['users'][i]['user']['is_verified'];
                    follower_count = response['users'][i]['user']['follower_count'];                    
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

function get_profile_datas(profile){
    //1. llamar por ajax a www.instagram.com/profile
    
    //2. parcear la pagina html obtenida
    
    //3. retornar datos del perfil como 
    profile_datas = {
        "profile" : profile,
        "followers" : 12353,
        "following" : 345,
        "post" : 789,
        "profile_picture_url" : "https://instagram.fsdu8-1.fna.fbcdn.net/vp/e3e5009d310027e1344a6ef66285c867/5CDAF899/t51.2885-19/s150x150/47694626_1984680308492965_2263875741303177216_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net",
        "profile_url" : "https://www.instagram.com/leticiajural/",
    };
    return profile_datas;
}

function get_geolocation_datas(geolocation){
    //1. llamar por ajax a www.instagram.com/profile
    
    //2. parcear la pagina html obtenida
    
    //3. retornar datos de la geolocation como 
    geolocation_datas = {
        "geolocation" : geolocation,
        "place" : "Paraty, Rio de Janeiro, Brazil",
        "geolocation_picture_url" : "https://instagram.fsdu8-1.fna.fbcdn.net/vp/07114fc29134522fb4155acd130f6356/5CEDA917/t51.2885-15/e35/c0.180.1440.1440/s150x150/50940491_285229628820295_7727971394039570778_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net",
        "geolocation_url" : "https://www.instagram.com/explore/locations/132572325/paraty-rio-de-janeiro-brazil/",
    };
    return geolocation_datas;
}

function get_hashtag_datas(hashtag){
    //1. llamar por ajax a www.instagram.com/hashtag
    
    //2. parcear la pagina html obtenida
    
    //3. retornar datos del hashtag como 
    hashtag_datas = {
        "hashtag" : hashtag,
        "post" : "122,763",
        "hashtag_picture_url" : "https://instagram.fsdu8-1.fna.fbcdn.net/vp/b7bf187e14a9483e73010aa9ea668f64/5CEEB777/t51.2885-15/e35/s150x150/49466842_394330344461436_4342610591931226679_n.jpg?_nc_ht=instagram.fsdu8-1.fna.fbcdn.net",
        "hashtag_url" : "https://www.instagram.com/explore/tags/paratyrj/",
    };
    return hashtag_datas;
}

function select_profile_from_search(input_profile_id,table_match_id,prof_name) {
    $(input_profile_id).val(prof_name);
    $(table_match_id).empty();
}

function select_geolocalization_from_search(geolocation_id,table_match_id,geolocation_name) {
    $(geolocation_id).val(geolocation_name);
    $(table_match_id).empty();
}

function select_hashtag_from_search(input_hashtag_id,table_match_id,hashtag_name) {
    $(input_hashtag_id).val(hashtag_name);
    $(table_match_id).empty();
}
