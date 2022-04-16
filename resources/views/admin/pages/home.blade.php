@extends("admin.layout")

@section("keywords") Food,delivery,contact,yami,order @endsection


@section("description") Yamifood is best place to eat/order your food. Always cheap and tasty. @endsection

@section("content")

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Orders</div>
                        <div class="widget-subheading"></div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{count($orders)}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Registered users</div>
                        <div class="widget-subheading">Total users number</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{count($users)}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Earnings</div>
                        <div class="widget-subheading">Total</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>${{$orders_sum}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection


