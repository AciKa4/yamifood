@extends("layouts.layout")



@section("keywords") Food,message,contact,phone,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection


@section("content")

    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="contact-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Contact</h2>
                        <p>Feel free to contact us.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" method="POST" action="{{route("contact.send")}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                                @error("name")
                                <p class="text-danger font-weight-bold text-left"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Your email" id="email" class="form-control" name="email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                @error("email")
                                <p class="text-danger font-weight-bold text-left"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Your subject" id="subject" class="form-control" name="subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                                @error("subject")
                                <p class="text-danger font-weight-bold text-left"> {{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Your Message" rows="4" data-error="Write your message" name="text"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                @error("text")
                                <p class="text-danger font-weight-bold text-left"> {{$message}}</p>
                                @enderror
                                <div class="submit-button text-center">
                                    <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                                @if(session("msg"))
                                <p class="text-success font-weight-bold text-center">{{session("msg")}}</p>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
<!-- End Contact info -->









