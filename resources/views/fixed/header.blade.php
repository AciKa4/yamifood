
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route("home")}}">
                <img src="{{asset("assets/img/logo.png")}}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    @foreach($menu as $m)
                    <li class="nav-item @if(request()->routeIs($m['route'])) active @endif"><a class="nav-link" href="{{route($m['route'])}}">{{$m['name']}}</a></li>
                    @endforeach
                        <li class="nav-item @if(request()->routeIs('cart')) active @endif"><a class="nav-link" href="{{route('cart')}}"><i class='fa fa-shopping-cart'></i></a></li>
                        @if(session()->has('user') && session()->get('user')->role_id == 1)
                            <li class="nav-item "><a class="nav-link" href="{{route("admin.home")}}">Admin</a></li>
                        @endif
                    @if(session()->has('user'))
                            <li class="nav-item "><a class="nav-link" href="{{route("logout")}}">Logout</a></li>
                        @else
                            <li class="nav-item "><a class="nav-link" href="{{route("login")}}">Login</a></li>
                        @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
