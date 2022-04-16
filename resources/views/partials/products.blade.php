<div class="col-lg-4 col-md-6 special-grid ">
    <div class="gallery-single fix mb-0 pb-0">
        <div class="pic">
            <img src="{{asset("assets/img/products/$p->image")}}" class="img-fluid " alt="Image">
        </div>
        <div class="why-text py-3 d-flex justify-content-center align-items-center">
           {{--  <button type="submit" class="btn btn-light dugme text-warning font-weight-bold text-center">View</button></br>--}}
            <a class="viewLink" href="{{route("product.show",["id"=>$p->id])}}">View</a>
        </div>
    </div>
    <div class="">
        <span class="ml-2">{{$p->name}}</span></br>
        <span class="ml-2">${{$p->price}}</span>

    </div>
</div>
