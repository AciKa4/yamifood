@extends("layouts.layout")

@section("keywords") Food,delivery,contact,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection

@section("content")
    <div id="slides" class="cover-slides">
        <ul class="slides-container">
            @foreach($slider as $s)
                <li class="text-center">
                    <img src="{{asset("assets/img/$s->image")}}" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="m-b-20"><strong>{{$s->title}}</strong></h1>
                                <p class="m-b-40">{{$s->text}}</p>
                                <p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{route("products.home")}}">You can order food here</a></p>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach


        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End slides -->

    <!-- Start About -->
    <div class="about-section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="{{asset("assets/img/about-img.jpg")}}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                    <div class="inner-column">
                        <h1>Welcome To <span>Yamifood</span></h1>
                        <h4>About us</h4>
                        <p>Yamifood pushes the envelope of Belgrade cuisine. Taking its influences from our team members’ culinary roots,
                            Yamifood blends traditional and innovative techniques to create unique offerings using local ingredients in all of its dishes.
                            Yamifood is grounded in hospitality with our staff’s commitment to providing you with
                            a memorable experience each time you walk through our door.</p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="{{route("products.home")}}">Order food</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Start QT -->
    <div class="qt-box qt-background">
        <div class="container">
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
    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Newest dishes</h2>
                    </div>
                </div>
            </div>
            <div class="row special-list">
                @foreach($products as $p)
                   @include("partials.products")
                @endforeach
            </div>
        </div>
    </div>
    <!-- Start Customer Reviews -->
    <div class="customer-reviews-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Customer Reviews</h2>
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
@endsection
