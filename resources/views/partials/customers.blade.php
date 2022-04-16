<div class="carousel-item text-center @if($loop->index == 0)active @endif">
    <div class="img-box p-1 border rounded-circle m-auto">
        <img class="d-block w-100 rounded-circle" src="{{asset("assets/img/$c->img")}}" alt="">
    </div>
    <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">{{$c->name}}</strong></h5>
    <h6 class="text-dark m-0">{{$c->job}}</h6>
    <p class="m-0 pt-3"> {{$c->comment}}</p></div>
