@extends("layouts.layout")

@section("keywords") Food,delivery,login,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection


@section("content")
    <div id="login-register">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{route("doLogin")}}" method="POST">
                            <h3 class="text-center text-white">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-white">email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                                @error("email")
                                <div class="text-danger">
                                    <p>{{$message}}</p>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                @error("password")
                                <div class="text-danger">
                                    <p>{{$message}}</p>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btnColor btn-md text-white" value="login"/>
                            </div>
                            @if(session('loginError'))
                                <div class="text-danger text-center">
                                    <p>{{session('loginError')}}</p>
                                </div>
                            @endif
                            <div class="text-right registerColor">
                                <a href="{{route("register")}}" class="text-white text-right ">Register here</a>
                            </div>


                        @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
