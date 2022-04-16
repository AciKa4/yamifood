@extends("layouts.layout")

@section("keywords") Food,delivery,contact,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection

@section("content")

    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Special Menu</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="menu-box">
            <div class="container-xl-lg w-75 mx-auto my-4">
                <div class="row">
                    <div class="mt-5 col-lg-4">
                        <div class="">
                            <h3 class="">Search Here..</h3>
                            <form action="" method="post">
                                <input class="form-control search w-50" type="search" name="keyword" id="keyword" placeholder="Search here..." required="">
                                <button type="button" class="btn1">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="special-menu text-center sort float-left">
                            <div class="">
                                <h3 class="text-left">Choose sort:</h3>
                                <form>
                                    <select name="sort" id="sortiranje" class="w-100">
                                        <option value="0">Sort</option>
                                        <option value="p-desc">High to low price</option>
                                        <option value="p-asc">Low to high price</option>
                                        <option value="n-asc">Sort by name A-Z</option>
                                        <option value="n-desc">Sort by name Z-A</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        <div class="special-menu float-left">
                            <h3 class="">Choose category:</h3>
                            <div class="button-group filter-button-group    text-left pl-1">
                                {{-- <button class="active" data-filter="*">All</button> --}}
                                @foreach($categories as $cat)
                                    {{-- <button class="" data-filter="*">{{$cat->name}}</button> --}}
                                    <input type="checkbox" id="cat-{{$cat->id}}" name="cats" value="{{$cat->id}}">
                                    <label for="{{$cat->name}}">{{$cat->name}}</label></br>
                                @endforeach
                                {{-- <button class="active" data-filter="*">All</button>
                                 <button data-filter=".drinks">Pizza</button>
                                 <button data-filter=".lunch">Sandwiches</button>
                                 <button data-filter=".dinner">Salads</button> --}}
                            </div>
                            <div class="special-menu text-left">
                                <input type="button" id="btnReset" name="buttonReset" class="btn btn-orange mt-4" value="Reset">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row special-list" id="products">
                            @foreach($products as $p)
                                @include("partials.products")
                            @endforeach
                        </div>
                        {{ $products->links('vendor.pagination.bootstrap-4') }}



                </div>
            </div>




        </div>
    </div>
    <!-- End Menu -->

    <div class="qt-box qt-background">
        <div class="container">
            <!-- Start QT -->
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-left">
                    <p class="lead ">
                        " If you're not the one cooking, stay out of the way and compliment the chef. "
                    </p>
                    <span class="lead">Michael Strahan</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End QT -->

    <!-- Start Customer Reviews -->
    <div class="customer-reviews-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Customer Reviews</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <div id="reviews" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner mt-4">
                            @foreach($customers as $c)
                                @include("partials.customers")
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Customer Reviews -->



@endsection

@section("scriptsForPage")
    <script type="text/javascript">
        const publicFolder = "{{asset('/')}}";
    </script>
    <script src="{{asset('assets/js/products.js')}}"></script>
@endsection


