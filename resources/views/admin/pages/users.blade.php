@extends("admin.layout")

@section("keywords") Food,delivery,contact,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    Users

                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Registered</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $u)
                        <tr>
                            <td class="text-center text-muted">#{{$key+1}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{$u->first_name}}</div>
                                            <div class="widget-subheading opacity-7">{{$u->last_name}}</div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{$u->email}}</td>
                            <td class="text-center">
                                @if($u->role_id == 2)
                                <div class="badge badge-info">User</div>
                                @else
                                    <div class="badge badge-success">Admin</div>
                                    @endif
                            </td>
                            <td class="text-center">
                                <div class="badge">{{$u->created_at}}</div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
