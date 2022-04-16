@extends("admin.layout")

@section("keywords") Food,delivery,contact,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection

@section("content")

    @if(session('success'))
        <h3 class="text-center pt-4 alert alert-success">{{session("success")}}</h3>
    @endif

    <div class="row pb-4">
        <div>
            <a href="{{ route('products.create') }}" class=" p-2 btn btn-info">Add new Product</a>
        </div>
        <div class="ml-3">
            <form class="form-inline">
                <label for="keyword" class="mr-2">Keyword</label>
                <input type="text" class="form-control mr4" id="keyword" placeholder="Product name">

                <label for="sort" class="mx-2">Choose sort: </label>
                <select class="form-control mr-4" id="sortiranje">
                    <option value="0">Sort</option>
                    <option value="p-desc">High to low price</option>
                    <option value="p-asc">Low to high price</option>
                    <option value="n-asc">Sort by name A-Z</option>
                    <option value="n-desc">Sort by name Z-A</option>
                </select>
                <label for="entities" class="mx-2">Number of entities:</label>
                <select name="entities" id="entities" class="form-control mr-4">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </form>
        </div>
    </div>
    <div>
    <table class="table mt-4">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody id="tbodyTable">
        @foreach($products as $key => $p)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td class="font-weight-bold w-25 ">{{$p->name}}</td>
            <td class="w-25"><a href="{{route("products.show",["product"=>$p->id])}}"><img class="img-thumbnail" src="{{asset("assets/img/products/$p->image")}}"/></a></td>
            <td class="font-weight-bold">${{$p->price}}</td>
            <td>
                <a href="{{route("products.edit",["product"=>$p->id])}}" ><i class="fa fa-edit text-info" aria-hidden="true"></i></a>
            </td>
            <td class="font-weight-bold ">
                <form action="{{ route('products.destroy',['product' => $p->id]) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="deleteButton"/><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>




@endsection
