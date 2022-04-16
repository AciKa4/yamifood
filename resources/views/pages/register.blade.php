@extends("layouts.layout")

@section("keywords") Food,delivery,register,yami,order @endsection

@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection


@section("content")



    <div id="login-register">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{route('doRegister')}}" method="POST">
                            <h3 class="text-center text-white">Register</h3>
                            <div class="form-group">
                                <label for="email" class="text-white">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                                @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="text-white">First Name:</label><br>
                                <input type="text" name="first_name" id="firstname" class="form-control" >
                                @error('first_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="text-white">Last Name:</label><br>
                                <input type="text" name="last_name" id="lastname" class="form-control">
                                @error('last_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="text-white">Repeat password:</label><br>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btnColor btn-md text-white" value="register"/>
                            </div>
                            <div>
                                @if(session('successReg'))

                                    <div class="text-success text-center font-weight-bold">
                                        <p>{{ session('successReg') }}</p>
                                    </div>
                                @endif
                            </div>

                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
