@extends("admin.layout")
@section("keywords") Food,delivery,contact,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection

@section("content")


    <div class="my-5">
        <form class="form-inline">
            <label for="created_at" class="mr-2">Select date</label><input type="date" class="form-control mr4" id="created_at" name="created_at">
            <label for="select_all" class="mx-2">Select All</label><input type="checkbox" class="form-control mr4" name="select_all" id="select_all" value="10" />
        </form>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Action</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody id="actionBody">
        @foreach($actions as $key => $a)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$a->user->first_name." ".$a->user->last_name}}</td>
                <td>{{$a->action}}</td>
                <td>{{$a->created_at}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>
@endsection
