
<script>
 $("#table_search_profile").append("<tr class='row' id='row_prof_"+i+"'>"+
        "<td class='col' id='col_1_prof_"+i+"'>"+
            "<img class='search-img-profile' src='"+profile_pic_url+"' onclick='select_profile_from_search(\"" + username + "\");'>"+
        "</td>"+
        "<td class='col' id='col_2_prof_"+i+"' style='text-align: left;'>"+
            "<div class='tt-suggestion' class='search-div-profile' onclick='select_profile_from_search(\"" + username + "\");'>"+
                "<div>"+
                    "<span><strong>"+username+"</strong></span>"+
                    ((is_verified)?"<span style='color: blue' class='glyphicon glyphicon-certificate'></span>":"")+
                "</div>"+
                "<span style='color: gray;'>"+full_name+"</span>"+
            "</div>"+
        "</td>"+
    "</tr>");
</script>

<script>
 $("#table_search_profile").append("<tr class='row' id='row_prof_"+i+"'>"+
        "<td class='col' id='col_1_prof_"+i+"'>"+
            "<img class='search-img-profile' src='"+profile_pic_url+"' onclick='select_profile_from_search(\"" + username + "\");'>"+
        "</td>"+
        "<td class='col' id='col_2_prof_"+i+"' style='text-align: left;'>"+
            "<div class='tt-suggestion' class='search-div-profile' onclick='select_profile_from_search(\"" + username + "\");'>"+
                "<div>"+
                    "<span><strong>"+username+"</strong></span>"+
                    ((is_verified)?"<span style='color: blue' class='glyphicon glyphicon-certificate'></span>":"")+
                "</div>"+
                "<span style='color: gray;'>"+full_name+"</span>"+
            "</div>"+
        "</td>"+
    "</tr>");
</script>

