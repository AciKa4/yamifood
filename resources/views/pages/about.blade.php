@extends("layouts.layout")


@section("keywords") Food,delivery,about,contact,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection

@section("content")
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Start About -->
    <div class="about-section-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <img src="{{asset("assets/img/about-img.jpg")}}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="inner-column">
                        <h1>Welcome To <span>Yamifood</span></h1>
                        <h4>About us</h4>
                        <p>Yamifood pushes the envelope of Belgrade cuisine. Taking its influences from our team members’ culinary roots,
                            Yamifood blends traditional and innovative techniques to create unique offerings using local ingredients in all
                            of its dishes. Yamifood is grounded in hospitality with our staff’s commitment to providing you with a memorable
                            experience each time you walk through our door.</p>
                        <a class="btn btn-lg btn-circle btn-outline-new-white" href="{{route("contact")}}">Contact us</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="inner-pt">
                       <p>We believe in the commitment to our community and in fostering long term relationships with local farmers and fishermen.
                           Our menus reflect these connections, featuring local, seasonal produce and sustainably sourced seafood and meats</p>
                        <p>To capture the character of our community, boiling down its stocks, foraging its plants, and showcasing its produce
                            all in an attempt to capture a time and a space in the confines of a plate, but more often in a series of plates.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->


@endsection



