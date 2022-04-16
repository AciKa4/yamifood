@extends("admin.layout")

@section("content")

    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid my-5">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-contentbetween mb-4">
                <h1 class="h3 mb-0 text-gray-800">Add new product.</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    @if(session('errorMessage'))
                        <h3 class="text-center pt-4 alert alert-danger">{{session("errorMessage")}}</h3>
                    @endif
                    @include('admin.products.form', ['action' => 'products.store'])
                </div>
@endsection

