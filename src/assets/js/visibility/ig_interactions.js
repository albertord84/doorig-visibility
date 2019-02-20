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
                        "<tr class='row' id='row_prof_" + i + "'>" +
                            "<td class='col col-img-profile' id='col_1_prof_" + i + "'>" +
                                "<img class='search-img-profile' src='" + profile_pic_url + "' onclick='select_profile_from_search(\"" + username + "\");'>" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                                "<div class='tt-suggestion' class='search-div-profile' onclick='select_profile_from_search(\"" + username + "\");'>" +
                                    "<div>" +
                                        "<span><strong>" + username + "</strong></span>" +
                                    "</div>" +
                                    "<span style='color: gray;'>" + follower_count + " seguidores</span>" +
                                "</div>" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                                "<div class='tt-suggestion' class='search-div-profile' onclick='select_profile_from_search(\"" + username + "\");'>" +
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

function search_match_hashtag(input_hashtag_id,table_match_id){
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
                        "<tr class='row' id='row_prof_" + i + "'>" +
                            "<td class='col col-img-profile' id='col_1_prof_" + i + "'>" +
                                "<img class='search-img-profile' src='" + profile_pic_url + "' onclick='select_profile_from_search(\"" + username + "\");'>" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                                "<div class='tt-suggestion' class='search-div-profile' onclick='select_profile_from_search(\"" + username + "\");'>" +
                                    "<div>" +
                                        "<span><strong>" + username + "</strong></span>" +
                                    "</div>" +
                                    "<span style='color: gray;'>" + follower_count + " seguidores</span>" +
                                "</div>" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                                "<div class='tt-suggestion' class='search-div-profile' onclick='select_profile_from_search(\"" + username + "\");'>" +
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
                        "<tr class='row' id='row_prof_" + i + "'>" +
                            "<td class='col col-img-profile' id='col_1_prof_" + i + "'>" +
                                "<img class='search-img-profile' src='" + profile_pic_url + "' onclick='select_profile_from_search(\"" + username + "\");'>" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                                "<div class='tt-suggestion' class='search-div-profile' onclick='select_profile_from_search(\"" + username + "\");'>" +
                                    "<div>" +
                                        "<span><strong>" + username + "</strong></span>" +
                                    "</div>" +
                                    "<span style='color: gray;'>" + follower_count + " seguidores</span>" +
                                "</div>" +
                            "</td>" +
                            "<td class='col' id='col_2_prof_" + i + "' style='text-align: left;'>" +
                                "<div class='tt-suggestion' class='search-div-profile' onclick='select_profile_from_search(\"" + username + "\");'>" +
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


$('#login_hashtag').keyup(function() {
        $.ajax({
            url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=%23' + $('#login_hashtag').val(),
            data: {},
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#table_search_hashtag").empty();
                $('#hashtag_message').css('visibility', 'hidden');
                if (response['has_more']) {
                    var i = 0;
                    var hashtag_name;
                    while (response['hashtags'][i]) {
                        hashtag_name = response['hashtags'][i]['hashtag']['name'];
                        $("#table_search_hashtag").append("<tr class='row' id='row_tag_"+i+"'>");
                        $("#table_search_hashtag").append("<td class='col' id='col_tag_"+i+"' style='text-align: left'><div class='tt-suggestion' onclick='select_hashtag_from_search(\"" + hashtag_name + "\");'>" +
                            "<strong>#" + hashtag_name+"</strong><br><span style='color: gray;'>"+
                            response['hashtags'][i]['hashtag']['media_count'] + T(' publicações') + "</span></div></td></tr>");
                        i++;
                    }
                    
                } else {
                    if ($('#login_hashtag').val() !== '') {
                        $("#table_search_hashtag").append("<tr class='row'><td class='col'>"+T('Nenhum resultado encontrado.')+"</td></tr>");
                        $('#hashtag_message').css('visibility', 'hidden');
//                        $('#hashtag_message').text('Nenhum resultado encontrado.');
//                        $('#hashtag_message').css('visibility', 'visible');
//                        $('#hashtag_message').css('color', 'red');  
                    }
                }
            },
            error: function (xhr, status) {
                $('#hashtag_message').text(T('Não foi possível conectar com o Instagram'));
                $('#hashtag_message').css('visibility', 'visible');
                $('#hashtag_message').css('color', 'red');
            }
        });
    });
    
    $('#login_geolocalization').keyup(function() {
        $.ajax({
            url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $('#login_geolocalization').val(),
            data: {},
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $("#table_search_geolocalization").empty();
                $('#geolocalization_message').css('visibility', 'hidden');
                if (response['places'].length !== 0) {
                    var i = 0;
                    var location_name, location_address, location_city, place_slug;
                    while (response['places'][i]) {
                        location_name = response['places'][i]['place']['location']['name'];
                        location_address = response['places'][i]['place']['location']['address'];
                        location_city = response['places'][i]['place']['location']['city'];
                        place_slug = response['places'][i]['place']['slug'];
                        $("#table_search_geolocalization").append("<tr class='row' id='row_geo_"+i+"'>");
                        $("#table_search_geolocalization").append("<td class='col' id='col_1_geo_"+i+"'>"+
                            "<div><span style='font-size: 30px; color:gray; margin-top: 10px;' class='glyphicon glyphicon-map-marker'></span></div></td>");
                        $("#table_search_geolocalization").append("<td class='col' id='col_2_geo_"+i+"' style='text-align: left; vertical-align: middle;'>" +
                            "<div class='tt-suggestion' style='text-align: left; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; height: 50px;' onclick='select_geolocalization_from_search(\"" + place_slug + "\");'>" +
                                "<strong>" + location_name + "</strong><br><span style='color: gray;'>"+
                                location_address +
                                ((location_address && location_city) ? ", " : "") +
                                location_city + "</span></div></td></tr>");
                        i++;
                    }
                    
                } else {
                    if ($('#login_geolocalization').val() !== '') {
                        $("#table_search_geolocalization").append("<tr class='row'><td class='col'>"+T('Nenhum resultado encontrado.')+"</td></tr>");
                        $('#geolocalization_message').css('visibility', 'hidden');
                    }
                }
            },
            error: function (xhr, status) {
                $('#geolocalization_message').text(T('Não foi possível conectar com o Instagram'));
                $('#geolocalization_message').css('visibility', 'visible');
                $('#geolocalization_message').css('color', 'red');
            }
        });
    });




























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





//dataType: 'jsonp',
//beforeSend: function (xhr) {
//    xhr.setRequestHeader(':authority', 'www.instagram.com');
//    xhr.setRequestHeader(':method', 'GET');
//    xhr.setRequestHeader(':path', '/web/search/topsearch/?context=blended&query=al&callback=jQuery32003403251990352948_1550201329571&_=1550201329573');
//    xhr.setRequestHeader(':scheme', 'https');
//    xhr.setRequestHeader('accept', 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8');
//    xhr.setRequestHeader('accept-encoding', 'gzip, deflate, br');
//    xhr.setRequestHeader('accept-language', 'en-US,en;q=0.9');
//    xhr.setRequestHeader('cache-control', 'max-age=0');
//    xhr.setRequestHeader('cookie', 'mcd=3; mid=XDN3AwAEAAG1aSPQ6sIPBrrTrQsW; fbm_124024574287414=base_domain=.instagram.com; fbsr_124024574287414=1NFwc7mQbEgw6whqZnVXeAUbngRQPY0MXZTlYqejcEQ.eyJjb2RlIjoiQVFDSnU1UlZFelQ2NHI3NUlKTnhLMHR6VUJndkQ5SFVDM21pQ1FqQzdTVDJoSFFBWlZPTmcyd0lqWmVrTm1RZ2RKYTV3WHhfN2ZwRml4b0hsYU9GelJrMEk0VHIwYlBzZnpjTTRIZmZ2SWdrUXA4d25WWkliVWtVbUppaE5aQllLRDdVaUh1QXY2YWNENDVqT2pWeHlKLW5IdFpndTZ0bzhLeDVYV2MwSEtWTExXM2tqLWE4WnYtbUFxVWRUbnBoR3NqWlE5VmxsVk00azFaZlJudWdwQVI0cE8yTjJNdHJCYWYzSWhEdTR6aVFMSW9tTmxxOWEwZGh6alJqeTVRWkgyb1dKdlZuNEwyTDRyTkFfdzZFaGJSUDVfWjdiaERQeEdrUTRoTzNHdEUwejNfMFF6dTVhQzdhaVZTdmdzRURwN2hwTHFmYktabm9DVnhnWDlHQk1Ya3kiLCJ1c2VyX2lkIjoiMTAwMDA4ODg2OTk0NzQzIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE1NTAyMDA3NzB9; csrftoken=TWhzeRyGsdPcSsxq2owoZetE1yDuJVNs; ds_user_id=3858629065; sessionid=3858629065%3AwfpspkmBRMazuV%3A15; rur=ATN; urlgen="{\"177.41.23.216\": 18881}:1guUNU:lVyLrBOpJZq34vtfGvciS4HdkTI');
//    xhr.setRequestHeader('upgrade-insecure-requests', '1');
//    xhr.setRequestHeader('user-agent', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36');
//    console.log(xhr);
//},
//headers: {
//    "authority": "www.instagram.com",
//    "method": "GET",
//    "path": "/web/search/topsearch/?context=blended&query=al&callback=jQuery32003403251990352948_1550201329571&_=1550201329573",
//    "scheme": "https",
//    "accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
//    "accept-encoding": "gzip, deflate, br",
//    "accept-language": "en-US,en;q=0.9",
//    "cache-control": "max-age=0",
//    "cookie": 'mcd=3; mid=XDN3AwAEAAG1aSPQ6sIPBrrTrQsW; fbm_124024574287414=base_domain=.instagram.com; fbsr_124024574287414=1NFwc7mQbEgw6whqZnVXeAUbngRQPY0MXZTlYqejcEQ.eyJjb2RlIjoiQVFDSnU1UlZFelQ2NHI3NUlKTnhLMHR6VUJndkQ5SFVDM21pQ1FqQzdTVDJoSFFBWlZPTmcyd0lqWmVrTm1RZ2RKYTV3WHhfN2ZwRml4b0hsYU9GelJrMEk0VHIwYlBzZnpjTTRIZmZ2SWdrUXA4d25WWkliVWtVbUppaE5aQllLRDdVaUh1QXY2YWNENDVqT2pWeHlKLW5IdFpndTZ0bzhLeDVYV2MwSEtWTExXM2tqLWE4WnYtbUFxVWRUbnBoR3NqWlE5VmxsVk00azFaZlJudWdwQVI0cE8yTjJNdHJCYWYzSWhEdTR6aVFMSW9tTmxxOWEwZGh6alJqeTVRWkgyb1dKdlZuNEwyTDRyTkFfdzZFaGJSUDVfWjdiaERQeEdrUTRoTzNHdEUwejNfMFF6dTVhQzdhaVZTdmdzRURwN2hwTHFmYktabm9DVnhnWDlHQk1Ya3kiLCJ1c2VyX2lkIjoiMTAwMDA4ODg2OTk0NzQzIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE1NTAyMDA3NzB9; csrftoken=TWhzeRyGsdPcSsxq2owoZetE1yDuJVNs; ds_user_id=3858629065; sessionid=3858629065%3AwfpspkmBRMazuV%3A15; rur=ATN; urlgen="{\"177.41.23.216\": 18881}:1guUNU:lVyLrBOpJZq34vtfGvciS4HdkTI"',
//    "upgrade-insecure-requests": 1,
//    "user-agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36"
//},