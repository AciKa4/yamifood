

$(document).ready(function(){
    $("#created_at").on("change",date);
    $("#select_all").on("click",date);
});



function date(){

    let date = $("#created_at").val();

    if(date == null)
       date="";

    let selectAll;

    if($("#select_all:checked").length == 0) {
        selectAll = false;
    } else {
        selectAll = true;
    }
    ajax(
        '/admin/useraction/filter',
        'get',
        "json",
        {
            date,
            selectAll
        },
        function (response) {
            console.log(response);
            showAction(response);
        },
        function (xhr) {
            console.log(xhr.responseText);
        },

    );
}


function showAction(data){
    var html = "";
    var nmb  = 0;

    for(let a of data){
        var date = new Date(a.created_at);
        var dateFormat = date.toLocaleString();
        nmb++;
        html+=`
         <tr>
                <th scope="row">${nmb}</th>
                <td>${a.user.first_name} ${a.user.last_name}</td>
                <td>${a.action}</td>
                <td>${dateFormat}</td>
            </tr>
        `
    }


    $("#actionBody").html(html);
}
