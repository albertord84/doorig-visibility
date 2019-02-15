$(document).ready(function () {

    $('#login_profile').keyup(function () {
        return;
        var urli = 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $('#login_profile').val();
        console.log(urli);
        $.ajax({
            url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $('#login_profile').val(),
            type: 'GET',
            dataType: 'json',
//            dataType: 'jsonp',
//            beforeSend: function (xhr) {
//                xhr.setRequestHeader(':authority', 'www.instagram.com');
//                xhr.setRequestHeader(':method', 'GET');
//                xhr.setRequestHeader(':path', '/web/search/topsearch/?context=blended&query=al&callback=jQuery32003403251990352948_1550201329571&_=1550201329573');
//                xhr.setRequestHeader(':scheme', 'https');
//                xhr.setRequestHeader('accept', 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8');
//                xhr.setRequestHeader('accept-encoding', 'gzip, deflate, br');
//                xhr.setRequestHeader('accept-language', 'en-US,en;q=0.9');
//                xhr.setRequestHeader('cache-control', 'max-age=0');
//                xhr.setRequestHeader('cookie', 'mcd=3; mid=XDN3AwAEAAG1aSPQ6sIPBrrTrQsW; fbm_124024574287414=base_domain=.instagram.com; fbsr_124024574287414=1NFwc7mQbEgw6whqZnVXeAUbngRQPY0MXZTlYqejcEQ.eyJjb2RlIjoiQVFDSnU1UlZFelQ2NHI3NUlKTnhLMHR6VUJndkQ5SFVDM21pQ1FqQzdTVDJoSFFBWlZPTmcyd0lqWmVrTm1RZ2RKYTV3WHhfN2ZwRml4b0hsYU9GelJrMEk0VHIwYlBzZnpjTTRIZmZ2SWdrUXA4d25WWkliVWtVbUppaE5aQllLRDdVaUh1QXY2YWNENDVqT2pWeHlKLW5IdFpndTZ0bzhLeDVYV2MwSEtWTExXM2tqLWE4WnYtbUFxVWRUbnBoR3NqWlE5VmxsVk00azFaZlJudWdwQVI0cE8yTjJNdHJCYWYzSWhEdTR6aVFMSW9tTmxxOWEwZGh6alJqeTVRWkgyb1dKdlZuNEwyTDRyTkFfdzZFaGJSUDVfWjdiaERQeEdrUTRoTzNHdEUwejNfMFF6dTVhQzdhaVZTdmdzRURwN2hwTHFmYktabm9DVnhnWDlHQk1Ya3kiLCJ1c2VyX2lkIjoiMTAwMDA4ODg2OTk0NzQzIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE1NTAyMDA3NzB9; csrftoken=TWhzeRyGsdPcSsxq2owoZetE1yDuJVNs; ds_user_id=3858629065; sessionid=3858629065%3AwfpspkmBRMazuV%3A15; rur=ATN; urlgen="{\"177.41.23.216\": 18881}:1guUNU:lVyLrBOpJZq34vtfGvciS4HdkTI');
//                xhr.setRequestHeader('upgrade-insecure-requests', '1');
//                xhr.setRequestHeader('user-agent', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36');
//                console.log(xhr);
//            },
//            headers: {
//                "authority": "www.instagram.com",
//                "method": "GET",
//                "path": "/web/search/topsearch/?context=blended&query=al&callback=jQuery32003403251990352948_1550201329571&_=1550201329573",
//                "scheme": "https",
//                "accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
//                "accept-encoding": "gzip, deflate, br",
//                "accept-language": "en-US,en;q=0.9",
//                "cache-control": "max-age=0",
//                "cookie": 'mcd=3; mid=XDN3AwAEAAG1aSPQ6sIPBrrTrQsW; fbm_124024574287414=base_domain=.instagram.com; fbsr_124024574287414=1NFwc7mQbEgw6whqZnVXeAUbngRQPY0MXZTlYqejcEQ.eyJjb2RlIjoiQVFDSnU1UlZFelQ2NHI3NUlKTnhLMHR6VUJndkQ5SFVDM21pQ1FqQzdTVDJoSFFBWlZPTmcyd0lqWmVrTm1RZ2RKYTV3WHhfN2ZwRml4b0hsYU9GelJrMEk0VHIwYlBzZnpjTTRIZmZ2SWdrUXA4d25WWkliVWtVbUppaE5aQllLRDdVaUh1QXY2YWNENDVqT2pWeHlKLW5IdFpndTZ0bzhLeDVYV2MwSEtWTExXM2tqLWE4WnYtbUFxVWRUbnBoR3NqWlE5VmxsVk00azFaZlJudWdwQVI0cE8yTjJNdHJCYWYzSWhEdTR6aVFMSW9tTmxxOWEwZGh6alJqeTVRWkgyb1dKdlZuNEwyTDRyTkFfdzZFaGJSUDVfWjdiaERQeEdrUTRoTzNHdEUwejNfMFF6dTVhQzdhaVZTdmdzRURwN2hwTHFmYktabm9DVnhnWDlHQk1Ya3kiLCJ1c2VyX2lkIjoiMTAwMDA4ODg2OTk0NzQzIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE1NTAyMDA3NzB9; csrftoken=TWhzeRyGsdPcSsxq2owoZetE1yDuJVNs; ds_user_id=3858629065; sessionid=3858629065%3AwfpspkmBRMazuV%3A15; rur=ATN; urlgen="{\"177.41.23.216\": 18881}:1guUNU:lVyLrBOpJZq34vtfGvciS4HdkTI"',
//                "upgrade-insecure-requests": 1,
//                "user-agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36"
//            },
            success: function (response) {
                $("#table_search_profile").empty();
                if (response['users'].length !== 0) {
                    console.log(response['users']);
                    var i = 0;
                    var username, full_name, profile_pic_url, is_verified, follower_count;
                    while (response['users'][i]) {
                        username = response['users'][i]['user']['username'];
                        full_name = response['users'][i]['user']['full_name'];
                        profile_pic_url = response['users'][i]['user']['profile_pic_url'];
                        is_verified = response['users'][i]['user']['is_verified'];
                        follower_count = response['users'][i]['user']['follower_count'];
                        $("#table_search_profile").append("<tr class='row' id='row_prof_" + i + "'>" +
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
                    if ($('#login_profile').val() !== '') {
                        $("#table_search_profile").append("<tr class='row'><td class='col'>" + T('Nenhum resultado encontrado.') + "</td></tr>");
                    }
                }
            },
            error: function (xhr, status) {
                modal_alert_message('Não foi possível conectar com o Instagram');
            }
        });
    });
    $('#login_profile1').keyup(function () {
        return;
        var urli = 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $('#login_profile').val();
        console.log(urli);
        $.ajax({
            url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=' + $('#login_profile').val(),
            type: 'GET',
            dataType: 'json',
//            dataType: 'jsonp',
//            beforeSend: function (xhr) {
//                xhr.setRequestHeader(':authority', 'www.instagram.com');
//                xhr.setRequestHeader(':method', 'GET');
//                xhr.setRequestHeader(':path', '/web/search/topsearch/?context=blended&query=al&callback=jQuery32003403251990352948_1550201329571&_=1550201329573');
//                xhr.setRequestHeader(':scheme', 'https');
//                xhr.setRequestHeader('accept', 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8');
//                xhr.setRequestHeader('accept-encoding', 'gzip, deflate, br');
//                xhr.setRequestHeader('accept-language', 'en-US,en;q=0.9');
//                xhr.setRequestHeader('cache-control', 'max-age=0');
//                xhr.setRequestHeader('cookie', 'mcd=3; mid=XDN3AwAEAAG1aSPQ6sIPBrrTrQsW; fbm_124024574287414=base_domain=.instagram.com; fbsr_124024574287414=1NFwc7mQbEgw6whqZnVXeAUbngRQPY0MXZTlYqejcEQ.eyJjb2RlIjoiQVFDSnU1UlZFelQ2NHI3NUlKTnhLMHR6VUJndkQ5SFVDM21pQ1FqQzdTVDJoSFFBWlZPTmcyd0lqWmVrTm1RZ2RKYTV3WHhfN2ZwRml4b0hsYU9GelJrMEk0VHIwYlBzZnpjTTRIZmZ2SWdrUXA4d25WWkliVWtVbUppaE5aQllLRDdVaUh1QXY2YWNENDVqT2pWeHlKLW5IdFpndTZ0bzhLeDVYV2MwSEtWTExXM2tqLWE4WnYtbUFxVWRUbnBoR3NqWlE5VmxsVk00azFaZlJudWdwQVI0cE8yTjJNdHJCYWYzSWhEdTR6aVFMSW9tTmxxOWEwZGh6alJqeTVRWkgyb1dKdlZuNEwyTDRyTkFfdzZFaGJSUDVfWjdiaERQeEdrUTRoTzNHdEUwejNfMFF6dTVhQzdhaVZTdmdzRURwN2hwTHFmYktabm9DVnhnWDlHQk1Ya3kiLCJ1c2VyX2lkIjoiMTAwMDA4ODg2OTk0NzQzIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE1NTAyMDA3NzB9; csrftoken=TWhzeRyGsdPcSsxq2owoZetE1yDuJVNs; ds_user_id=3858629065; sessionid=3858629065%3AwfpspkmBRMazuV%3A15; rur=ATN; urlgen="{\"177.41.23.216\": 18881}:1guUNU:lVyLrBOpJZq34vtfGvciS4HdkTI');
//                xhr.setRequestHeader('upgrade-insecure-requests', '1');
//                xhr.setRequestHeader('user-agent', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36');
//                console.log(xhr);
//            },
//            headers: {
//                "authority": "www.instagram.com",
//                "method": "GET",
//                "path": "/web/search/topsearch/?context=blended&query=al&callback=jQuery32003403251990352948_1550201329571&_=1550201329573",
//                "scheme": "https",
//                "accept": "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
//                "accept-encoding": "gzip, deflate, br",
//                "accept-language": "en-US,en;q=0.9",
//                "cache-control": "max-age=0",
//                "cookie": 'mcd=3; mid=XDN3AwAEAAG1aSPQ6sIPBrrTrQsW; fbm_124024574287414=base_domain=.instagram.com; fbsr_124024574287414=1NFwc7mQbEgw6whqZnVXeAUbngRQPY0MXZTlYqejcEQ.eyJjb2RlIjoiQVFDSnU1UlZFelQ2NHI3NUlKTnhLMHR6VUJndkQ5SFVDM21pQ1FqQzdTVDJoSFFBWlZPTmcyd0lqWmVrTm1RZ2RKYTV3WHhfN2ZwRml4b0hsYU9GelJrMEk0VHIwYlBzZnpjTTRIZmZ2SWdrUXA4d25WWkliVWtVbUppaE5aQllLRDdVaUh1QXY2YWNENDVqT2pWeHlKLW5IdFpndTZ0bzhLeDVYV2MwSEtWTExXM2tqLWE4WnYtbUFxVWRUbnBoR3NqWlE5VmxsVk00azFaZlJudWdwQVI0cE8yTjJNdHJCYWYzSWhEdTR6aVFMSW9tTmxxOWEwZGh6alJqeTVRWkgyb1dKdlZuNEwyTDRyTkFfdzZFaGJSUDVfWjdiaERQeEdrUTRoTzNHdEUwejNfMFF6dTVhQzdhaVZTdmdzRURwN2hwTHFmYktabm9DVnhnWDlHQk1Ya3kiLCJ1c2VyX2lkIjoiMTAwMDA4ODg2OTk0NzQzIiwiYWxnb3JpdGhtIjoiSE1BQy1TSEEyNTYiLCJpc3N1ZWRfYXQiOjE1NTAyMDA3NzB9; csrftoken=TWhzeRyGsdPcSsxq2owoZetE1yDuJVNs; ds_user_id=3858629065; sessionid=3858629065%3AwfpspkmBRMazuV%3A15; rur=ATN; urlgen="{\"177.41.23.216\": 18881}:1guUNU:lVyLrBOpJZq34vtfGvciS4HdkTI"',
//                "upgrade-insecure-requests": 1,
//                "user-agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36"
//            },
            success: function (response) {
                $("#table_search_profile1").empty();
                if (response['users'].length !== 0) {
                    console.log(response['users']);
                    var i = 0;
                    var username, full_name, profile_pic_url, is_verified, follower_count;
                    while (response['users'][i]) {
                        username = response['users'][i]['user']['username'];
                        full_name = response['users'][i]['user']['full_name'];
                        profile_pic_url = response['users'][i]['user']['profile_pic_url'];
                        is_verified = response['users'][i]['user']['is_verified'];
                        follower_count = response['users'][i]['user']['follower_count'];
                        $("#table_search_profile1").append("<tr class='row' id='row_prof_" + i + "'>" +
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
                    if ($('#login_profile').val() !== '') {
                        $("#table_search_profile1").append("<tr class='row'><td class='col'>" + T('Nenhum resultado encontrado.') + "</td></tr>");
                    }
                }
            },
            error: function (xhr, status) {
                modal_alert_message('Não foi possível conectar com o Instagram');
            }
        });
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


function select_profile_from_search(prof_name) {
    $('#login_profile').val(prof_name);
    $("#table_search_profile").empty();
}

function select_geolocalization_from_search(geo_name) {
    $('#login_geolocalization').val(geo_name);
    $("#table_search_geolocalization").empty();
}

function select_profile_from_search(prof_name) {
    $('#login_profile').val(prof_name);
    $("#table_search_profile").empty();
}