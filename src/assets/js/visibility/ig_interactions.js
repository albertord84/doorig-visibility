$(document).ready(function () {
    
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






