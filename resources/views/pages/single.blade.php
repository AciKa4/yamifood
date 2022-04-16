@extends("layouts.layout")
@section("content")
    <div class="all-page-title page-breadcrumb mb-4">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Single product</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row py-4">
            <div class="col-lg-6 single-right-left">
                <img src="{{asset("assets/img/products/$product->image")}}" class="img-fluid " alt="Image">
            </div>
            <div class="col-lg-6 single-right-left text-left pt-3">
                <h1 class="ml-2 font-weight-bold">{{$product->name}}</h1>
                <h1 class="ml-2 font-weight-bold">Price: ${{$product->price}}</h1>
                <h2 class="ml-2 font-weight-bold">Ingredients:</br> </h2>
                <ul>
                    @foreach($product->ingredients as $ing)
                            <li class="ml-2 font-weight-bold">{{$ing->name}}</li>
                    @endforeach
                </ul>

                </br>
                <p class="ml-2">{{$product->description}}</p>
                @if(session()->has("user"))
                    <button type="button" class="btn btn-light addToOrder text-warning font-weight-bold text-center float-right" data-productid="{{$product->id}}"}>Add to order</button>
                @else
                    <p class="text-danger font-weight-bold ml-2">Please login to add to order.</p>
                @endif
                </br>
                <div class="pt-4 text-center mx-auto">
                    <div class="alert alert-success" role="alert" id="addedToCartSuccess"></div>
                </div>

            </div>
        </div>
    </div>

@endsection
@section("scriptsForPage")
    <script src="{{asset('assets/js/cart.js')}}"></script>
@endsection


