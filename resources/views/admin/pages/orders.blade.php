@extends("admin.layout")

@section("keywords") Food,delivery,contact,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection
@section("content")


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User name</th>
            <th scope="col">Address</th>
            <th scope="col">City</th>
            <th scope="col">Total price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $o)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$o->name}}</td>
                <td>{{$o->address}}</td>
                <td>{{$o->city}}</td>
                <td>${{$o->total_price}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
@endsection
