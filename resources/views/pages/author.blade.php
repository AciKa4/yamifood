@extends("layouts.layout")

@section("keywords") Kljucne reci @endsection
@section("description") Opis @endsection

@section("content")
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Author</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row autor">
            <div class="col-md-12 naslovAutor">
                <h1>Aleksandar Arsić</h1>
            </div>
            <div class="col-md-6 mt-5 tekst5">
                <p>
                    My name is Aleksandar Arsić,
                    I am 22 years old web developer, born in Aranđelovac.
                    Instead of thinking of all the things that can go wrong,I become one of the people who look on how they go right.
                    When you think positive thoughts, positive things will happen. <a href='https://www.linkedin.com/in/aleksandar-arsic-155b88173/' target="_blank" id="lin">LinkedIn</a></p>
            </div>
            <div class="col-md-6 mt-4 profile">
                <img src="{{asset("assets/img/profile.jpg")}}">
            </div>
        </div>
    </div>
@endsection
