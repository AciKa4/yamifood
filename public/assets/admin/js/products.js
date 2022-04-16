const token = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    }
});

$(document).ready(function(){
    $("#keyword").keyup(filterSort);
    $("#sortiranje").on("change",filterSort);
    $("#entities").on("change",filterSort);

});


function getFilters(){
    entities = 0;
    keyword = "";
    sort = "";

    sort = $("#sortiranje").val();
    keyword = $("#keyword").val().trim().toLowerCase();
    entities = parseInt($("#entities").val());
}

function filterSort(){
    getFilters();
    getProducts(1,keyword,sort,entities);
}


function getProducts(page,keyword,sort,entities){

    const callername = arguments.callee.caller.name;

    $.ajax({
        url: "/admin/products/filter",
        method:"POST",
        data:{
            page,
            keyword,
            sort,
            entities
        },
        dataType:'json',
        success: function(response){
            console.log(response.data);
            showProducts(response.data);

            if (callername == 'filterSort') {
                changePagination(response.last_page, response.current_page);
            }
            if (callername == 'moreProducts') {
                changeActivePageLink(response.current_page);
            }

        },
        error:function(jqXHR){
            console.log(jqXHR.responseText);
        }
    });

}

function showProducts(products){

    let html = "";
    var nmb = 0;
    for(let p of products){
        nmb++;
        html+=`
        <tr>
            <th scope="row">${nmb}</th>
            <td class="font-weight-bold w-25 ">${p.name}</td>
            <td class="w-25"><a href="products/${p.id}"><img class="img-thumbnail" src="${publicFolder}assets/img/products/${p.image}"/></a></td>
            <td class="font-weight-bold">$${p.price}</td>
            <td>
                <a href="/admin/products/${p.id}/edit" ><i class="fa fa-edit text-info" aria-hidden="true"></i></a>
            </td>
            <td class="font-weight-bold ">
                <form action="/admin/products/${p.id}" method="POST">
                    <input type="hidden" name="_token" value="${token}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="deleteButton"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        `
    }

    $("#tbodyTable").html(html);
}


function changePagination(totalLinks, currentPage) {
    let html = "";
    for (let i = 1; i <= totalLinks; i++) {
        if (i != currentPage) {
            html += `<li class="page-item"><a class="page-link" id="link${i}" data-page="${i}" href="#">${i}</a></li>`;
        } else {
            html += `<li class="page-item active"><a class="page-link" id = "link${i}" data-page="${i}" href="#">${i}</a></li>`;
        }
    }
    $(".pagination").html(html);
    $(".page-link").click(moreProducts);
}


function moreProducts(e) {

    e.preventDefault();

    getFilters();
    getProducts($(this).data("page"),keyword,sort);
}

function changeActivePageLink(currentPage) {
    $('.page-item').removeClass('active');
    $('#link' + currentPage).parent().addClass('active');
}
