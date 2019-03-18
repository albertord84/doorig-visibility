$(document).ready(function () {
    $.ajax({
        url: 'https://www.instagram.com/web/search/topsearch/?context=blended&query=alberto_test',
        type: 'GET',
        //dataType: 'jsonp',
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        },
        beforeSend: function (xhr) {
            alert("ok");
            xhr.withCredentials = true;
            xhr.setRequestHeader('Cookie', 'sessionid=3916799608%3ADdoMg9LkUdDaMN%3A29');
            console.log(xhr);
        }
    });
});