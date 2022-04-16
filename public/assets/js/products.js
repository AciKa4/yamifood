const token = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    }
});

$(document).ready(function(){

    $("input[name='cats']").click(filterSort);
    $("#keyword").keyup(filterSort);
    $("#sortiranje").on("change",filterSort);
    $("#btnReset").click(resetFilters);
});



function resetFilters(e){
    e.preventDefault();

    $("input[name='cats']").prop('checked', false);
    $("#sortiranje").val(0);
    $("#keyword").val('');

    filterSort();

}

function getFilters(){
    cats = [];
    keyword = "";
    sort = "";

    $.each($("input[name='cats']:checked"),function(){

        cats.push($(this).val());
    });
    sort = $("#sortiranje").val();
    keyword = $("#keyword").val().trim().toLowerCase();
}

function filterSort(){

    getFilters();
    getProducts(1,cats,keyword,sort);

}



function getProducts(page,cats,keyword,sort){

    const callername = arguments.callee.caller.name;

    $.ajax({
        url: "products/filter",
        method:"POST",
        data:{
            page,
            cats,
            keyword,
            sort
        },
        dataType:'json',
        success: function(response){
            showProducts(response.data);

            if (callername == 'filterSort') {
                changePagination(response.last_page, response.current_page);
            }
            if (callername == 'moreProducts') {
                changeActivePageLink(response.current_page);
            }

        },
        error:function(jqXHR){
            console.log(jqXHR.statusText);
        }
    });

}


function showProducts(products){

    let html = "";

    for(let p of products){
        html+=`
    <div class="col-lg-4 col-md-6 special-grid ">
        <div class="gallery-single fix mb-0 pb-0">
            <div class="pic">
                <img src="${publicFolder}assets/img/products/${p.image}" class="img-fluid " alt="Image">
            </div>
            <div class="why-text py-3 d-flex justify-content-center align-items-center">
                <a class="viewLink" href="product/${p.id}">View</a>
            </div>
        </div>
        <div class="">
            <span class="ml-2">${p.name}</span></br>
            <span class="ml-2">$${p.price}</span>
        </div>
    </div>
        `
    }

    $("#products").html(html);
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
    getProducts($(this).data("page"),cats,keyword,sort);


}

function changeActivePageLink(currentPage) {
    $('.page-item').removeClass('active');
    $('#link' + currentPage).parent().addClass('active');
}
